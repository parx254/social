<?php
// --------------------------------------------------
// Global initialization for all functions (auto-injected)
// --------------------------------------------------
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
global $con;
global $user;
require_once 'config.php';
// Namespace shortcuts
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$currentuser = $currentuser ?? '';
// Logged-in user from session (safe)
$user = $_SESSION['username'] ?? '';
// Safe URL parameter globals
$currentuser = $currentuser ?? '';
$currentlocation = $_GET['location'] ?? '';
$currentcity = $_GET['city'] ?? '';
$currentvideo = $_GET['location'] ?? '';
$currentpost = $_GET['postID'] ?? '';
$currentcategory = $_GET['category'] ?? '';
$search = $_GET['search'] ?? '';
// Safe POST parameter globals
$bio = $_POST['bio'] ?? '';
$birthday = $_POST['birthday'] ?? '';
$city = $_POST['city'] ?? '';
$country = $_POST['country'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$location = $_POST['location'] ?? '';
$postID = $_POST['postID'] ?? '';
$blog = $_POST['blog'] ?? '';
$category = $_POST['category'] ?? '';
// --------------------------------------------------
// End global initialization
// --------------------------------------------------
// ============================================================
// Universal helper: safely get current logged-in user's ID
// ============================================================
function getCurrentUserId() {
global $con;
if (empty($_SESSION['username'])) {
return null;
}
$username = $_SESSION['username'];
$stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
if (!$stmt) {
return null;
}
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($uid);
$uid = ($stmt->fetch()) ? $uid : null;
$stmt->close();
return $uid;
}
// --- Get total number of likes for a post ---
function getLikesCount($postID) {
global $con;
$stmt = $con->prepare("SELECT COUNT(*) FROM post_likes WHERE post_id = ?");
$stmt->bind_param("i", $postID);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();
return (int)$count;
}
// --- Check if user liked post ---
if (!function_exists('hasUserLiked')) {
function hasUserLiked(int $postID, int $userID): bool {
global $con;
$stmt = $con->prepare("SELECT 1 FROM post_likes WHERE post_id = ? AND user_id = ? LIMIT 1");
$stmt->bind_param("ii", $postID, $userID);
$stmt->execute();
$stmt->store_result();
$liked = $stmt->num_rows > 0;
$stmt->close();
return $liked;
}
}
// --- Check if the current user liked a specific post ---
function renderLikeButton(int $postID, int $likes, bool $liked = false): void {
$iconClass = $liked ? 'fas fa-heart' : 'far fa-heart';
$btnClass  = $liked ? 'like-button liked' : 'like-button';
echo "
<form action='control.php' method='POST' class='like-form'>
  <input type='hidden' name='post_id' value='{$postID}'>
  <input type='hidden' name='like' value='1'>
  <button type='submit' class='{$btnClass}'>
  <i class='{$iconClass}'></i>
  <span class='like-count'>{$likes}</span>
</button>
</form>";
}
/* Attempt to connect to MySQL database */
// Connect to MySQL database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n ");
} else {
// =========================
// Navigation + User Helpers
// =========================
// Always start session once globally
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
// Ensure DB connection is consistent everywhere
function db() {
static $con = null;
if ($con === null) {
$con = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($con->connect_errno) {
die("Database connection failed: " . $con->connect_error);
}
}
return $con;
}
// -------------------------
// Verify Session + User Auth
// -------------------------
function verifySessionAndUser(): void {
global $user, $fname, $lname;
if (empty($_SESSION['username'])) {
header("Location: login.php");
exit;
}
$user = $_SESSION['username'];
$con = db();
$stmt = $con->prepare("
SELECT firstname, lastname, authorized
FROM users
WHERE username = ?
");
if (!$stmt) {
die("Database error: " . $con->error);
}
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
if (!$row = $result->fetch_assoc()) {
header("Location: login.php");
exit;
}
$fname = $row['firstname'];
$lname = $row['lastname'];
if ($row['authorized'] == 0) {
header("Location: login.php");
exit;
}
}
function getUserFullName(): string {
global $fname, $lname;
return trim("$fname $lname");
}
// ======================================
// MESSAGE DELETE FUNCTIONS (Inbox / Sent)
// ======================================
/**
* Delete message from inbox
*/


/* --------------------------------------------------------------------------
AUTO-HANDLE FORM SUBMISSIONS (Inbox & Sent)
-------------------------------------------------------------------------- */

function renderMessages(string $box): void {
$messages = getMessages($box);
foreach ($messages as $row) {
$id      = (int)$row['id'];
$message = nl2br(htmlspecialchars($row['message']));
if ($box === 'sent') {
$label = 'To ' . htmlspecialchars($row['to_user']);
} else {
$label = 'From ' . htmlspecialchars($row['from_user']);
}
echo "
<div class='message-card $box'>
  <div class='message-header'>
    <span class='from-user'>$label</span>
    <div class='message-actions'>
      ";
      // Reply only in inbox
      if ($box === 'inbox') {
      echo "
      <form action='reply.php' method='post'>
        <input type='hidden' name='replyid' value='$id'>
        <button type='submit'>
        <i class='fa fa-reply'></i>
      </button>
    </form>";
    }
    echo "
    <form method='post'>
      <input type='hidden' name='id' value='$id'>
      <input type='hidden' name='box' value='$box'>
      <button type='submit' name='delete'>
      <i class='far fa-trash'></i>
    </button>
  </form>
</div>
</div>
<div class='message-body'>
  $message
</div>
</div>";
}
// Mark inbox as read
if ($box === 'inbox') {
db()->query("
UPDATE messages
SET `read` = 'yes'
WHERE to_user = '{$_SESSION['username']}'
");
}
}
function getMessages(string $box): array {
$con  = db();
$user = $_SESSION['username'];
if ($box === 'sent') {
$sql = "
SELECT *
FROM messages
WHERE from_user = ?
AND sent_deleted = 'no'
ORDER BY id DESC
";
} else {
$sql = "
SELECT *
FROM messages
WHERE to_user = ?
AND deleted = 'no'
ORDER BY id DESC
";
}
$stmt = $con->prepare($sql);
if (!$stmt) {
error_log("getMessages() prepare failed: " . $con->error);
return [];
}
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function getConversations(): array {
$con  = db();
$user = $_SESSION['username'];
$sql = "
SELECT
CASE
WHEN from_user = ? THEN to_user
ELSE from_user
END AS other_user,
MAX(id) AS last_message_id
FROM messages
WHERE (from_user = ? OR to_user = ?)
AND (
(to_user = ? AND deleted = 'no')
OR (from_user = ? AND sent_deleted = 'no')
)
GROUP BY other_user
ORDER BY last_message_id DESC
";
$stmt = $con->prepare($sql);
if (!$stmt) {
error_log('getConversations() prepare failed: ' . $con->error);
return [];
}
$stmt->bind_param("sssss", $user, $user, $user, $user, $user);
$stmt->execute();
$result = $stmt->get_result();
return $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
}
function getConversationMessages(string $otherUser): array {
$con  = db();
$me   = $_SESSION['username'] ?? '';
if ($me === '' || $otherUser === '') {
return [];
}
$sql = "
SELECT *
FROM messages
WHERE
(
from_user = ? AND to_user = ? AND sent_deleted = 'no'
)
OR
(
from_user = ? AND to_user = ? AND deleted = 'no'
)
ORDER BY id ASC
";
$stmt = $con->prepare($sql);
if (!$stmt) {
error_log('getConversationMessages() prepare failed: ' . $con->error);
return [];
}
$stmt->bind_param("ssss", $me, $otherUser, $otherUser, $me);
$stmt->execute();
$res = $stmt->get_result();
$rows = $res ? $res->fetch_all(MYSQLI_ASSOC) : [];
$stmt->close();
return $rows;
}
function renderConversationMessages(string $otherUser): void {
$me = $_SESSION['username'] ?? '';
if ($me === '' || $otherUser === '') {
echo "<p>No conversation selected.</p>";
return;
}
$messages = getConversationMessages($otherUser);
if (empty($messages)) {
echo "<p>No messages yet.</p>";
return;
}
// Profile pics (your getProfilePic() should return a URL)
$myPic    = getProfilePicUrl($me);
$theirPic = getProfilePicUrl($otherUser);
foreach ($messages as $row) {
$id      = (int)($row['id'] ?? 0);
$from    = $row['from_user'] ?? '';
$isMine  = ($from === $me);
$sideClass = $isMine ? 'sent' : 'received';
$avatar    = $isMine ? $myPic : $theirPic;
$text = nl2br(htmlspecialchars($row['message'] ?? ''));
echo "
<div class='message-row $sideClass'>
  <img class='message-avatar' src='" . htmlspecialchars($avatar) . "' alt='avatar'>
  <div class='message-card $sideClass'>
    <div class='message-body'>
      $text
    </div>
  </div>
</div>
";
}
// Mark incoming messages from other user as read
$con = db();
$stmt = $con->prepare("
UPDATE messages
SET `read` = 'yes'
WHERE from_user = ?
AND to_user = ?
");
if ($stmt) {
$stmt->bind_param("ss", $otherUser, $me);
$stmt->execute();
$stmt->close();
}
}
function getProfilePicUrl(string $username): string {
$con = db();
$stmt = $con->prepare("
SELECT picName
FROM users
WHERE username = ?
LIMIT 1
");
$stmt->bind_param("s", $username);
$stmt->execute();
$row = $stmt->get_result()->fetch_assoc();
$stmt->close();
$pic = $row['picName'] ?? '';
if (!$pic) {
return 'Images/prof_pics/default_prof.jpg';
}
return 'Images/prof_pics/' . htmlspecialchars($pic);
}
function getLastMessagePreview(int $messageID): ?array {
$con = db();
$stmt = $con->prepare("
SELECT message, created_at
FROM messages
WHERE id = ?
LIMIT 1
");
$stmt->bind_param("i", $messageID);
$stmt->execute();
$result = $stmt->get_result();
return $result ? $result->fetch_assoc() : null;
}
function renderPostComposer() {

  echo "
  <div class='post-composer'>

    <div class='post-tabs'>
      <button type='button' class='tab active' data-type='photo'>Photo</button>
      <button type='button' class='tab' data-type='video'>Video</button>
    </div>

    <form
      id='postForm'
      action='control.php'
      method='POST'
      enctype='multipart/form-data'
      class='post-form'
    >

      <input type='hidden' name='action' id='postAction' value='add_photo'>
      <input type='hidden' name='user' value='{$_SESSION['username']}'>
      <input type='hidden' name='postType' id='postType' value='photo'>

      <div class='form-group'>
        <i class='far fa-globe'></i>
        <select name='location' id='locationField' required>
          <option class='placeholder' disabled selected value=''>Location</option>
  ";
  renderLocationOptions();
  echo "
        </select>
      </div>

      <div class='form-group'>
        <i class='far fa-tag'></i>
        <select name='category' id='categoryField' required>
          <option class='placeholder' disabled selected value=''>Category</option>
  ";
  renderCategoryOptions();
  echo "
        </select>
      </div>

      <div class='form-group'>
        <textarea
          name='blogtext'
          maxlength='90'
          placeholder='Type here...'
          required
        ></textarea>
      </div>

      <div class='form-group'>
        <i id='fileIcon' class='far fa-file-image-o'></i>
        <input
          type='file'
          name='Filename'
          id='fileInput'
          accept='image/*'
          required
        >
      </div>

      <div class='form-actions'>
        <button type='submit'>
          <i class='far fa-upload'></i> Post
        </button>
      </div>

    </form>
  </div>
  ";
}



/* --------------------------------------------------------------------------
RE-USABLE COMPONENTS
-------------------------------------------------------------------------- */
function citysearch()
{
echo "
<div class='location'>
  <div class='section-header'>
    <h2>Where to?</h2>
  </div>
  <input type='text' placeholder='Search destinations' id='searchbox4' autocomplete='off' />
  <div id='response4'>
  </div>
</div>";
}
function cityweather()
{
echo "
<div class='weather-container'>
  <img class='icon'>
  <h2 class='weather'></h2>
  <h3 class='temp'></h3>
  <span>&#8457;</span>
</div>";
}
/* --------------------------------------------------------------------------
USER LIST
-------------------------------------------------------------------------- */
function all_users()
{
$con = db();
$result = $con->query("SELECT username FROM users ORDER BY username");
if (!$result || $result->num_rows === 0) {
echo "<p>No users found.</p>";
return;
}
while ($row = $result->fetch_assoc()) {
$username = htmlspecialchars($row['username']);
echo "<p><a href='profile.php?currentuser={$username}'>{$username}</a></p>";
}
}
/* --------------------------------------------------------------------------
LIST ALL FOLLOWERS
-------------------------------------------------------------------------- */
function allfollows() {
$con = db();
$currentuser = $_GET['currentuser'] ?? '';
if (!$currentuser) {
echo "<p>No user specified.</p>";
return;
}
// Optimized: Join avoids N+1 queries
$stmt = $con->prepare("
SELECT u.username, u.picName
FROM follows f
JOIN users u ON u.userID = f.follower
WHERE f.followee = (SELECT userID FROM users WHERE username = ?)
");
if (!$stmt) {
echo "<p>Database error.</p>";
return;
}
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
echo "<p>No followers yet.</p>";
return;
}
while ($row = $result->fetch_assoc()) {
$username = htmlspecialchars($row['username']);
$pic = htmlspecialchars($row['picName'] ?: "default_prof.jpg");
echo "
<div class='follow'>
  <a href='profile.php?currentuser={$username}'>
  <img src='Images/prof_pics/{$pic}' alt='{$username}'>
</a>
<a href='profile.php?currentuser={$username}'>{$username}</a>
</div>";
}
$stmt->close();
}
function allfollowing() {
$con = db(); // Use shared DB connection
// User being viewed
$currentuser = $_GET['currentuser'] ?? '';
if (!$currentuser) {
echo "<p>No user specified.</p>";
return;
}
// Optimized: JOIN eliminates N+1 queries
$stmt = $con->prepare("
SELECT u.username, u.picName
FROM follows f
JOIN users u ON u.userID = f.followee
WHERE f.follower = (SELECT userID FROM users WHERE username = ?)
");
if (!$stmt) {
echo "<p>Database error.</p>";
return;
}
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
echo "<p>Not following anyone yet.</p>";
return;
}
while ($row = $result->fetch_assoc()) {
$username = htmlspecialchars($row['username']);
$pic = htmlspecialchars($row['picName'] ?: "default_prof.jpg");
echo "
<div class='follow'>
  <a href='profile.php?currentuser={$username}'>
  <img src='Images/prof_pics/{$pic}' alt='{$username}'>
</a>
<a href='profile.php?currentuser={$username}'>{$username}</a>
</div>";
}
$stmt->close();
}
// ------------------------------------------------------
// Include PHPMailer (manual cPanel version)
// ------------------------------------------------------
require '/home/dzx0rrb61cz9/public_html/PHPMailer/src/Exception.php';
require '/home/dzx0rrb61cz9/public_html/PHPMailer/src/PHPMailer.php';
require '/home/dzx0rrb61cz9/public_html/PHPMailer/src/SMTP.php';
// ------------------------------------------------------
// USER REGISTRATION FUNCTION
// ------------------------------------------------------
function register_user($data) {
global $con;
$errors = [];
$username = trim($data['username'] ?? '');
$firstname = trim($data['firstname'] ?? '');
$lastname  = trim($data['lastname'] ?? '');
$email   = trim($data['email'] ?? '');
$password  = trim($data['password'] ?? '');
$confirm   = trim($data['confirm_password'] ?? '');
// Basic validation
if (!$username) $errors['username_err'] = "Please enter a username.";
if (!$firstname) $errors['firstname_err'] = "Please enter your first name.";
if (!$lastname)  $errors['lastname_err']  = "Please enter your last name.";
if (!$email)   $errors['email_err']   = "Please enter your email.";
if (!$password)  $errors['password_err']  = "Please enter a password.";
if ($password !== $confirm) $errors['confirm_password_err'] = "Passwords do not match.";
if ($errors) return ['success' => false, 'errors' => $errors];
// Check duplicates
$stmt = $con->prepare("SELECT userID FROM users WHERE username=? OR email=?");
$stmt->bind_param("ss", $username, $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
$errors['username_err'] = "Username or email already exists.";
$stmt->close();
return ['success' => false, 'errors' => $errors];
}
$stmt->close();
// Create vkey for email verification
$vkey = md5(time() . $username);
// Insert new user
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$stmt = $con->prepare("INSERT INTO users (username, firstname, lastname, password, email, vkey, authorized) VALUES (?, ?, ?, ?, ?, ?, 0)");
$stmt->bind_param("ssssss", $username, $firstname, $lastname, $hashed_password, $email, $vkey);
if ($stmt->execute()) {
$stmt->close();
// Create profile row
$stmt2 = $con->prepare("INSERT INTO profiles (userID) SELECT userID FROM users WHERE username=?");
$stmt2->bind_param("s", $username);
$stmt2->execute();
$stmt2->close();
// Send email
if (send_verification_email($email, $vkey)) {
return ['success' => true];
} else {
$errors['email_err'] = "Registered, but failed to send verification email.";
return ['success' => false, 'errors' => $errors];
}
} else {
$errors['username_err'] = "Database error. Please try again.";
return ['success' => false, 'errors' => $errors];
}
}
// ------------------------------------------
// FINAL EMAIL VERIFICATION FUNCTION (LIVE)
// ------------------------------------------
function send_verification_email($email, $vkey) {
require_once __DIR__ . '/PHPMailer/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/src/SMTP.php';
require_once __DIR__ . '/PHPMailer/src/Exception.php';
$mail = new PHPMailer(true);
try {
// SMTP CONFIGURATION
$mail->isSMTP();
$mail->Host     = 'p3plzcpnl507626.prod.phx3.secureserver.net'; // GoDaddy's real SMTP endpoint
$mail->SMTPAuth   = true;
$mail->Username   = 'noreply@socialdestinations.com';
$mail->Password   = 'DiYK!}T0giE+';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
$mail->Port     = 465;
$mail->CharSet  = 'UTF-8';
$mail->SMTPOptions = [
'ssl' => [
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true,
],
];
// HEADERS & REPLY
$mail->setFrom('noreply@socialdestinations.com', 'Social Destinations');
$mail->addReplyTo('help@socialdestinations.com', 'Social Destinations Support');
$mail->addAddress($email);
// CONTENT
$verifyLink = "https://socialdestinations.com/verify.php?vkey=" . urlencode($vkey);
$mail->isHTML(true);
$mail->Subject = 'Verify Your Social Destinations Account';
$mail->Body = "
<div style='font-family:Arial,sans-serif;font-size:14px;color:#333'>
  <h2 style='color:#4a90e2'>Welcome to Social Destinations!</h2>
  <p>Click the button below to verify your email and activate your account:</p>
  <p>
  <a href='$verifyLink'
  style='display:inline-block;padding:10px 20px;background-color:#4a90e2;color:#fff;text-decoration:none;border-radius:5px;'>
  Verify My Account
</a>
</p>
<p>If you didn’t create this account, you can safely ignore this email.</p>
<hr>
<small>© " . date('Y') . " SocialDestinations.com</small>
</div>
";
$mail->AltBody = "Verify your account here: $verifyLink";
// SEND
$mail->send();
return true;
} catch (Exception $e) {
error_log("❌ Mailer Error: {$mail->ErrorInfo}");
return false;
}
}
if (!function_exists('login_user')) {
function login_user(string $username, string $password): array {
global $con;
// --- Trim & validate ---
$username = trim($username);
$password = trim($password);
$result = ['success' => false, 'error' => ''];
if ($username === '' || $password === '') {
$result['error'] = "Please enter both username and password.";
return $result;
}
// --- Query user ---
$stmt = $con->prepare("
SELECT userID, username, firstname, password, authorized
FROM users
WHERE username = ?
LIMIT 1
");
if (!$stmt) {
$result['error'] = "Database error: " . $con->error;
return $result;
}
$stmt->bind_param("s", $username);
$stmt->execute();
$res = $stmt->get_result();
if (!$res || $res->num_rows === 0) {
$stmt->close();
$result['error'] = "No account found with that username.";
return $result;
}
$row = $res->fetch_assoc();
$stmt->close();
// --- Verify password ---
if (!password_verify($password, $row['password'])) {
$result['error'] = "Incorrect password.";
return $result;
}
// --- Check authorization ---
if ((int)$row['authorized'] !== 1) {
$result['error'] = "Please verify your account before logging in.";
return $result;
}
// --- Start session & store user info ---
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
$_SESSION['username']  = $row['username'];
$_SESSION['firstname'] = $row['firstname'];
$_SESSION['userID']    = (int)$row['userID'];  // <-- important! used everywhere else
$result['success'] = true;
return $result;
}
}
function send_password_reset_email($email, $username, $token) {
// --- Build reset link ---
$short_token = substr($token, 0, 16);
$reset_link = "https://www.socialdestinations.com/reset-password.php?t=" . urlencode($short_token);
// --- Email content ---
$subject = "Reset Your Social Destinations Password";
$message = "
<html>
<head><title>Reset Your Password</title></head>
<body style='font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 20px;'>
<div style='max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px;'>
  <h2 style='color: #4a90e2;'>Reset Your Password</h2>
  <p>Hello <strong>" . htmlspecialchars($username) . "</strong>,</p>
  <p>We received a request to reset your password for your Social Destinations account.</p>
  <p><a href='$reset_link' style='background: #4a90e2; color: #fff; padding: 10px 15px; border-radius: 5px; text-decoration: none;'>Reset Password</a></p>
  <p>If the button doesn’t work, copy and paste this link into your browser:</p>
  <p><a href='$reset_link'>$reset_link</a></p>
  <p><em>This link will expire in 3 hours.</em></p>
  <hr style='border:none; border-top:1px solid #eee; margin:20px 0;'>
  <p style='font-size:13px; color:#777;'>If you did not request this, you can safely ignore this email.</p>
</div>
</body>
</html>
";
// --- PHPMailer setup ---
$mail = new PHPMailer(true);
try {
$mail->isSMTP();
$mail->Host     = 'p3plzcpnl507626.prod.phx3.secureserver.net';
$mail->SMTPAuth   = true;
$mail->Username   = "noreply@socialdestinations.com";
$mail->Password   = "DiYK!}T0giE+";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port     = 465;
$mail->setFrom("noreply@socialdestinations.com", "Social Destinations");
$mail->addAddress($email);
$mail->addReplyTo("parker@socialdestinations.com", "Parker McClelland");
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body  = $message;
$mail->send();
error_log("✅ SMTP: Password reset email sent to $email ($reset_link)");
return true;
} catch (Exception $e) {
error_log("❌ SMTP: Failed sending to $email — " . $mail->ErrorInfo);
return false;
}
}
//prevously control.php
// Profile appearance/function for user
function resize_image_and_save($source_path, $destination_path, $max_width, $max_height, $quality = 80) {
// Ensure numeric inputs
$max_width  = (float) $max_width;
$max_height = (float) $max_height;
$info = @getimagesize($source_path);
if (!$info) {
throw new Exception("Cannot read image: " . htmlspecialchars($source_path));
}
list($width, $height, $type) = $info;
$width  = (float) $width;
$height = (float) $height;
if ($width <= 0 || $height <= 0) {
throw new Exception("Invalid image dimensions");
}
// Compute resize ratio
$ratio = min($max_width / $width, $max_height / $height);
$new_width  = ($ratio >= 1) ? (int)$width  : (int)round($width * $ratio);
$new_height = ($ratio >= 1) ? (int)$height : (int)round($height * $ratio);
// Create source image
switch ($type) {
case IMAGETYPE_JPEG: $src = imagecreatefromjpeg($source_path); break;
case IMAGETYPE_PNG:  $src = imagecreatefrompng($source_path);  break;
case IMAGETYPE_GIF:  $src = imagecreatefromgif($source_path);  break;
default: throw new Exception("Unsupported image type");
}
// Prepare destination
$dst = imagecreatetruecolor($new_width, $new_height);
// Preserve PNG/GIF transparency
if ($type === IMAGETYPE_PNG || $type === IMAGETYPE_GIF) {
imagecolortransparent($dst, imagecolorallocatealpha($dst, 0,0,0,127));
imagealphablending($dst, false);
imagesavealpha($dst, true);
}
imagecopyresampled($dst, $src, 0,0,0,0, $new_width, $new_height, $width, $height);
// Save file
switch ($type) {
case IMAGETYPE_JPEG: imagejpeg($dst, $destination_path, $quality); break;
case IMAGETYPE_PNG:  imagepng($dst, $destination_path);            break;
case IMAGETYPE_GIF:  imagegif($dst, $destination_path);            break;
}
imagedestroy($src);
imagedestroy($dst);
return true;
}
function addPost($blogtext, $location, $category, $file, $user) {
$con = db();
if (!$blogtext || !$location || !$category || !$user) {
error_log("addPost(): Missing required fields.");
return false;
}
// Lookup user
$stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$userData = $stmt->get_result()->fetch_assoc();
$stmt->close();
if (!$userData) {
error_log("addPost(): User not found ($user)");
return false;
}
$userID = (int)$userData['userID'];
$con->begin_transaction();
try {
// Insert post row
$stmt = $con->prepare("
INSERT INTO posts (Blog, Location, userID, category, Last_Modified)
VALUES (?, ?, ?, ?, NOW())
");
$stmt->bind_param("ssis", $blogtext, $location, $userID, $category);
$stmt->execute();
$postID = $stmt->insert_id;
$stmt->close();
// ---------------------------
// IMAGE UPLOAD
// ---------------------------
if (!empty($file['tmp_name']) && is_uploaded_file($file['tmp_name'])) {
$allowed = ['jpg','jpeg','png','webp'];
$ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
if (!in_array($ext, $allowed)) {
throw new Exception("Unsupported image format ($ext)");
}
// Actual server directory
$uploadDir = __DIR__ . "/Images/";
if (!is_dir($uploadDir)) {
mkdir($uploadDir, 0777, true);
}
$newName = uniqid("img_", true) . "." . $ext;
// Full server path for saving
$target = $uploadDir . $newName;
// Web path for database (THIS FIXES YOUR AJAX ISSUE)
$webPath = "Images/" . $newName;
// Save image
try {
resize_image_and_save($file['tmp_name'], $target, 1080, 1080);
} catch (Exception $e) {
if (!move_uploaded_file($file['tmp_name'], $target)) {
throw new Exception("Image upload failed.");
}
}
// Save image reference
$stmt = $con->prepare("
INSERT INTO images (filepath, filename, postID)
VALUES (?, ?, ?)
");
$stmt->bind_param("ssi", $webPath, $newName, $postID);
$stmt->execute();
$stmt->close();
}
$con->commit();
return $postID;
} catch (Exception $e) {
$con->rollback();
error_log("addPost() failed: " . $e->getMessage());
return false;
}
}
function addVideoPost(int $postID, string $description, array $videoFile): bool
{
    $con = db();

    // Validation
    if ($postID <= 0) {
        error_log("addVideoPost ERROR: invalid postID");
        return false;
    }

    if (empty($videoFile['tmp_name']) || !is_uploaded_file($videoFile['tmp_name'])) {
        error_log("addVideoPost ERROR: invalid upload tmp file");
        return false;
    }

    // Paths
    $root = rtrim((string)($_SERVER['DOCUMENT_ROOT'] ?? ''), '/');
    if ($root === '') {
        error_log("addVideoPost ERROR: DOCUMENT_ROOT missing");
        return false;
    }

    $convWeb  = 'uploads/videos/converted';
    $thumbWeb = 'uploads/videos/thumbnails';

    $convDirAbs  = "$root/$convWeb";
    $thumbDirAbs = "$root/$thumbWeb";

    foreach ([$convDirAbs, $thumbDirAbs] as $dir) {
        if (!is_dir($dir) && !mkdir($dir, 0755, true)) {
            error_log("addVideoPost ERROR: cannot create dir: $dir");
            return false;
        }
    }

    // Filenames
    $origName = basename($videoFile['name'] ?? 'video.mp4');
    $safeOrig = preg_replace('/[^A-Za-z0-9._-]/', '', $origName) ?: 'video.mp4';

    $base      = uniqid('vid_', true);
    $finalName = "$base.mp4";
    $thumbName = "$base.jpg";

    $finalPathAbs = "$convDirAbs/$finalName";
    $thumbPathAbs = "$thumbDirAbs/$thumbName";

    $finalPathWeb = "$convWeb/$finalName";
    $thumbPathWeb = "$thumbWeb/$thumbName";

    // Temporary raw file (system temp, not persisted)
    $tmpRaw = sys_get_temp_dir() . '/' . uniqid('raw_', true);

    if (!move_uploaded_file($videoFile['tmp_name'], $tmpRaw)) {
        error_log("addVideoPost ERROR: failed to move temp upload");
        return false;
    }

    // Insert DB row (processing)
    $stmt = $con->prepare("
        INSERT INTO videos
        (filename, converted_path, thumbnail_path, description, postID, status)
        VALUES (?, ?, ?, ?, ?, 'processing')
    ");
    if (!$stmt) {
        unlink($tmpRaw);
        error_log("addVideoPost ERROR: insert prepare failed: " . $con->error);
        return false;
    }

    $stmt->bind_param(
        "ssssi",
        $safeOrig,
        $finalPathWeb,
        $thumbPathWeb,
        $description,
        $postID
    );
    $stmt->execute();
    $stmt->close();

    // Mark post as video
    $stmt = $con->prepare("
        UPDATE posts
        SET postType = 'video', Last_Modified = NOW()
        WHERE PostID = ?
    ");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $stmt->close();

    // FFmpeg
    $ffmpeg = '/home/dzx0rrb61cz9/ffmpeg/ffmpeg';

    $cmd =
        escapeshellcmd($ffmpeg) .
        ' -y -i ' . escapeshellarg($tmpRaw) .
        ' -c:v libx264 -pix_fmt yuv420p -profile:v baseline -level 3.0' .
        ' -movflags +faststart -preset veryfast -crf 23' .
        ' -vf scale=1280:-2 -c:a aac -b:a 128k ' .
        escapeshellarg($finalPathAbs) .
        ' 2>&1';

    exec($cmd, $out, $exitCode);

    // Raw file is NEVER kept
    unlink($tmpRaw);

    if ($exitCode !== 0 || !file_exists($finalPathAbs)) {
        error_log("addVideoPost ERROR: ffmpeg failed\n" . implode("\n", $out));

        $stmt = $con->prepare("UPDATE videos SET status = 'failed' WHERE postID = ?");
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $stmt->close();

        return false;
    }

    // Thumbnail
    $thumbCmd =
        escapeshellcmd($ffmpeg) .
        ' -y -ss 00:00:01 -i ' . escapeshellarg($finalPathAbs) .
        ' -vframes 1 -vf scale=480:-1 ' .
        escapeshellarg($thumbPathAbs) .
        ' 2>&1';

    exec($thumbCmd);

    // Ready
    $stmt = $con->prepare("UPDATE videos SET status = 'ready' WHERE postID = ?");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $stmt->close();

    return true;
}


function launchVideoProcessing(int $postID): void {
    $php = PHP_BINARY;
    $script = __DIR__ . '/process_video.php';

    exec("$php $script $postID > /dev/null 2>&1 &");
}



function markVideoReady(int $postID): void {
    $con = db();
    $stmt = $con->prepare("
        UPDATE videos
        SET status = 'ready', error_message = NULL
        WHERE postID = ?
    ");
    if ($stmt) {
        $stmt->bind_param("i", $postID);
        $stmt->execute();
        $stmt->close();
    }
}


function runFFmpeg(array $video): bool {
    $ffmpeg = '/usr/bin/ffmpeg';

    $input  = escapeshellarg($video['filepath']);
    $output = escapeshellarg(__DIR__ . '/videos/final/' . $video['postID'] . '.mp4');

    $cmd = "$ffmpeg -y -i $input -vcodec libx264 -pix_fmt yuv420p -movflags +faststart $output 2>&1";

    exec($cmd, $out, $code);

    if ($code !== 0) {
        file_put_contents(
            __DIR__ . '/ffmpeg_errors.log',
            implode("\n", $out),
            FILE_APPEND
        );
        return false;
    }

    return true;
}



//show more posts
//delete a post from page and DB
// ============================================================
// DELETE POST (removes post + related images/videos/likes)
// ============================================================
function deletePost(): void {
$con = db();
$postID = filter_input(INPUT_POST, 'postID', FILTER_VALIDATE_INT);
if (!$postID) {
echo "Invalid post ID.";
return;
}
// Delete images
$stmt = $con->prepare("DELETE FROM images WHERE postID = ?");
$stmt->bind_param("i", $postID);
$stmt->execute();
$stmt->close();
// Delete videos if table exists
if ($con->query("SHOW TABLES LIKE 'videos'")->num_rows) {
$stmt = $con->prepare("DELETE FROM videos WHERE postID = ?");
$stmt->bind_param("i", $postID);
$stmt->execute();
$stmt->close();
}
// Delete likes
if ($con->query("SHOW TABLES LIKE 'post_likes'")->num_rows) {
$stmt = $con->prepare("DELETE FROM post_likes WHERE Post_ID = ?");
$stmt->bind_param("i", $postID);
$stmt->execute();
$stmt->close();
}
// Delete the post itself
$stmt = $con->prepare("DELETE FROM posts WHERE postID = ?");
$stmt->bind_param("i", $postID);
$stmt->execute();
$stmt->close();
echo "Post deleted successfully.";
}
/* ============================================================
LOCATION DROPDOWN (with selected option)
============================================================ */
function renderLocationOptions(string $selected = ''): void {
global $con;
$result = $con->query("SELECT destinationName FROM destinations ORDER BY destinationName ASC");
if (!$result) return;
while ($row = $result->fetch_assoc()) {
$city = htmlspecialchars($row['destinationName'] ?? '');
if ($city === '') continue;
$isSelected = ($city === $selected) ? 'selected' : '';
echo "<option value=\"$city\" $isSelected>$city</option>";
}
}
/* ============================================================
CATEGORY DROPDOWN (with selected option)
============================================================ */
function renderCategoryOptions(string $selected = ''): void {
$cats = ['Eats', 'Adventures', 'Vibes', 'Stays', 'Events'];
foreach ($cats as $cat) {
$escaped = htmlspecialchars($cat, ENT_QUOTES, 'UTF-8');
$isSelected = (strcasecmp($cat, $selected) === 0) ? 'selected' : '';
echo "<option value=\"$escaped\" $isSelected>$escaped</option>";
}
}
/* ============================================================
EDIT POST — loads the modal HTML
============================================================ */
if (!function_exists('editPost')) {
function editPost(): void {
    global $con;

    // Clean JSON response
    while (ob_get_level()) {
        ob_end_clean();
    }
    header('Content-Type: application/json; charset=utf-8');

    if (empty($_POST['postID'])) {
        echo json_encode(['edithere' => 'Missing post ID.']);
        exit;
    }

    $postID = (int)$_POST['postID'];

    // Fetch post (ONLY required columns)
    $stmt = $con->prepare("
        SELECT Blog, Location, category, Last_Modified
        FROM posts
        WHERE PostID = ?
        LIMIT 1
    ");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$row) {
        echo json_encode(['edithere' => 'Cannot find post to edit!']);
        exit;
    }

    $location = htmlspecialchars($row['Location'] ?? '');
    $category = htmlspecialchars($row['category'] ?? '');
    $blog     = htmlspecialchars($row['Blog'] ?? '');

    $date_posted = '';
    if (!empty($row['Last_Modified'])) {
        $ts = strtotime($row['Last_Modified']);
        if ($ts !== false) {
            $date_posted = date("F d, Y", $ts);
        }
    }

    // Capture HTML safely
    ob_start();
    ?>
    <div class="editprofile-posts">
        <form class="edit-post-form" method="POST">

            <h3 class="edit-post-title">
                Edit Post from <?= htmlspecialchars($location) ?> on <?= $date_posted ?>
            </h3>

            <div class="form-group">
                <textarea
                    name="blog"
                    maxlength="160"
                    rows="10"
                    required><?= $blog ?></textarea>
            </div>

            <div class="form-group">
                <i class="far fa-globe"></i>
                <select name="location" required>
                    <?php renderLocationOptions($location); ?>
                </select>
            </div>

            <div class="form-group">
                <i class="far fa-tag"></i>
                <select name="category" required>
                    <?php renderCategoryOptions($category); ?>
                </select>
            </div>

            <input type="hidden" name="postID" value="<?= $postID ?>">
            <input type="hidden" name="action" value="updatePost">

            <div class="edit-buttons">
                <button type="submit" class="edit-post-form-submit">
                    <i class="fa fa-refresh"></i> Save
                </button>
                <button type="button" class="cancel-edit">
                    <i class="far fa-times"></i> Cancel
                </button>
            </div>

        </form>
    </div>
    <?php

    echo json_encode([
        'edithere' => ob_get_clean()
    ]);
    exit;
}
}

/* ============================================================
UPDATE POST — handles saving via AJAX
============================================================ */
function updatePost() {
    global $con;

    ob_clean();
    header('Content-Type: application/json; charset=utf-8');

    $postID   = (int)($_POST['postID'] ?? 0);
    $blog     = trim($_POST['blog'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $category = trim($_POST['category'] ?? '');

    if ($postID <= 0 || $blog === '' || $location === '' || $category === '') {
        echo json_encode([
            'status' => 'error',
            'message' => 'Missing or invalid data.'
        ]);
        return;
    }

    /* ---------------------------------------
       Detect post type CORRECTLY
    --------------------------------------- */
    $stmt = $con->prepare("
        SELECT postType
        FROM posts
        WHERE PostID = ?
        LIMIT 1
    ");
    if (!$stmt) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database prepare failed'
        ]);
        return;
    }

    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$row) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Post not found'
        ]);
        return;
    }

    /* ---------------------------------------
       ONE update path (videos + photos)
    --------------------------------------- */
    $stmt = $con->prepare("
        UPDATE posts
        SET
            Blog = ?,
            Location = ?,
            category = ?,
            Last_Modified = NOW()
        WHERE PostID = ?
    ");

    if (!$stmt) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Database prepare failed'
        ]);
        return;
    }

    $stmt->bind_param("sssi", $blog, $location, $category, $postID);
    $success = $stmt->execute();
    $stmt->close();

    echo json_encode([
        'status'  => $success ? 'success' : 'error',
        'message' => $success ? 'Post updated successfully!' : 'Update failed'
    ]);
}

function editno() {
header("location: my-profile");
}




//log out of account
function logout() {
echo "Logged out!";
// Initialize the session
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
// Unset all of the session variables
$_SESSION = array();
// Destroy the session.
session_destroy();
// Redirect to login page
header("location: index.php");
exit;
}
//locations visited on profile
function placesVisited() {
global $user;
global $con;
$stmt = $con->prepare("SELECT DISTINCT Location FROM posts WHERE userID = (SELECT userID FROM users WHERE username = ?) AND TRIM(Location) <> ''");
if ($stmt) {
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$location = trim($row['Location']);
if ($location !== "") {
echo "
<li class='placesvisited'>
  <a href='" . str_replace(" ", "-", $location) . "'>" . htmlspecialchars($location) . "</a>
</li>";
}
}
} else {
echo "You haven't posted any photos yet!";
}
$stmt->close();
} else {
echo "Error: " . $con->error . "\n";
}
}

function otherplacesVisited() {
global $user;
global $con;
global $currentuser;
$stmt = $con->prepare("SELECT DISTINCT Location FROM posts WHERE userID = (SELECT userID FROM users WHERE username = ?) AND TRIM(Location) <> ''");
if ($stmt) {
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$location = trim($row['Location']);
if ($location !== "") {
echo "
<li class='placesvisited'>
  <a href='" . str_replace(" ", "-", htmlspecialchars($location)) . "'>" . htmlspecialchars($location) . "</a>
</li>";
}
}
} else {
echo "No places yet!";
}
$stmt->close();
} else {
echo "Error: " . $con->error . "\n";
}
}

function profile() {
global $user;
$con = db(); // use shared DB helper
// 1. Look up userID
$stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
if (!$stmt) {
echo "Database error: " . htmlspecialchars($con->error);
return;
}
$stmt->bind_param("s", $user);
$stmt->execute();
$res = $stmt->get_result();
$userRow = $res->fetch_assoc();
$stmt->close();
if (!$userRow) {
echo "You don't exist.";
return;
}
$userID = (int)$userRow['userID'];
// 2. Fetch profile info
$stmt = $con->prepare("
SELECT Bio, Birthday, HomeCity
FROM profiles
WHERE userID = ?
");
if (!$stmt) {
echo "Database error: " . htmlspecialchars($con->error);
return;
}
$stmt->bind_param("i", $userID);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if (!$result || $result->num_rows === 0) {
echo "We can't find your profile record.";
return;
}
$row = $result->fetch_assoc();
$bio       = trim((string)$row['Bio']);
$birthday  = trim((string)$row['Birthday']);
$city      = trim((string)$row['HomeCity']);
$bioEsc      = htmlspecialchars($bio ?? '', ENT_QUOTES, 'UTF-8');
$cityEsc     = htmlspecialchars($city ?? '', ENT_QUOTES, 'UTF-8');
$birthdayEsc = htmlspecialchars($birthday ?? '', ENT_QUOTES, 'UTF-8');

// 3. FIRST-TIME USER? (empty bio only)
$isNewUser = $row['Bio'] === null || trim($row['Bio']) === '';

if ($isNewUser) {
  echo "
  <form action='control.php' method='POST' class='complete-profile-form'>

    <div class='form-group'>
      <textarea
        name='bio'
        rows='6'
        placeholder='Tell us about yourself'
        required
      >{$bioEsc}</textarea>
    </div>

    <div class='form-group'>
      <input
        type='text'
        name='homecity'
        placeholder='Home town'
        value='{$cityEsc}'
      >
    </div>

    <div class='form-group'>
      <input
        type='date'
        name='birthday'
        value='{$birthdayEsc}'
      >
    </div>

    <button type='submit' name='userinfo-submit'>
      Save Profile
    </button>

  </form>
  ";
  return;
}

// 4. EXISTING USER — display profile
$bioEsc  = htmlspecialchars($bio);
$cityEsc = htmlspecialchars($city);
// Age calculation (safe)
$age = "";
if (!empty($birthday) && strtotime($birthday)) {
$dob  = new DateTime($birthday);
$now  = new DateTime();
$diff = $now->diff($dob);
$age  = $diff->y . " years old";
}
echo "
<div class='age'>
  <i class='far fa-birthday-cake'></i> {$age}
</div>
<div class='city'>
  <i class='far fa-home-alt'></i> From {$cityEsc}
</div>
<div class='bio'>
  {$bioEsc}
</div>
";
}


//edit personal information on profile
function editProf() {
  global $con;
  global $user;

  if (!$user) {
    echo 'Not authenticated';
    return;
  }

  $stmt = $con->prepare("
    SELECT
      p.Bio,
      p.Birthday,
      p.HomeCity,
      u.firstname,
      u.lastname
    FROM users u
    LEFT JOIN profiles p ON p.userID = u.userID
    WHERE u.username = ?
    LIMIT 1
  ");
  $stmt->bind_param('s', $user);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();

  if (!$result || $result->num_rows === 0) {
    echo 'We can’t find your current info at the moment.';
    return;
  }

  $row = $result->fetch_assoc();

  echo "
  <div class='profile-post'>
    <form action='control.php' method='POST' id='updateProfile' class='edit-profile-form'>

      <div class='form-group'>
        <i class='far fa-user'></i>
        <input
          type='text'
          name='firstname'
          placeholder='First Name'
          value='" . htmlspecialchars($row['firstname'] ?? '') . "'
          required
        >
      </div>

      <div class='form-group'>
        <i class='far fa-user'></i>
        <input
          type='text'
          name='lastname'
          placeholder='Last Name'
          value='" . htmlspecialchars($row['lastname'] ?? '') . "'
          required
        >
      </div>

      <div class='form-group'>
        <i class='far fa-info-circle'></i>
        <textarea name='bio' placeholder='Tell us about yourself' required>" . htmlspecialchars($row['Bio'] ?? '') . "</textarea>
      </div>

      <div class='form-group'>
        <i class='far fa-birthday-cake'></i>
        <input
          type='date'
          name='birthday'
          value='" . htmlspecialchars($row['Birthday'] ?? '') . "'
          required
        >
      </div>

      <div class='form-group'>
        <i class='far fa-home-alt'></i>
        <input
          type='text'
          name='homecity'
          value='" . htmlspecialchars($row['HomeCity'] ?? '') . "'
          placeholder='Home Town'
          required
        >
      </div>

      <div class='form-actions'>
        <button type='submit' name='userinfo-submit' class='editprofile-posts button'>
          <i class='fa fa-refresh'></i> Save
        </button>
      </div>

    </form>
  </div>
  ";
}

function updateProf() {
  $con = db();

  $user = $_SESSION['username'] ?? null;
  if (!$user) {
    die('Not authenticated');
  }

  // Collect inputs
  $firstname = trim($_POST['firstname'] ?? '');
  $lastname  = trim($_POST['lastname'] ?? '');
  $bio       = trim($_POST['bio'] ?? '');
  $homecity  = trim($_POST['homecity'] ?? '');
  $birthday  = trim($_POST['birthday'] ?? '');

  // Required for ALL users
  if ($bio === '' || $homecity === '' || $birthday === '') {
    header('Location: my-profile?error=missing');
    exit;
  }

  // Lookup userID
  $stmt = $con->prepare("SELECT userID FROM users WHERE username = ? LIMIT 1");
  $stmt->bind_param('s', $user);
  $stmt->execute();
  $row = $stmt->get_result()->fetch_assoc();
  $stmt->close();

  if (!$row) {
    die('User not found');
  }

  $userID = (int)$row['userID'];

  /* --------------------------------------------------
     Update USERS table only if names were provided
     (edit profile flow)
  -------------------------------------------------- */
  if ($firstname !== '' && $lastname !== '') {
    $stmt = $con->prepare("
      UPDATE users
      SET firstname = ?, lastname = ?
      WHERE userID = ?
    ");
    $stmt->bind_param('ssi', $firstname, $lastname, $userID);
    $stmt->execute();
    $stmt->close();
  }

  /* --------------------------------------------------
     Insert or update PROFILES (all users)
  -------------------------------------------------- */
  $stmt = $con->prepare("
    INSERT INTO profiles (userID, Bio, Birthday, HomeCity)
    VALUES (?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE
      Bio = VALUES(Bio),
      Birthday = VALUES(Birthday),
      HomeCity = VALUES(HomeCity)
  ");
  $stmt->bind_param('isss', $userID, $bio, $birthday, $homecity);
  $stmt->execute();
  $stmt->close();

  header('Location: my-profile?updated=1');
  exit;
}



function renderProfileEditControls() {
echo '
<div id=\'changeprofile\'>
  <form method=\'POST\' action=\'control.php\' enctype=\'multipart/form-data\'>
    <span class=\'edit-label\'>Update Profile Photo</span>
    <input type=\'file\' name=\'Filename\' accept=\'image/*\' required>
    <button type=\'submit\' name=\'profilePic\' aria-label=\'Change profile photo\'>
    <i class=\'far fa-upload\'></i> Upload
  </button>
</form>
<form method=\'POST\' action=\'control.php\' enctype=\'multipart/form-data\'>
  <span class=\'edit-label\'>Update Cover Photo</span>
  <input type=\'file\' name=\'Filename\' accept=\'image/*\' required>
  <button type=\'submit\' name=\'coverPic\' aria-label=\'Change cover photo\'>
  <i class=\'far fa-upload\'></i> Upload
</button>
</form>
</div>';
}
if (!function_exists('renderProfileActions')) {
function renderProfileActions($highlight = ''): void {
echo "
<div class='profile-actions'>
  <form action='my-profile.php'>
    <button type='submit' " . ($highlight === 'home' ? "class='highlighted'" : "") . "><i class='far fa-home'></i></button>
  </form>
  <form action='messages.php'>
    <button type='submit' " . ($highlight === 'messages' ? "class='highlighted'" : "") . "><i class='fa-regular fa-comments'></i></button>
  </form>
  <form action='edit-profile.php'>
    <button type='submit' " . ($highlight === 'edit' ? "class='highlighted'" : "") . "><i class='fa fa-pencil-square-o'></i></button>
  </form>
<button id='edit-profile-media' type=button'>
  <i class='far fa-user-edit'></i>
</button>
  <form action='control.php' method='POST'>
    <button type='submit' name='logout'><i class='far fa-sign-out'></i></button>
  </form>
</div>";
}
}
//edit profile picture
//edit profile picture
function profilePic() {
global $user;
$con = db();
if (empty($_FILES['Filename']['tmp_name'])) {
echo "No file uploaded.";
return;
}
$original = $_FILES['Filename']['name'];
$ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
// Allowed image formats
$allowed = ['jpg','jpeg','png','gif'];
if (!in_array($ext, $allowed)) {
echo "Invalid file type.";
return;
}
// Build new file name
$newName = uniqid("prof_") . "." . $ext;
// Final server path
$uploadDir = __DIR__ . "/Images/prof_pics/";
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
$targetPath = $uploadDir . $newName;
// Move file
if (!move_uploaded_file($_FILES['Filename']['tmp_name'], $targetPath)) {
echo "Error uploading file.";
return;
}
// DB stores the *filename*, not absolute path
$stmt = $con->prepare("
UPDATE users
SET profilePic = ?, picName = ?
WHERE username = ?
");
$stmt->bind_param("sss", $targetPath, $newName, $user);
$stmt->execute();
$stmt->close();
header("Location: my-profile");
exit;
}
function mycurrentprofpic() {
global $user;
$con = db();
$stmt = $con->prepare("
SELECT picName
FROM users
WHERE userID = (SELECT userID FROM users WHERE username = ?)
");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if ($row = $result->fetch_assoc()) {
$pic = $row['picName'] ?: "default_prof.jpg";
echo "Images/prof_pics/" . htmlspecialchars($pic);
} else {
echo "Images/prof_pics/default_prof.jpg";
}
}
function coverPic() {
global $user;
$con = db();
if (empty($_FILES['Filename']['tmp_name'])) {
echo "No file uploaded.";
return;
}
$original = $_FILES['Filename']['name'];
$ext = strtolower(pathinfo($original, PATHINFO_EXTENSION));
$allowed = ['jpg','jpeg','png','gif'];
if (!in_array($ext, $allowed)) {
echo "Invalid file type.";
return;
}
$newName = uniqid("cover_") . "." . $ext;
$uploadDir = __DIR__ . "/Images/cover_pics/";
if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
$targetPath = $uploadDir . $newName;
if (!move_uploaded_file($_FILES['Filename']['tmp_name'], $targetPath)) {
echo "Error uploading file.";
return;
}
$stmt = $con->prepare("
UPDATE users
SET coverPic = ?, coverName = ?
WHERE username = ?
");
$stmt->bind_param("sss", $targetPath, $newName, $user);
$stmt->execute();
$stmt->close();
header("Location: my-profile");
exit;
}
// ==========================
// PROFILE PHOTO
// ==========================
function currentprofpic($currentuser = null) {
$con = db();
if (empty($currentuser)) {
$currentuser = $_GET['currentuser'] ?? '';
}
if (empty($currentuser)) {
echo "Images/prof_pics/default_prof.jpg";
return;
}
$stmt = $con->prepare("
SELECT picName
FROM users
WHERE userID = (SELECT userID FROM users WHERE username = ?)
");
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if ($row = $result->fetch_assoc()) {
$pic = $row['picName'] ?: "default_prof.jpg";
echo "Images/prof_pics/" . htmlspecialchars($pic);
} else {
echo "Images/prof_pics/default_prof.jpg";
}
}
function currentcoverpic($currentuser = null) {
$con = db();
if (empty($currentuser)) {
$currentuser = $_GET['currentuser'] ?? '';
}
if (empty($currentuser)) {
echo "Images/cover_pics/default_cover.jpg";
return;
}
$stmt = $con->prepare("
SELECT coverName
FROM users
WHERE userID = (SELECT userID FROM users WHERE username = ?)
");
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if ($row = $result->fetch_assoc()) {
$pic = $row['coverName'] ?: "default_cover.jpg";
echo "Images/cover_pics/" . htmlspecialchars($pic);
} else {
echo "Images/cover_pics/default_cover.jpg";
}
}
// ==========================
// LIKE A POST
// ==========================
function like() {
$con = db();
// User must be logged in
if (empty($_SESSION['username'])) {
return;
}
$loggedUser = $_SESSION['username'];
$postID = $_POST['post_id'] ?? null;
// Validate input
if (empty($postID) || !is_numeric($postID)) {
error_log("Like error: invalid post_id");
return;
}
// =======================================
// 1. Get the logged-in user's userID
// =======================================
$stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
if (!$stmt) {
error_log("Like error: prepare failed");
return;
}
$stmt->bind_param("s", $loggedUser);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$userID = $result->fetch_assoc()['userID'] ?? null;
if (!$userID) {
error_log("Like error: userID not found for $loggedUser");
return;
}
// =======================================
// 2. Check if the like exists (toggle)
// =======================================
$stmt = $con->prepare("
SELECT 1
FROM likes
WHERE userID = ? AND postID = ?
");
$stmt->bind_param("ii", $userID, $postID);
$stmt->execute();
$exists = $stmt->get_result()->num_rows > 0;
$stmt->close();
// =======================================
// 3. Toggle like ON or OFF
// =======================================
if ($exists) {
// Unlike
$stmt = $con->prepare("DELETE FROM likes WHERE userID = ? AND postID = ?");
} else {
// Like
$stmt = $con->prepare("INSERT INTO likes (userID, postID) VALUES (?, ?)");
}
if ($stmt) {
$stmt->bind_param("ii", $userID, $postID);
$stmt->execute();
$stmt->close();
} else {
error_log("Like toggle error: prepare failed");
}
// =======================================
// 4. Redirect back to the previous page
// =======================================
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
}
function mycurrentcoverpic() {
// Ensure we know who is logged in
if (empty($_SESSION['username'])) {
echo "Images/cover_pics/default_cover.jpg";
return;
}
$loggedUser = $_SESSION['username'];
$con = db();
// Fetch cover picture for logged-in user
$stmt = $con->prepare("
SELECT coverName
FROM users
WHERE username = ?
");
if (!$stmt) {
echo "Images/cover_pics/default_cover.jpg";
return;
}
$stmt->bind_param("s", $loggedUser);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
// Determine output
if ($row = $result->fetch_assoc()) {
$pic = $row['coverName'] ?: "default_cover.jpg";
echo "Images/cover_pics/" . htmlspecialchars($pic);
} else {
echo "Images/cover_pics/default_cover.jpg";
}
}
function removePhotos() {
$con = db();
// Validate POST
$postID = isset($_POST['postID']) ? (int)$_POST['postID'] : 0;
if ($postID <= 0) {
echo "Invalid post ID.";
return;
}
// Delete photo safely
$stmt = $con->prepare("DELETE FROM images WHERE postID = ?");
if (!$stmt) {
echo "Database error: " . htmlspecialchars($con->error);
return;
}
$stmt->bind_param("i", $postID);
$stmt->execute();
$stmt->close();
// No echo (matches your old function behavior)
}
//feed - only people you follow
// ==========================
// FOLLOW / UNFOLLOW BUTTON
// ==========================
function profileOption() {
$con = db(); // shared DB connection
// User must be logged in
if (empty($_SESSION['username'])) {
return;
}
$loggedInUser = $_SESSION['username'];  // always use session, not global
$currentuser  = $_GET['currentuser'] ?? '';
// No buttons if viewing own profile
if (empty($currentuser) || $currentuser === $loggedInUser) {
return;
}
// Check if logged-in user is following this profile
$stmt = $con->prepare("
SELECT 1
FROM follows
WHERE follower = (
SELECT userID FROM users WHERE username = ?
)
AND followee = (
SELECT userID FROM users WHERE username = ?
)
");
if (!$stmt) {
// Fail silently—UI should not break
return;
}
$stmt->bind_param("ss", $loggedInUser, $currentuser);
$stmt->execute();
$result = $stmt->get_result();
$isFollowing = $result->num_rows > 0;
$stmt->close();
$safeUser = htmlspecialchars($currentuser);
// ======================
// FOLLOW / UNFOLLOW BUTTON
// ======================
echo "
<div class='followuser'>
  ";
  if ($isFollowing) {
  echo "
  <form action='control.php' method='POST'>
    <input type='hidden' name='currentuser' value='{$safeUser}'>
    <button type='submit' name='unfollow'>
    Unfollow
  </button>
</form>
";
} else {
echo "
<form action='control.php' method='POST'>
  <input type='hidden' name='currentuser' value='{$safeUser}'>
  <button type='submit' name='follow'>
  Follow
</button>
</form>
";
}
echo "
</div>";
// ======================
// MESSAGE BUTTON
// ======================
echo "
<div class='messageuser'>
  <button>
  <a href='message.php?currentuser={$safeUser}'>
  Message
</a>
</button>
</div>
";
}
// ==========================
// FOLLOW ANOTHER USER
// ==========================
function follow() {
$con = db();
if (empty($_SESSION['username'])) {
return; // user not logged in
}
$loggedInUser = $_SESSION['username'];
$currentuser  = $_POST['currentuser'] ?? '';
// Ensure we have two valid usernames
if (empty($loggedInUser) || empty($currentuser)) {
error_log("Follow error: missing logged-in user or target user.");
return;
}
// Cannot follow yourself
if ($loggedInUser === $currentuser) {
return;
}
// ==========================================
// 1. Fetch BOTH IDs in one query
// ==========================================
$stmt = $con->prepare("
SELECT username, userID
FROM users
WHERE username IN (?, ?)
");
if (!$stmt) {
error_log("Follow error: prepare failed: " . $con->error);
return;
}
$stmt->bind_param("ss", $loggedInUser, $currentuser);
$stmt->execute();
$res = $stmt->get_result();
$stmt->close();
$followerID = null;
$followeeID = null;
while ($row = $res->fetch_assoc()) {
if ($row['username'] === $loggedInUser) {
$followerID = (int)$row['userID'];
}
if ($row['username'] === $currentuser) {
$followeeID = (int)$row['userID'];
}
}
if (!$followerID || !$followeeID) {
error_log("Follow error: could not resolve user IDs.");
return;
}
// ==========================================
// 2. Check if follow already exists
// ==========================================
$stmt = $con->prepare("
SELECT 1
FROM follows
WHERE follower = ? AND followee = ?
");
$stmt->bind_param("ii", $followerID, $followeeID);
$stmt->execute();
$exists = $stmt->get_result()->num_rows > 0;
$stmt->close();
if ($exists) {
// already following → redirect back
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
}
// ==========================================
// 3. Insert new follow record
// ==========================================
$stmt = $con->prepare("
INSERT INTO follows (follower, followee)
VALUES (?, ?)
");
if (!$stmt) {
error_log("Follow insert prepare error: " . $con->error);
return;
}
$stmt->bind_param("ii", $followerID, $followeeID);
if (!$stmt->execute()) {
error_log("Follow insert error: " . $stmt->error);
}
$stmt->close();
// Return user to previous page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
}
// ==========================
// UNFOLLOW A USER
// ==========================
function unfollow() {
$con = db();
// Must be logged in
if (empty($_SESSION['username'])) {
return;
}
$loggedInUser = $_SESSION['username'];
$currentuser  = $_POST['currentuser'] ?? '';
// Validate inputs
if (empty($loggedInUser) || empty($currentuser)) {
error_log("Unfollow error: missing logged-in user or target.");
return;
}
// Cannot unfollow yourself
if ($loggedInUser === $currentuser) {
return;
}
// ======================================
// 1. Get BOTH user IDs in one query
// ======================================
$stmt = $con->prepare("
SELECT username, userID
FROM users
WHERE username IN (?, ?)
");
if (!$stmt) {
error_log("Unfollow error: prepare failed: " . $con->error);
return;
}
$stmt->bind_param("ss", $loggedInUser, $currentuser);
$stmt->execute();
$res = $stmt->get_result();
$stmt->close();
$followerID = null;
$followeeID = null;
while ($row = $res->fetch_assoc()) {
if ($row['username'] === $loggedInUser) {
$followerID = (int)$row['userID'];
}
if ($row['username'] === $currentuser) {
$followeeID = (int)$row['userID'];
}
}
// Missing IDs = abort safely
if (!$followerID || !$followeeID) {
error_log("Unfollow error: could not resolve user IDs.");
return;
}
// ======================================
// 2. Delete follow link safely
// ======================================
$stmt = $con->prepare("
DELETE FROM follows
WHERE follower = ? AND followee = ?
");
if (!$stmt) {
error_log("Unfollow delete prepare error: " . $con->error);
return;
}
$stmt->bind_param("ii", $followerID, $followeeID);
if (!$stmt->execute()) {
error_log("Unfollow delete error: " . $stmt->error);
}
$stmt->close();
// Redirect back to last page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
}
// ==========================
// PROFILE FOLLOWER COUNT
// ==========================
function profileFollowers(?string $username = null) {
  $con = db();

  $targetUser = $username ?? ($_SESSION['username'] ?? null);
  if (!$targetUser) return;

  $stmt = $con->prepare("
    SELECT COUNT(f.follower) AS total
    FROM follows f
    INNER JOIN users u ON u.userID = f.followee
    WHERE u.username = ?
  ");
  if (!$stmt) return;

  $stmt->bind_param("s", $targetUser);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();

  if ($row = $result->fetch_assoc()) {
    $count = (int)$row['total'];
    $safeUser = htmlspecialchars($targetUser, ENT_QUOTES, 'UTF-8');

    echo "
      <div class='nums'>
        <h5>
          <a href='followers.php?currentuser={$safeUser}'>
            {$count} Followers
          </a>
        </h5>
      </div>
    ";
  }
}

// ==========================
// PROFILE FOLLOWING COUNT
// ==========================
function profileFollowees(?string $username = null) {
  $con = db();

  // Determine target user
  if ($username) {
    $targetUser = $username;
  } elseif (!empty($_SESSION['username'])) {
    $targetUser = $_SESSION['username'];
  } else {
    return;
  }

  // Count how many users this person is following
  $stmt = $con->prepare("
    SELECT COUNT(f.followee) AS followingCount
    FROM follows f
    INNER JOIN users u ON u.userID = f.follower
    WHERE u.username = ?
  ");

  if (!$stmt) {
    return;
  }

  $stmt->bind_param("s", $targetUser);
  $stmt->execute();
  $result = $stmt->get_result();
  $stmt->close();

  if ($row = $result->fetch_assoc()) {
    $count = (int)$row['followingCount'];
    $safeUser = htmlspecialchars($targetUser, ENT_QUOTES, 'UTF-8');

    echo "
      <div class='nums'>
        <h5>
          <a href='following.php?currentuser={$safeUser}'>
            {$count} Following
          </a>
        </h5>
      </div>
    ";
  }
}
function otherprofile() {
$con = db();
// Determine which user we are viewing
$currentuser = $_GET['currentuser'] ?? '';
if (empty($currentuser)) {
echo "
<div class='bio'>
  User not found.
</div>";
return;
}
// Fetch profile info
$stmt = $con->prepare("
SELECT Bio, Birthday, HomeCity
FROM profiles
WHERE userID = (
SELECT userID
FROM users
WHERE username = ?
)
");
if (!$stmt) {
echo "
<div class='bio'>
  Error loading profile.
</div>";
return;
}
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
if (!$result || $result->num_rows === 0) {
echo "
<div class='bio'>
  This user has not completed their profile.
</div>";
return;
}
$row = $result->fetch_assoc();
$bio  = trim((string)$row['Bio']);
$birthday = trim((string)$row['Birthday']);
$city = trim((string)$row['HomeCity']);
// ================================
// CASE: Empty profile
// ================================
if ($bio === '' && $birthday === '' && $city === '') {
echo "
<div class='bio'>
  This user has not yet completed their profile.
</div>";
return;
}
// ================================
// AGE
// ================================
if (!empty($birthday) && strtotime($birthday)) {
$dob  = new DateTime($birthday);
$now  = new DateTime();
$diff = $now->diff($dob);
$age  = $diff->y;
echo "
<div class='age'>
  <i class='far fa-birthday-cake'></i> {$age} years old
</div>";
}
// ================================
// CITY
// ================================
if (!empty($city)) {
echo "
<div class='city'>
  <i class='far fa-home-alt'></i> From " . htmlspecialchars($city) . "
</div>";
}
// ================================
// BIO
// ================================
if (!empty($bio)) {
echo "
<div class='bio'>
  " . htmlspecialchars($bio) . "
</div>";
}
}
/* ===============================
MESSAGING FUNCTIONS
=============================== */
function getMessageReplyTarget($replyid) {
$con = db();
if (!is_numeric($replyid)) {
return null;
}
$stmt = $con->prepare("SELECT from_user FROM messages WHERE id = ?");
if (!$stmt) return null;
$stmt->bind_param("i", $replyid);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
return ($row = $result->fetch_assoc()) ? $row['from_user'] : null;
}
function sendMessageReply($to_user, $from_user, $message) {
$con = db();
$stmt = $con->prepare("
INSERT INTO messages (to_user, from_user, message, replied)
VALUES (?, ?, ?, 'yes')
");
if (!$stmt) return false;
$stmt->bind_param("sss", $to_user, $from_user, $message);
$ok = $stmt->execute();
$stmt->close();
return $ok;
}
// --- Send a new message ---
function sendMessage($to_user, $from_user, $message) {
$con = db();
$stmt = $con->prepare("
INSERT INTO messages (to_user, message, from_user)
VALUES (?, ?, ?)
");
if (!$stmt) {
error_log("sendMessage() prepare error: " . $con->error);
return false;
}
$stmt->bind_param("sss", $to_user, $message, $from_user);
$ok = $stmt->execute();
if (!$ok) error_log("sendMessage() execute error: " . $stmt->error);
$stmt->close();
return $ok;
}
function getProfilePic(string $username): string {
// Logged-in user
if ($username === $_SESSION['username']) {
ob_start();
mycurrentprofpic();
return ob_get_clean();
}
// Other users — reuse existing logic if you have it
if (function_exists('userProfilePic')) {
return userProfilePic($username);
}
// Fallback
return 'images/default-profile.png';
}
function sendreplyMessage(string $toUser, string $message): bool {
$con  = db();
$from = $_SESSION['username'];
$stmt = $con->prepare("
INSERT INTO messages
(from_user, to_user, message, `read`, deleted, sent_deleted)
VALUES
(?, ?, ?, 'no', 'no', 'no')
");
if (!$stmt) {
error_log("sendreplyMessage() prepare failed: " . $con->error);
return false;
}
$stmt->bind_param("sss", $from, $toUser, $message);
$stmt->execute();
$success = $stmt->affected_rows > 0;
$stmt->close();
return $success;
}
// --- Reply to an existing message ---
function replyMessage($to_user, $from_user, $message, $row_id = null) {
$con = db();
if ($row_id) {
$stmt = $con->prepare("
UPDATE messages
SET replied = 'yes'
WHERE id = ? AND to_user = ?
");
if ($stmt) {
$stmt->bind_param("is", $row_id, $from_user);
$stmt->execute();
$stmt->close();
}
}
return sendMessage($to_user, $from_user, $message);
}
function getUserProfileData($username) {
$con = db();
// Get actual columns in `users`
$columns = [];
$result = $con->query("SHOW COLUMNS FROM users");
while ($row = $result->fetch_assoc()) {
$columns[] = strtolower($row['Field']);
}
// Columns we want
$desired = [
'firstname','lastname','email','bio',
'birthday','homecity','picname','covername'
];
// Filter to only what exists
$available = array_values(array_filter(
$desired,
fn($c) => in_array(strtolower($c), $columns)
));
$select = empty($available) ? '*' : implode(',', $available);
$stmt = $con->prepare("SELECT $select FROM users WHERE username = ?");
if (!$stmt) return null;
$stmt->bind_param("s", $username);
$stmt->execute();
$res = $stmt->get_result();
$stmt->close();
return $res->fetch_assoc() ?: null;
}
function updateUserProfile($username, $data) {
$con = db();
// Get columns in `users`
$columns = [];
$result = $con->query("SHOW COLUMNS FROM users");
while ($row = $result->fetch_assoc()) {
$columns[] = strtolower($row['Field']);
}
// Fields allowed to update
$allowed = [
'firstname' => $data['firstname'] ?? null,
'lastname'  => $data['lastname']  ?? null,
'email'     => $data['email']     ?? null,
'birthday'  => $data['birthday']  ?? null,
'homecity'  => $data['homecity']  ?? null,
'bio'       => $data['bio']       ?? null,
];
$updateParts = [];
$values = [];
// Only add fields that exist in the DB
foreach ($allowed as $field => $value) {
if (in_array($field, $columns)) {
$updateParts[] = "$field = ?";
$values[] = $value;
}
}
if (empty($updateParts)) {
error_log("updateUserProfile(): No valid fields to update.");
return false;
}
// Final SQL
$sql = "UPDATE users SET " . implode(", ", $updateParts) . " WHERE username = ?";
$values[] = $username;
// Bind
$types = str_repeat("s", count($values));
$stmt = $con->prepare($sql);
if (!$stmt) {
error_log("updateUserProfile() prepare error: " . $con->error);
return false;
}
$stmt->bind_param($types, ...$values);
$ok = $stmt->execute();
if (!$ok) {
error_log("updateUserProfile() execute error: " . $stmt->error);
}
$stmt->close();
return $ok;
}
function loadUserProfile($currentuser) {
$con = db();
// Ensure session
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
// Must be logged in
if (empty($_SESSION['username'])) {
header("Location: login.php");
exit;
}
$loggedUser = $_SESSION['username'];
// Prevent viewing own profile via this route
if ($loggedUser === $currentuser) {
header("Location: my-profile.php");
exit;
}
// Get logged-in user's info
$stmt = $con->prepare("
SELECT firstname, lastname, authorized
FROM users
WHERE username = ?
");
$stmt->bind_param("s", $loggedUser);
$stmt->execute();
$res = $stmt->get_result();
$stmt->close();
$row = $res->fetch_assoc();
if (!$row || (int)$row['authorized'] === 0) {
header("Location: login.php");
exit;
}
return [
'username'  => $loggedUser,
'firstname' => $row['firstname'],
'lastname'  => $row['lastname']
];
}




/*
function loadOtherUserProfile($currentuser) {
$con = db();
// Ensure session
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
// Validate login
if (empty($_SESSION['username'])) {
header("Location: login.php");
exit;
}
$loggedUser = $_SESSION['username'];
// Prevent viewing own profile through "other" loader
if ($loggedUser === $currentuser) {
header("Location: my-profile.php");
exit;
}
// Validate that loggedUser is authorized
$stmt = $con->prepare("SELECT authorized FROM users WHERE username = ?");
$stmt->bind_param("s", $loggedUser);
$stmt->execute();
$auth = $stmt->get_result()->fetch_assoc();
$stmt->close();
if (!$auth || (int)$auth['authorized'] === 0) {
header("Location: login.php");
exit;
}
// Load other user's info
$stmt2 = $con->prepare("
SELECT firstname, lastname
FROM users
WHERE username = ?
");
$stmt2->bind_param("s", $currentuser);
$stmt2->execute();
$res = $stmt2->get_result();
$stmt2->close();
$row = $res->fetch_assoc();
if (!$row) {
die("<p style='text-align:center;color:red;'>User not found.</p>");
}
return [
'logged_user' => $loggedUser,
'viewed_user' => $currentuser,
'firstname'   => $row['firstname'],
'lastname'    => $row['lastname']
];
}

*/


function loadOtherUserProfile(string $currentuser): array {
  $con = db();

  // Always start session safely
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }

  // Viewer may or may not be logged in
  $loggedUser = $_SESSION['username'] ?? null;

  // Redirect logged-in users viewing their own profile
  if ($loggedUser && $loggedUser === $currentuser) {
    header("Location: my-profile.php");
    exit;
  }

  // Fetch viewed user's public profile data
  $stmt = $con->prepare("
    SELECT firstname, lastname
    FROM users
    WHERE username = ?
    LIMIT 1
  ");
  if (!$stmt) {
    die("Database error.");
  }

  $stmt->bind_param("s", $currentuser);
  $stmt->execute();
  $res = $stmt->get_result();
  $stmt->close();

  if (!$row = $res->fetch_assoc()) {
    http_response_code(404);
    die("<p style='text-align:center;'>User not found.</p>");
  }

  return [
    'logged_user' => $loggedUser,   // null if visitor
    'viewed_user' => $currentuser,
    'firstname'   => $row['firstname'],
    'lastname'    => $row['lastname']
  ];
}




if (isset($_POST['searchppl'])) {
$q     = trim($_POST["q"]);
$response1 = "
<ul>
  <li>
    No results found
  </li>
</ul>";
// Build SQL query
$sql     = "SELECT username FROM users WHERE username LIKE '$q%'";
// Execute SQL query
$result  = $con->query($sql);
if (!$result) {
} else {
if ($result->num_rows > 0) {
$response1 = '
<ul>
  ';
  $response2 = '
  <ul>
    ';
    // Loop through each result row
    while ($row = $result->fetch_assoc()) {
    $response1 .= "
    <li>
      <a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a>
    </li>";
    $response2 .= "
    <li>
      <a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a>
    </li>";
    }
    $response1 .= '
  </ul>';
  $response2 .= '
</ul>';
}
exit($response1);
}
}
if (isset($_REQUEST['allfeed'])) {
allfeed();
}
if (isset($_POST['searchplace'])) {
$q     = trim($_POST["q"]);
$response3 = "
<ul>
  <li>
    No results found
  </li>
</ul>";
// Build SQL query
$sql     = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
// Execute SQL query
$result  = $con->query($sql);
if (!$result) {
} else {
if ($result->num_rows > 0) {
$response3 = '
<ul>
  ';
  // Loop through each result row
  while ($row = $result->fetch_assoc()) {
  $response3 .= "
  <li>
    <a href='" . str_replace(" ", "-", $row['destinationName']) . ".php" . "'>" . $row['destinationName'] . "</a>
  </li>";
  }
  $response3 .= '
</ul>';
}
exit($response3);
}
}
if (isset($_POST['searchplaceprof'])) {
$q     = trim($_POST["q"]);
$response3 = "
<ul>
  <li>
    No results found
  </li>
</ul>";
// Build SQL query
$sql     = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
// Execute SQL query
$result  = $con->query($sql);
if (!$result) {
} else {
if ($result->num_rows > 0) {
$response3 = '
<ul>
  ';
  // Loop through each result row
  while ($row = $result->fetch_assoc()) {
  $response3 .= "
  <li>
    " . $row['destinationName'] . "
  </li>";
  }
  $response3 .= '
</ul>';
}
exit($response3);
}
}
if (isset($_POST['destination'])) {
$q    = trim($_POST["q"]);
$response = "
<ul>
  <li>
    No results found
  </li>
</ul>";
// Build SQL query
$sql    = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
// Execute SQL query
$result   = $con->query($sql);
if (!$result) {
} else {
if ($result->num_rows > 0) {
$response = '
<ul>
  ';
  // Loop through each result row
  while ($row = $result->fetch_assoc()) {
  $response .= "
  <li>
    " . $row['destinationName'] . "
  </li>";
  }
  $response .= '
</ul>';
}
exit($response);
}
}
}
// Helpers
// ==========================
/* ===============================
SAFE OUTPUT HELPERS
=============================== */
if (!function_exists('sd_safe_text')) {
function sd_safe_text(?string $s): string {
return nl2br(
htmlspecialchars((string)($s ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8')
);
}
}
if (!function_exists('safe')) {
function safe($v): string {
// Basic sanitizer used for filenames, usernames, categories, etc.
return htmlspecialchars(
(string)($v ?? ''),
ENT_QUOTES | ENT_SUBSTITUTE,
'UTF-8'
);
}
}
/* ===============================
EMPTY FEED RENDERER
=============================== */
if (!function_exists('renderEmptyFeed')) {
function renderEmptyFeed(string $msg): void {
echo "
<div class='empty-feed'>
  <p>" . safe($msg) . "</p>
</div>";
}
}
/* ===============================
RENDER IMAGES FOR A POST
=============================== */
if (!function_exists('renderMediaImages')) {
function renderMediaImages(int $postID): void {
global $con;
echo "
<div class='post-contenttop'>
  ";
  if (!$con) {
  // no DB connection - fail silently but don't break page layout
  echo "
</div>";
return;
}
$stmt = $con->prepare("SELECT filename FROM images WHERE postID = ?");
if (!$stmt) {
echo "
</div>";
return;
}
$stmt->bind_param("i", $postID);
$stmt->execute();
$res = $stmt->get_result();
while ($img = $res->fetch_assoc()) {
// Sanitized filename
$fn = safe($img['filename']);
if ($fn === '') {
continue;
}
// Only allow image-like extensions for safety
$allowedExt = ['jpg','jpeg','png','webp','gif'];
$ext = strtolower(pathinfo($fn, PATHINFO_EXTENSION));
if (!in_array($ext, $allowedExt, true)) {
continue; // skip invalid image files
}
echo "
<div class='feedimg'>
  <img loading='lazy'
  src='Images/{$fn}'
  class='object-fit_cover'
  alt='post image'>
</div>";
}
$stmt->close();
echo "
</div>";
}
}
/* ===============================
RENDER videos FOR A POST
=============================== */
if (!function_exists('renderMediaVideos')) {
function renderMediaVideos(int $postID): void {
    global $con;

    echo "<div class='post-contenttop'>";

    if (!$con) {
        echo "</div>";
        return;
    }

    $stmt = $con->prepare("
        SELECT converted_path, thumbnail_path, status
        FROM videos
        WHERE postID = ?
        LIMIT 1
    ");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $v = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$v) {
        echo "</div>";
        return;
    }

    // Treat NULL as processing
    if (($v['status'] ?? 'processing') === 'processing') {
        echo "
            <div class='post-video video-processing' data-postid='{$postID}'>
                Processing video…
            </div>
        ";
        echo "</div>";
        return;
    }

    if ($v['status'] === 'failed') {
        echo "
            <div class='post-video video-failed'>
                Video processing failed.
            </div>
        ";
        echo "</div>";
        return;
    }

    // Guard: ONLY ready can proceed
    if ($v['status'] !== 'ready') {
        echo "
            <div class='post-video video-processing'>
                Processing video…
            </div>
        ";
        echo "</div>";
        return;
    }

    $videoURL = safe($v['converted_path']);
    $thumbURL = safe($v['thumbnail_path']);

    if ($videoURL === '' || $thumbURL === '') {
        echo "</div>";
        return;
    }

    $absVideoPath = $_SERVER['DOCUMENT_ROOT'] . "/" . $videoURL;
    if (!file_exists($absVideoPath)) {
        error_log("renderMediaVideos ERROR: Video file missing → $absVideoPath");
        echo "</div>";
        return;
    }

    echo "
        <div class='post-video'>
            <video
                controls
                playsinline
                preload='metadata'
                poster='/$thumbURL'
            >
                <source src='/$videoURL' type='video/mp4'>
                Your browser does not support HTML5 video.
            </video>
        </div>
    ";

    echo "</div>";
}}



function renderEditPostHTML(int $postID): string {
    ob_start();
    // existing editPost() HTML here
    renderEditPost($postID);
    return ob_get_clean();
}

function getVideoStatus(int $postID): string {
    $con = db();
    $stmt = $con->prepare("
        SELECT status
        FROM videos
        WHERE postID = ?
        LIMIT 1
    ");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $row = $stmt->get_result()->fetch_assoc();
    return $row['status'] ?? 'unknown';
}

function updatePostData(int $postID, string $blog, string $location, string $category): bool {
    $con = db();
    $stmt = $con->prepare("
        UPDATE posts
        SET Blog = ?, Location = ?, category = ?, Last_Modified = NOW()
        WHERE PostID = ?
    ");
    $stmt->bind_param("sssi", $blog, $location, $category, $postID);
    return $stmt->execute();
}


/* ===============================
RENDER USER HEADER (avatar + link)
=============================== */
if (!function_exists('renderUserHeader')) {
function renderUserHeader(string $username, string $pic): void {
// Sanitize username safely for HTML output
$u = safe($username);
// Ensure a safe profile picture filename
$p = trim($pic) !== '' ? $pic : 'default_prof.jpg';
$p = safe($p);
// Validate allowed image types for extra safety
$allowedExt = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
$ext = strtolower(pathinfo($p, PATHINFO_EXTENSION));
if (!in_array($ext, $allowedExt, true)) {
$p = safe('default_prof.jpg');
}
echo "
<div class='post-title'>
  <a href='profile.php?currentuser={$u}'>
  <img src='Images/prof_pics/{$p}' alt='{$u}' class='post-user-pic'>
</a>
<b>
<a href='profile.php?currentuser={$u}'>@{$u}</a>
</b>
</div>";
}
}
// Echoes the details + likes (passes $liked to renderLikeButton only if provided)
// Optionally includes $actionsHtml at the end INSIDE .post-details (for own posts only)
/* ===============================
RENDER POST DETAILS
=============================== */
if (!function_exists('renderPostDetails')) {
function renderPostDetails(
string $date,
string $location,
string $category,
string $blogHtml,
int $postID,
int $likes,
?bool $liked = null,
string $actionsHtml = ''
): void {
// Sanitize all printed variables
$safeDate     = safe($date);
$safeLocation = safe($location);
$safeCategory = safe($category);
// blogHtml is already escaped by sd_safe_text()
$safeBlog = $blogHtml;
// Ensure likes is a positive integer
$likes = max(0, (int)$likes);
// Ensure actionsHtml is either blank or safe markup
$actions = $actionsHtml ?: '';
echo "
<div class='post-details'>
  <div class='post-date'>
    <i class='far fa-calendar'></i> {$safeDate}
  </div>
  <div class='post-location'>
    <i class='far fa-map-marker-alt'></i> {$safeLocation}
  </div>
  <div class='post-category'>
    <i class='far fa-tag'></i> {$safeCategory}
  </div>
  <div class='post-blog'>
    {$safeBlog}
  </div>
  <div class='post-likes'>
    ";
    // Render LIKE BUTTON
    if (function_exists('renderLikeButton')) {
    if ($liked === null) {
    renderLikeButton($postID, $likes);
    } else {
    renderLikeButton($postID, $likes, $liked);
    }
    } else {
    echo "<i class='fa fa-heart-o'></i> {$likes}";
    }
    echo "
  </div>"; // close .post-likes
  // Render actions (edit/delete) if provided
  if ($actions !== '') {
  echo "
  <div class='post-actions'>
    {$actions}
  </div>";
  }
  echo "
</div>"; // close .post-details
}
}
/* ===============================
RENDER A SINGLE POST FOR AJAX
=============================== */
if (!function_exists('renderSinglePost')) {
function renderSinglePost(int $postID): string {
    global $con;

    $stmt = $con->prepare("
        SELECT
            p.PostID,
            p.Blog,
            p.Location,
            p.category,
            p.Last_Modified,
            u.username,
            u.picName,
            COALESCE(l.like_count, 0) AS likes,
            (SELECT COUNT(*) FROM images WHERE postID = p.PostID) AS imageCount,
            (SELECT COUNT(*) FROM videos WHERE postID = p.PostID) AS videoCount
        FROM posts p
        JOIN users u ON u.userID = p.userID
        LEFT JOIN (
            SELECT post_id, COUNT(*) AS like_count
            FROM post_likes
            GROUP BY post_id
        ) l ON l.post_id = p.PostID
        WHERE p.PostID = ?
        LIMIT 1
    ");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $post = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if (!$post) return "";

    /* -----------------------------
       MEDIA FLAGS (authoritative)
    ----------------------------- */
    $videoCount = (int)($post['videoCount'] ?? 0);
    $imageCount = (int)($post['imageCount'] ?? 0);

    $hasVideo = ($videoCount > 0);
    $hasPhoto = ($imageCount > 0);

    /* -----------------------------
       SAFE DATE
    ----------------------------- */
    $date = "";
    if (!empty($post['Last_Modified'])) {
        $ts = strtotime($post['Last_Modified']);
        if ($ts !== false) {
            $date = date("F d, Y", $ts);
        }
    }

    /* -----------------------------
       CLEAN VALUES
    ----------------------------- */
    $username = (string)($post['username'] ?? '');
    $pic      = !empty($post['picName']) ? (string)$post['picName'] : "default_prof.jpg";

    $location = safe($post['Location'] ?? '');
    $category = safe($post['category'] ?? '');
    $blog     = sd_safe_text($post['Blog'] ?? '');
    $likes    = (int)($post['likes'] ?? 0);

    /* -----------------------------
       OWNER ACTIONS
    ----------------------------- */
    $actions = "";
    if (!empty($_SESSION['username']) && $_SESSION['username'] === $username) {
        $actions = "
            <button class='edit-post-btn' data-postid='{$postID}'><i class='far fa-edit'></i></button>
            <button class='delete' data-postid='{$postID}'><i class='far fa-trash'></i></button>
        ";
    }

    ob_start();

    echo "<div class='post-content' id='post_{$postID}'>";

    // MEDIA (video > photo)
    if ($hasVideo && function_exists('renderMediaVideos')) {
        renderMediaVideos($postID);
    } elseif ($hasPhoto && function_exists('renderMediaImages')) {
        renderMediaImages($postID);
    }

    // DETAILS
    if (function_exists('renderPostDetails')) {
        renderPostDetails(
            $date,
            $location,
            $category,
            $blog,
            $postID,
            $likes,
            null,
            $actions
        );
    }

    echo "</div>";

    return ob_get_clean();
}
}



// ====================================================================
// PROFILE: CURRENT USER POSTS (photos)
// ====================================================================
// ====================================================================
// PROFILE: CURRENT USER POSTS (photos)
// ====================================================================
if (!function_exists('allPosts')) {
function allPosts(): void {
global $user, $con;
$stmt = $con->prepare("
SELECT
p.PostID,
p.Blog,
p.Location,
p.category,
p.Last_Modified,
u.username,
u.picName,
COALESCE(l.like_count, 0) AS likes
FROM posts p
JOIN users u ON u.userID = p.userID
LEFT JOIN (
SELECT post_id, COUNT(*) AS like_count
FROM post_likes
GROUP BY post_id
) l ON l.post_id = p.PostID
WHERE p.userID = (SELECT userID FROM users WHERE username = ?)
AND p.postType = 'photo'
AND p.category IN ('stays','events','eats','adventures','vibes')
ORDER BY p.Last_Modified DESC
");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
renderEmptyFeed("You haven't created any posts yet!");
$stmt->close();
return;
}
while ($row = $result->fetch_assoc()) {
$postID   = (int)$row['PostID'];
$username = (string)$row['username'];
$pic      = !empty($row['picName'])
? (string)$row['picName']
: (defined('DEFAULT_PROF') ? DEFAULT_PROF : 'default_prof.jpg');
$likes    = (int)$row['likes'];
$date = date("F d, Y", strtotime($row['Last_Modified']));
$city = $row['Location'] ?? '';
$cat  = $row['category'] ?? '';
$blog = sd_safe_text($row['Blog']);
// Actions HTML
$actionsHtml = "
<form method='POST' action='control.php'>
  <input type='hidden' name='postID' value='{$postID}'>
  <button type='button' class='edit-post-btn' data-postid='{$postID}' title='Edit'>
  <i class='far fa-edit'></i>
</button>
<button type='button' class='delete' data-postid='{$postID}' title='Delete'>
<i class='far fa-trash'></i>
</button>
</form>
";
echo "
<div class='post-content' id='post_$postID'>
  ";
  renderMediaImages($postID);
  renderPostDetails($date, $city, $cat, $blog, $postID, $likes, null, $actionsHtml);
  echo "
</div>";
}
$stmt->close();
}
}
// ====================================================================
// PROFILE: CURRENT USER VIDEO POSTS
// ====================================================================
if (!function_exists('allVideoPosts')) {
function allVideoPosts(): void {
  global $user, $con;

  $stmt = $con->prepare("
    SELECT
      p.PostID,
      p.Blog,
      p.location,
      p.category,
      p.Last_Modified,
      u.username,
      u.picName,
      COALESCE(l.like_count, 0) AS likes
    FROM posts p
    JOIN users u ON u.userID = p.userID
    LEFT JOIN (
      SELECT post_id, COUNT(*) AS like_count
      FROM post_likes
      GROUP BY post_id
    ) l ON l.post_id = p.PostID
    WHERE p.userID = (SELECT userID FROM users WHERE username = ?)
      AND p.postType = 'video'
      AND p.category IN ('stays','eats','events','adventures','vibes')
    ORDER BY p.Last_Modified DESC
  ");

  $stmt->bind_param("s", $user);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 0) {
    renderEmptyFeed("No videos posted yet!");
    $stmt->close();
    return;
  }

  while ($row = $result->fetch_assoc()) {

    $postID   = (int)$row['PostID'];
    $username = (string)$row['username'];
    $pic      = !empty($row['picName'])
      ? (string)$row['picName']
      : (defined('DEFAULT_PROF') ? DEFAULT_PROF : 'default_prof.jpg');

    $likes = (int)$row['likes'];
    $date  = date("F d, Y", strtotime($row['Last_Modified']));
    $city  = safe($row['location']);
    $cat   = safe($row['category']);
    $blog  = sd_safe_text($row['Blog']);

    $actionsHtml = "
      <form method='POST' action='control.php'>
        <input type='hidden' name='postID' value='{$postID}'>
        <button type='button' class='edit-post-btn' data-postid='{$postID}' title='Edit'>
          <i class='far fa-edit'></i>
        </button>
        <button type='button' class='delete' data-postid='{$postID}' title='Delete'>
          <i class='far fa-trash'></i>
        </button>
      </form>
    ";

    echo "<div class='post-content' id='post_{$postID}'>";

    if (function_exists('renderMediaVideos')) {
      renderMediaVideos($postID);
    }

    renderPostDetails(
      $date,
      $city,
      $cat,
      $blog,
      $postID,
      $likes,
      null,
      $actionsHtml
    );

    echo "</div>";
  }

  $stmt->close();
}}

// ====================================================================
// GLOBAL FEED — All Users' Posts (photos)
// ====================================================================
if (!function_exists('all_feed')) {
function all_feed(): void {
global $con;
$stmt = $con->prepare("
SELECT
p.PostID,
p.Blog,
p.Location,
p.category,
p.Last_Modified,
u.username,
u.picName,
COALESCE(l.like_count, 0) AS likes
FROM posts p
JOIN users u ON p.userID = u.userID
LEFT JOIN (
SELECT post_id, COUNT(*) AS like_count
FROM post_likes
GROUP BY post_id
) l ON l.post_id = p.PostID
WHERE p.category IN ('stays','eats','events','adventures','vibes')
ORDER BY p.Last_Modified DESC
");
$stmt->execute();
$result = $stmt->get_result();
if (!$result || $result->num_rows === 0) {
renderEmptyFeed("No photos found.");
$stmt->close();
return;
}
while ($row = $result->fetch_assoc()) {
$postID   = (int)$row['PostID'];
$username = (string)$row['username'];
$pic      = !empty($row['picName'])
? (string)$row['picName']
: 'default_prof.jpg';
$likes    = (int)$row['likes'];
$date = date("F d, Y", strtotime($row['Last_Modified']));
$city = $row['Location'] ?? '';
$cat  = $row['category'] ?? '';
$blog = sd_safe_text($row['Blog']);
echo "
<div class='post-content'>
  ";
  renderMediaImages($postID);
  renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
  echo "
</div>";
}
$stmt->close();
}
}
// ====================================================================
// MY FEED — Posts from Followed Users (photos)
// ====================================================================
if (!function_exists('myfeed')) {
function myfeed(): void {
global $user, $con;
$stmt = $con->prepare("
SELECT
p.PostID,
p.Blog,
p.Location,
p.category,
p.Last_Modified,
u.username,
u.picName,
COALESCE(l.like_count, 0) AS likes
FROM posts p
JOIN users u ON p.userID = u.userID
LEFT JOIN (
SELECT post_id, COUNT(*) AS like_count
FROM post_likes
GROUP BY post_id
) l ON l.post_id = p.PostID
WHERE p.category IN ('stays','eats','events','adventures','vibes')
AND p.postType = 'photo'
AND p.userID IN (
SELECT followee FROM follows
WHERE follower = (SELECT userID FROM users WHERE username = ?)
)
ORDER BY p.Last_Modified DESC
");
$stmt->bind_param("s", $user);
$stmt->execute();
$res = $stmt->get_result();
if ($res->num_rows === 0) {
renderEmptyFeed("No photos from people you follow yet.");
$stmt->close();
return;
}
while ($row = $res->fetch_assoc()) {
$postID   = (int)$row['PostID'];
$username = (string)$row['username'];
$pic      = !empty($row['picName'])
? (string)$row['picName']
: 'default_prof.jpg';
$likes    = (int)$row['likes'];
$date = date("F d, Y", strtotime($row['Last_Modified']));
$city = $row['Location'] ?? '';
$cat  = $row['category'] ?? '';
$blog = sd_safe_text($row['Blog']);
echo "
<div class='post-content'>
  ";
  renderMediaImages($postID);
  renderUserHeader($username, $pic);
  renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
  echo "
</div>";
}
$stmt->close();
}
}
// ====================================================================
// MY VIDEO FEED — Videos from Followed Users
// ====================================================================
if (!function_exists('myvideofeed')) {
function myvideofeed(): void {
  global $user, $con;

  $stmt = $con->prepare("
    SELECT
      p.PostID,
      p.Blog,
      p.location,
      p.category,
      p.Last_Modified,
      u.username,
      u.picName,
      COALESCE(l.like_count, 0) AS likes
    FROM posts p
    JOIN users u ON p.userID = u.userID
    LEFT JOIN (
      SELECT post_id, COUNT(*) AS like_count
      FROM post_likes
      GROUP BY post_id
    ) l ON l.post_id = p.PostID
    WHERE p.postType = 'video'
      AND p.category IN ('stays','eats','events','adventures','vibes')
      AND p.userID IN (
        SELECT followee
        FROM follows
        WHERE follower = (
          SELECT userID FROM users WHERE username = ?
        )
      )
    ORDER BY p.Last_Modified DESC
  ");

  $stmt->bind_param('s', $user);
  $stmt->execute();
  $res = $stmt->get_result();

  if ($res->num_rows === 0) {
    renderEmptyFeed("No videos from people you follow yet.");
    $stmt->close();
    return;
  }

  while ($row = $res->fetch_assoc()) {

    $postID   = (int)$row['PostID'];
    $username = (string)$row['username'];
    $pic      = !empty($row['picName'])
      ? (string)$row['picName']
      : 'default_prof.jpg';

    $likes = (int)$row['likes'];
    $date  = date("F d, Y", strtotime($row['Last_Modified']));
    $city  = safe($row['location']);
    $cat   = safe($row['category']);
    $blog  = sd_safe_text($row['Blog']);

    echo "<div class='post-content'>";

    if (function_exists('renderMediaVideos')) {
      renderMediaVideos($postID);
    }

    if (function_exists('renderUserHeader')) {
      renderUserHeader($username, $pic);
    }

    renderPostDetails(
      $date,
      $city,
      $cat,
      $blog,
      $postID,
      $likes
    );

    echo "</div>";
  }

  $stmt->close();
}}

// ====================================================================
// GLOBAL PHOTOS FEED (WITH PROFILE PICTURES)
// ====================================================================
if (!function_exists('all_Photos')) {
function all_Photos(): void {
global $con;
$stmt = $con->prepare("
SELECT
p.PostID,
p.Blog,
p.Location,
p.category,
p.Last_Modified,
u.username,
u.picName,
COALESCE(l.like_count, 0) AS likes
FROM posts p
JOIN users u ON p.userID = u.userID
LEFT JOIN (
SELECT post_id, COUNT(*) AS like_count
FROM post_likes
GROUP BY post_id
) l ON l.post_id = p.PostID
WHERE p.category IN ('stays','eats','events','adventures','vibes')
AND p.postType = 'photo'
ORDER BY p.Last_Modified DESC
");
$stmt->execute();
$result = $stmt->get_result();
if (!$result || $result->num_rows === 0) {
renderEmptyFeed("No photo posts yet.");
$stmt->close();
return;
}
while ($row = $result->fetch_assoc()) {
$postID   = (int)$row['PostID'];
$username = (string)$row['username'];
$pic      = !empty($row['picName'])
? (string)$row['picName']
: 'default_prof.jpg';
$likes    = (int)$row['likes'];
$date = date("F d, Y", strtotime($row['Last_Modified']));
$city = $row['Location'] ?? '';
$cat  = $row['category'] ?? '';
$blog = sd_safe_text($row['Blog']);
echo "
<div class='post-content'>
  ";
  renderMediaImages($postID);
  renderUserHeader($username, $pic);
  renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
  echo "
</div>";
}
$stmt->close();
}
}
// ====================================================================
// GLOBAL VIDEOS FEED
// ====================================================================
if (!function_exists('all_Videos')) {
function all_Videos(): void {
  global $con;

  $stmt = $con->prepare("
    SELECT
      p.PostID,
      p.Blog,
      p.location,
      p.category,
      p.Last_Modified,
      u.username,
      u.picName,
      COALESCE(l.like_count, 0) AS likes
    FROM posts p
    JOIN users u ON p.userID = u.userID
    LEFT JOIN (
      SELECT post_id, COUNT(*) AS like_count
      FROM post_likes
      GROUP BY post_id
    ) l ON l.post_id = p.PostID
    WHERE p.postType = 'video'
      AND p.category IN ('stays','events','adventures','eats','vibes')
    ORDER BY p.Last_Modified DESC
  ");

  $stmt->execute();
  $r = $stmt->get_result();

  if (!$r || $r->num_rows === 0) {
    renderEmptyFeed("No videos yet.");
    $stmt->close();
    return;
  }

  while ($row = $r->fetch_assoc()) {

    $postID   = (int)$row['PostID'];
    $username = (string)$row['username'];
    $pic      = !empty($row['picName'])
      ? (string)$row['picName']
      : 'default_prof.jpg';

    $likes = (int)$row['likes'];
    $date  = date("F d, Y", strtotime($row['Last_Modified']));
    $city  = safe($row['location']);
    $cat   = safe($row['category']);
    $blog  = sd_safe_text($row['Blog']);

    echo "<div class='post-content'>";

    if (function_exists('renderMediaVideos')) {
      renderMediaVideos($postID);
    }

    if (function_exists('renderUserHeader')) {
      renderUserHeader($username, $pic);
    }

    renderPostDetails(
      $date,
      $city,
      $cat,
      $blog,
      $postID,
      $likes
    );

    echo "</div>";
  }

  $stmt->close();
}}

// ====================================================================
// PROFILE: ALL OTHER POSTS (viewing someone else) — photos
// ====================================================================
if (!function_exists('allOtherPosts')) {
function allOtherPosts(): void {
global $con;
$currentuser = $_GET['currentuser'] ?? '';
if ($currentuser === '') {
echo "<p class='empty-feed'>No user selected.</p>";
return;
}
$stmt = $con->prepare("
SELECT
p.PostID AS post_id,
p.Blog   AS content,
p.Location,
p.category,
p.Last_Modified,
u.username,
u.picName,
COALESCE(l.like_count, 0) AS likes
FROM posts p
JOIN users u ON u.userID = p.userID
LEFT JOIN (
SELECT post_id, COUNT(*) AS like_count
FROM post_likes
GROUP BY post_id
) l ON l.post_id = p.PostID
WHERE u.username = ?
AND p.category IN ('stays','eats','events','adventures','vibes')
AND p.postType = 'photo'
ORDER BY p.Last_Modified DESC
");
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
$viewerID = function_exists('getCurrentUserId') ? getCurrentUserId() : null;
if ($result->num_rows === 0) {
renderEmptyFeed("@" . safe($currentuser) . " hasn't posted any photos yet.");
$stmt->close();
return;
}
while ($row = $result->fetch_assoc()) {
$postID   = (int)$row['post_id'];
$likes    = (int)$row['likes'];
$liked    = ($viewerID && function_exists('hasUserLiked'))
? hasUserLiked($postID, $viewerID)
: false;
$date     = date("F d, Y", strtotime($row['Last_Modified']));
$username = (string)$row['username'];
$pic      = !empty($row['picName'])
? (string)$row['picName']
: 'default_prof.jpg';
$city     = $row['Location'] ?? '';
$cat      = $row['category'] ?? '';
$blog     = sd_safe_text($row['content']);
echo "
<div class='post-content'>
  ";
  renderMediaImages($postID);
  renderPostDetails($date, $city, $cat, $blog, $postID, $likes, $liked);
  echo "
</div>";
}
$stmt->close();
}
}
// ====================================================================
// PROFILE: ALL OTHER VIDEO POSTS (viewing someone else) — videos
// ====================================================================
if (!function_exists('allOtherVideoPosts')) {
function allOtherVideoPosts(): void {
  global $con;

  $currentuser = $_GET['currentuser'] ?? '';
  if ($currentuser === '') {
    echo "<p class='empty-feed'>No user selected.</p>";
    return;
  }

  $stmt = $con->prepare("
    SELECT
      p.PostID AS post_id,
      p.Blog   AS content,
      p.location,
      p.category,
      p.Last_Modified,
      p.postType,
      u.username,
      u.picName,
      COALESCE(l.like_count, 0) AS likes
    FROM posts p
    JOIN users u ON u.userID = p.userID
    LEFT JOIN (
      SELECT post_id, COUNT(*) AS like_count
      FROM post_likes
      GROUP BY post_id
    ) l ON l.post_id = p.PostID
    WHERE u.username = ?
      AND p.postType = 'video'
      AND p.category IN ('stays','eats','events','adventures','vibes')
    ORDER BY p.Last_Modified DESC
  ");

  $stmt->bind_param("s", $currentuser);
  $stmt->execute();
  $result = $stmt->get_result();

  $viewerID = function_exists('getCurrentUserId')
    ? getCurrentUserId()
    : null;

  if ($result->num_rows === 0) {
    renderEmptyFeed("@" . safe($currentuser) . " hasn’t posted any videos yet.");
    $stmt->close();
    return;
  }

  while ($row = $result->fetch_assoc()) {

    $postID = (int)$row['post_id'];
    $likes  = (int)$row['likes'];
    $liked  = ($viewerID && function_exists('hasUserLiked'))
      ? hasUserLiked($postID, $viewerID)
      : false;

    $date     = date("F d, Y", strtotime($row['Last_Modified']));
    $username = (string)$row['username'];
    $pic      = !empty($row['picName'])
      ? (string)$row['picName']
      : 'default_prof.jpg';

    $city = safe($row['location']);
    $cat  = safe($row['category']);
    $blog = sd_safe_text($row['content']);

    echo "<div class='post-content'>";

    if (function_exists('renderMediaVideos')) {
      renderMediaVideos($postID);
    }

    renderPostDetails(
      $date,
      $city,
      $cat,
      $blog,
      $postID,
      $likes,
      $liked
    );

    echo "</div>";
  }

  $stmt->close();
}}

// ====================================================================
// GENERIC CITY RENDERERS
// ====================================================================
if (!function_exists('renderCityPosts')) {
function renderCityPosts(string $city): void {
global $con;
$stmt = $con->prepare("
SELECT
p.PostID,
p.Blog,
p.Location,
p.category,
p.Last_Modified,
u.username,
u.picName,
COALESCE(l.like_count, 0) AS likes
FROM posts p
JOIN users u ON p.userID = u.userID
LEFT JOIN (
SELECT post_id, COUNT(*) AS like_count
FROM post_likes
GROUP BY post_id
) l ON l.post_id = p.PostID
WHERE p.Location = ?
AND p.postType = 'photo'
ORDER BY p.Last_Modified DESC
");
$stmt->bind_param("s", $city);
$stmt->execute();
$r = $stmt->get_result();
if (!$r || $r->num_rows === 0) {
renderEmptyFeed("No photos for " . safe($city) . " yet.");
$stmt->close();
return;
}
while ($row = $r->fetch_assoc()) {
$postID   = (int)$row['PostID'];
$username = (string)$row['username'];
$pic      = !empty($row['picName'])
? (string)$row['picName']
: 'default_prof.jpg';
$likes    = (int)$row['likes'];
$date     = date("F d, Y", strtotime($row['Last_Modified']));
$loc      = $row['Location'] ?? '';
$cat      = $row['category'] ?? '';
$blog     = sd_safe_text($row['Blog']);
echo "
<div class='post-content'>
  ";
  renderMediaImages($postID);
  renderUserHeader($username, $pic);
  renderPostDetails($date, $loc, $cat, $blog, $postID, $likes);
  echo "
</div>";
}
$stmt->close();
}
}
if (!function_exists('renderCityVideos')) {
function renderCityVideos(string $city): void {
  global $con;

  $stmt = $con->prepare("
    SELECT
      p.PostID,
      p.Blog,
      p.location,
      p.category,
      p.Last_Modified,
      p.postType,
      u.username,
      u.picName,
      COALESCE(l.like_count, 0) AS likes
    FROM posts p
    JOIN users u ON p.userID = u.userID
    LEFT JOIN (
      SELECT post_id, COUNT(*) AS like_count
      FROM post_likes
      GROUP BY post_id
    ) l ON l.post_id = p.PostID
    WHERE p.postType = 'video'
      AND p.location = ?
    ORDER BY p.Last_Modified DESC
  ");

  $stmt->bind_param("s", $city);
  $stmt->execute();
  $r = $stmt->get_result();

  if (!$r || $r->num_rows === 0) {
    renderEmptyFeed("No videos for " . safe($city) . " yet.");
    $stmt->close();
    return;
  }

  while ($row = $r->fetch_assoc()) {

    $postID   = (int)$row['PostID'];
    $username = (string)$row['username'];
    $pic      = !empty($row['picName'])
      ? (string)$row['picName']
      : 'default_prof.jpg';

    $likes = (int)$row['likes'];
    $date  = date("F d, Y", strtotime($row['Last_Modified']));
    $loc   = safe($row['location']);
    $cat   = safe($row['category']);
    $blog  = sd_safe_text($row['Blog']);

    echo "<div class='post-content'>";

    if (function_exists('renderMediaVideos')) {
      renderMediaVideos($postID);
    }

    if (function_exists('renderUserHeader')) {
      renderUserHeader($username, $pic);
    }

    renderPostDetails(
      $date,
      $loc,
      $cat,
      $blog,
      $postID,
      $likes
    );

    echo "</div>";
  }

  $stmt->close();
}}

// ====================================================================
// GENERIC CATEGORY RENDERERS
// ====================================================================
if (!function_exists('renderCategoryPosts')) {
function renderCategoryPosts(string $category): void {
global $con;
$stmt = $con->prepare("
SELECT
p.PostID,
p.Blog,
p.Location,
p.category,
p.Last_Modified,
u.username,
u.picName,
COALESCE(l.like_count, 0) AS likes
FROM posts p
JOIN users u ON p.userID = u.userID
LEFT JOIN (
SELECT post_id, COUNT(*) AS like_count
FROM post_likes
GROUP BY post_id
) l ON l.post_id = p.PostID
WHERE p.category = ?
AND p.postType = 'photo'
ORDER BY p.Last_Modified DESC
");
$stmt->bind_param("s", $category);
$stmt->execute();
$r = $stmt->get_result();
if (!$r || $r->num_rows === 0) {
renderEmptyFeed("No photos for " . safe($category) . " yet.");
$stmt->close();
return;
}
while ($row = $r->fetch_assoc()) {
$postID   = (int)$row['PostID'];
$username = (string)$row['username'];
$pic      = !empty($row['picName'])
? (string)$row['picName']
: 'default_prof.jpg';
$likes    = (int)$row['likes'];
$date     = date("F d, Y", strtotime($row['Last_Modified']));
$loc      = $row['Location'] ?? '';
$cat      = $row['category'] ?? '';
$blog     = sd_safe_text($row['Blog']);
echo "
<div class='post-content'>
  ";
  renderMediaImages($postID);
  renderUserHeader($username, $pic);
  renderPostDetails($date, $loc, $cat, $blog, $postID, $likes);
  echo "
</div>";
}
$stmt->close();
}
}
if (!function_exists('renderCategoryVideos')) {
function renderCategoryVideos(string $category): void {
  global $con;

  $stmt = $con->prepare("
    SELECT
      p.PostID,
      p.Blog,
      p.location,
      p.category,
      p.Last_Modified,
      p.postType,
      u.username,
      u.picName,
      COALESCE(l.like_count, 0) AS likes
    FROM posts p
    JOIN users u ON p.userID = u.userID
    LEFT JOIN (
      SELECT post_id, COUNT(*) AS like_count
      FROM post_likes
      GROUP BY post_id
    ) l ON l.post_id = p.PostID
    WHERE p.postType = 'video'
      AND p.category = ?
    ORDER BY p.Last_Modified DESC
  ");

  $stmt->bind_param("s", $category);
  $stmt->execute();
  $r = $stmt->get_result();

  if (!$r || $r->num_rows === 0) {
    renderEmptyFeed("No videos for " . safe($category) . " yet.");
    $stmt->close();
    return;
  }

  while ($row = $r->fetch_assoc()) {

    $postID   = (int)$row['PostID'];
    $username = (string)$row['username'];
    $pic      = !empty($row['picName'])
      ? (string)$row['picName']
      : 'default_prof.jpg';

    $likes = (int)$row['likes'];
    $date  = date("F d, Y", strtotime($row['Last_Modified']));
    $loc   = safe($row['location']);
    $cat   = safe($row['category']);
    $blog  = sd_safe_text($row['Blog']);

    echo "<div class='post-content'>";

    if (function_exists('renderMediaVideos')) {
      renderMediaVideos($postID);
    }

    if (function_exists('renderUserHeader')) {
      renderUserHeader($username, $pic);
    }

    renderPostDetails(
      $date,
      $loc,
      $cat,
      $blog,
      $postID,
      $likes
    );

    echo "</div>";
  }

  $stmt->close();
}}

// ====================================================================
// PER-CITY WRAPPERS (calls generic helpers)
// ====================================================================
if (!function_exists('all_Austin')) {
function all_Austin(): void { renderCityPosts('Austin'); }
}
if (!function_exists('all_Austin_Videos')) {
function all_Austin_Videos(): void { renderCityVideos('Austin'); }
}
if (!function_exists('all_Nashville')) {
function all_Nashville(): void { renderCityPosts('Nashville'); }
}
if (!function_exists('all_Nashville_Videos')) {
function all_Nashville_Videos(): void { renderCityVideos('Nashville'); }
}
if (!function_exists('all_Denver')) {
function all_Denver(): void { renderCityPosts('Denver'); }
}
if (!function_exists('all_Denver_Videos')) {
function all_Denver_Videos(): void { renderCityVideos('Denver'); }
}
if (!function_exists('all_Miami')) {
function all_Miami(): void { renderCityPosts('Miami'); }
}
if (!function_exists('all_Miami_Videos')) {
function all_Miami_Videos(): void { renderCityVideos('Miami'); }
}
if (!function_exists('all_Atlanta')) {
function all_Atlanta(): void { renderCityPosts('Atlanta'); }
}
if (!function_exists('all_Atlanta_Videos')) {
function all_Atlanta_Videos(): void { renderCityVideos('Atlanta'); }
}
if (!function_exists('all_Chicago')) {
function all_Chicago(): void { renderCityPosts('Chicago'); }
}
if (!function_exists('all_Chicago_Videos')) {
function all_Chicago_Videos(): void { renderCityVideos('Chicago'); }
}
if (!function_exists('all_Dallas')) {
function all_Dallas(): void { renderCityPosts('Dallas'); }
}
if (!function_exists('all_Dallas_Videos')) {
function all_Dallas_Videos(): void { renderCityVideos('Dallas'); }
}
if (!function_exists('all_New_York_City')) {
function all_New_York_City(): void { renderCityPosts('New York City'); }
}
if (!function_exists('all_New_York_City_Videos')) {
function all_New_York_City_Videos(): void { renderCityVideos('New York City'); }
}
if (!function_exists('all_Los_Angeles')) {
function all_Los_Angeles(): void { renderCityPosts('Los Angeles'); }
}
if (!function_exists('all_Los_Angeles_Videos')) {
function all_Los_Angeles_Videos(): void { renderCityVideos('Los Angeles'); }
}
if (!function_exists('all_San_Francisco')) {
function all_San_Francisco(): void { renderCityPosts('San Francisco'); }
}
if (!function_exists('all_San_Francisco_Videos')) {
function all_San_Francisco_Videos(): void { renderCityVideos('San Francisco'); }
}
if (!function_exists('all_Seattle')) {
function all_Seattle(): void { renderCityPosts('Seattle'); }
}
if (!function_exists('all_Seattle_Videos')) {
function all_Seattle_Videos(): void { renderCityVideos('Seattle'); }
}
if (!function_exists('all_Boston')) {
function all_Boston(): void { renderCityPosts('Boston'); }
}
if (!function_exists('all_Boston_Videos')) {
function all_Boston_Videos(): void { renderCityVideos('Boston'); }
}
if (!function_exists('all_Charlotte')) {
function all_Charlotte(): void { renderCityPosts('Charlotte'); }
}
if (!function_exists('all_Charlotte_Videos')) {
function all_Charlotte_Videos(): void { renderCityVideos('Charlotte'); }
}
if (!function_exists('all_Cincinnati')) {
function all_Cincinnati(): void { renderCityPosts('Cincinnati'); }
}
if (!function_exists('all_Cincinnati_Videos')) {
function all_Cincinnati_Videos(): void { renderCityVideos('Cincinnati'); }
}
if (!function_exists('all_Columbus')) {
function all_Columbus(): void { renderCityPosts('Columbus'); }
}
if (!function_exists('all_Columbus_Videos')) {
function all_Columbus_Videos(): void { renderCityVideos('Columbus'); }
}
if (!function_exists('all_Detroit')) {
function all_Detroit(): void { renderCityPosts('Detroit'); }
}
if (!function_exists('all_Detroit_Videos')) {
function all_Detroit_Videos(): void { renderCityVideos('Detroit'); }
}
if (!function_exists('all_Phoenix')) {
function all_Phoenix(): void { renderCityPosts('Phoenix'); }
}
if (!function_exists('all_Phoenix_Videos')) {
function all_Phoenix_Videos(): void { renderCityVideos('Phoenix'); }
}
if (!function_exists('all_Portland')) {
function all_Portland(): void { renderCityPosts('Portland'); }
}
if (!function_exists('all_Portland_Videos')) {
function all_Portland_Videos(): void { renderCityVideos('Portland'); }
}
if (!function_exists('all_Las_Vegas')) {
function all_Las_Vegas(): void { renderCityPosts('Las Vegas'); }
}
if (!function_exists('all_Las_Vegas_Videos')) {
function all_Las_Vegas_Videos(): void { renderCityVideos('Las Vegas'); }
}
if (!function_exists('all_San_Diego')) {
function all_San_Diego(): void { renderCityPosts('San Diego'); }
}
if (!function_exists('all_San_Diego_Videos')) {
function all_San_Diego_Videos(): void { renderCityVideos('San Diego'); }
}
if (!function_exists('all_Philadelphia')) {
function all_Philadelphia(): void { renderCityPosts('Philadelphia'); }
}
if (!function_exists('all_Philadelphia_Videos')) {
function all_Philadelphia_Videos(): void { renderCityVideos('Philadelphia'); }
}
if (!function_exists('all_Houston')) {
function all_Houston(): void { renderCityPosts('Houston'); }
}
if (!function_exists('all_Houston_Videos')) {
function all_Houston_Videos(): void { renderCityVideos('Houston'); }
}
if (!function_exists('all_Orlando')) {
function all_Orlando(): void { renderCityPosts('Orlando'); }
}
if (!function_exists('all_Orlando_Videos')) {
function all_Orlando_Videos(): void { renderCityVideos('Orlando'); }
}
if (!function_exists('all_Tampa')) {
function all_Tampa(): void { renderCityPosts('Tampa'); }
}
if (!function_exists('all_Tampa_Videos')) {
function all_Tampa_Videos(): void { renderCityVideos('Tampa'); }
}
if (!function_exists('all_Kansas_City')) {
function all_Kansas_City(): void { renderCityPosts('Kansas City'); }
}
if (!function_exists('all_Kansas_City_Videos')) {
function all_Kansas_City_Videos(): void { renderCityVideos('Kansas City'); }
}
if (!function_exists('all_Cleveland')) {
function all_Cleveland(): void { renderCityPosts('Cleveland'); }
}
if (!function_exists('all_Cleveland_Videos')) {
function all_Cleveland_Videos(): void { renderCityVideos('Cleveland'); }
}
if (!function_exists('all_Indianapolis')) {
function all_Indianapolis(): void { renderCityPosts('Indianapolis'); }
}
if (!function_exists('all_Indianapolis_Videos')) {
function all_Indianapolis_Videos(): void { renderCityVideos('Indianapolis'); }
}
if (!function_exists('all_Minneapolis')) {
function all_Minneapolis(): void { renderCityPosts('Minneapolis'); }
}
if (!function_exists('all_Minneapolis_Videos')) {
function all_Minneapolis_Videos(): void { renderCityVideos('Minneapolis'); }
}
if (!function_exists('all_San_Antonio')) {
function all_San_Antonio(): void { renderCityPosts('San Antonio'); }
}
if (!function_exists('all_San_Antonio_Videos')) {
function all_San_Antonio_Videos(): void { renderCityVideos('San Antonio'); }
}
if (!function_exists('all_Washington_DC')) {
function all_Washington_DC(): void { renderCityPosts('Washington DC'); }
}
if (!function_exists('all_Washington_Videos')) {
function all_Washington_DC_Videos(): void { renderCityVideos('Washington DC'); }
}
if (!function_exists('all_Toronto')) {
function all_Toronto(): void { renderCityPosts('Toronto'); }
}
if (!function_exists('all_Toronto_Videos')) {
function all_Toronto_Videos(): void { renderCityVideos('Toronto'); }
}
if (!function_exists('all_Vancouver')) {
function all_Vancouver(): void { renderCityPosts('Vancouver'); }
}
if (!function_exists('all_Vancouver_Videos')) {
function all_Vancouver_Videos(): void { renderCityVideos('Vancouver'); }
}
if (!function_exists('all_Calgary')) {
function all_Calgary(): void { renderCityPosts('Calgary'); }
}
if (!function_exists('all_Calgary_Videos')) {
function all_Calgary_Videos(): void { renderCityVideos('Calgary'); }
}
if (!function_exists('all_Edmonton')) {
function all_Edmonton(): void { renderCityPosts('Edmonton'); }
}
if (!function_exists('all_Edmonton_Videos')) {
function all_Edmonton_Videos(): void { renderCityVideos('Edmonton'); }
}
if (!function_exists('all_Montreal')) {
function all_Montreal(): void { renderCityPosts('Montreal'); }
}
if (!function_exists('all_Montreal_Videos')) {
function all_Montreal_Videos(): void { renderCityVideos('Montreal'); }
}
if (!function_exists('all_Honolulu')) {
function all_Honolulu(): void { renderCityPosts('Honolulu'); }
}
if (!function_exists('all_Honolulu_Videos')) {
function all_Honolulu_Videos(): void { renderCityVideos('Honolulu'); }
}
if (!function_exists('all_London')) {
function all_London(): void { renderCityPosts('London'); }
}
if (!function_exists('all_London_Videos')) {
function all_London_Videos(): void { renderCityVideos('London'); }
}
if (!function_exists('all_Paris')) {
function all_Paris(): void { renderCityPosts('Paris'); }
}
if (!function_exists('all_Paris_Videos')) {
function all_Paris_Videos(): void { renderCityVideos('Paris'); }
}
if (!function_exists('all_Berlin')) {
function all_Berlin(): void { renderCityPosts('Berlin'); }
}
if (!function_exists('all_Berlin_Videos')) {
function all_Berlin_Videos(): void { renderCityVideos('Berlin'); }
}
if (!function_exists('all_Barcelona')) {
function all_Barcelona(): void { renderCityPosts('Barcelona'); }
}
if (!function_exists('all_Barcelona_Videos')) {
function all_Barcelona_Videos(): void { renderCityVideos('Barcelona'); }
}
if (!function_exists('all_Amsterdam')) {
function all_Amsterdam(): void { renderCityPosts('Amsterdam'); }
}
if (!function_exists('all_Amsterdam_Videos')) {
function all_Amsterdam_Videos(): void { renderCityVideos('Amsterdam'); }
}
if (!function_exists('all_Athens')) {
function all_Athens(): void { renderCityPosts('Athens'); }
}
if (!function_exists('all_Athens_Videos')) {
function all_Athens_Videos(): void { renderCityVideos('Athens'); }
}
if (!function_exists('all_Rome')) {
function all_Rome(): void { renderCityPosts('Rome'); }
}
if (!function_exists('all_Rome_Videos')) {
function all_Rome_Videos(): void { renderCityVideos('Rome'); }
}
if (!function_exists('all_Moscow')) {
function all_Moscow(): void { renderCityPosts('Moscow'); }
}
if (!function_exists('all_Moscow_Videos')) {
function all_Moscow_Videos(): void { renderCityVideos('Moscow'); }
}
if (!function_exists('all_Milan')) {
function all_Milan(): void { renderCityPosts('Milan'); }
}
if (!function_exists('all_Milan_Videos')) {
function all_Milan_Videos(): void { renderCityVideos('Milan'); }
}
if (!function_exists('all_Venice')) {
function all_Venice(): void { renderCityPosts('Venice'); }
}
if (!function_exists('all_Venice_Videos')) {
function all_Venice_Videos(): void { renderCityVideos('Venice'); }
}
if (!function_exists('all_Jacksonville')) {
function all_Jacksonville(): void { renderCityPosts('Jacksonville'); }
}
if (!function_exists('all_Jacksonville_Videos')) {
function all_Jacksonville_Videos(): void { renderCityVideos('Jacksonville'); }
}
if (!function_exists('all_New_Orleans')) {
function all_New_Orleans(): void { renderCityPosts('New Orleans'); }
}
if (!function_exists('all_New_Orleans_Videos')) {
function all_New_Orleans_Videos(): void { renderCityVideos('New Orleans'); }
}
if (!function_exists('all_Pittsburgh')) {
function all_Pittsburgh(): void { renderCityPosts('Pittsburgh'); }
}
if (!function_exists('all_Pittsburgh_Videos')) {
function all_Pittsburgh_Videos(): void { renderCityVideos('Pittsburgh'); }
}
if (!function_exists('all_Saint_Louis')) {
function all_Saint_Louis(): void { renderCityPosts('Saint Louis'); }
}
if (!function_exists('all_Saint_Louis_Videos')) {
function all_Saint_Louis_Videos(): void { renderCityVideos('Saint Louis'); }
}
if (!function_exists('all_Memphis')) {
function all_Memphis(): void { renderCityPosts('Memphis'); }
}
if (!function_exists('all_Memphis_Videos')) {
function all_Memphis_Videos(): void { renderCityVideos('Memphis'); }
}
// ====================================================================
// PER-CATEGORY WRAPPERS (calls generic helpers)
// ====================================================================
if (!function_exists('all_Stays')) {
function all_Stays(): void { renderCategoryPosts('stays'); }
}
if (!function_exists('all_Stays_Videos')) {
function all_Stays_Videos(): void { renderCategoryVideos('stays'); }
}
if (!function_exists('all_Eats')) {
function all_Eats(): void { renderCategoryPosts('eats'); }
}
if (!function_exists('all_Eats_Videos')) {
function all_Eats_Videos(): void { renderCategoryVideos('eats'); }
}
if (!function_exists('all_Events')) {
function all_Events(): void { renderCategoryPosts('events'); }
}
if (!function_exists('all_Events_Videos')) {
function all_Events_Videos(): void { renderCategoryVideos('events'); }
}
if (!function_exists('all_Adventures')) {
function all_Adventures(): void { renderCategoryPosts('adventures'); }
}
if (!function_exists('all_Adventures_Videos')) {
function all_Adventures_Videos(): void { renderCategoryVideos('adventures'); }
}
if (!function_exists('all_Vibes')) {
function all_Vibes(): void { renderCategoryPosts('vibes'); }
}
if (!function_exists('all_Vibes_Videos')) {
function all_Vibes_Videos(): void { renderCategoryVideos('vibes'); }
}
?>
