<?php
$r = mysqli_fetch_assoc($res);
$password = $r['password'];
$to = $r['email'];
$subject = "Your Recovered Password";
 
$message = "Please use this password to login " . $password;
$headers = "From : socialdestinations.com";
if(mail($to, $subject, $message, $headers)){
	echo "Your Password has been sent to your email address";
}else{
	echo "Failed to Recover your password, try again";
}
?>
