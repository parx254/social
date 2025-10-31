<?php
require_once 'config.php';
require_once 'functions.php';

$username = $firstname = $lastname = $email = $password = $confirm_password = "";
$username_err = $firstname_err = $lastname_err = $email_err = $password_err = $confirm_password_err = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // --- reCAPTCHA v3 verification ---
    $recaptcha_secret = '6Lda9fsrAAAAAKzLl8rFTV4xX9jZs3ES9n9YsXpe';
    $recaptcha_response = $_POST['recaptcha_response'] ?? '';

    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}");
    $responseData = json_decode($verify);

    if (!$responseData->success || $responseData->score < 0.1) {
        die("<p style='color:red;text-align:center;'>reCAPTCHA verification failed. Please try again.</p>");
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
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Social Destinations</title>
  <link rel="stylesheet" href="/css/style.php">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <script>
    var city = "Nashville";
  </script>
  <script>
    $(document).ready(function() {
      let pageLoadTime = Date.now();
      $("#loadTime").val(pageLoadTime);
      $("form").submit(function(event) {
        let currentTime = Date.now();
        let timeSpent = (currentTime - pageLoadTime) / 1000;
        if (timeSpent < 0.5) {
          event.preventDefault();
          alert("Bot detected. Please spend more time before submitting.");
        }
      });
    });
  </script>
<!-- reCAPTCHA v3 -->
<script src="https://www.google.com/recaptcha/api.js?render=6Lda9fsrAAAAAOLItKSXLfcwJNHcG6i_pqYe2pfY"></script>
<script>
grecaptcha.ready(function() {
  grecaptcha.execute('6Lda9fsrAAAAAOLItKSXLfcwJNHcG6i_pqYe2pfY', {action: 'register'}).then(function(token) {
    document.getElementById('recaptchaResponse').value = token;
  });
});
</script>
  <style>
    body { background: #000; color: #fff; }
    span { color:red; font-size:0.9em; }

    #registerBtn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    @media(max-width:900px) {
      nav {
        border-bottom: 1px solid #f5f5f5;
        height: 50px;
        position: static;
        z-index: 1;
        top: 0;
      }
      #toggle .span { background: #000; }
    }
    @media(min-width:901px) {
      nav { background: #000; position: static; }
    }
  </style>
</head>
<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->

  <div id="wrapper">
    <div class="rightside">
      <div class="login">
        <div class="logintitle">
          <h1>Register</h1>
        </div>
        <div class="fill">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" id="loadTime" name="loadTime">

            <input type="text" name="username" placeholder="Username" value="<?php echo htmlspecialchars($username); ?>" required>
            <span><?php echo $username_err; ?></span>

            <input type="text" name="firstname" placeholder="First Name" value="<?php echo htmlspecialchars($firstname); ?>" required>
            <span><?php echo $firstname_err; ?></span>

            <input type="text" name="lastname" placeholder="Last Name" value="<?php echo htmlspecialchars($lastname); ?>" required>
            <span><?php echo $lastname_err; ?></span>

            <input type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($email); ?>" required>
            <span><?php echo $email_err; ?></span>

            <input type="password" name="password" placeholder="Password" required>
            <span><?php echo $password_err; ?></span>

            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            
            <span><?php echo $confirm_password_err; ?></span>

<input type="hidden" name="recaptcha_response" id="recaptchaResponse">


            <button type="submit" id="registerBtn" class="login-group submit">Register</button>
          </form>
          <p><a href="login.php">Already have an account? Login here</a></p>
        </div>
      </div>
    </div>

    <div class="leftside">
      <div class="infologin">
        <h1>Welcome</h1>
        <h2>Already made an account</h2>
        <a href="login.php"><button class="info-login-group submit">Sign In</button></a>
      </div>
    </div>
  </div>



</body>
</html>
