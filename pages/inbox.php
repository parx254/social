<?php
  include ('control.php');
  include ('functions.php');
  $title = "Inbox | Social Destinations";      // (1) Set the title
  $description = 'Discover Houston';  // (2) Set the description
  $city = 'Houston';                  // (3) Set the city
  $keywords = 'Houston, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $activePage = 'message';             // (4) Set the active page
  $currentcolor = '#C8102E';           // (5) Set the color
  session_start();
  global $user;
  global $con;
  if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("location: login.php");
    exit;
  }
  if(isset($_SESSION['username'])){
  	$sql = "SELECT * FROM users WHERE username = '$user'";
  	$result = $con->query($sql);
  	if (!$result){
  	echo "Error: " . mysql_error() . "\n";
  	}
  	if ($result->num_rows > 0){
  	$row = $result->fetch_assoc();
  	$fname = $row['firstname'];
  	$lname = $row['lastname'];
  		if ($row['authorized'] == 0){
  			header("location: login.php");
    			exit;
  		}
  	}
  }
  $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if (mysqli_connect_errno()){
  	echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n "); 
  }else{ 
  	if (isset($_POST['delete'])) {
  		$id = $_POST['id'];  
  		$q = "UPDATE messages SET deleted = 'yes' WHERE to_user = '$user' AND id = '$id'";
  		$result = $con->query($q);
  		if ($result){
  		header("location: inbox.php");
  		}
  	}
  }
    include "header.php";                // (6) Include the header
  ?>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
    <div class='coverpic'>
      <img src = "<?php mycurrentcoverpic(); ?>" alt = 'coverPic'>
    </div>
      <div class="profile">
        <div class='profiletop'>
          <img src = "<?php mycurrentprofpic(); ?>" alt = 'profilePic' align='middle'>
          <div class='prof_names'>
            <h1> <?php echo $user; ?> </h1>
            <h5><i class="fa fa-id-card"></i> <?php echo $fname; ?> <?php echo $lname; ?> </h5>
          </div>
        <div class='prof_section'>
          <div class='myfollowers'><?php profileFollowers(); ?></div>
          <div class='myfollowees'><?php profileFollowees(); ?></div>
        </div>
        </div>
      <?php profile(); ?>
      </div>
          <div class="bodycontainer">
      <div class='prof_actions'>
        <form action="myprofile.php">
          <button type="submit">
            <i class="fa fa-home"></i>
            <p>Home</p>
          </button>
        </form>
        <form action="inbox.php">
          <button type="submit" class="highlighted">
            <i class="fa fa-inbox"></i>
            <p>Inbox</p>
          </button>
        </form>
        <form action="sent.php">
          <button type="submit">
            <i class="fa fa-envelope"></i>
            <p>Sent</p>
          </button>
        </form>
        <form action="editprofile.php">
          <button type="submit">
            <i class="fa fa-pencil-square-o"></i>
            <p>Edit Profile</p>
          </button>
        </form>
        <form action="control.php" method='POST'>
          <button type="submit" name='logout'>
            <i class="fa fa-sign-out"></i>
            <p>Logout</p>
          </button>
        </form>
        <button id='changePic'>
          <i class='fa fa-picture-o' aria-hidden='true'></i>
          <p>Edit Photos</p>
        </button>
      </div>
      <div class="messages">
      <div class="maintitle">
        <h3>Inbox</h3>
      </div>
      <?php Received(); ?>
      <a href="trash.php">Deleted Received Messages</a>
    </div>
    </div>
    </div>
      <?php
    include "footer.php";
    ?>
  </body>
</html>