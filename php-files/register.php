<?php
require_once 'functions.php';
$username = $firstname = $lastname = $email = $password = $confirm_password = "";
$username_err = $firstname_err = $lastname_err = $email_err = $password_err = $confirm_password_err = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
// --- reCAPTCHA v3 verification ---
$recaptcha_secret = '6Lda9fsrAAAAAKzLl8rFTV4xX9jZs3ES9n9YsXpe';
$recaptcha_response = $_POST['recaptcha_response'] ?? '';
$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}");
$responseData = json_decode($verify);
if (!$responseData->
success || $responseData->
score < 0.1) {
die("<p style='color:red;text-align:center;'>
reCAPTCHA verification failed. Please try again.</p>
");
}
// --- Continue registration if CAPTCHA passed ---
$result = register_user($_POST);
if ($result['success']) {
header("Location: success.php");
exit;
} else {
extract($result['errors']);
$username = $_POST['username'] ?? '';
$firstname = $_POST['firstname'] ?? '';
$lastname = $_POST['lastname'] ?? '';
$email = $_POST['email'] ?? '';
}
}
$title = "Register | Social Destinations";      // (1) Set the title
$description = 'Register';           // (2) Set the description
$city = 'Calgary';                  // (3) Set the city
$keywords = 'Register, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
$description = 'Discover Social Destinations';
$activePage = 'about';
$currentcolor = '#4a90e2';
include "header.php";
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden">
</iframe>
<script src="https://www.google.com/recaptcha/api.js" async defer>
</script>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
          <div class="layout-two-col">

  <div class="rightside">
    <div class="login">
      <div class="login-title">
        <h1>
        Register</h1></div>
        <div class="login-form">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>
          " method="post">
<input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required>
<span><?php echo $username_err; ?></span>

<input type="text" name="firstname" placeholder="First Name" value="<?php echo htmlspecialchars($firstname); ?>" required>
<span><?php echo $firstname_err; ?></span>
<input type="text" name="lastname" placeholder="Last Name" value="<?php echo htmlspecialchars($lastname); ?>" required>
<span><?php echo $lastname_err; ?></span>
          <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>
          " required>
          <span>
          <?php echo $email_err; ?>
          </span>
          <input type="password" name="password" placeholder="Password" required>
          <span>
          <?php echo $password_err; ?>
          </span>
          <input type="password" name="confirm_password" placeholder="Confirm Password" required>
          <span>
          <?php echo $confirm_password_err; ?>
          </span>
          <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
          <button type="submit" class="login-group submit">
          Register</button>
          </form>
          <p>
          <a href="login.php">
          Already have an account? Login here</a>
          </p></div>
        </div>
      </div>
      <div class="leftside">
        <div class="info-login">
          <h1>
          Welcome</h1>
          <h2>
          Already made an account</h2>
          <a href="login.php">
          <button class="info-login-group submit">
          Sign In</button>
          </a></div>
        </div>
      </div>
      </div>
      <style>
      span { color:red; font-size:0.9em; }
      nav {
      display: none;
      }
      </style>
      <!-- reCAPTCHA v3 -->
      <script src="https://www.google.com/recaptcha/api.js?render=6Lda9fsrAAAAAOLItKSXLfcwJNHcG6i_pqYe2pfY">
      </script>
      <script>
      grecaptcha.ready(function() {
      grecaptcha.execute('6Lda9fsrAAAAAOLItKSXLfcwJNHcG6i_pqYe2pfY', {action: 'register'}).then(function(token) {
      document.getElementById('recaptchaResponse').value = token;
      });
      });
      </script>
      </body>
      </html>