<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// =====================================================
// CONTROL.PHP — handles AJAX + form actions safely
// =====================================================
// Sessions
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
/* =====================================================
0. DEBUG MODE (used by AJAX testing)
===================================================== */
if (isset($_POST['debug_test'])) {
header("Content-Type: text/plain");
echo "POST DATA:\n";
print_r($_POST);
echo "\nFILES DATA:\n";
print_r($_FILES);
exit;
}
/* =====================================================
1. BYPASS CONTROL.PHP for LOGIN REQUEST
===================================================== */
if (isset($_POST['login-submit'])) {
// Let login.php handle it normally
return;
}
/* =====================================================
2. DB CONNECTION
===================================================== */
if (!defined('DB_SERVER'))   define('DB_SERVER', 'localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', 'pamcclel');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', 'Ozzie12!');
if (!defined('DB_NAME'))     define('DB_NAME', 'socialdestinationsdatabase');
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
echo json_encode(['error' => 'DB connection failed']);
exit;
}
/* USER */
if (isset($_SESSION['username'])) {
$user = $_SESSION['username'];
}
/* SITE FUNCTIONS */
require_once 'functions.php';
/* =====================================================
UNIVERSAL SAFE JSON OUTPUT
===================================================== */
function sd_json($array) {
ob_clean();
header_remove('Content-Type');
header("Content-Type: application/json; charset=UTF-8");
echo json_encode($array);
exit;
}
/* =====================================================
3. AJAX HANDLER (ONLY IF action EXISTS)
===================================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
header_remove('Content-Type');
header('Content-Type: application/json; charset=utf-8');
$action = $_POST['action'];
/* -----------------------------------------
AJAX: ADD PHOTO POST
----------------------------------------- */
if ($action === 'add_photo') {
$blogtext  = trim($_POST['blogtext'] ?? '');
$location  = trim($_POST['location'] ?? '');
$category  = trim($_POST['category'] ?? '');
$user      = trim($_POST['user'] ?? '');
$file      = $_FILES['Filename'] ?? null;
$postID = addPost($blogtext, $location, $category, $file, $user);
if ($postID) {
$html = renderSinglePost($postID);
sd_json([
"success" => true,
"isVideo" => false,
"message" => "Photo posted successfully",
"html"    => $html
]);
}
sd_json(["success" => false, "error" => "Failed to add photo post."]);
}

/* ===========================================================
ADD VIDEO POST
=========================================================== */
if ($action === 'add_video') {
$description  = trim($_POST['blogtext'] ?? '');
$location     = trim($_POST['videolocation'] ?? '');
$category     = trim($_POST['videocategory'] ?? '');
$username     = $_SESSION['username'] ?? '';
$videoFile    = $_FILES['Filename'] ?? null;
if (!$username) {
sd_json(["success" => false, "error" => "User not logged in."]);
}
if (!$videoFile || $videoFile['error'] !== 0) {
sd_json(["success" => false, "error" => "No video selected."]);
}
/* -------------------------------------------------------
0. GET USER ID
------------------------------------------------------- */
$stmtUID = $con->prepare("SELECT userID FROM users WHERE username = ?");
$stmtUID->bind_param("s", $username);
$stmtUID->execute();
$userRow = $stmtUID->get_result()->fetch_assoc();
$stmtUID->close();
$userID = (int)($userRow['userID'] ?? 0);
if (!$userID) {
sd_json(["success" => false, "error" => "User not found."]);
}
/* -------------------------------------------------------
1. CREATE VIDEO POST RECORD
(video posts DO NOT use Location/category)
------------------------------------------------------- */
$stmt = $con->prepare("
INSERT INTO posts (
userID, Blog,
Location, category,
videolocation, videocategory,
Last_Modified
)
VALUES (?, ?, NULL, NULL, ?, ?, NOW())
");
$stmt->bind_param("isss", $userID, $description, $location, $category);
$stmt->execute();
$postID = $stmt->insert_id;
$stmt->close();
if (!$postID) {
sd_json(["success" => false, "error" => "Failed to create post."]);
}
/* -------------------------------------------------------
2. PROCESS & ATTACH THE VIDEO
------------------------------------------------------- */
$videoSaved = addVideoPost(
$postID,
$description,
$location,
$category,
$videoFile
);
if (!$videoSaved) {
sd_json(["success" => false, "error" => "Video processing failed."]);
}
/* -------------------------------------------------------
3. RENDER NEW POST HTML FOR AJAX RETURN
------------------------------------------------------- */
$html = renderSinglePost($postID);
sd_json([
"success" => true,
"isVideo" => true,
"message" => "Video posted successfully",
"html"    => $html
]);
}
/* -----------------------------------------
AJAX: DELETE POST
----------------------------------------- */
if ($action === 'deletePost') {
deletePost();
sd_json(["success" => true]);
}
/* -----------------------------------------
AJAX: EDIT POST (Fetch existing data)
----------------------------------------- */
if ($action === 'editPost') {
editPost();
exit;
}
/* -----------------------------------------
AJAX: UPDATE POST (Save edits)
----------------------------------------- */
if ($action === 'updatePost') {
updatePost();
exit;
}
/* -----------------------------------------
FALLBACK FOR UNKNOWN AJAX ACTION
----------------------------------------- */
sd_json(["success" => false, "error" => "No valid action matched"]);
}
/* =====================================================
4. OTHER NON-AJAX FORM SUBMISSIONS
===================================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  if (isset($_POST['userinfo-submit'])) {
    updateProf();
    exit;
  }

}


if (isset($_POST['delete']))          deletePost();
if (isset($_POST['editno']))          editno();

if (isset($_POST['removePhotos']))    removePhotos();
if (isset($_POST['profilePic']))      profilePic();
if (isset($_POST['coverPic']))        coverPic();
if (isset($_POST['logout']))          logout();
if (isset($_REQUEST['myfeed']))       myfeed();
if (isset($_POST['follow']))          follow();
if (isset($_POST['unfollow']))        unfollow();
/* =====================================================
5. LIKE BUTTON (AJAX)
===================================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'])) {
ob_clean();
header("Content-Type: application/json; charset=UTF-8");
$postID = intval($_POST['post_id'] ?? 0);
$userID = getCurrentUserId();
if (!$userID || !$postID) {
sd_json(['error' => 'Invalid request']);
}
global $con;
// Check if liked
$stmt = $con->prepare("SELECT 1 FROM post_likes WHERE post_id = ? AND user_id = ?");
$stmt->bind_param("ii", $postID, $userID);
$stmt->execute();
$liked = $stmt->get_result()->num_rows > 0;
$stmt->close();
if ($liked) {
$stmt = $con->prepare("DELETE FROM post_likes WHERE post_id = ? AND user_id = ?");
$status = "unliked";
} else {
$stmt = $con->prepare("INSERT INTO post_likes (post_id, user_id) VALUES (?, ?)");
$status = "liked";
}
$stmt->bind_param("ii", $postID, $userID);
$stmt->execute();
$stmt->close();
// Count likes
$stmt = $con->prepare("SELECT COUNT(*) AS c FROM post_likes WHERE post_id = ?");
$stmt->bind_param("i", $postID);
$stmt->execute();
$likes = $stmt->get_result()->fetch_assoc()['c'] ?? 0;
$stmt->close();
sd_json(["status" => $status, "likes" => $likes]);
}
/* =====================================================
6. FINAL CATCH — ONLY FOR AJAX "action" POSTS
===================================================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
sd_json(['success' => false, 'error' => 'Unhandled action']);
}
ob_end_flush();
