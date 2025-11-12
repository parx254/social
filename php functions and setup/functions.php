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
require_once 'control.php';
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
$currentvideo = $_GET['videolocation'] ?? '';
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
$videolocation = $_POST['videolocation'] ?? '';
$location = $_POST['location'] ?? '';
$postID = $_POST['postID'] ?? '';
$blog = $_POST['blog'] ?? '';
$category = $_POST['category'] ?? '';
// =========================
// Database Configuration
// =========================
// --------------------------------------------------
// End global initialization
// --------------------------------------------------
// ============================================================
// Universal helper to get current logged-in user's ID
// ============================================================
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
// Navigation Renderer
// =========================
function verifySessionAndUser() {
global $user, $fname, $lname;
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
die("Database connection failed: " . mysqli_connect_error());
}
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
header("location: login.php");
exit;
}
$user = $_SESSION['username'];
$stmt = $con->prepare("SELECT firstname, lastname, authorized FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
$fname = $row['firstname'];
$lname = $row['lastname'];
if ($row['authorized'] == 0) {
header("location: login.php");
exit;
}
} else {
header("location: login.php");
exit;
}
}
function getUserFullName() {
global $fname, $lname;
return $fname . " " . $lname;
}
/* --------------------------------------------------------------------------
DELETE MESSAGE FUNCTIONS
-------------------------------------------------------------------------- */
/**
* Mark a message as deleted in the Inbox
*/
function deleteInboxMessage($messageID) {
global $con;
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
$user = $_SESSION['username'] ?? null;
if (!$user) {
error_log("deleteInboxMessage() called without a valid session user.");
return false;
}
if (empty($messageID) || !is_numeric($messageID)) {
error_log("deleteInboxMessage() called with invalid message ID.");
return false;
}
// ✅ Matches your schema: use 'deleted' for inbox removal
$stmt = $con->prepare("
UPDATE messages
SET deleted = 'yes'
WHERE id = ? AND to_user = ?
");
if (!$stmt) {
error_log("deleteInboxMessage() prepare failed: " . $con->error);
return false;
}
$stmt->bind_param("is", $messageID, $user);
$stmt->execute();
$success = $stmt->affected_rows > 0;
$stmt->close();
if ($success) {
error_log("✅ Inbox message ID $messageID marked deleted by $user");
} else {
error_log("⚠️ No inbox message found for user $user (ID $messageID).");
}
return $success;
}
/**
* Mark a message as deleted in the Sent folder
*/
function deleteSentMessage($messageID) {
global $con;
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
$user = $_SESSION['username'] ?? null;
if (!$user) {
error_log("deleteSentMessage() called without a valid session user.");
return false;
}
if (empty($messageID) || !is_numeric($messageID)) {
error_log("deleteSentMessage() called with invalid message ID.");
return false;
}
// ✅ Matches your schema: use 'sent_deleted' for sent removal
$stmt = $con->prepare("
UPDATE messages
SET sent_deleted = 'yes'
WHERE id = ? AND from_user = ?
");
if (!$stmt) {
error_log("deleteSentMessage() prepare failed: " . $con->error);
return false;
}
$stmt->bind_param("is", $messageID, $user);
$stmt->execute();
$success = $stmt->affected_rows > 0;
$stmt->close();
if ($success) {
error_log("✅ Sent message ID $messageID marked deleted by $user");
} else {
error_log("⚠️ No sent message found for user $user (ID $messageID).");
}
return $success;
}
/* --------------------------------------------------------------------------
AUTO-HANDLE FORM SUBMISSIONS (Inbox & Sent)
-------------------------------------------------------------------------- */
// Handle Inbox deletion requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete']) && basename($_SERVER['PHP_SELF']) === 'inbox.php') {
$messageID = (int)($_POST['id'] ?? 0);
if ($messageID > 0) {
deleteInboxMessage($messageID);
header("Location: inbox.php");
exit;
}
}
// Handle Sent deletion requests
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sentdelete']) && basename($_SERVER['PHP_SELF']) === 'sent.php') {
$messageID = (int)($_POST['id'] ?? 0);
if ($messageID > 0) {
deleteSentMessage($messageID);
header("Location: sent.php");
exit;
}
}
        function citysearch()
        {
        echo "
        <div class='location'>
          <div class='secondtitle'>
          <h2>Where to?</h2>
          </div>
          <br>
          <input type='text' placeholder='Search destinations' id='searchbox4' autocomplete='off'/>
          <div id='response4'></div>
          </div>
        </div>
        ";
        }
        function cityweather()
        {
        echo "
        <div class='weather-container'>
          <img class='icon'>
          <h2 class='weather'></h2>
          <h3 class='temp'></h3>
          <span>&#8457;</span>
        </div>
        ";
        }
        function all_users()
        {
        global $con;
        // Build SQL query
        $sql  = "SELECT * FROM users ORDER BY username";
        // Execute SQL query
        $result = $con->query($sql);
        if (!$result) {
        }
        if ($result->num_rows > 0) {
        // Loop through each result row
        while ($row = $result->fetch_assoc()) {
        echo "<p><a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a></p>";
        }
        }
        }
        function otherFollowees() {
        global $con;
        // Get the profile username from the URL
        $currentuser = $_GET['currentuser'] ?? '';
        if (empty($currentuser)) {
        return; // Nothing to show if no user is provided
        }
        $stmt = $con->prepare("
        SELECT COUNT(followee) AS followingCount
        FROM follows
        WHERE follower = (SELECT userID FROM users WHERE username = ?)
        ");
        $stmt->bind_param("s", $currentuser);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
        echo "<div class='nums'>
        <h5>
        <a href='following.php?currentuser=" . htmlspecialchars($currentuser) . "'>
        " . $row['followingCount'] . " Following
        </a>
        </h5>
        </div>";
        }
        $stmt->close();
        }
        function otherFollowers() {
        global $con;
        // Get the profile username from the URL
        $currentuser = $_GET['currentuser'] ?? '';
        if (empty($currentuser)) {
        return; // Nothing to show if no user is provided
        }
        $stmt = $con->prepare("
        SELECT COUNT(follower) AS followerCount
        FROM follows
        WHERE followee = (SELECT userID FROM users WHERE username = ?)
        ");
        $stmt->bind_param("s", $currentuser);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
        echo "<div class='nums'>
        <h5>
        <a href='followers.php?currentuser=" . htmlspecialchars($currentuser) . "'>
        " . $row['followerCount'] . " Followers
        </a>
        </h5>
      </div>";
      }
      $stmt->close();
      }
      function allfollows() {
      global $con;
      // Get the username being viewed
      $currentuser = $_GET['currentuser'] ?? '';
      if (empty($currentuser)) {
      echo "<p>No user specified.</p>";
      return;
      }
      // Get all followers (userIDs)
      $stmt = $con->prepare("
      SELECT follower
      FROM follows
      WHERE followee = (SELECT userID FROM users WHERE username = ?)
      ");
      $stmt->bind_param("s", $currentuser);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows === 0) {
      echo "<p>No followers yet.</p>";
      return;
      }
      while ($row = $result->fetch_assoc()) {
      // Get follower’s username and profile pic
      $stmt2 = $con->prepare("SELECT username, picName FROM users WHERE userID = ?");
      $stmt2->bind_param("i", $row['follower']);
      $stmt2->execute();
      $result2 = $stmt2->get_result();
      if ($row2 = $result2->fetch_assoc()) {
      $username = htmlspecialchars($row2['username']);
      $pic = !empty($row2['picName']) ? htmlspecialchars($row2['picName']) : "default_prof.jpg";
      echo "<div class='follow'>
      <a href='profile.php?currentuser={$username}'>
      <img src='Images/prof_pics/{$pic}' alt='{$username}'>
      </a>
      <a href='profile.php?currentuser={$username}'>{$username}</a>
      </div>";
      }
      $stmt2->close();
      }
      $stmt->close();
      }
      function allfollowing() {
      global $con;
      // Get the username being viewed
      $currentuser = $_GET['currentuser'] ?? '';
      if (empty($currentuser)) {
      echo "<p>No user specified.</p>";
      return;
      }
      // Get all followees (userIDs)
      $stmt = $con->prepare("
      SELECT followee
      FROM follows
      WHERE follower = (SELECT userID FROM users WHERE username = ?)
      ");
      $stmt->bind_param("s", $currentuser);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows === 0) {
      echo "<p>Not following anyone yet.</p>";
      return;
      }
      while ($row = $result->fetch_assoc()) {
      // Get followee’s username and profile pic
      $stmt2 = $con->prepare("SELECT username, picName FROM users WHERE userID = ?");
      $stmt2->bind_param("i", $row['followee']);
      $stmt2->execute();
      $result2 = $stmt2->get_result();
      if ($row2 = $result2->fetch_assoc()) {
      $username = htmlspecialchars($row2['username']);
      $pic = !empty($row2['picName']) ? htmlspecialchars($row2['picName']) : "default_prof.jpg";
      echo "<div class='follow'>
      <a href='profile.php?currentuser={$username}'>
      <img src='Images/prof_pics/{$pic}' alt='{$username}'>
      </a>
      <a href='profile.php?currentuser={$username}'>{$username}</a>
    </div>";
    }
    $stmt2->close();
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
      <h2 style='color:#BE3455'>Welcome to Social Destinations!</h2>
      <p>Click the button below to verify your email and activate your account:</p>
      <p>
      <a href='$verifyLink'
      style='display:inline-block;padding:10px 20px;background-color:#BE3455;color:#fff;text-decoration:none;border-radius:5px;'>
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
 function login_user($username, $password) {
  global $con;

  // Trim and sanitize input
  $username = trim($username);
  $password = trim($password);

  $result = ['success' => false, 'error' => ''];

  // --- Validate input ---
  if (empty($username) || empty($password)) {
    $result['error'] = "Please enter both username and password.";
    return $result;
  }

  // --- Prepare statement ---
  $stmt = $con->prepare("SELECT userID, username, firstname, password, authorized FROM users WHERE username = ?");
  if (!$stmt) {
    $result['error'] = "Database error: " . $con->error;
    return $result;
  }

  $stmt->bind_param("s", $username);
  $stmt->execute();
  $res = $stmt->get_result();

  if ($row = $res->fetch_assoc()) {
    // Check password hash
    if (password_verify($password, $row['password'])) {
      if ($row['authorized'] == 1) {
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }

        $_SESSION['username']  = $row['username'];
        $_SESSION['firstname'] = $row['firstname'];

        $result['success'] = true;
      } else {
        $result['error'] = "Please verify your account before logging in.";
      }
    } else {
      $result['error'] = "Incorrect password.";
    }
  } else {
    $result['error'] = "No account found with that username.";
  }

  $stmt->close();
  return $result;
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
      <h2 style='color: #BE3455;'>Reset Your Password</h2>
      <p>Hello <strong>" . htmlspecialchars($username) . "</strong>,</p>
      <p>We received a request to reset your password for your Social Destinations account.</p>
      <p><a href='$reset_link' style='background: #BE3455; color: #fff; padding: 10px 15px; border-radius: 5px; text-decoration: none;'>Reset Password</a></p>
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
    function Sent() {
    global $user;
    global $con;
    // Build SQL query
    $sql  = "SELECT * FROM messages WHERE from_user = '$user' AND sent_deleted = 'no'";
    // Execute SQL query
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    // Loop through each row returned from query
    while ($row = $result->fetch_assoc()) {
    $messageid = $row['id'];
    echo "<table>";
    echo "</td></tr>";
    echo "<tr><td>";
    echo "To ";
    echo $row['to_user'];
    echo "</td></tr>";
    echo "<tr><td>";
    echo "<br>";
    echo $row['message'];
    echo "</td></tr>";
    echo "<form action='sent.php' method='post'>
    <td colspan='2' align='right'>
    <input type='hidden' name='id' value = '$messageid'>
    <button type='submit' name='sentdelete'><i class='far fa-trash' aria-hidden='true'></i></button>
    </td>
    </tr>
    </form>";
    echo "</table>";
    echo "</br>";
    }
    } else {
    echo "";
    }
    }
    function Received() {
    global $user;
    global $con;
    // Build SQL query
    $sql  = "SELECT * FROM messages WHERE to_user = '$user' AND deleted = 'no'";
    // Execute SQL query
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    // Loop through each row returned from query
    while ($row = $result->fetch_assoc()) {
    $messageid = $row['id'];
    echo "<table>";
    echo "</td></tr>";
    echo "<tr><td>";
    echo "From ";
    echo $row['from_user'];
    echo " ";
    echo "</td></tr>";
    echo "<tr><td>";
    echo "<br> ";
    echo $row['message'];
    echo "</td></tr>";
    echo "<form action='reply.php' method='post'>
    <td colspan='2' align='right'>
    <input type='hidden' name='replyid' value = '$messageid'>
    <button type='submit' name='reply'><i class='fa fa-reply' aria-hidden='true'></i></button>
    </td>
    </tr>
    </form>";
    echo "<form action='inbox.php' method='post'>
    <td colspan='2' align='right'>
    <input type='hidden' name='id' value = '$messageid'>
    <button type='submit' name='delete'><i class='far fa-trash' aria-hidden='true'></i></button>
    </td>
    </tr>
    </form>";
    echo "</table>";
    echo "</br>";
    $q = "UPDATE messages SET `read` = 'yes' WHERE to_user = '$user'";
    $result0 = $con->query($q);
    }
    } else {
    echo "";
    }
    }
    function TrashMessages() {
    global $user;
    global $con;
    // Build SQL query
    $sql  = "SELECT * FROM messages WHERE to_user = '$user' AND deleted = 'yes'";
    // Execute SQL query
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
    // output data of each row
    // Loop through each row returned from query
    while ($row = $result->fetch_assoc()) {
    echo "<table>";
    echo "</td></tr>";
    echo "<tr><td>";
    echo "From ";
    echo $row['from_user'];
    echo "</td></tr>";
    echo "<tr><td>";
    echo "<br>";
    echo $row['message'];
    echo "</td></tr>";
    echo "</table>";
    echo "</br>";
    }
    } else {
    echo "";
    }
    }
    function resize_image_and_save($source_path, $destination_path, $max_width, $max_height, $quality = 80) {
    // Ensure numeric values
    $max_width = (float)$max_width;
    $max_height = (float)$max_height;
    list($width, $height, $type) = getimagesize($source_path);
    // Also cast these to numbers
    $width = (float)$width;
    $height = (float)$height;
    if ($width <= 0 || $height <= 0) {
    throw new Exception("Invalid image dimensions for: " . htmlspecialchars($source_path));
    }
    $ratio = min($max_width / $width, $max_height / $height);
    // Avoid division errors
    if ($ratio >= 1) {
    $new_width = (int)$width;
    $new_height = (int)$height;
    } else {
    $new_width = (int)round($width * $ratio);
    $new_height = (int)round($height * $ratio);
    }
    switch ($type) {
    case IMAGETYPE_JPEG:
    $src = imagecreatefromjpeg($source_path);
    break;
    case IMAGETYPE_PNG:
    $src = imagecreatefrompng($source_path);
    break;
    case IMAGETYPE_GIF:
    $src = imagecreatefromgif($source_path);
    break;
    default:
    throw new Exception("Unsupported image type");
    }
    $dst = imagecreatetruecolor($new_width, $new_height);
    // Preserve transparency for PNG/GIF
    if ($type == IMAGETYPE_PNG || $type == IMAGETYPE_GIF) {
    imagecolortransparent($dst, imagecolorallocatealpha($dst, 0, 0, 0, 127));
    imagealphablending($dst, false);
    imagesavealpha($dst, true);
    }
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    switch ($type) {
    case IMAGETYPE_JPEG:
    imagejpeg($dst, $destination_path, $quality);
    break;
    case IMAGETYPE_PNG:
    imagepng($dst, $destination_path);
    break;
    case IMAGETYPE_GIF:
    imagegif($dst, $destination_path);
    break;
    }
    imagedestroy($src);
    imagedestroy($dst);
    return true;
    }
    function addPost($blogtext, $location, $category, $filenameArray, $user) {
    global $con;
    // --- Validate inputs ---
    if (empty($blogtext) || empty($location) || empty($category) || empty($user)) {
    error_log("Missing required fields in addPost()");
    return false;
    }
    // --- Get the current user's ID ---
    $stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$row = $result->fetch_assoc()) {
    error_log("User not found: $user");
    return false;
    }
    $userID = $row['userID'];
    $stmt->close();
    // --- Insert new post into posts table ---
    $stmt = $con->prepare("INSERT INTO posts (Blog, Location, userID, category, Last_Modified) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssis", $blogtext, $location, $userID, $category);
    if (!$stmt->execute()) {
    error_log("Post insert failed: " . $stmt->error);
    return false;
    }
    $postID = $stmt->insert_id;
    $stmt->close();
    // --- Handle the uploaded image ---
    if (isset($filenameArray['tmp_name']) && is_uploaded_file($filenameArray['tmp_name'])) {
    $uploadDir = __DIR__ . '/Images/';
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
    $originalName = basename($filenameArray['name']);
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    $newName = uniqid() . '.' . $extension;
    $targetPath = $uploadDir . $newName;
    // Resize and save the image
    $resizeSuccess = resize_image_and_save($filenameArray['tmp_name'], $targetPath, 1080, 1080);
    if (!$resizeSuccess) {
    move_uploaded_file($filenameArray['tmp_name'], $targetPath); // fallback
    }
    // Insert into images table
    $stmt = $con->prepare("INSERT INTO images (filepath, filename, postID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $targetPath, $newName, $postID);
    $stmt->execute();
    $stmt->close();
    header("location: my-profile");
    }
    return true;
    }
    function addVideoPost($blogtext, $videoFileArray, $user, $videolocation, $videocategory) {
    global $con;
    // --- Validate required inputs ---
    if (empty($blogtext) || empty($videolocation) || empty($videocategory) || empty($user)) {
    error_log("Missing required fields in addVideoPost()");
    return false;
    }
    // --- Get the current user's ID ---
    $stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$row = $result->fetch_assoc()) {
    error_log("User not found in addVideoPost(): $user");
    return false;
    }
    $userID = $row['userID'];
    $stmt->close();
    // --- Insert new post into posts table ---
    $stmt = $con->prepare("
    INSERT INTO posts (Blog, userID, videolocation, videocategory, Last_Modified)
    VALUES (?, ?, ?, ?, NOW())
    ");
    $stmt->bind_param("siss", $blogtext, $userID, $videolocation, $videocategory);
    if (!$stmt->execute()) {
    error_log("Post insert failed in addVideoPost(): " . $stmt->error);
    return false;
    }
    $postID = $stmt->insert_id;
    $stmt->close();
    // --- Handle uploaded video ---
    if (isset($videoFileArray['tmp_name']) && is_uploaded_file($videoFileArray['tmp_name'])) {
    $uploadDir = __DIR__ . '/Videos/';
    if (!file_exists($uploadDir)) mkdir($uploadDir, 0777, true);
    $originalName = basename($videoFileArray['name']);
    $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
    // --- Allowed video formats ---
    $allowed = ['mp4', 'mov', 'avi', 'mkv', 'webm'];
    if (!in_array($extension, $allowed)) {
    error_log("Unsupported video format: $extension");
    return false;
    }
    $newName = uniqid("vid_") . '.' . $extension;
    $targetPath = $uploadDir . $newName;
    // --- Move uploaded video to destination ---
    if (!move_uploaded_file($videoFileArray['tmp_name'], $targetPath)) {
    error_log("Video upload failed for user $user: $originalName");
    return false;
    }
    // --- Insert into videos table ---
    $stmt = $con->prepare("INSERT INTO videos (filepath, filename, postID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $targetPath, $newName, $postID);
    if (!$stmt->execute()) {
    error_log("Video insert failed in addVideoPost(): " . $stmt->error);
    return false;
    }
    $stmt->close();
    // --- Redirect after successful post ---
    header("Location: my-profile");
    exit;
    } else {
    error_log("No video file uploaded in addVideoPost()");
    }
    return true;
    }
    //show more posts
    //delete a post from page and DB
    // ============================================================
    // DELETE POST (removes post + related images/videos/likes)
    // ============================================================
    if (!function_exists('deletePost')) {
    function deletePost(): void {
    global $con;
    if (empty($_POST['postID'])) {
    echo "Error: Missing post ID.";
    return;
    }
    $postID = intval($_POST['postID']);
    // ------------------------------------------------------------
    // 1. Delete related images
    // ------------------------------------------------------------
    $stmt = $con->prepare("DELETE FROM images WHERE PostID = ?");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $stmt->close();
    // ------------------------------------------------------------
    // 2. Delete related videos (if table exists)
    // ------------------------------------------------------------
    if ($con->query("SHOW TABLES LIKE 'videos'")->num_rows > 0) {
    $stmt = $con->prepare("DELETE FROM videos WHERE PostID = ?");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $stmt->close();
    }
    // ------------------------------------------------------------
    // 3. Delete related likes (if table exists)
    // ------------------------------------------------------------
    if ($con->query("SHOW TABLES LIKE 'post_likes'")->num_rows > 0) {
    $stmt = $con->prepare("DELETE FROM post_likes WHERE Post_ID = ?");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $stmt->close();
    }
    // ------------------------------------------------------------
    // 4. Delete the post itself
    // ------------------------------------------------------------
    $stmt = $con->prepare("DELETE FROM posts WHERE PostID = ?");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $stmt->close();
    echo "Post deleted successfully.";
    }
    }
    // ============================================================
    // EDIT A POST — Load existing post into editable form
    // ============================================================
    // ============================================================
    // UPDATE POST — Save edited post via AJAX
    // ============================================================
    // ============================================================
    // EDIT A POST — Load existing post into editable form
    // ============================================================
    if (!function_exists('editPost')) {
    function editPost(): void {
    global $user, $con;
    ob_clean(); // clears any accidental output buffer
    header_remove('Content-Type');
    header('Content-Type: application/json; charset=utf-8');
    if (empty($_POST['postID'])) {
    echo json_encode(['edithere' => 'Missing post ID.']);
    return;
    }
    $postID = intval($_POST['postID']);
    // 1. Fetch the post
    $stmt = $con->prepare("SELECT * FROM posts WHERE PostID = ?");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result || $result->num_rows === 0) {
    echo json_encode(['edithere' => 'Cannot find post to edit!']);
    return;
    }
    $row = $result->fetch_assoc();
    $stmt->close();
    // 2. Prepare form data
    $location  = htmlspecialchars($row['Location'] ?? '');
    $date_posted = date("F d, Y", strtotime($row['Last_Modified']));
    $blog    = htmlspecialchars($row['Blog'] ?? '');
    $category  = htmlspecialchars($row['category'] ?? '');
    // 3. Build the HTML form
    $editform = "
    <div class='editprofposts'>
      <form class='edit-post-form' method='POST'>
      <h3>Edit Post from {$location} on {$date_posted}</h3><br>
      <textarea name='blog' maxlength='160' rows='10' required>{$blog}</textarea>
      <br>
      <i class='far fa-globe' aria-hidden='true'></i>
      <select name='location' required>
      <option class='placeholder' disabled>Select Location</option>";
      $cities = ['Amsterdam','Athens','Atlanta','Austin','Barcelona','Berlin','Boston','Calgary','Charlotte','Chicago','Cincinnati','Columbus','Dallas','Denver','Detroit','Edmonton','Honolulu','Houston','Jacksonville','Kansas City','Indianapolis','Las Vegas','London','Los Angeles','Memphis','Miami','Milan','Minneapolis','Montreal','Moscow','Nashville','New Orleans','New York City','Orlando','Paris','Philadelphia','Phoenix','Pittsburgh','Portland','Rome','Saint Louis','San Antonio','San Diego','San Francisco','Seattle','Tampa','Toronto','Vancouver','Venice','Washington DC'];
      foreach ($cities as $city) {
      $selected = ($city === $location) ? 'selected' : '';
      $editform .= "<option value='{$city}' {$selected}>{$city}</option>";
      }
      $editform .= "
      </select>
      <br><br>
      <i class='far fa-tag' aria-hidden='true'></i>
      <select name='category' required>
      <option class='placeholder' disabled>Select Category</option>";
      $categories = ['Eats','Excursion','Vibes','Stays','Events'];
      foreach ($categories as $cat) {
      $selected = (strcasecmp($cat, $category) === 0) ? 'selected' : '';
      $editform .= "<option value='{$cat}' {$selected}>{$cat}</option>";
      }
      $editform .= "
      </select>
      <input type='hidden' name='postID' value='{$postID}'>
      <input type='hidden' name='action' value='updatePost'>
      <div class='edit-buttons'>
      <button type='submit' class='edit-post-form-submit'>
      <i class='fa fa-refresh' aria-hidden='true'></i> Save
      </button>
      <button type='button' class='cancel-edit'>
      <i class='far fa-times' aria-hidden='true'></i> Cancel
      </button>
      </div>
      </form>
    </div>";
    // 4. Return as JSON for AJAX
    echo json_encode(['edithere' => $editform]);
    }
    }
    // ============================================================
    // UPDATE POST — Save edited post via AJAX
    // ============================================================
    function updatePost() {
    global $con, $user;
    ob_clean();
    header_remove('Content-Type');
    header('Content-Type: application/json; charset=utf-8');
    error_reporting(E_ALL);
    ini_set('display_errors', 0); // disable on-screen errors
    $postID   = intval($_POST['postID'] ?? 0);
    $blog  = trim($_POST['blog'] ?? '');
    $location = trim($_POST['location'] ?? '');
    $category = trim($_POST['category'] ?? '');
    if (!$postID || empty($blog) || empty($location) || empty($category)) {
    echo json_encode([
    'status' => 'error',
    'message' => 'Missing or invalid data.'
    ]);
    return;
    }
    $stmt = $con->prepare("
    UPDATE posts
    SET Blog = ?, Location = ?, Category = ?, Last_Modified = NOW()
    WHERE PostID = ?
    ");
    if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => $con->error]);
    return;
    }
    $stmt->bind_param("sssi", $blog, $location, $category, $postID);
    if ($stmt->execute()) {
    echo json_encode(['status' => 'success', 'message' => 'Post updated successfully!']);
    } else {
    echo json_encode(['status' => 'error', 'message' => 'Database update failed.']);
    }
    $stmt->close();
    exit;
    }
    if (!function_exists('getPostHTML')) {
    function getPostHTML(): void {
    global $con;
    if (empty($_POST['postID'])) {
    echo "Missing post ID.";
    return;
    }
    $postID = intval($_POST['postID']);
    $stmt = $con->prepare("SELECT Blog, Location, category, Last_Modified FROM posts WHERE PostID = ?");
    $stmt->bind_param("i", $postID);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($row = $res->fetch_assoc()) {
    echo "<div class='post-content'>
    <p>{$row['Blog']}</p>
    <small>{$row['Location']} • {$row['category']} • " . date('F d, Y', strtotime($row['Last_Modified'])) . "</small>
    </div>";
    }
    $stmt->close();
    }
    }
    function editno() {
    header("location: my-profile");
    }
    //edit personal information on profile
    function editProf() {
    global $user;
    global $con;
    // Query both user and profile info
    $sql = "SELECT p.Bio, p.Birthday, p.HomeCity, u.firstname, u.lastname
    FROM profiles p
    JOIN users u ON p.userID = u.userID
    WHERE u.username = '$user'";
    $result = $con->query($sql);
    if (!$result) {
    echo "Error: " . $con->error . "\n";
    return;
    }
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    } else {
    echo "We can't find your current info at the moment!";
    return;
    }
    echo "<div class='profpost'>
    <form action='control.php' method='POST' id='updateProfile'>
    <i class='far fa-user' aria-hidden='true'></i>
    <input type='text' name='firstname' value='" . htmlspecialchars($row['firstname']) . "' placeholder='First Name' required><br>
    <i class='far fa-user' aria-hidden='true'></i>
    <input type='text' name='lastname' value='" . htmlspecialchars($row['lastname']) . "' placeholder='Last Name' required><br>
    <i class='far fa-info-circle' aria-hidden='true'></i>
    <textarea name='bio' form='updateProfile' required>" . htmlspecialchars($row['Bio']) . "</textarea><br>
    <i class='far fa-birthday-cake' aria-hidden='true'></i>
    <input type='date' name='birthday' value='" . htmlspecialchars($row['Birthday']) . "' required><br>
    <i class='far fa-home-alt' aria-hidden='true'></i>
    <input type='text' class='my-input' name='city' value='" . htmlspecialchars($row['HomeCity']) . "' tabindex='1' autocomplete='off' required><br>
    <br><button type='submit' name='updateProf' class='editprofposts button'>
    <i class='fa fa-refresh' aria-hidden='true'></i>
    </button>
    </form>
  </div>
  <div class='results'></div>";
    }
    //update DB with edits to profile
    function updateProf() {
    global $user;
    global $con;
    $varbio   = $_POST['bio'];
    $varbirth   = $_POST['birthday'];
    $varcity  = $_POST['city'];
    $varcountry = $_POST['country'];
    echo $varbio . $varbirth . $varcity;
    // Build SQL query
    $sql  = "UPDATE profiles SET Bio = '$varbio', Birthday = '$varbirth', HomeCity = '$varcity' WHERE userID = (select userID from users where username = '$user');";
    // Execute SQL query
    $result = $con->query($sql);
    if (!$result) {
    echo "Error: " . $con->error . "\n";
    } else {
    header("location: my-profile");
    }
    }
    //not complete for explore page
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
    //incomplete
    function newProfile() {
    echo "working - establish info on profile";
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
    echo "<li class='placesvisited'><a href='" . str_replace(" ", "-", $location) . "'>" . htmlspecialchars($location) . "</a></li>";
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
    function placesVideoVisited() {
    global $user;
    global $con;
    $stmt = $con->prepare("SELECT DISTINCT videolocation FROM posts WHERE userID = (SELECT userID FROM users WHERE username = ?) AND TRIM(videolocation) <> ''");
    if ($stmt) {
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $videoLocation = trim($row['videolocation']);
    if ($videoLocation !== "") {
    echo "<li class='placesvisited'><a href='" . str_replace(" ", "-", htmlspecialchars($videoLocation)) . "'>" . htmlspecialchars($videoLocation) . "</a></li>";
    }
    }
    } else {
    echo "You haven't post any videos yet!";
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
    echo "<li class='placesvisited'><a href='" . str_replace(" ", "-", htmlspecialchars($location)) . "'>" . htmlspecialchars($location) . "</a></li>";
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
    function otherplacesVideoVisited() {
    global $user;
    global $con;
    $currentuser = $currentuser;
    $sql = "SELECT DISTINCT videolocation
    FROM posts
    WHERE userID = (SELECT userID FROM users WHERE username = '$currentuser')
    AND TRIM(videolocation) <> ''";
    $result = $con->query($sql);
    if (!$result) {
    echo "Error: " . $con->error . "\n";
    return;
    }
    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    $videoLocation = trim($row['videolocation']);
    if ($videoLocation !== "") {
    echo "<li class='placesvisited'>
    <a href='" . str_replace(" ", "-", htmlspecialchars($videoLocation)) . "'>"
    . htmlspecialchars($videoLocation) .
    "</a>
    </li>";
    }
    }
    } else {
    echo "";
    }
    }
    //if not entered yet, prompts user to finish profile. if done, displays it
    function profile() {
    global $user;
    global $con;
    $bio  = $birthday = $city = $new_user = $create = "";
    // Build SQL query
    $sql  = "SELECT Bio,Birthday,HomeCity FROM profiles where userID = (select userID from users where username = '$user')";
    // Execute SQL query
    $result = $con->query($sql);
    if (!$result) {
    echo "Error: " . $con->error . "\n";
    }
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (empty($row['Bio']) && empty($row['Birthday']) && empty($row['HomeCity'])) {
    $new_user = "<h2>Welcome!</h2><br> <h5>Please fill out the following information to complete your profile.</h5><br>";
    $bio    = "<textarea name='blogtext' rows='10' placeholder='Biography' required></textarea><br><br>";
    $birthday = "<input type='date' name='birthday' value='" . $row['Birthday'] . "' required><br><br>";
    $city   = "<input type='text' class='my-input' name='city' tabindex='1' autocomplete='off' required>";
    echo "<div class='results'></div>";
    $create = "<center><input type='submit' class='login-group submit' name = 'userinfo-submit' value='Submit'></center>";
    echo "" . $new_user . "<form action='control' method='POST'><b>Bio:</b> " . $bio . "<b>Birthday:</b> " . $birthday . "<b>Home Town:</b> " . $city . $create . "</form>";
    } else {
    $bio    = $row['Bio'];
    $birthday   = $row['Birthday'];
    $city     = $row['HomeCity'];
    $dob    = new DateTime($birthday);
    $now    = new DateTime();
    $difference = $now->diff($dob);
    $age    = $difference->y;
    echo "<div class='bio'><i class='far fa-info-circle' aria-hidden='true'></i> " . $bio . "</div>";
    echo "<div class='age'><i class='far fa-birthday-cake' aria-hidden='true'></i> " . $age . " years old</div>";
    echo "<div class='city'><i class='far fa-home-alt' aria-hidden='true'></i> From " . $city . "</div>
  </div>";
  echo "
  <div id='changeHere'>
    <form method='post' action='control' enctype='multipart/form-data'>
    Change Profile Photo
    <input type='file' name='Filename' required>
    <br>
    <br>
    <button type='submit' name='profilePic'><i class='far fa-camera' aria-hidden='true'></i></button></form>
    <br>
    <form method='post' action='control' enctype='multipart/form-data'>
    Change Cover Photo
    <input type='file' name='Filename' required>
    <br>
    <br>
    <button type='submit' name='coverPic'><i class='far fa-camera' aria-hidden='true'></i></button></form>
    ";
    }
    } else {
    echo "you don't exist";
    }
    }
    //edit profile picture
    function profilePic() {
    global $user;
    global $con;
    $fileName    = $_FILES['Filename']['name'];
    $random_digit  = rand(0000, 9999);
    $new_file_name = $random_digit . $fileName;
    $target    = "/home/dzx0rrb61cz9/public_html/Images/prof_pics/";
    $fileTarget  = $target . $new_file_name;
    $tempFileName  = $_FILES["Filename"]["tmp_name"];
    $result    = move_uploaded_file($tempFileName, $fileTarget);
    /*
    *  If file was successfully uploaded in the destination folder
    */
    if ($result) {
    $query = "UPDATE users SET profilePic = '$fileTarget', picName = '$new_file_name' WHERE username = '$user'";
    $con->query($query) or die("Error : " . mysqli_error($con));
    header("location: my-profile");
    } else {
    echo "Sorry !!! There was an error in uploading your file";
    }
    mysqli_close($con);
    }
    //display profile picture
    function mycurrentprofpic() {
    global $user;
    global $con;
    // Build SQL query
    $sql     = "SELECT picName FROM users WHERE userID = (select userID from users where username = '$user')";
    // Execute SQL query
    $result    = $con->query($sql);
    if (!$result) {
    echo "Error: " . $con->error . "\n";
    }
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Images/prof_pics/" . $row['picName'];
    }
    }
    //edit profile picture
    function coverPic() {
    global $user;
    global $con;
    $fileName    = $_FILES['Filename']['name'];
    $random_digit  = rand(0000, 9999);
    $new_file_name = $random_digit . $fileName;
    $target    = "/home/dzx0rrb61cz9/public_html/Images/cover_pics/";
    $fileTarget  = $target . $new_file_name;
    $tempFileName  = $_FILES["Filename"]["tmp_name"];
    $result    = move_uploaded_file($tempFileName, $fileTarget);
    /*
    *  If file was successfully uploaded in the destination folder
    */
    if ($result) {
    $query = "UPDATE users SET coverPic = '$fileTarget', coverName = '$new_file_name' WHERE username = '$user'";
    $con->query($query) or die("Error : " . mysqli_error($con));
    header("location: my-profile");
    } else {
    echo "Sorry !!! There was an error in uploading your file";
    }
    mysqli_close($con);
    }
    //display profile picture
    // ==========================
    // COVER PHOTO
    // ==========================
    function currentcoverpic($currentuser = null) {
    global $con;
    // If not passed in, use URL param
    if (empty($currentuser)) {
    $currentuser = $_GET['currentuser'] ?? '';
    }
    // Fallback image if no username is found
    if (empty($currentuser)) {
    echo "Images/cover_pics/default_cover.jpg";
    return;
    }
    // Prepare and execute secure query
    $stmt = $con->prepare("
    SELECT coverName
    FROM users
    WHERE userID = (SELECT userID FROM users WHERE username = ?)
    ");
    $stmt->bind_param("s", $currentuser);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
    if (!empty($row['coverName'])) {
    echo "Images/cover_pics/" . htmlspecialchars($row['coverName']);
    } else {
    echo "Images/cover_pics/default_cover.jpg";
    }
    } else {
    echo "Images/cover_pics/default_cover.jpg";
    }
    $stmt->close();
    }
    // ==========================
    // PROFILE PHOTO
    // ==========================
    function currentprofpic($currentuser = null) {
    global $con;
    // Fallback: use URL param if not passed in
    if (empty($currentuser)) {
    $currentuser = $_GET['currentuser'] ?? '';
    }
    // Use a default image if no username found
    if (empty($currentuser)) {
    echo "Images/prof_pics/default_prof.jpg";
    return;
    }
    // Prepare and execute query
    $stmt = $con->prepare("
    SELECT picName
    FROM users
    WHERE userID = (SELECT userID FROM users WHERE username = ?)
    ");
    $stmt->bind_param("s", $currentuser);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
    if (!empty($row['picName'])) {
    echo "Images/prof_pics/" . htmlspecialchars($row['picName']);
    } else {
    echo "Images/prof_pics/default_prof.jpg";
    }
    } else {
    echo "Images/prof_pics/default_prof.jpg";
    }
    $stmt->close();
    }
    // ==========================
    // LIKE A POST
    // ==========================
    function like() {
    global $con, $user;
    // Get post ID from form
    $postID = $_POST['post_id'] ?? '';
    if (empty($postID) || empty($user)) {
    error_log("Like error: missing post_id or user.");
    return;
    }
    // Get userID for logged-in user
    $stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $userID = $row['userID'] ?? null;
    $stmt->close();
    if (empty($userID)) {
    error_log("Like error: could not find userID for $user.");
    return;
    }
    // Check if already liked
    $stmt = $con->prepare("SELECT * FROM likes WHERE userID = ? AND postID = ?");
    $stmt->bind_param("ii", $userID, $postID);
    $stmt->execute();
    $exists = $stmt->get_result()->num_rows > 0;
    $stmt->close();
    if ($exists) {
    // Unlike (toggle off)
    $stmt = $con->prepare("DELETE FROM likes WHERE userID = ? AND postID = ?");
    $stmt->bind_param("ii", $userID, $postID);
    $stmt->execute();
    $stmt->close();
    } else {
    // Like (toggle on)
    $stmt = $con->prepare("INSERT INTO likes (userID, postID) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $postID);
    $stmt->execute();
    $stmt->close();
    }
    // Redirect back
    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit;
    }
    function mycurrentcoverpic() {
    global $user;
    global $con;
    // Build SQL query
    $sql     = "SELECT coverName FROM users WHERE userID = (select userID from users where username = '$user')";
    // Execute SQL query
    $result    = $con->query($sql);
    if (!$result) {
    echo "Error: " . $con->error . "\n";
    }
    if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "Images/cover_pics/" . $row['coverName'];
    }
    }
    //remove photo from post
    function removePhotos() {
    global $user;
    global $con;
    $postID = $_POST['postID'];
    // Build SQL query
    $sql  = "DELETE FROM images WHERE postID ='$postID'";
    // Execute SQL query
    $result = $con->query($sql);
    if (!$result) {
    echo "Error: " . $con->error . "\n";
    }
    }
    //feed - only people you follow
    // ==========================
    // FOLLOW / UNFOLLOW BUTTON
    // ==========================
    function profileOption() {
    global $user, $con;
    if (!isset($_SESSION['username'])) {
    return; // Not logged in
    }
    // Get the username of the profile being viewed
    $currentuser = $_GET['currentuser'] ?? '';
    // Prevent self-follow
    if (empty($currentuser) || $currentuser === $user) {
    return;
    }
    // Check if already following
    $stmt = $con->prepare("
    SELECT 1
    FROM follows
    WHERE follower = (SELECT userID FROM users WHERE username = ?)
    AND followee = (SELECT userID FROM users WHERE username = ?)
    ");
    $stmt->bind_param("ss", $user, $currentuser);
    $stmt->execute();
    $result = $stmt->get_result();
    $isFollowing = $result->num_rows > 0;
    $stmt->close();
    // Output follow/unfollow + message buttons
    if ($isFollowing) {
    echo "<div class='followuser'>
    <form action='control.php' method='POST'>
    <input type='hidden' name='currentuser' value='" . htmlspecialchars($currentuser) . "'>
    <button type='submit' name='unfollow'><i class='far fa-user-minus'></i></button>
    </form>
  </div>";
  } else {
  echo "<div class='followuser'>
  <form action='control.php' method='POST'>
  <input type='hidden' name='currentuser' value='" . htmlspecialchars($currentuser) . "'>
  <button type='submit' name='follow'><i class='far fa-user-plus'></i></button>
  </form>
  </div>";
  }
  echo "<div class='messageuser'>
  <button>
  <a href='message.php?currentuser=" . htmlspecialchars($currentuser) . "'>
  <i class='far fa-envelope' aria-hidden='true'></i>
  </a>
  </button>
</div>";
}
// ==========================
// FOLLOW ANOTHER USER
// ==========================
function follow() {
global $user, $con;
$currentuser = $_POST['currentuser'] ?? '';
// Validate both usernames exist
if (empty($user) || empty($currentuser)) {
error_log("Follow error: missing user or currentuser.");
return;
}
// Get followee ID (the person being followed)
$stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
$followee = ($row = $result->fetch_assoc()) ? $row['userID'] : null;
$stmt->close();
// Get follower ID (the logged-in user)
$stmt = $con->prepare("SELECT userID FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$follower = ($row = $result->fetch_assoc()) ? $row['userID'] : null;
$stmt->close();
// If either ID is missing, stop
if (empty($follower) || empty($followee)) {
error_log("Follow error: one of the IDs is missing.");
return;
}
// Prevent duplicate follows
$stmt = $con->prepare("SELECT * FROM follows WHERE follower = ? AND followee = ?");
$stmt->bind_param("ii", $follower, $followee);
$stmt->execute();
$exists = $stmt->get_result()->num_rows > 0;
$stmt->close();
if ($exists) {
header("Location: {$_SERVER['HTTP_REFERER']}");
return;
}
// Insert follow record
$stmt = $con->prepare("INSERT INTO follows (follower, followee) VALUES (?, ?)");
$stmt->bind_param("ii", $follower, $followee);
if (!$stmt->execute()) {
error_log("Follow insert error: " . $stmt->error);
}
$stmt->close();
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
}
// ==========================
// UNFOLLOW A USER
// ==========================
function unfollow() {
global $user, $con;
$currentuser = $_POST['currentuser'] ?? '';
if (empty($user) || empty($currentuser)) {
error_log("Unfollow error: missing user or currentuser.");
return;
}
$stmt = $con->prepare("
DELETE FROM follows
WHERE follower = (SELECT userID FROM users WHERE username = ?)
AND followee = (SELECT userID FROM users WHERE username = ?)
");
$stmt->bind_param("ss", $user, $currentuser);
if (!$stmt->execute()) {
error_log("Unfollow error: " . $stmt->error);
}
$stmt->close();
header("Location: {$_SERVER['HTTP_REFERER']}");
exit;
}
// ==========================
// PROFILE FOLLOWER COUNT
// ==========================
function profileFollowers() {
global $con, $user;
$stmt = $con->prepare("
SELECT COUNT(follower) AS followerCount
FROM follows
WHERE followee = (SELECT userID FROM users WHERE username = ?)
");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
echo "<div class='nums'><h5><a href='followers.php?currentuser=" . htmlspecialchars($user) . "'>" .
$row['followerCount'] . " Followers</a></h5></div>";
}
$stmt->close();
}
// ==========================
// PROFILE FOLLOWING COUNT
// ==========================
function profileFollowees() {
global $con, $user;
$stmt = $con->prepare("
SELECT COUNT(followee) AS followingCount
FROM follows
WHERE follower = (SELECT userID FROM users WHERE username = ?)
");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
echo "<div class='nums'><h5><a href='following.php?currentuser=" . htmlspecialchars($user) . "'>" .
$row['followingCount'] . " Following</a></h5></div>";
}
$stmt->close();
}
//incomplete
function registration() {
global $con;
$username     = $_POST['username'];
$fullname     = $_POST['fullname'];
$email      = $_POST['email'];
$password     = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
}
//All profile of other users
//incomplete -- or not necessary
function test() {
global $user;
$currentuser = $currentuser;
echo $user;
echo $currentuser;
if ($user == $currentuser) {
echo "true";
} else {
echo "false";
}
}
//other user profiles -- cannot edit this personal info
function otherprofile() {
global $user;
global $con;
global $currentuser;
$bio = $birthday = $age = $city = "";
// Prepared statement to fetch profile data for viewed user
$stmt = $con->prepare("SELECT Bio, Birthday, HomeCity FROM profiles WHERE userID = (SELECT userID FROM users WHERE username = ?)");
if ($stmt) {
$stmt->bind_param("s", $currentuser);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
if (empty($row['Bio']) && empty($row['Birthday']) && empty($row['HomeCity'])) {
echo "<div class='bio'>This user has not yet completed their profile.</div>";
} else {
$bio = $row['Bio'];
$birthday = $row['Birthday'];
$city = $row['HomeCity'];
if (!empty($birthday)) {
$dob = new DateTime($birthday);
$now = new DateTime();
$difference = $now->diff($dob);
$age = $difference->y;
echo "<div class='age'><i class='far fa-birthday-cake' aria-hidden='true'></i> " . $age . " years old</div>";
}
echo "<div class='bio'><i class='far fa-info-circle' aria-hidden='true'></i> " . htmlspecialchars($bio) . "</div>";
if (!empty($city)) {
echo "<div class='city'><i class='far fa-home-alt' aria-hidden='true'></i> From " . htmlspecialchars($city) . "</div>";
}
}
}
$stmt->close();
} else {
echo "Error: " . $con->error . "\n";
}
}
/* ===============================
MESSAGING FUNCTIONS
=============================== */
if (!function_exists('getMessageReplyTarget')) {
function getMessageReplyTarget($replyid) {
global $con;
$stmt = $con->prepare("SELECT from_user FROM messages WHERE id = ?");
$stmt->bind_param("i", $replyid);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
return $row['from_user'];
}
return null;
}
}
if (!function_exists('sendMessageReply')) {
function sendMessageReply($to_user, $from_user, $message) {
global $con;
$stmt = $con->prepare("INSERT INTO messages (to_user, from_user, message, replied) VALUES (?, ?, ?, 'yes')");
$stmt->bind_param("sss", $to_user, $from_user, $message);
$ok = $stmt->execute();
$stmt->close();
return $ok;
}
}
// --- Send a new message ---
function sendMessage($to_user, $from_user, $message) {
global $con;
$stmt = $con->prepare("INSERT INTO messages (to_user, message, from_user) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $to_user, $message, $from_user);
if (!$stmt->execute()) {
error_log("❌ sendMessage() failed: " . $stmt->error);
return false;
}
$stmt->close();
return true;
}
// --- Reply to an existing message ---
function replyMessage($to_user, $from_user, $message, $row_id = null) {
global $con, $user;
if ($row_id) {
$stmt = $con->prepare("UPDATE messages SET replied = 'yes' WHERE id = ? AND to_user = ?");
$stmt->bind_param("is", $row_id, $user);
$stmt->execute();
$stmt->close();
}
return sendMessage($to_user, $from_user, $message);
}
function getUserProfileData($username) {
global $con;
// Detect which columns exist in the users table
$columns = [];
$result = $con->query("SHOW COLUMNS FROM users");
while ($row = $result->fetch_assoc()) {
$columns[] = strtolower($row['Field']);
}
// Desired columns in preferred order
$desired = ['firstname','lastname','email','bio','birthday','homecity','picName','coverName'];
// Keep only columns that actually exist
$available = array_filter($desired, function($c) use ($columns) {
return in_array(strtolower($c), $columns);
});
// Fall back to SELECT * if something unexpected happens
$select = empty($available) ? '*' : implode(',', $available);
$stmt = $con->prepare("SELECT $select FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
if ($row = $result->fetch_assoc()) {
return $row;
}
return null;
}
function updateUserProfile($username, $data) {
global $con;
// Get list of existing columns in `users` table
$columns = [];
$result = $con->query("SHOW COLUMNS FROM users");
while ($row = $result->fetch_assoc()) {
$columns[] = strtolower($row['Field']);
}
// Fields we *want* to update
$allowedFields = [
'firstname' => $data['firstname'] ?? null,
'lastname'  => $data['lastname'] ?? null,
'email'   => $data['email'] ?? null,
'birthday'  => $data['birthday'] ?? null,
'homecity'  => $data['homecity'] ?? null,
'bio'     => $data['bio'] ?? null,
];
// Only include fields that actually exist in the DB
$updateParts = [];
$values = [];
foreach ($allowedFields as $field => $value) {
if (in_array($field, $columns)) {
$updateParts[] = "$field = ?";
$values[] = $value;
}
}
// If no valid fields, skip entirely
if (empty($updateParts)) {
error_log("⚠️ updateUserProfile(): No valid columns found in 'users' table.");
return false;
}
// Build SQL
$sql = "UPDATE users SET " . implode(", ", $updateParts) . " WHERE username = ?";
$values[] = $username;
// Prepare dynamic binding
$types = str_repeat("s", count($values));
$stmt = $con->prepare($sql);
$stmt->bind_param($types, ...$values);
// Execute safely
if (!$stmt->execute()) {
error_log("❌ updateUserProfile(): " . $stmt->error);
return false;
}
$stmt->close();
return true;
}
function loadUserProfile($currentuser) {
global $con;
// Ensure session is active
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
// Verify login
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
header("location: login.php");
exit;
}
$user = $_SESSION['username'];
// If user is viewing their own profile, redirect
if ($user === $currentuser) {
header("location: my-profile.php");
exit;
}
// Get user info
$stmt = $con->prepare("SELECT firstname, lastname, authorized FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (!$row) {
header("location: login.php");
exit;
}
// Ensure authorized
if ((int)$row['authorized'] === 0) {
header("location: login.php");
exit;
}
return [
'username' => $user,
'firstname' => $row['firstname'],
'lastname' => $row['lastname']
];
}
function loadOtherUserProfile($currentuser) {
global $con;
// --- Ensure session is active ---
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
// --- Validate session ---
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
header("location: login.php");
exit;
}
$user = $_SESSION['username'];
// --- Prevent viewing own profile here ---
if ($user === $currentuser) {
header("location: my-profile.php");
exit;
}
// --- Check authorization of the current user ---
$stmt = $con->prepare("SELECT authorized FROM users WHERE username = ?");
$stmt->bind_param("s", $user);
$stmt->execute();
$authResult = $stmt->get_result()->fetch_assoc();
if (!$authResult || (int)$authResult['authorized'] === 0) {
header("location: login.php");
exit;
}
// --- Load the viewed user’s details ---
$stmt2 = $con->prepare("SELECT firstname, lastname FROM users WHERE username = ?");
$stmt2->bind_param("s", $currentuser);
$stmt2->execute();
$viewedResult = $stmt2->get_result()->fetch_assoc();
if (!$viewedResult) {
die("<p style='text-align:center;color:red;'>User not found.</p>");
}
return [
'logged_user'   => $user,
'viewed_user'   => $currentuser,
'firstname'   => $viewedResult['firstname'],
'lastname'    => $viewedResult['lastname']
];
}
  if (isset($_POST['searchppl'])) {
  $q     = trim($_POST["q"]);
  $response1 = "<ul><li>No results found</li></ul>";
  // Build SQL query
  $sql     = "SELECT username FROM users WHERE username LIKE '$q%'";
  // Execute SQL query
  $result  = $con->query($sql);
  if (!$result) {
  } else {
  if ($result->num_rows > 0) {
  $response1 = '<ul>';
  $response2 = '<ul>';
  // Loop through each result row
  while ($row = $result->fetch_assoc()) {
  $response1 .= "<li><a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a></li>";
  $response2 .= "<li><a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a></li>";
  }
  $response1 .= '</ul>';
  $response2 .= '</ul>';
  }
  exit($response1);
  }
  }
  if (isset($_REQUEST['allfeed'])) {
  allfeed();
  }
  if (isset($_POST['searchplace'])) {
  $q     = trim($_POST["q"]);
  $response3 = "<ul><li>No results found</li></ul>";
  // Build SQL query
  $sql     = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
  // Execute SQL query
  $result  = $con->query($sql);
  if (!$result) {
  } else {
  if ($result->num_rows > 0) {
  $response3 = '<ul>';
  // Loop through each result row
  while ($row = $result->fetch_assoc()) {
  $response3 .= "<li><a href='" . str_replace(" ", "-", $row['destinationName']) . ".php" . "'>" . $row['destinationName'] . "</a></li>";
  }
  $response3 .= '</ul>';
  }
  exit($response3);
  }
  }
  if (isset($_POST['searchplaceprof'])) {
  $q     = trim($_POST["q"]);
  $response3 = "<ul><li>No results found</li></ul>";
  // Build SQL query
  $sql     = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
  // Execute SQL query
  $result  = $con->query($sql);
  if (!$result) {
  } else {
  if ($result->num_rows > 0) {
  $response3 = '<ul>';
  // Loop through each result row
  while ($row = $result->fetch_assoc()) {
  $response3 .= "<li>" . $row['destinationName'] . "</li>";
  }
  $response3 .= '</ul>';
  }
  exit($response3);
  }
  }
  if (isset($_POST['destination'])) {
  $q    = trim($_POST["q"]);
  $response = "<ul><li>No results found</li></ul>";
  // Build SQL query
  $sql    = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
  // Execute SQL query
  $result   = $con->query($sql);
  if (!$result) {
  } else {
  if ($result->num_rows > 0) {
  $response = '<ul>';
  // Loop through each result row
  while ($row = $result->fetch_assoc()) {
  $response .= "<li>" . $row['destinationName'] . "</li>";
  }
  $response .= '</ul>';
  }
  exit($response);
  }
  }
  }
