<?php  
  include ('control.php');
  include ('functions.php');
  session_start();
  global $user;
  global $con;
  $title = "Inbox | Social Destinations";   // Set the title
  $city = 'Nashville';              // Set the city
  $keywords = 'Sent, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
  $description = 'Discover Social Destinations'; //Set the description
  $activePage = 'message';          // Set the active page
  $currentcolor = '#000';           // (5) Set the color
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
  if (isset($_POST['sentdelete'])) {
    $id = $_POST['id'];  
    $q = "UPDATE messages SET sent_deleted = 'yes' WHERE from_user = '$user' AND id = '$id'";
    $result = $con->query($q);
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
            <div class='coverpic'>
                <img src="<?php mycurrentcoverpic(); ?>" alt='coverPic'>
            </div>
            <div class="profile">
                <img src="<?php mycurrentprofpic(); ?>" alt='profilePic' align='middle'>
                <div class='prof_names'>
                    <div class="text-box">
                        <h2>@<?php echo $user; ?></h2>
                    </div>
                    <div class="text-box">
                        <h5><i class="fa fa-id-card"></i> <?php echo $fname; ?> <?php echo $lname; ?></h5>
                    </div>
                </div>
                <div class='prof_section'>
                    <div class='myfollowers'><?php profileFollowers(); ?></div>
                    <div class='myfollowees'><?php profileFollowees(); ?></div>
                    <?php profile(); ?>
                </div>
            </div>
            <div class='prof_actions'>
                <form action="my-profile.php">
                    <button type="submit">
                        <i class="far fa-home"></i>
                        <p>Home</p>
                    </button>
                </form>
                <form action="inbox.php">
                    <button type="submit" class="highlighted">
                        <i class="far fa-inbox"></i>
                        <p>Inbox</p>
                    </button>
                </form>
                <form action="sent.php">
                    <button type="submit">
                        <i class="far fa-envelope"></i>
                        <p>Sent</p>
                    </button>
                </form>
                <form action="edit-profile.php">
                    <button type="submit">
                        <i class="fa fa-pencil-square-o"></i>
                        <p>Edit</p>
                    </button>
                </form>
                <form action="control.php" method='POST'>
                    <button type="submit" name='logout'>
                        <i class="far fa-sign-out"></i>
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
                    <div class="text-box">
                        <h2>RECEIVED MESSAGES</h2>
                    </div>
                </div>
                <?php Received(); ?>
            </div>
        </div>
        <?php
    include "footer.php";
    ?>
</body>
</html>