<?php
require_once 'functions.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$email = trim($_POST['email']);
if (empty($email)) {
$error = "Please enter your email address.";
} else {
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($conn->
connect_error) die("Connection failed: " . $conn->
connect_error);
// Check if user exists
$stmt = $conn->
prepare("SELECT userID, username FROM users WHERE email = ?");
$stmt->
bind_param("s", $email);
$stmt->
execute();
$result = $stmt->
get_result();
if ($row = $result->
fetch_assoc()) {
$username = $row['username'];
$token = bin2hex(random_bytes(32));
$expires = date("U") + 10800; // 3 hours
// Save token & mark unauthorized
$stmt = $conn->
prepare("UPDATE users SET vkey = ?, authorized = 0 WHERE email = ?");
$stmt->
bind_param("ss", $token, $email);
$stmt->
execute();
// Track reset in table
$conn->
query("DELETE FROM password_resets WHERE email = '$email'");
$stmt2 = $conn->
prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
$stmt2->
bind_param("sss", $email, $token, $expires);
$stmt2->
execute();
// Send email using helper
if (send_password_reset_email($email, $username, $token)) {
$success = "A password reset link has been sent to your email.";
} else {
$error = "Email could not be sent. Please try again later.";
}
} else {
$error = "No account found with that email.";
}
$stmt->
close();
$conn->
close();
}
}
$title = "Forgot Password | Social Destinations";      // (1) Set the title
$description = 'Forgot Password';           // (2) Set the description
$city = 'Calgary';                  // (3) Set the city
$keywords = 'Forgot, Password, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
$description = 'Discover Social Destinations';
$activePage = 'about';
$currentcolor = '#4a90e2';
include "header.php";
?>
<body>
<div id="wrapper">
          <div class="layout-two-col">

  <div class="rightside">
    <div class="login">
      <div class="login-title">
        <h1>
        Forgot Password</h1></div>
        <?php if (!empty($error)) echo "<p style='color:red;'>
        $error</p>
        "; ?>
        <?php if (!empty($success)) echo "<p style='color:green;'>
        $success</p>
        "; ?>
        <div class="login-form">
          <form method="POST" action="">
          <input type="email" name="email" placeholder="Email" required>
          <button type="submit" class="login-group submit">
          Send Reset Link</button>
          </form></div>
        </div>
      </div>
      <div class="leftside">
        <div class="info-login">
          <h1>
          Welcome</h1>
          <h2>
          Haven't made an account</h2>
          <a href="register.php">
          <button class="info-login-group submit">
          Register</button>
          </a></div>
        </div>
      </div>
      </div>
      <style>
      span { color:red; font-size:0.9em; }
      nav {
      display: none;
      }
      #toggle .span { background: #000; }
      }
      </style>
      </body>
      </html>