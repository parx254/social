<?php
  include('functions.php');
  $title = "About | Social Destinations";   // Set the title
  $city = 'Nashville';              // Set the city
  $keywords = 'About, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Discover Social Destinations'; //Set the description
  $activePage = 'about';          // Set the active page
  $currentcolor = '#041E42';           // (5) Set the color
  include "header.php";             // Include the header
  ?>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
      <div class="topslide">
        <video playsinline autoplay loop muted controls="false">
          <source src="SiteVideos/about.mp4" type="video/mp4">
          <source src="SiteVideos/about.webm" type="video/webm">
          <source src="SiteVideos/about.ogv" type="video/ogg">
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
        <h2>About Us</h2>
        <br>
        <p>We are a family of travelers awaiting our next adventure. If you're anything like us, you need a simpler way to find real experiences, had by real people. With over 50 different locations, we are certain that you will find it with us. Have a look around! Only Social Destinations has over 50 personalized locations with its own theme. If you're feeling dedicated, create an account to enjoy the perks of posting photos and connecting with like-minded travelers.</p>
        <br>
        <p><a href="privacypolicy.php">View our Privacy Policy</a></p>
      </div>
      <div class="contact-us">
        <h2>Contact Us</h2>
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
    <style>.location{margin-top:0px}</style>
    </html>