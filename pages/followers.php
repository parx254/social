<?php
  include ('functions.php');
  include ('control.php');
  $title = "Followers | Social Destinations";   // Set the title
  $activePage = 'profile';          // Set the active page
  $city = 'Nashville';              // Set the city
  $keywords = 'Followers, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Followers'; //Set the description
  $currentcolor = '#000';           // (5) Set the color
  /*
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: registration.php");
    exit;
  }
  if(isset($_SESSION['username'])){
  	$sql = "SELECT authorized FROM users WHERE username = '$user'";
  	$result = $con->query($sql);
  	if (!result){
  	echo "Error: " . mysql_error() . "\n";
  	}
  	if ($result->num_rows > 0){
  	$row = $result->fetch_assoc();
  		if ($row['authorized'] == 0){
  			header("location: registration.php");
    			exit;
  		}
  	}
  }
  */
  $currentuser = $_GET['currentuser'];
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
          <h5><i class="fa fa-users"></i> Followers</h5>
        </div>
      </div>
      <div class='feed'>
        <?php allfollows();?>
      </div>
    </div>
  </div>
  <?php
    include "footer.php";
    ?>
</body>
<style>
    .profile{margin-bottom:200px}
</style>
</html>