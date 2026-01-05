<?php
require_once 'functions.php';
// Accept both new short token (?t=) and legacy (?vkey=)
if (isset($_GET['t'])) {
$vkey = $_GET['t'];
} elseif (isset($_GET['vkey'])) {
$vkey = $_GET['vkey'];
} else {
die("Invalid request.");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
global $con; // use shared DB connection
$vkey = $_POST['vkey'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
if ($password !== $confirm) {
$error = "Passwords do not match.";
} else {
// Validate token and expiration
$stmt = $con->
prepare("
SELECT u.email, pr.expires
FROM users u
LEFT JOIN password_resets pr ON u.email = pr.email
WHERE LEFT(u.vkey, 16) = ?
");
$stmt->
bind_param("s", $vkey);
$stmt->
execute();
$result = $stmt->
get_result();
if ($row = $result->
fetch_assoc()) {
if ($row['expires'] < date("U")) {
$error = "This reset link has expired. Please request a new one.";
} else {
$email = $row['email'];
$hashed = password_hash($password, PASSWORD_DEFAULT);
// Update password and reauthorize account
$update = $con->
prepare("UPDATE users SET password = ?, authorized = 1 WHERE email = ?");
$update->
bind_param("ss", $hashed, $email);
$update->
execute();
// Clean up reset token
$delete1 = $con->
prepare("DELETE FROM password_resets WHERE email = ?");
$delete1->
bind_param("s", $email);
$delete1->
execute();
$success = "Your password has been reset successfully! You may now log in.";
}
} else {
$error = "Invalid or expired link.";
}
$stmt->
close();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>
Reset Password - Social Destinations</title>
</head>
<body>
<h2>
Reset Password</h2>
<?php if (!empty($error)) echo "<p style='color:red;'>
$error</p>
"; ?>
<?php if (!empty($success)) echo "<p style='color:green;'>
$success</p>
"; ?>
<?php if (empty($success)) { ?>
<form method="POST" action="">
<input type="hidden" name="vkey" value="<?php echo htmlspecialchars($vkey); ?>
">
<label>
New Password:</label>
<br>
<input type="password" name="password" required>
<br>
<br>
<label>
Confirm Password:</label>
<br>
<input type="password" name="confirm" required>
<br>
<br>
<button type="submit">
Reset Password</button>
</form>
<?php } ?>
</body>
</html>