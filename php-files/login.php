<?php
require_once 'functions.php';
require_once 'control.php';
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
$username = $password = "";
$username_err = $password_err = $login_err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = trim($_POST['username']);
$password = $_POST['password'];
$login = login_user($username, $password);
if ($login['success']) {
header("Location: my-profile.php");
exit;
} else {
$login_err = $login['error'];
}
}
// Page meta
$title = "Login | Social Destinations";
$activePage = 'home';
$city = 'Amsterdam';
$keywords = 'Login, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';
$description = 'Login to Social Destinations';
$currentcolor = '#4a90e2';
include "header.php";
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
      <div class="layout-two-col">
  <div class="rightside">
    <div class="login">
      <div class="login-title">
        <h1>Sign In</h1>
      </div>
      <div class='login-form'>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" name="username" placeholder="Username" onkeyup="return forceLower(this);" required>
        <span><?php echo $username_err; ?></span>
        <input type="password" placeholder="Password" name="password" required>
        <span><?php echo $password_err; ?></span>
        <span style="color:red"><?php echo $login_err; ?></span>
      </div>
      <button type="submit" class="login-group submit">Login</button>
      </form>
      <p><a href="forgot-password.php">Forgot your password?</a></p>
      <p><a href="register.php">Create an account</a></p>
    </div>
  </div>
  <div class="leftside">
    <div class="info-login">
      <h1>Welcome</h1>
      <h2>Haven't made an account</h2>
      <a href="register.php"><button class="info-login-group submit">Register</button></a>
    </div>
  </div>
</div>
</div>
  <style>
      span { color:red; font-size:0.9em; }
      nav {
      display: none;
      }
      </style>
</body>
<script src="/js/script.js"></script>
</html>