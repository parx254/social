<?php
require_once 'config.php';
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $error = "Please enter your email address.";
    } else {
        $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

        // Check if user exists
        $stmt = $conn->prepare("SELECT userID, username FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $username = $row['username'];
            $token = bin2hex(random_bytes(32));
            $expires = date("U") + 10800; // 3 hours

            // Save token and mark as unauthorized until password is reset
            $stmt = $conn->prepare("UPDATE users SET vkey = ?, authorized = 0 WHERE email = ?");
            $stmt->bind_param("ss", $token, $email);
            $stmt->execute();

            // Optional: store in password_resets too for logging
            $conn->query("DELETE FROM password_resets WHERE email = '$email'");
            $stmt2 = $conn->prepare("INSERT INTO password_resets (email, token, expires) VALUES (?, ?, ?)");
            $stmt2->bind_param("sss", $email, $token, $expires);
            $stmt2->execute();

            // Email setup (same style as verification)
            $reset_link = "https://www.socialdestinations.com/reset_password.php?vkey=" . $token;

            $subject = "Reset Your Social Destinations Password";
            $message = "
                <html>
                <head><title>Reset Your Password</title></head>
                <body style='font-family: Arial, sans-serif; background-color: #f8f8f8; padding: 20px;'>
                  <div style='max-width: 600px; background: #ffffff; padding: 20px; border-radius: 8px;'>
                    <h2 style='color: #BE3455;'>Reset Your Password</h2>
                    <p>Hello <strong>{$username}</strong>,</p>
                    <p>We received a request to reset your password for your Social Destinations account.</p>
                    <p>Click the link below to reset it:</p>
                    <p><a href='{$reset_link}' style='background: #BE3455; color: #fff; padding: 10px 15px; border-radius: 5px; text-decoration: none;'>Reset Password</a></p>
                    <p>If the button doesn’t work, copy and paste this link into your browser:</p>
                    <p><a href='{$reset_link}'>{$reset_link}</a></p>
                    <p><em>This link will expire in 3 hours.</em></p>
                    <hr style='border: none; border-top: 1px solid #eee; margin: 20px 0;'>
                    <p style='font-size: 13px; color: #777;'>If you did not request this, you can safely ignore this email.</p>
                  </div>
                </body>
                </html>
            ";

            $headers = "From: Social Destinations <no-reply@socialdestinations.com>\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

            mail($email, $subject, $message, $headers);

            $success = "A password reset link has been sent to your email.";
        } else {
            $error = "No account found with that email.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Forgot Password - Social Destinations</title>
</head>
<body>
  <h2>Forgot Password</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <?php if (!empty($success)) echo "<p style='color:green;'>$success</p>"; ?>
  <form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required>
    <br><br>
    <button type="submit">Send Reset Link</button>
  </form>
</body>
</html>
