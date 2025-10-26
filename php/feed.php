<?php
  include ('functions.php');
  include ('control.php');
  $title = "Feed | Social Destinations";   // Set the title
  $activePage = 'feed';          // Set the active page
  $city = 'Nashville';              // Set the city
  $keywords = 'Feed, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Discover Your Feed'; //Set the description
  $currentcolor = '#000';           // (5) Set the color
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  }
  if(isset($_SESSION['username'])){
  $sql = "SELECT authorized FROM users WHERE username = '$user'";
  $result = $con->query($sql);
  if (!$result){
  echo "Error: " . mysql_error() . "\n";
  }
  if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
    if ($row['authorized'] == 0){
    header("location: login.php");
      exit;
    }
  }
  }
  include "header.php";             // Include the header
  ?>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
        <div class="bodycontainer">
            <div class="maintitle">
                <div class="text-box">
                    <h2>FEED</h2>
                </div>
            </div>
            <div class='feedposts'>
                <?php myfeed(); ?>
            </div>
            <div class='videofeedposts'>
                <?php myvideofeed(); ?>
            </div>
        </div>
        <?php citysearch(); ?>
    </div>
    <?php
    include "footer.php";
    ?>
</body>
<style>
    .bodycontainer {
        margin-top: 80px
    }
    nav {
        background-color: #000;
    }
</style>
</html>