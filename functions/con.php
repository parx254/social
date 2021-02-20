<?php
session_start();
include_once 'config.php';
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $result = mysqli_query($conn,"SELECT * FROM users where username='" . $_POST['username'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_username=$row['username'];
	$email=$row['email'];
	$password=$row['password'];
	if($username==$fetch_username) {
				$to = $email;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: socialdestinations.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid username';
				}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkgreen;
  font-size:22px;
  text-align:center;
 }

</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='' method='post'>
<table cellspacing='5' align='center'>
<tr><td>user name:</td><td><input type='text' name='user_name'/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
</body>
</html>