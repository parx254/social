<?php
require_once 'functions.php';
require_once 'control.php';
verifySessionAndUser();
$title = "Feed | Social Destinations";
$activePage = 'feed';
$city = 'Nashville';
$keywords = 'Feed, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';
$description = 'Discover Your Feed';
$currentcolor = '#4a90e2';
include "header.php";
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript>
<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<div id="wrapper">
  <div class="bodycontainer">
    <div class="maintitle">
      <div class="section-title">
        <h2>Feed</h2>
      </div>
    </div>
    <div class='post-feed'>
      <?php myfeed(); ?>
    </div>
    <div class='video-post-feed'>
      <?php myvideofeed(); ?>
    </div>
  </div>
  <?php citysearch(); ?>
</div>
<?php include "footer.php"; ?>
</body>
<style>
.bodycontainer {
margin-top: 80px;
}
nav {
background-color: #4a90e2;
}
#toggle .span {
background-color: #000;    
}
</style>
</html>