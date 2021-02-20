<?php
  include ('functions.php');
  include ('control.php');
  $title = "Feed | Social Destinations";   // Set the title
  $activePage = 'feed';          // Set the active page
  $city = 'Nashville';              // Set the city
  $keywords = 'Feed, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
      <div class="bodycontainer">
        <div class="maintitle">
          <h3>Feed</h3>
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
      @media(max-width:768px){nav{border-bottom:1px solid #f5f5f5;height:50px;z-index:1;top:0}#toggle .span{background:#000}}
      @media(min-width:769px){nav{background: #000;position:absolute}}
      .bodycontainer{margin-top: 100px;}
    </style>
</html>