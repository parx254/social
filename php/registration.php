<?php
require_once 'config.php';
include 'control.php';
include 'functions.php';
$username = $firstname = $lastname = $email = $password = $confirm_password = "";
$username_err = $firstname_err = $lastname_err = $email_err  = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Bot detection based on time spent on page
    if (isset($_POST['loadTime'])) {
        $loadTime = $_POST['loadTime'];
        $currentTime = round(microtime(true) * 1000);
        $timeSpent = ($currentTime - $loadTime) / 1000;
        if ($timeSpent < 2) {
            die("Bot detected! Please try again.");
        }
    }
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "<br><i>Please enter a username</i>";
    } else {
        // Prepare a select statement
        $sql = "SELECT userID FROM users WHERE username = ?";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "<br><i>*This username is already taken</i>";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    // Validate firstname
    if (empty(trim($_POST['firstname']))) {
        $firstname_err = "<br><i>Please enter your first name</i>";
    } else {
        $firstname = trim($_POST['firstname']);
    }
    // Validate lastname
    if (empty(trim($_POST['lastname']))) {
        $lastname_err = "<br><i>Please enter your last name</i>";
    } else {
        $lastname = trim($_POST['lastname']);
    }
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "<br><i>Please enter an email</i>";
    } else {
        $sql = "SELECT userID FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "<br><i>***This email is already associated with an account</i>";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "<br><i>Please enter a password</i>";
    } else {
        $password = trim($_POST['password']);
    }
    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = '<br><i>Please confirm password</i>';
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if ($password != $confirm_password) {
            $confirm_password_err = '<br><i>*Password did not match</i>';
        }
    }
    // Check input errors before inserting in database
    if (empty($username_err) && empty($firstname_err) && empty($lastname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {
        $sql = "INSERT INTO users (username, firstname, lastname, password, authorized, email) VALUES (?, ?, ?, ?, 1, ?)";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_firstname, $param_lastname, $param_password, $param_email);
            $param_username = $username;
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $param_email = $email;
            if (mysqli_stmt_execute($stmt)) {
                $sql2 = "INSERT INTO profiles (userID) SELECT userID FROM users WHERE username = ?";
                if ($stmt2 = mysqli_prepare($con, $sql2)) {
                    mysqli_stmt_bind_param($stmt2, "s", $param_username);
                    $param_username = $username;
                    if (mysqli_stmt_execute($stmt2)) {
                        session_start();
                        $_SESSION['username'] = $username;
                        $_SESSION['firstname'] = $firstname;
                        $_SESSION['lastname'] = $lastname;
                        $_SESSION['email'] = $email;
                        header("location: index.php");
                        exit;
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }
                    mysqli_stmt_close($stmt2);
                } else {
                    echo "Something went wrong. Please try again later.";
                }
            } else {
                echo "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
    mysqli_close($con);
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-131583482-4');
    </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            let pageLoadTime = Date.now();
            $("#loadTime").val(pageLoadTime);
            $("form").submit(function (event) {
                let currentTime = Date.now();
                let timeSpent = (currentTime - pageLoadTime) / 1000;
                if (timeSpent < 0.5) {
                    event.preventDefault();
                    alert("Bot detected: Please spend more time on the page before submitting.");
                }
            });
        });
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
    <title>Register | Social Destinations</title>
    <link rel="stylesheet" href="/css/style.php">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css">
    <script src="/js/myscript.js"></script>
    <script>
        var city = "Nashville";
    </script>
        <script>
        $(document).ready(function () {
            let pageLoadTime = Date.now();
            $("#loadTime").val(pageLoadTime);
            $("form").submit(function (event) {
                let currentTime = Date.now();
                let timeSpent = (currentTime - pageLoadTime) / 1000;
                if (timeSpent < 0.5) {
                    event.preventDefault();
                    alert("Bot detected: Please spend more time on the page before submitting.");
                }
            });
        });
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
                    <input type="text" placeholder="Enter your username" name="username" minlength="2" maxlength="20" onkeyup="return forceLower(this);" value="<?php echo htmlspecialchars($username); ?>" required>
                    <span><?php echo htmlspecialchars($username_err); ?></span><br>
                    <input type="text" placeholder="Enter your first name" name="firstname" minlength="1" maxlength="30" value="<?php echo htmlspecialchars($firstname); ?>" required>
                    <span><?php echo htmlspecialchars($firstname_err); ?></span><br>
                    <input type="text" placeholder="Enter your last name" name="lastname" minlength="1" maxlength="30" value="<?php echo htmlspecialchars($lastname); ?>" required>
                    <span><?php echo htmlspecialchars($lastname_err); ?></span><br>
                    <input type="email" placeholder="Enter your email address" name="email" minlength="3" maxlength="40" value="<?php echo htmlspecialchars($email); ?>" required>
                    <span><?php echo htmlspecialchars($email_err); ?></span><br>
                    <input type="password" placeholder="Enter your password" name="password" minlength="3" maxlength="40" required>
                    <span><?php echo htmlspecialchars($password_err); ?></span><br>
                    <input type="password" placeholder="Confirm your password" name="confirm_password" minlength="3" maxlength="40" required>
                    <span><?php echo htmlspecialchars($confirm_password_err); ?></span><br>
                    <div class="g-recaptcha" data-sitekey="6Ld8-MorAAAAAHIGKWJjUqLFYfvh1DR3QXUnBLU5" data-callback="recaptchaCallback"></div>
                    <button type="submit" id="registerBtn" class="login-group submit hidden" disabled>Register</button>
                </form>
                <p><a href="login.php">Login here</a></p>
            </div>
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
<script src="/js/script.js"></script>
</html>