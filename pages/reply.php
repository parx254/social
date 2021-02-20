<?php  
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'pamcclel');
  define('DB_PASSWORD', 'Ozzie12!');
  define('DB_NAME', 'socialdestinationsdatabase');
    $title = "Reply | Social Destinations";      // (1) Set the title
    $description = 'Reply';             // (2) Set the description
    $city = 'Phoenix';                             // (3) Set the city
    $keywords = 'Reply, Travel, Trips, Travel Tips, Excursions, Sports, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
    $activePage = 'message';                       // (4) Set the active page
    $currentcolor = '#000';                     // (5) Set the color
  session_start();
  
  include ('control.php');
  include ('functions.php');
  
  global $user;
  $user = $_SESSION['username'];
  $currentuser = $_GET['currentuser'];
  
  
  /* Attempt to connect to MySQL database */
  $con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
  if (mysqli_connect_errno()){
  	echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n "); 
  }
  else{ 
  
  if (isset($_POST['replyid'])){
   $replyid = $_POST['replyid'];
   $sql = "SELECT * FROM messages WHERE id = '$replyid'";
   
   $run = $con->query($sql);
   if ($run->num_rows > 0){
   	$row = $run->fetch_assoc();
   	$newuser = $row['from_user']; 
   	}
   else{
  	 echo'no rows';
   
   	}
  }
  	if (isset($_POST['submitreply'])){
  		$user = $_SESSION['username'];
  		$currentuser = $_GET['currentuser'];
  		$to_user = $_POST['to_user'];
  		$from_user = $_POST['from_user'];
  		$message = $_POST['message'];
  		$replyid = $_POST['replyid'];
  
  		/*$q = "UPDATE messages SET replied = 'yes' WHERE id = '$replyid' AND from_user = '$newuser'";
  		$result01 = $con->query($q);*/
  		
  		$sql = "INSERT INTO messages (to_user, from_user, message, replied) VALUES ('$to_user', '$from_user', '$message', 'yes')";
  		$result = $con->query($sql);
  		if (result){
  		  echo "Reply sent!"; 
  		  } 
  		header('location: inbox.php');
  		}
  	}
  	  include "header.php";                          // (6) Include the header
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
      <form action='reply.php' method='POST' enctype='multipart/form-data'>
        <div class="profiletop">
          <div class='profilepic'>
            <img src = "<?php mycurrentprofpic(); ?>" alt = 'profilePic' align='middle'>
            <div class='prof_names'>
              <h1> <?php echo $user; ?> </h1>
              <h5><i class="fa fa-id-card"></i> Reply to <?php echo $newuser; ?></h5>
            </div>
          </div>
        </div>
        <div class='message'>
          <input type='hidden' name='id' maxlength='32' value = '<?php echo $replyid; ?>'>
          <br>
          <textarea name='message' placeholder="Type here..." required></textarea>
          <p>To <?php echo $newuser; ?> <input type='hidden' name='to_user' maxlength='32' value = '<?php echo $newuser; ?>'></p>
          <p>From <?php echo $user; ?> <input type="hidden" name="from_user" maxlength="32" value = '<?php echo $user; ?>'>
          </p>
          <button type="submit" name="submitreply"><i class="fa fa-paper-plane" aria-hidden="true"></i>
          </button>
      </form>
      <a href = "myprofile.php"> Return to my profile </a>
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