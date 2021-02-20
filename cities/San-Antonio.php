<?php
  include('functions.php');
  $title = "San Antonio | Social Destinations";      // (1) Set the title
  $description = 'Discover San Antonio';  // (2) Set the description
  $city = 'San Antonio';                  // (3) Set the city
  $keywords = 'San Antonio, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $activePage = 'explore';             // (4) Set the active page
  $currentcolor = '#EF426F';           // (5) Set the color
  include "header.php";                // (6) Include the header
  ?>
<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="wrapper">
    <div class="topslide">
      <video playsinline autoplay loop muted controls="false">
        <source src="SiteVideos/sanantonio.mp4" type="video/mp4">
        <source src="SiteVideos/sanantonio.webm" type="video/webm">
        <source src="SiteVideos/sanantonio.ogv" type="video/ogg">
        Your browser does not support the video tag.
      </video>
      <div class="city-hero-text">
        <h1>San Antonio</h1>
          <a href="#" class="scroll-down" address="true"></a>
      </div>
    </div>
    <div class="bodycontainer">
      <div class="maintitle">
        <h3>Posts</h3>
      </div>
      <div class='feedposts'>
        <?php all_San_Antonio(); ?>
      </div>
      <div class='videofeedposts'>
        <?php all_San_Antonio_Videos(); ?>
      </div>
      <?php cityweather(); ?>
    </div>
    <?php citysearch(); ?>
  </div>
  <?php
    include "footer.php";
    ?>
</body>
</html>