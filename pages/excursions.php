<?php
  include('functions.php');
  $title = "Excursions | Social Destinations";   // Set the title
  $activePage = 'explore';          // Set the active page
  $city = 'Nashville';              // Set the city
    $keywords = 'Excursions, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Discover Excursions'; //Set the description
  $currentcolor = '#000';           // (5) Set the color
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
          <source src="SiteVideos/excursions.mp4" type="video/mp4">
          <source src="SiteVideos/excursions.webm" type="video/webm">
          <source src="SiteVideos/excursions.ogv" type="video/ogg">
          Your browser does not support the video tag.
        </video>
        <div class="city-hero-text">
          <h1>Excursions</h1>
          <p>
            <a href="#" class="scroll-down" address="true"></a>
          </p>
        </div>
      </div>
      <div class="bodycontainer">
        <div class="maintitle">
          <h3>Posts</h3>
        </div>
          <div class='feedposts'>
          <?php all_excursions(); ?>
        </div>
        <div class='videofeedposts'>
          <?php all_excursions_videos(); ?>
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