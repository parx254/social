<?php
  include ('control.php');
  include ('functions.php');
  // Initialize the session
  session_set_cookie_params(3600, "/", "localhost", false, false);
  session_start();
  // If session variable is not set it will redirect to login page
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: registration.php");
    exit;
  }
  $hashed = $_GET['hash'];
  if (sha1($_SESSION['email'] . $_SESSION['username']) == $hashed){
  	require_once 'config.php';
  	$sql = "UPDATE users SET authorized=1 WHERE username=?";
  	if($stmt = mysqli_prepare($con, $sql)){
                  mysqli_stmt_bind_param($stmt, "s", $param_username);
                  $param_username = $_SESSION['username'];
          if(mysqli_stmt_execute($stmt)){
          		session_destroy();
                  header("location: login.php");
              } else{
                  echo "Something went wrong. Please try again later.";
                  session_destroy();
              }
  } mysqli_stmt_close($stmt);mysqli_close($con);
  	}else{ 
  	echo "<div class='login'>You're almost done! Please check your email to verify your account.</div>";
  	}
  ?>
<html lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NBS5FHD');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131583482-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'UA-131583482-4');
    </script>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify | Social Destinations</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="/js/myscript.js"></script>
    <script>
      var city = "Atlanta";
    </script>
    <style>
      @media(max-width:900px){nav{border-bottom:1px solid #f5f5f5;height:50px;position:static;z-index:1;top:0}#toggle .span{background:#000}}
      @media(min-width:901px){nav{background: #000;position:static}}
    </style>
  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper"></div>
  </body>
  <?php footer(); ?>
  <script src="/js/script.js"></script> 
</html>