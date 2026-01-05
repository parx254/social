<?php
require_once 'functions.php';
$title = "About | Social Destinations";   // Set the title
$city = 'Nashville';                      // Set the city
$activePage = 'about';
$keywords = 'About, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';
$description = 'Discover Social Destinations';
$activePage = 'about';
$currentcolor = '#4a90e2';
include "header.php";
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden">
</iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
  <div class="page-hero">
    <video id="bgVideo" playsinline muted autoplay loop preload="auto">
    <source src="SiteVideos/chicago.mp4" type="video/mp4">
    <source src="SiteVideos/chicago.webm" type="video/webm">
    <source src="SiteVideos/chicago.ogv" type="video/ogg">
    Your browser does not support the video tag.
    </video>
    <div class="city-hero-text">
      <h1>
      Who We Are</h1>
      <p>
      <a href="#" class="home-scroll-down" address="true">
      </a>
      </p></div>
    </div>
    <div class="bodycontainer">
      <div class="intro">
        <div class="section-title">
          <h2>
          About Us</h2></div>
          <p>
          Embark on an unforgettable journey with Social Destinations, your ultimate travel-oriented social network! Connect with fellow globetrotters and share your adventures like never before.</p>
          <p>
          🌍 Explore Together: Join a vibrant community of travelers who share their wanderlust. Discover exciting destinations, hidden gems, and local insights to enhance your travel events.</p>
          <p>
          📸 Visual Stories: Capture your travel moments with stunning photos and captivating videos. Share your world with friends, family, and fellow adventurers. Turn your memories into lifelong stories.</p>
          <p>
          ✉️ Stay Connected: Connect with friends and fellow travelers through seamless messaging. Plan trips, meet up, and keep in touch wherever your travels take you.</p>
          <p>
          🌦️ Weather at Your Fingertips: Stay ahead of the weather with real-time updates. Never let unexpected rain or a sudden heatwave catch you off guard.</p>
          <p>
          🌟 Join the Future of Travel: Experience the future of travel networking with Social Destinations. Don't miss out on any moment of your journeys - your travel memories, weather updates, and much more, all in one place.</p>
          <p>
          Join us today and make every journey an unforgettable adventure!</p></div>

        <div class="contact-us">
          <div class='section-header'>
            <h2>
            Contact Us</h2></div>
            <?php if (!empty($_GET['success']) && $_GET['success'] === '1'): ?>
            <div class="form-alert form-alert-success" role="status" aria-live="polite">
              ✅ Your message has been sent successfully!</div>
              <?php endif; ?>
              <div class="contact-form">
                <div class="input-fields">
                  <form id="contact-form" method="post" action="contact-form-upload.php">
                  <input name="name" type="text" minlength="2" maxlength="60" class="form-group" placeholder="Name" required>
                  <input name="email" type="email" minlength="6" maxlength="60" class="form-group" placeholder="Email" required>
                  <input type="text" name="subject" minlength="3" maxlength="60" class="form-group" placeholder="Subject" required>
                  <textarea name="message" class="form-group" minlength="2" maxlength="180" placeholder="Message" rows="4" required><?php echo htmlspecialchars(trim($_POST["message"] ?? "")); ?></textarea>
                  <!-- reCAPTCHA v3 hidden input -->
                  <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                  <button type="submit" class="form-group submit">
                  Send Message</button>
                  </form></div>
                </div>
              </div>
                      </div>
            </div>
            <?php citysearch(); ?>
            <?php include "footer.php"; ?>
            <!-- Load reCAPTCHA v3 -->
            <!-- Generate reCAPTCHA token -->
            <!-- reCAPTCHA v3 -->
            <script src="https://www.google.com/recaptcha/api.js?render=6Lda9fsrAAAAAOLItKSXLfcwJNHcG6i_pqYe2pfY">
            </script>
            <script>
            document.addEventListener("DOMContentLoaded", function() {
            // wait a bit in case Cloudflare delays the script
            function initRecaptcha() {
            if (window.grecaptcha && typeof grecaptcha.execute === "function") {
            grecaptcha.ready(function() {
            grecaptcha.execute('6Lda9fsrAAAAAOLItKSXLfcwJNHcG6i_pqYe2pfY', { action: 'contact' })
            .then(function(token) {
            var el = document.getElementById('recaptchaResponse');
            if (el) el.value = token;
            console.log("✅ reCAPTCHA token generated");
            });
            });
            } else {
            console.warn("⏳ reCAPTCHA not ready yet, retrying...");
            setTimeout(initRecaptcha, 1000);
            }
            }
            initRecaptcha();
            });
            </script>
            </body>
            </html>