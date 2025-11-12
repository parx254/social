<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
  // =========================
  // SMTP (Gmail example)
  // =========================
    $mail->isSMTP();
    $mail->Host     = 'p3plzcpnl507626.prod.phx3.secureserver.net'; // GoDaddy's real SMTP endpoint
    $mail->SMTPAuth   = true;
    $mail->Username   = 'noreply@socialdestinations.com';
    $mail->Password   = 'DiYK!}T0giE+';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // SSL
    $mail->Port     = 465;

  // =========================
  // Inputs
  // =========================
  $name     = trim($_POST['name'] ?? '');
  $email    = trim($_POST['email'] ?? '');
  $subject  = trim($_POST['subject'] ?? '');
  $message  = trim($_POST['message'] ?? '');

  if ($name === '' || $email === '' || $subject === '' || $message === '') {
    echo "<div class='form-alert form-alert-error'>Please fill out all fields.</div>";
    exit;
  }

  // Sanitize/limit subject to avoid header issues
  $subject = preg_replace('/[\r\n]+/', ' ', $subject); // no newlines in headers
  $subject = mb_substr($subject, 0, 150);

  // =========================
  // Headers
  // =========================
  // (Best practice) Send FROM your domain mailbox and use Reply-To for the user
  $mail->setFrom('youraddress@gmail.com', 'Website Contact');  // <-- change
  $mail->addReplyTo($email, $name);
  $mail->addAddress('you@yourdomain.com', 'Your Name');        // <-- change

  // =========================
  // Content
  // =========================
  $mail->isHTML(true);
  $mail->Subject = "Website Contact: {$subject}";
  $mail->Body = "
    <h2>Contact Form Submission</h2>
    <p><strong>Name:</strong> ".htmlspecialchars($name)."</p>
    <p><strong>Email:</strong> ".htmlspecialchars($email)."</p>
    <p><strong>Subject:</strong> ".htmlspecialchars($subject)."</p>
    <p><strong>Message:</strong><br>" . nl2br(htmlspecialchars($message)) . "</p>
  ";

  $mail->AltBody =
    "Contact Form Submission\n\n" .
    "Name: {$name}\n" .
    "Email: {$email}\n" .
    "Subject: {$subject}\n" .
    "Message:\n{$message}\n";

  // =========================
  // Send
  // =========================
  $mail->SMTPDebug = 0; // set 2 for verbose debug
  if ($mail->send()) {
    echo "<div class='form-alert form-alert-success'>Your message has been sent successfully!</div>";
  } else {
    echo "<div class='form-alert form-alert-error'>Message could not be sent. Mailer Error: " . htmlspecialchars($mail->ErrorInfo) . "</div>";
  }

} catch (Exception $e) {
  echo "<div class='form-alert form-alert-error'>Message could not be sent. Mailer Exception: " . htmlspecialchars($e->getMessage()) . "</div>";
}
