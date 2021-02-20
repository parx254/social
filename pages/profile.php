<?php
  include ('control.php');
  include ('functions.php');
  $title = "Profile | Social Destinations";   // Set the title
  $activePage = 'profile';          // Set the active page
  $city = 'Nashville';              // Set the city
  $keywords = 'Profile, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Discover Nashville'; //Set the description
  $currentcolor = '#000';           // (5) Set the color
  session_start();
  //user must sign in to go to someone profile
  /*
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  }
  */
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
  global $user;
  $currentuser = $_GET['currentuser'];
  if ($user == $currentuser){
  	header("location: myprofile.php");
    	exit;
  }
  $sql2 = "SELECT * FROM users WHERE username = '$currentuser'";
  	$result = $con->query($sql2);
  	if (!$result){
  	echo "Error: " . mysql_error() . "\n";
  	}
  	if ($result->num_rows > 0){
  	$row2 = $result->fetch_assoc();
  	$fname = $row2['firstname'];
  	$lname = $row2['lastname'];
  	}
  	include "header.php";             // Include the header
  ?>
    <?php allJS(); ?>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
      <div class='coverpic'>
        <img src = "<?php currentcoverpic(); ?>" alt = 'coverPic'>
      </div>
        <div class="profile">
            <div class="profiletop">
            <img src = "<?php currentprofpic(); ?>" alt = 'profilePic' align='middle'>
            <div class='prof_names'>
              <h1> <?php echo $currentuser; ?> </h1>
              <h5><i class="fa fa-id-card"></i> <?php echo $fname; ?> <?php echo $lname; ?> </h5>
            </div>
          <div class='prof_section'>
            <div class='myfollowers'><?php otherFollowers(); ?></div>
            <div class='myfollowees'><?php otherFollowees(); ?></div>
        
            <?php profileOption(); ?>
          </div>
        </div>
        
        <?php otherprofile();?>
        </div>
        <div class="bodycontainer">
        <div class='bottomprof'>
          <div class="secondtitle">
            <h4>Posts</h4>
          </div>
          <span id="editHere"></span>
          <div class='myprofposts'>
            <?php allOtherPosts(); ?>
          </div>
          <div class='myprofvideoposts'>
            <?php allOtherVideoPosts(); ?>
          </div>
        </div>
        <div class='myprofplaces'>
          <div class="secondtitle">
            <h3>Places Visited</h3>
          </div>
          <ul id="myid">   
            <?php otherplacesVisited(); ?>
            <?php otherplacesVideoVisited(); ?>
          </ul>
        </div>
      </div>
    </div>
    <?php
  include "footer.php";
  ?>
  </body>
  <script>
      $("li.placesvisited > a[href='']").closest('li').remove()
  </script>
</html>