// Helpers
// ==========================
if (!function_exists('sd_safe_text')) {
  function sd_safe_text(?string $s): string {
  return nl2br(htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'));
  }
}
if (!function_exists('safe')) {
  function safe($v): string {
  return htmlspecialchars((string)($v ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
  }
}
if (!function_exists('renderEmptyFeed')) {
  function renderEmptyFeed(string $msg): void {
  echo "<div class='empty-feed'><p>{$msg}</p></div>";
  }
}
// Echoes: <div class="postcontenttop"> ...images... </div>
if (!function_exists('renderMediaImages')) {
  function renderMediaImages(int $postID): void {
  global $con;
  echo "<div class='postcontenttop'>";
  $stmt = $con->prepare("SELECT filename FROM images WHERE postID = ?");
  $stmt->bind_param("i", $postID);
  $stmt->execute();
  $res = $stmt->get_result();
  while ($img = $res->fetch_assoc()) {
    $fn = safe($img['filename']);
    echo "<div class='feedimg'><img loading='lazy' src='Images/{$fn}' class='object-fit_cover' alt='post image'></div>";
  }
  $stmt->close();
  echo "</div>";
  }
}
// Echoes: <div class="postcontenttop"> ...videos... </div>
if (!function_exists('renderMediaVideos')) {
  function renderMediaVideos(int $postID): void {
  global $con;
  echo "<div class='postcontenttop'>";
  $stmt = $con->prepare("SELECT filename FROM videos WHERE postID = ?");
  $stmt->bind_param("i", $postID);
  $stmt->execute();
  $res = $stmt->get_result();
  while ($v = $res->fetch_assoc()) {
    $fn = safe($v['filename']);
    echo "<div class='post-video'>
    <video playsinline muted preload='metadata' controls disablePictureInPicture controlsList='nodownload'>
      <source src='Videos/{$fn}#t=.1' type='video/mp4'>
    </video>
    </div>";
  }
  $stmt->close();
  echo "</div>";
  }
}
// Echoes the user header bar
if (!function_exists('renderUserHeader')) {
  function renderUserHeader(string $username, string $pic): void {
  $u = safe($username);
  $p = safe($pic !== '' ? $pic : 'default_prof.jpg');
  echo "<div class='feedPostTitle'>
    <a href='profile.php?currentuser={$u}'>
    <img src='Images/prof_pics/{$p}' alt='{$u}' class='post-user-pic'>
    </a>
    <b><a href='profile.php?currentuser={$u}'>@{$u}</a></b>
  </div>";
  }
}
// Echoes the details + likes (passes $liked to renderLikeButton only if provided)
// Optionally includes $actionsHtml at the end INSIDE .post-details (for own posts only)
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
  echo "<div class='post-details'>
    <div class='post-date'><i class='far fa-calendar'></i> {$date}</div>
    <div class='post-location'><i class='far fa-map-marker-alt'></i> {$location}</div>
    <div class='post-category'><i class='far fa-tag'></i> {$category}</div>
    <div class='post-content'>{$blogHtml}</div>
    <div class='post-likes'>";
  if (function_exists('renderLikeButton')) {
    if ($liked === null) {
    renderLikeButton($postID, $likes);
    } else {
    renderLikeButton($postID, $likes, $liked);
    }
  } else {
    echo "<i class='fa fa-heart-o'></i> {$likes}";
  }
  echo "</div>";
  // Actions go INSIDE .post-details for own posts
  if ($actionsHtml !== '') {
    echo "<div class='post-actions'>{$actionsHtml}</div>";
  }
  echo "</div>";
  }
}

// ====================================================================
// PROFILE: CURRENT USER POSTS (photos)
// ====================================================================
if (!function_exists('allPosts')) {
  function allPosts(): void {
  global $user, $con;
  $stmt = $con->prepare("
    SELECT p.*, u.username, u.picName
    FROM posts p
    JOIN users u ON u.userID = p.userID
    WHERE p.userID = (SELECT userID FROM users WHERE username = ?)
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
    $pic    = !empty($row['picName']) ? (string)$row['picName'] : (defined('DEFAULT_PROF') ? DEFAULT_PROF : 'default_prof.jpg');
    $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
    $date   = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['Location'] ?? '');
    $cat    = safe($row['category'] ?? '');
    $blog   = sd_safe_text($row['Blog']);
    // Actions HTML (inside .post-details)
    $actionsHtml = "
    <form method='POST' action='control.php'>
      <input type='hidden' name='postID' value='{$postID}'>
      <button type='button' class='edit-post-btn' data-postid='{$postID}' title='Edit'>
      <i class='far fa-edit'></i>
      </button>
      <button type='submit' name='delete' class='delete' title='Delete'>
      <i class='far fa-trash'></i>
      </button>
    </form>
    ";
    echo "<div class='postcontent'>";
    renderMediaImages($postID);
    renderUserHeader($username, $pic);
    renderPostDetails($date, $city, $cat, $blog, $postID, $likes, null, $actionsHtml);
    echo "</div>";
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
    SELECT p.*, u.username, u.picName
    FROM posts p
    JOIN users u ON u.userID = p.userID
    WHERE p.userID = (SELECT userID FROM users WHERE username = ?)
    AND p.videocategory IN ('stays','eats','events','adventures','vibes')
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
    $pic    = !empty($row['picName']) ? (string)$row['picName'] : (defined('DEFAULT_PROF') ? DEFAULT_PROF : 'default_prof.jpg');
    $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
    $date   = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['videolocation'] ?? '');
    $cat   = safe($row['videocategory'] ?? '');
    $blog   = sd_safe_text($row['Blog']);
    // Actions HTML (inside .post-details)
    $actionsHtml = "
    <form method='POST' action='control.php'>
      <input type='hidden' name='postID' value='{$postID}'>
      <button type='submit' name='delete' class='delete' title='Delete'>
      <i class='far fa-trash'></i>
      </button>
    </form>
    ";
    echo "<div class='postcontent'>";
    renderMediaVideos($postID);
    renderUserHeader($username, $pic);
    renderPostDetails($date, $city, $cat, $blog, $postID, $likes, null, $actionsHtml);
    echo "</div>";
  }
  $stmt->close();
  }
}
// ====================================================================
// GLOBAL FEED — All Users' Posts (photos)
// ====================================================================
if (!function_exists('all_feed')) {
  function all_feed(): void {
  global $con;
  $stmt = $con->prepare("
    SELECT p.*, u.username, u.picName
    FROM posts p
    JOIN users u ON p.userID = u.userID
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
    $pic    = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
    $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
    $date   = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['Location'] ?? '');
    $cat    = safe($row['category'] ?? '');
    $blog   = sd_safe_text($row['Blog']);
    echo "<div class='postcontent'>";
    renderMediaImages($postID);
    renderUserHeader($username, $pic);
    renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
    echo "</div>";
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
    SELECT p.*, u.username, u.picName
    FROM posts p
    JOIN users u ON p.userID = u.userID
    WHERE p.category IN ('stays','eats','events','adventures','vibes') AND
      p.userID IN (
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
    $pic    = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
    $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
    $date   = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['Location'] ?? '');
    $cat    = safe($row['category'] ?? '');
    $blog   = sd_safe_text($row['Blog']);
    echo "<div class='postcontent'>";
    renderMediaImages($postID);
    renderUserHeader($username, $pic);
    renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
    echo "</div>";
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
    SELECT p.*, u.username, u.picName
    FROM posts p
    JOIN users u ON p.userID = u.userID
    WHERE p.videocategory IN ('stays','eats','events','adventures','vibes') AND
      p.userID IN (
        SELECT followee FROM follows
        WHERE follower = (SELECT userID FROM users WHERE username = ?)
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
    $pic    = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
    $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
    $date   = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['videolocation'] ?? '');
    $cat   = safe($row['videocategory'] ?? '');
    $blog   = sd_safe_text($row['Blog']);
    echo "<div class='postcontent'>";
    renderMediaVideos($postID);
    renderUserHeader($username, $pic);
    renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
    echo "</div>";
  }
  $stmt->close();
  }
}
// ====================================================================
// GLOBAL PHOTOS FEED (WITH PROFILE PICTURES)
// ====================================================================
if (!function_exists('all_Photos')) {
  function all_Photos(): void {
  global $con;
  $stmt = $con->prepare("
    SELECT p.*, u.username, u.picName
    FROM posts p
    JOIN users u ON p.userID = u.userID
    WHERE p.category IN ('stays','eats','events','adventures','vibes')
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
    $pic    = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
    $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
    $date   = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['Location'] ?? '');
    $cat    = safe($row['category'] ?? '');
    $blog   = sd_safe_text($row['Blog']);
    echo "<div class='postcontent'>";
    renderMediaImages($postID);
    renderUserHeader($username, $pic);
    renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
    echo "</div>";
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
    SELECT p.*, u.username, u.picName
    FROM posts p
    JOIN users u ON p.userID = u.userID
    WHERE p.videocategory IN ('stays','events','adventures','eats','vibes')
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
    $pic    = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
    $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
    $date   = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['videolocation'] ?? '');
    $cat   = safe($row['videocategory'] ?? '');
    $blog   = sd_safe_text($row['Blog']);
    echo "<div class='postcontent'>";
    renderMediaVideos($postID);
    renderUserHeader($username, $pic);
    renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
    echo "</div>";
  }
  $stmt->close();
  }
}
// ====================================================================
// PROFILE: ALL OTHER POSTS (viewing someone else) — photos
// ====================================================================
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
      SELECT p.PostID AS post_id, p.Blog AS content, p.Location, p.videolocation,
             p.category, p.videocategory, p.Last_Modified, u.username, u.picName
      FROM posts p
      JOIN users u ON u.userID = p.userID
      WHERE u.username = ?
        AND p.category IN ('stays','eats','events','adventures','vibes')
      ORDER BY p.Last_Modified DESC
    ");
    $stmt->bind_param("s", $currentuser);
    $stmt->execute();
    $result = $stmt->get_result();

    $viewerID = function_exists('getCurrentUserId') ? getCurrentUserId() : null;

    if ($result->num_rows === 0) {
      renderEmptyFeed("@" . safe($currentuser) . " hasn't posted in these categories yet.");
      $stmt->close();
      return;
    }

    while ($row = $result->fetch_assoc()) {
      $postID   = (int)$row['post_id'];
      $likes    = function_exists('getLikesCount') ? (int)getLikesCount($postID) : 0;
      $liked    = ($viewerID && function_exists('hasUserLiked')) ? hasUserLiked($postID, $viewerID) : false;
      $date     = date("F d, Y", strtotime($row['Last_Modified']));
      $username = (string)$row['username'];
      $pic      = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
      $city     = safe($row['Location'] ?? '');
      $cat      = safe($row['category'] ?? '');
      $blog     = sd_safe_text($row['content']);

      echo "<div class='postcontent'>";
      renderMediaImages($postID);
      renderUserHeader($username, $pic);
      renderPostDetails($date, $city, $cat, $blog, $postID, $likes, $liked);
      echo "</div>";
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
      SELECT p.PostID AS post_id, p.Blog AS content, p.Location, p.videolocation,
             p.category, p.videocategory, p.Last_Modified, u.username, u.picName
      FROM posts p
      JOIN users u ON u.userID = p.userID
      WHERE u.username = ?
        AND p.videocategory IN ('stays','eats','events','adventures','vibes')
      ORDER BY p.Last_Modified DESC
    ");
    $stmt->bind_param("s", $currentuser);
    $stmt->execute();
    $result = $stmt->get_result();

    $viewerID = function_exists('getCurrentUserId') ? getCurrentUserId() : null;

    if ($result->num_rows === 0) {
      renderEmptyFeed("@" . safe($currentuser) . " hasn’t posted any videos yet.");
      $stmt->close();
      return;
    }

    while ($row = $result->fetch_assoc()) {
      $postID   = (int)$row['post_id'];
      $likes    = function_exists('getLikesCount') ? (int)getLikesCount($postID) : 0;
      $liked    = ($viewerID && function_exists('hasUserLiked')) ? hasUserLiked($postID, $viewerID) : false;
      $date     = date("F d, Y", strtotime($row['Last_Modified']));
      $username = (string)$row['username'];
      $pic      = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
      $city     = safe($row['videolocation'] ?? '');
      $cat      = safe($row['videocategory'] ?? '');
      $blog     = sd_safe_text($row['content']);

      echo "<div class='postcontent'>";
      renderMediaVideos($postID);
      renderUserHeader($username, $pic);
      renderPostDetails($date, $city, $cat, $blog, $postID, $likes, $liked);
      echo "</div>";
    }

    $stmt->close();
  }
}



