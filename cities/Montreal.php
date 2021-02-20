<?php
  include('functions.php');
  $title = "Montreal | Social Destinations";      // (1) Set the title
  $description = 'Discover Montreal';  // (2) Set the description
  $city = 'Montreal';                  // (3) Set the city
  $keywords = 'Montreal, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $activePage = 'explore';             // (4) Set the active page
  $currentcolor = '#67ABE5';           // (5) Set the color
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
        <source src="SiteVideos/montreal.mp4" type="video/mp4">
        <source src="SiteVideos/montreal.webm" type="video/webm">
        <source src="SiteVideos/montreal.ogv" type="video/ogg">
        Your browser does not support the video tag.
      </video>
      <div class="city-hero-text">
        <h1>Montreal</h1>
          <a href="#" class="scroll-down" address="true"></a>
      </div>
    </div>
    <div class="bodycontainer">
      <div class="maintitle">
        <h3>Posts</h3>
      </div>
      <div class='feedposts'>
        <?php all_Montreal(); ?>
      </div>
      <div class='videofeedposts'>
        <?php all_Montreal_Videos(); ?>
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