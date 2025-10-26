<?php
  include('functions.php');
  $title = "About | Social Destinations";   // Set the title
  $city = 'Nashville';              // Set the city
  $activePage = 'about';
  $keywords = 'About, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Discover Social Destinations'; //Set the description
  $activePage = 'about';          // Set the active page
  $currentcolor = '#4a90e2';           // (5) Set the color
  include "header.php";             // Include the header
  ?>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
        <div class="topslide">
            <video playsinline autoplay loop muted>
                <source src="SiteVideos/chicago.mp4" type="video/mp4">
                <source src="SiteVideos/chicago.webm" type="video/webm">
                <source src="SiteVideos/chicago.ogv" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <div class="city-hero-text">
                <h1>Who We Are</h1>
                <p>
                    <a href="#" class="home-scroll-down" address="true"></a>
                </p>
            </div>
        </div>
        <div class="bodycontainer">
            <div class="intro">
                <div class="text-box">
                    <h2>About Us</h2>
                </div>
                <p>Embark on an unforgettable journey with Social Destinations, your ultimate travel-oriented social network! Connect with fellow globetrotters and share your adventures like never before.</p>
<p>🌍 Explore Together: Join a vibrant community of travelers who share their wanderlust. Discover exciting destinations, hidden gems, and local insights to enhance your travel events.</p>
<p>📸 Visual Stories: Capture your travel moments with stunning photos and captivating videos. Share your world with friends, family, and fellow adventurers. Turn your memories into lifelong stories.</p>
<p>✉️ Stay Connected: Connect with friends and fellow travelers through seamless messaging. Plan trips, meet up, and keep in touch wherever your travels take you.</p>
<p>🌦️ Weather at Your Fingertips: Stay ahead of the weather with real-time updates. Never let unexpected rain or a sudden heatwave catch you off guard.
</p>
<p>🌟 Join the Future of Travel: Experience the future of travel networking with Social Destinations. Don't miss out on any moment of your journeys - your travel memories, weather updates, and much more, all in one place.</p>
<p>Join us today and make every journey an unforgettable adventure!</p>
            </div>
        </div>
        <div class="contact-us">
            <div class='secondtitle'>
                <h2>Contact Us</h2>
            </div>
            <div class="contact-form">
                <div class="input-fields">
                    <form id="contact-form" method="post" action="contact-form-upload.php">
                        <input name="name" type="text" minlength="2" maxlength="60" class="form-group" placeholder="Your Name" required>
                        <br>
                        <input name="email" type="email" minlength="6" maxlength="60" class="form-group" placeholder="Your Email" required>
                        <br>
                        <textarea name="message" class="form-group" minlength="2" maxlength="180" placeholder="Message" row="4" required></textarea>
                        <br>
                        <button type="submit" class="form-group submit">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php citysearch(); ?>
    </div>
    <?php
    include "footer.php";
    ?>
</body>
<style>
    .location {
        margin-top: 0px
    }
</style>
</html>