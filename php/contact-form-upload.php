<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ===============================
    // 🔐 reCAPTCHA v3 Configuration
    // ===============================
    // 👇 Replace these two with your own keys from https://www.google.com/recaptcha/admin
    $recaptcha_sitekey = '6Lda9fsrAAAAAOLItKSXLfcwJNHcG6i_pqYe2pfY';  // SITE KEY (Public)
    $recaptcha_secret  = '6Lda9fsrAAAAAKzLl8rFTV4xX9jZs3ES9n9YsXpe';  // SECRET KEY (Private)

    $recaptcha_response = $_POST['recaptcha_response'] ?? '';

    // --- Verify with Google using cURL (safer than file_get_contents) ---
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'secret'   => $recaptcha_secret,
        'response' => $recaptcha_response
    ]));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $verify = curl_exec($ch);
    curl_close($ch);

    $responseData = json_decode($verify, true);

    // Optional: Log the reCAPTCHA result (for debugging)
    error_log("reCAPTCHA response: " . print_r($responseData, true));

    // --- Validate response ---
    if (empty($responseData['success']) || $responseData['score'] < 0.2) {
        die("<p style='color:red;text-align:center;'>reCAPTCHA verification failed. Please try again.</p>");
    }

    // ===============================
    // 📩 Continue email form process
    // ===============================

    $name    = htmlspecialchars($_POST['name'] ?? '');
    $email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');

error_log("POST data: " . print_r($_POST, true));


    // Validate form fields
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        die("<p style='color:red;text-align:center;'>Please fill in all required fields.</p>");
    }

    // Email setup
    $to      = "pmcclelland2@gmail.com";  // <-- Replace with your destination email
    $headers = "From: Social Destinations <no-reply@socialdestinations.com>\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "You received a message from your website contact form.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Subject: $subject\n\n";
    $body .= "Message:\n$message\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: index.php");
        exit;
    } else {
        die("<p style='color:red;text-align:center;'>Message could not be sent. Please try again later.</p>");
    }
}
?>
