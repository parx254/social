<?php
declare(strict_types=1);

ob_start();
ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('max_execution_time', '300');
ini_set('memory_limit', '512M');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/* =========================
   DB + FUNCTIONS
========================= */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/functions.php';

$con  = $con ?? null;
$user = $_SESSION['username'] ?? '';

/* =========================
   JSON RESPONSE (ONLY ONE)
========================= */
function jsonResponse(array $data, int $code = 200): never {
    while (ob_get_level()) {
        ob_end_clean();
    }
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit;
}

/* =========================
   HELPERS
========================= */
function wantsJson(): bool {
    $xrw = $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '';
    $acc = $_SERVER['HTTP_ACCEPT'] ?? '';
    return (
        strtolower($xrw) === 'xmlhttprequest'
        || isset($_POST['action'])
        || stripos($acc, 'application/json') !== false
    );
}

function requireLogin(): void {
    if (empty($_SESSION['username'])) {
        jsonResponse(['success' => false, 'error' => 'Not logged in'], 401);
    }
}

/* =========================
   AJAX ROUTER
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && wantsJson()) {

    // ---- LIKE HANDLER (no action param) ----
    if (isset($_POST['like'])) {
        try {
            $postID = (int)($_POST['post_id'] ?? 0);
            $userID = (int)getCurrentUserId();

            if (!$userID || !$postID) {
                jsonResponse(['error' => 'Invalid request'], 400);
            }

            $stmt = $con->prepare("SELECT 1 FROM post_likes WHERE post_id = ? AND user_id = ?");
            $stmt->bind_param("ii", $postID, $userID);
            $stmt->execute();
            $liked = $stmt->get_result()->num_rows > 0;
            $stmt->close();

            if ($liked) {
                $stmt = $con->prepare("DELETE FROM post_likes WHERE post_id = ? AND user_id = ?");
                $status = 'unliked';
            } else {
                $stmt = $con->prepare("INSERT INTO post_likes (post_id, user_id) VALUES (?, ?)");
                $status = 'liked';
            }

            $stmt->bind_param("ii", $postID, $userID);
            $stmt->execute();
            $stmt->close();

            $stmt = $con->prepare("SELECT COUNT(*) AS c FROM post_likes WHERE post_id = ?");
            $stmt->bind_param("i", $postID);
            $stmt->execute();
            $likes = (int)($stmt->get_result()->fetch_assoc()['c'] ?? 0);
            $stmt->close();

            jsonResponse(['status' => $status, 'likes' => $likes]);

        } catch (Throwable $e) {
            error_log("LIKE ERROR: " . $e->getMessage());
            jsonResponse(['error' => 'Server error'], 500);
        }
    }

    $action = $_POST['action'] ?? null;
    if (!$action) {
        jsonResponse(['success' => false, 'error' => 'Missing action'], 400);
    }

    try {

        /* ---------- EDIT POST ---------- */
        if ($action === 'editPost') {
            requireLogin();
            editPost(); // echoes {"edithere": "..."}
            exit;
        }

        /* ---------- UPDATE POST ---------- */
        if ($action === 'updatePost') {
            requireLogin();
            updatePost(); // echoes JSON
            exit;
        }

        /* ---------- DELETE POST ---------- */
        if ($action === 'deletePost') {
            requireLogin();
            deletePost();
            jsonResponse(['success' => true]);
        }

        /* ---------- ADD PHOTO ---------- */
        if ($action === 'add_photo') {
            requireLogin();

            $blogtext = trim($_POST['blogtext'] ?? '');
            $location = trim($_POST['location'] ?? '');
            $category = trim($_POST['category'] ?? '');
            $username = $_SESSION['username'];
            $file     = $_FILES['Filename'] ?? $_FILES['file'] ?? null;

            $postID = addPost($blogtext, $location, $category, $file, $username);
            if (!$postID) {
                jsonResponse(['success' => false, 'error' => 'Failed to add photo post'], 500);
            }

            jsonResponse([
                'success' => true,
                'isVideo' => false,
                'html'    => renderSinglePost((int)$postID),
            ]);
        }

        /* ---------- ADD VIDEO ---------- */
        if ($action === 'add_video') {
            requireLogin();

            $description = trim($_POST['blogtext'] ?? '');
            $location    = trim($_POST['location'] ?? '');
            $category    = trim($_POST['category'] ?? '');
            $username    = $_SESSION['username'] ?? '';
            $videoFile   = $_FILES['file'] ?? $_FILES['Filename'] ?? null;

            if (!$videoFile || ($videoFile['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK) {
                jsonResponse(['success' => false, 'error' => 'No video selected'], 422);
            }

            $postID = addPost($description, $location, $category, null, $username);
            if (!$postID) {
                jsonResponse(['success' => false, 'error' => 'Failed to create video post'], 500);
            }

            if (!addVideoPost((int)$postID, $description, $videoFile)) {
                jsonResponse(['success' => false, 'error' => 'Video processing failed'], 500);
            }

            jsonResponse([
                'success' => true,
                'isVideo' => true,
                'html'    => renderSinglePost((int)$postID),
            ]);
        }

        jsonResponse(['success' => false, 'error' => 'Unknown action'], 400);

    } catch (Throwable $e) {
        error_log("AJAX ERROR: " . $e->getMessage());
        jsonResponse(['success' => false, 'error' => 'Server error'], 500);
    }
}

/* =========================
   NON-AJAX POST HANDLING
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['userinfo-submit'])) updateProf();
    if (isset($_POST['delete']))          deletePost();
    if (isset($_POST['editno']))          editno();
    if (isset($_POST['removePhotos']))    removePhotos();
    if (isset($_POST['profilePic']))      profilePic();
    if (isset($_POST['coverPic']))        coverPic();
    if (isset($_POST['logout']))          logout();
    if (isset($_REQUEST['myfeed']))       myfeed();
    if (isset($_POST['follow']))          follow();
    if (isset($_POST['unfollow']))        unfollow();
}
