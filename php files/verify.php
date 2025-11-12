<?php
require_once 'config.php';
if (isset($_GET['vkey'])) {
$vkey = $_GET['vkey'];
// Check user with this verification key
$stmt = $con->prepare("SELECT authorized, vkey FROM users WHERE vkey=? AND authorized=0 LIMIT 1");
$stmt->bind_param("s", $vkey);
$stmt->execute();
$result = $stmt->get_result();
if ($result && $result->num_rows === 1) {
// Activate account
$stmt = $con->prepare("UPDATE users SET authorized=1 WHERE vkey=? LIMIT 1");
$stmt->bind_param("s", $vkey);
if ($stmt->execute()) {
echo "<h2 style='color:green; text-align:center;'>✅ Your account has been verified successfully!</h2>";
echo "<p style='text-align:center;'><a href='login.php'>Login Now</a></p>";
} else {
echo "<h3 style='color:red; text-align:center;'>❌ Something went wrong while verifying your account.</h3>";
}
} else {
echo "<h3 style='color:red; text-align:center;'>⚠️ Invalid or expired verification link.</h3>";
}
} else {
echo "<h3 style='color:red; text-align:center;'>No verification key provided.</h3>";
}
?>