// ====================================================================
// GENERIC CITY RENDERERS
// ====================================================================
if (!function_exists('renderCityPosts')) {
  function renderCityPosts(string $city): void {
    global $con;
    $stmt = $con->prepare("
      SELECT p.*, u.username, u.picName
      FROM posts p
      JOIN users u ON p.userID = u.userID
      WHERE p.Location = ?
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
      $pic      = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
      $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
      $date     = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['Location'] ?? '');
    $cat    = safe($row['category'] ?? '');
      $blog     = sd_safe_text($row['Blog']);
      echo "<div class='postcontent'>";
      renderMediaImages($postID);
      renderUserHeader($username, $pic);
      renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
      echo "</div>";
    }
    $stmt->close();
  }
}

if (!function_exists('renderCityVideos')) {
  function renderCityVideos(string $city): void {
    global $con;
    $stmt = $con->prepare("
      SELECT p.*, u.username, u.picName
      FROM posts p
      JOIN users u ON p.userID = u.userID
      WHERE p.videolocation = ?
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
      $pic      = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
      $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
      $date     = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['videolocation'] ?? '');
    $cat   = safe($row['videocategory'] ?? '');
      $blog     = sd_safe_text($row['Blog']);
      echo "<div class='postcontent'>";
      renderMediaVideos($postID);
      renderUserHeader($username, $pic);
      renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
      echo "</div>";
    }
    $stmt->close();
  }
}
// ====================================================================
// GENERIC CATEGORY RENDERERS
// ====================================================================
if (!function_exists('renderCategoryPosts')) {
  function renderCategoryPosts(string $category): void {
    global $con;
    $stmt = $con->prepare("
      SELECT p.*, u.username, u.picName
      FROM posts p
      JOIN users u ON p.userID = u.userID
      WHERE p.category = ?
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
      $postID    = (int)$row['PostID'];
      $username  = (string)$row['username'];
      $pic       = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
      $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
      $date      = date("F d, Y", strtotime($row['Last_Modified']));
      $location  = safe($row['Location'] ?? '');
      $cat       = safe($row['category'] ?? '');
      $blog      = sd_safe_text($row['Blog']);
      echo "<div class='postcontent'>";
      renderMediaImages($postID);
      renderUserHeader($username, $pic);
      renderPostDetails($date, $location, $cat, $blog, $postID, $likes);
      echo "</div>";
    }
    $stmt->close();
  }
}

