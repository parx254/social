<?php
  require_once 'functions.php';
  $title = "Events | Social Destinations";   // Set the title
  $activePage = 'explore';          // Set the active page
  $city = 'Nashville';              // Set the city
    $keywords = 'Events, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Discover Events'; //Set the description
  $currentcolor = '#000';           // (5) Set the color
  include "header.php";             // Include the header
  ?>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
        <div class="page-hero">
            <video id="bgVideo" playsinline muted autoplay loop preload="auto">
                <source src="SiteVideos/events.mp4" type="video/mp4">
                <source src="SiteVideos/events.webm" type="video/webm">
                <source src="SiteVideos/events.ogv" type="video/ogg">
                Your browser does not support the video tag.
            </video>
            <div class="city-hero-text">
                <h1>Events</h1>
                <p>
                    <a href="#" class="scroll-down" address="true"></a>
                </p>
            </div>
        </div>
        <div class="bodycontainer">
            <div class="maintitle">
                <div class="section-title">
                    <h2>posts</h2>
                </div>
            </div>
            <div class='post-feed'>
                <?php all_events(); ?>
            </div>
            <div class='video-post-feed'>
                <?php all_events_videos(); ?>
            </div>
        </div>
        <?php citysearch(); ?>
    </div>
    <?php
  include "footer.php";
  ?>
</body>
<style>
    .page-hero {
        background: #1B1B1B !important
    }
</style>
</html>