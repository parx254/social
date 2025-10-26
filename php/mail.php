<?php
  include ('control.php');
  include ('functions.php');
  // Initialize the session
  session_set_cookie_params(3600, "/", "localhost", false, false);
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  }
  $fname = $_SESSION['firstname'];
  $varusername = $_SESSION['username'];
  $to = $_SESSION['email'];
  $subject = "Verify Account";
  $hash = sha1($to . $varusername);
  $message = "Hi {$fname}, you are almost done. 
  Your verification link is: https://socialdestinations.com/verify.php?hash={$hash} 
  This link will take you to our log in page after your account is authorized, where you can then enter your credentials and begin your journey with Social Destinations.
  Thanks for joining, we're so glad you're here!
  Best Regards,
  The Social Destinations Team 
  *You must be in the same session in order to verify your account with your email.";
  $message = wordwrap($message, 70, "\r\n");
  if (@mail($to, $subject, $message))
  {
  session_set_cookie_params(3600, "/", "localhost", false, false);
  session_start();
  $_SESSION['username'] = $varusername;
  $_SESSION['email'] = $to;
  //$_SESSION['hash'] = $hash;
  header("location: verify.php");
  }
  else{
  echo "Mail failed: Try again later!";
  }
  ?>
<html>
<head>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-NBS5FHD');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131583482-4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-131583482-4');
    </script>
    <link rel="stylesheet" href="main.css">
</head>
<?php nav(); ?>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>
</html>