if (!function_exists('renderCategoryVideos')) {
  function renderCategoryVideos(string $category): void {
    global $con;
    $stmt = $con->prepare("
      SELECT p.*, u.username, u.picName
      FROM posts p
      JOIN users u ON p.userID = u.userID
      WHERE p.videocategory = ?
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
      $pic      = !empty($row['picName']) ? (string)$row['picName'] : 'default_prof.jpg';
      $likes = 0;
  $like_stmt = $con->prepare("SELECT COUNT(*) AS like_count FROM post_likes WHERE post_id = ?");
  $like_stmt->bind_param("i", $postID);
  $like_stmt->execute();
  $like_result = $like_stmt->get_result();
  if ($like_row = $like_result->fetch_assoc()) {
    $likes = (int)$like_row['like_count'];
  }
  $like_stmt->close();
      $date     = date("F d, Y", strtotime($row['Last_Modified']));
    $city   = safe($row['videolocation'] ?? '');
    $cat   = safe($row['videocategory'] ?? '');
      $blog     = sd_safe_text($row['Blog']);
      echo "<div class='postcontent'>";
      renderMediaVideos($postID);
      renderUserHeader($username, $pic);
      renderPostDetails($date, $city, $cat, $blog, $postID, $likes);
      echo "</div>";
    }
    $stmt->close();
  }
}

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
function all_New_York_City(): void { renderCityPosts('New York'); }
}
if (!function_exists('all_New_York_City_Videos')) {
function all_New_York_City_Videos(): void { renderCityVideos('New York'); }
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
function all_Moscow(): void { renderCityPosts('Dublin'); }
}
if (!function_exists('all_Moscow_Videos')) {
function all_Moscow_Videos(): void { renderCityVideos('Dublin'); }
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