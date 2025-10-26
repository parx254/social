<?php
// Include config file
require_once 'config.php';
include ('control.php');
include ('functions.php');
// Define variables and initialize with empty values
$username = $firstname = $email = $password = $confirm_password = "";
$username_err = $firstname_err = $email_err  = $password_err = $confirm_password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userID FROM users WHERE username = ?";
        if($stmt = mysqli_prepare($con, $sql)){
          // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = trim($_POST["username"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "***This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
  // Validate firstname
    if(empty(trim($_POST['firstname']))){
        $firstname_err = "***Please enter your first name.";
    } else{
        $firstname = trim($_POST['firstname']);
    }
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "***Please enter an email.";
    } else{
        // Prepare a select statement
        $sql = "SELECT userID FROM users WHERE email = ?";
        if($stmt = mysqli_prepare($con, $sql)){
          // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            // Set parameters
            $param_email = trim($_POST["email"]);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "***This email is already associated with an account.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";
    } else{
        $password = trim($_POST['password']);
    }
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
          $confirm_password_err = '***Password did not match.';
        }
    }
    // Check input errors before inserting in database
    if(empty($username_err) && empty($firstname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, firstname, password, email) VALUES (?, ?, ?, ?)";
                if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_username, $param_firstname, $param_password, $param_email);
            // Set parameters
            $param_username = $username;
            $param_firstname = $firstname;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
  $sql2 = "INSERT INTO profiles (userID) select userID from users where username = ?";
  if($stmt = mysqli_prepare($con, $sql2)){
    mysqli_stmt_bind_param($stmt, "s", $param_username);
  $param_username = $username;
  if(mysqli_stmt_execute($stmt)){
              // Redirect to login page   
    session_start();
                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $firstname;
    $_SESSION['email'] = $email;
                header("location: mail.php");
            } else{
                echo "Something went wrong with 2nd insert. Please try again later.";
            }
}
// Close statement
        mysqli_stmt_close($stmt);
  }else{
                echo "Something went wrong with 1st insert. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="main1.css">
</head>
<body>
    <h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        New Password:
        <input type="password" name="password" value="<?php echo $password; ?>">
        <br>
        <span><?php echo $password_err; ?></span>
        </p>
        <p>
            Confirm Password:
            <input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>">
            <br>
            <span><?php echo $confirm_password_err; ?></span>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
    </form>
</body>
</html>