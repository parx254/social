<?php
  require_once 'functions.php';
  $title = "Venice | Social Destinations";      // (1) Set the title
  $description = 'Discover Venice';  // (2) Set the description
  $city = 'Venice';                  // (3) Set the city
  $keywords = 'Venice, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $activePage = 'explore';             // (4) Set the active page
  $currentcolor = '#2D5373';           // (5) Set the color
  include "header.php";                // (6) Include the header
  ?>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
        <div class="page-hero">
            <video id="bgVideo" playsinline muted autoplay loop preload="auto">
                <source src="SiteVideos/venice.mp4" type="video/mp4">
                <source src="SiteVideos/venice.webm" type="video/webm">
                <source src="SiteVideos/venice.ogv" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <div class="city-hero-text">
                <h1>Venice</h1>
                <a href="#" class="scroll-down" address="true"></a>
            </div>
        </div>
        <div class="bodycontainer">
            <div class="maintitle">
                <div class="section-title">
                    <h2>posts</h2>
                </div>
            </div>
            <div class='post-feed'>
                <?php all_Venice(); ?>
            </div>
            <div class='video-post-feed'>
                <?php all_Venice_Videos(); ?>
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