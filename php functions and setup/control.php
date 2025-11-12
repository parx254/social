<?php
// =====================================================
// CONTROL.PHP — Core controller for Social Destinations
// Handles: session start, DB connection, and post routing
// =====================================================
ini_set('display_errors', 0);
error_reporting(E_ALL);
ob_start(); // start buffer safely
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
/* Database credentials */
if (!defined('DB_SERVER'))   define('DB_SERVER', 'localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', 'pamcclel');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', 'Ozzie12!');
if (!defined('DB_NAME'))     define('DB_NAME', 'socialdestinationsdatabase');
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n ");
exit;
}
/* Assign user if logged in */
if (isset($_SESSION['username'])) {
$user = $_SESSION['username'];
}
/* Include all site functions */
require_once 'functions.php';
// =====================================================
// REQUEST HANDLERS
// =====================================================
// Profile & post management
if (isset($_POST['userinfo-submit'])) updateProf();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['addsubmit'])) {
$blogtext = trim($_POST['blogtext']);
$location = trim($_POST['location']);
$category = trim($_POST['category']);
$user = trim($_POST['user']);
$filenameArray = $_FILES['Filename'];
addPost($blogtext, $location, $category, $filenameArray, $user);
}
if (isset($_POST['addvideosubmit'])) {
addVideoPost(
$_POST['blogtext'],
$_FILES['Filename'],
$_SESSION['username'],
$_POST['videolocation'],
$_POST['videocategory']
);
}
if (isset($_POST['delete'])) deletePost();
if (isset($_POST['editno'])) editno();
if (isset($_POST['removePhotos'])) removePhotos();
if (isset($_POST['editInfo'])) editProf();
if (isset($_POST['updateProf'])) {
global $con;
$user = $_SESSION['username'];
$firstname = trim($_POST['firstname']);
$lastname  = trim($_POST['lastname']);
$bio       = trim($_POST['bio']);
$birthday  = trim($_POST['birthday']);
$city      = trim($_POST['city']);
$stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$stmt->bind_result($userID);
$stmt->fetch();
$stmt->close();
if ($userID) {
$stmt = $con->prepare("UPDATE users SET firstname = ?, lastname = ? WHERE userID = ?");
$stmt->bind_param("ssi", $firstname, $lastname, $userID);
$stmt->execute();
$stmt->close();
$stmt = $con->prepare("UPDATE profiles SET Bio = ?, Birthday = ?, HomeCity = ? WHERE userID = ?");
$stmt->bind_param("sssi", $bio, $birthday, $city, $userID);
$stmt->execute();
$stmt->close();
header("Location: edit-profile.php");
exit;
} else {
echo "<div class='results' style='color:red;text-align:center;margin-top:10px;'>User not found.</div>";
}
}
if (isset($_POST['profilePic'])) profilePic();
if (isset($_POST['coverPic'])) coverPic();
if (isset($_POST['logout'])) logout();
if (isset($_REQUEST['myfeed'])) myfeed();
if (isset($_POST['follow'])) follow();
if (isset($_POST['unfollow'])) unfollow();
// ============================================================
// LIKE / UNLIKE HANDLER (AJAX SAFE, POST_LIKES TABLE)
// ============================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['like'])) {
  ob_clean();
  header_remove('Content-Type');
  header('Content-Type: application/json; charset=UTF-8');
  global $con;

  if (!isset($_SESSION['username'])) {
    http_response_code(403);
    echo json_encode(['error' => 'Not logged in']);
    ob_end_flush();
    exit;
  }

  $postID = intval($_POST['post_id'] ?? 0);
  $userID = getCurrentUserId();

  if (!$postID || !$userID) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
    ob_end_flush();
    exit;
  }

  // Check if user already liked
  $stmt = $con->prepare("SELECT 1 FROM post_likes WHERE post_id = ? AND user_id = ? LIMIT 1");
  $stmt->bind_param("ii", $postID, $userID);
  $stmt->execute();
  $stmt->store_result();
  $alreadyLiked = $stmt->num_rows > 0;
  $stmt->close();

  if ($alreadyLiked) {
    // Unlike
    $stmt = $con->prepare("DELETE FROM post_likes WHERE post_id = ? AND user_id = ?");
    $stmt->bind_param("ii", $postID, $userID);
    $stmt->execute();
    $stmt->close();
    $status = 'unliked';
  } else {
    // Like
    $stmt = $con->prepare("INSERT INTO post_likes (post_id, user_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $postID, $userID);
    $stmt->execute();
    $stmt->close();
    $status = 'liked';
  }

  // Get updated like count
  $countStmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $countStmt->bind_param("i", $postID);
  $countStmt->execute();
  $countResult = $countStmt->get_result();
  $countRow = $countResult->fetch_assoc();
  $likeCount = (int)($countRow['like_count'] ?? 0);
  $countStmt->close();

  echo json_encode(['status' => $status, 'likes' => $likeCount]);
  ob_end_flush();
  exit;
}
if (isset($_POST['editsubmit'])) {
$_POST['action'] = 'editPost';
}
// ============================================================
// AJAX ACTION HANDLER (editPost / updatePost)
// ============================================================
if (isset($_POST['action'])) {
switch ($_POST['action']) {
case 'editPost':
ob_clean();
header_remove('Content-Type');
header('Content-Type: application/json; charset=utf-8');
editPost();
exit;
case 'updatePost':
ob_clean();
header_remove('Content-Type');
header('Content-Type: application/json; charset=utf-8');
updatePost();
exit;
}
}
if (isset($_POST['action']) && $_POST['action'] === 'getPostHTML') {
getPostHTML();
exit;
}
// ============================================================
// Search (moved into a function for clarity)
// ============================================================
if (isset($_POST['searchplaceProf'])) searchPlaceProf();
// ============================================================
// DEFAULT JSON FAILSAFE — only for direct AJAX requests
// ============================================================
if (
basename($_SERVER['SCRIPT_NAME']) === 'control.php' &&
$_SERVER['REQUEST_METHOD'] === 'POST'
) {
if (ob_get_length() === 0) {
header_remove('Content-Type');
header('Content-Type: application/json; charset=utf-8');
echo json_encode(['error' => 'No output generated from control.php']);
}
ob_end_flush();
exit;
} else {
// Included by another PHP file — output HTML normally
ob_end_flush();
}