<?php
  require_once 'config.php';
  include ('control.php');
  include ('functions.php');
  $username = $password = "";
  $username_err = $password_err = $login_err = "";
  $hour = time() + 3600;
  setcookie('ID_my_site', $_POST['username'], $hour);
  $year = time() + 31536000;
  setcookie('remember_me', $_POST['username'], $year);
  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $year = time() + 31536000;
  setcookie('remember_me', $_POST['username'], $year);
  $sql = "SELECT username, firstname, password, authorized FROM users WHERE username = '$username'";
  $result = $con->query($sql);
  if($_POST['remember']) {
  setcookie('remember_me', $_POST['username'], $year);
  }
  elseif(!$_POST['remember']) {
  if(isset($_COOKIE['remember_me'])) {
    $past = time() - 100;
    setcookie(remember_me, gone, $past);
  }
  }
          if (!$result){
                  echo "Error: " . mysql_error() . "\n";
          }
          if ($result->num_rows > 0){
          $row = $result->fetch_assoc();
          if(password_verify($password, $row['password'])){
            if($row['authorized']==1){
              session_start();
                              $_SESSION['username'] = $username;
                              $_SESSION['firstname'] = $row['firstname'];
                              header("location: my-profile.php");
              }else{
              $login_err = "Please verify your account and try again!";
              }
          } else {
            $password_err = "password is incorrect";
          }
          }else{
          $username_err = "This username has not been registered";
          }
  } 
  ?>
<html lang="en">
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
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Social Destinations</title>
    <link rel="stylesheet" href="/css/style.php">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css"></script>
    <script>
        var city = "Nashville";
    </script>
    <style>
        @media(max-width:900px) {
            nav {
                border-bottom: 1px solid #f5f5f5;
                height: 50px;
                position: static;
                z-index: 1;
                top: 0
            }
            #toggle .span {
                background: #000
            }
        }
        @media(min-width:901px) {
            nav {
                background: #000;
                position: static
            }
        }
        body {
            background: #000
        }
    </style>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
        <div class="rightside">
            <div class="login">
                <div class="logintitle">
                    <h1>Sign In</h1>
                </div>
                <div class='fill'>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="text" name="username" placeholder="Enter your username" onkeyup="return forceLower(this);" value="<?php echo $_COOKIE['remember_me']; ?>" required>
                        <span><?php echo $username_err; ?></span><br>
                        <input type="password" placeholder="Enter your password" name="password" required>
                        <span><?php echo $password_err; ?></span><br>
                        <span style="color:red"><?php echo $login_err; ?></span>
                </div>
                <button type="submit" class="login-group submit">Login</button><br>
                </form>
                <p><a href="forgot-password.php">Forgot your password?</a></p>
                <p><a href="register.php">Create an account</a></p>
            </div>
        </div>
        <div class="leftside">
            <div class="infologin">
                <h1>Welcome</h1>
                <h2>Haven't made an account</h2>
                <a href="register.php"><button class="info-login-group submit">Register</button></a>
            </div>
        </div>
    </div>
</body>
<script src="/js/script.js"></script>
</html>
