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
  include "header.php";             // Include the header
  ?>
    <?php allJS(); ?>
  </head>
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
            <div class="profiletop">
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
            <button type="submit" class="highlighted">
              <i class="fas fa-home-alt"></i>
              <p>Home</p>
            </button>
          </form>
          <form action="inbox.php">
            <button type="submit">
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
        <div class='profpost'>
          <div class="postphoto">
            <h3>Post Photo</h3>
            <br>
            <form action="control.php" method="POST" enctype='multipart/form-data'>
              <i class="fa fa-globe" aria-hidden="true"></i>
              <select name = 'location' required>
                <option class="placeholder" selected disabled value="">Location</option>
                <option value="Amsterdam">Amsterdam</option>
                <option value="Athens">Athens</option>
                <option value="Atlanta">Atlanta</option>
                <option value="Austin">Austin</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Berlin">Berlin</option>
                <option value="Boston">Boston</option>
                <option value="Calgary">Calgary</option>
                <option value="Charlotte">Charlotte</option>
                <option value="Chicago">Chicago</option>
                <option value="Cincinnati">Cincinnati</option>
                <option value="Columbus">Columbus</option>
                <option value="Dallas">Dallas</option>
                <option value="Denver">Denver</option>
                <option value="Detroit">Detroit</option>
                <option value="Edmonton">Edmonton</option>
                <option value="Honolulu">Honolulu</option>
                <option value="Houston">Houston</option>
                <option value="Jacksonville">Jacksonville</option>
                <option value="Kansas City">Kansas City</option>
                <option value="Indianapolis">Indianapolis</option>
                <option value="Las Vegas">Las Vegas</option>
                <option value="London">London</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Miami">Miami</option>
                <option value="Milan">Milan</option>
                <option value="Memphis">Memphis</option>
                <option value="Minneapolis">Minneapolis</option>
                <option value="Montreal">Montreal</option>
                <option value="Moscow">Moscow</option>
                <option value="Nashville">Nashville</option>
                <option value="New Orleans">New Orleans</option>
                <option value="New York City">New York City</option>
                <option value="Orlando">Orlando</option>
                <option value="Paris">Paris</option>
                <option value="Philadelphia">Philadelphia</option>
                <option value="Phoenix">Phoenix</option>
                <option value="Pittsburgh">Pittsburgh</option>
                <option value="Portland">Portland</option>
                <option value="Rome">Rome</option>
                <option value="Saint Louis">Saint Louis</option>
                <option value="San Antonio">San Antonio</option>
                <option value="San Diego">San Diego</option>
                <option value="San Francisco">San Francisco</option>
                <option value="Seattle">Seattle</option>
                <option value="Tampa">Tampa</option>
                <option value="Toronto">Toronto</option>
                <option value="Vancouver">Vancouver</option>
                <option value="Venice">Venice</option>
                <option value="Washington DC">Washington DC</option>
              </select>
              <br>
              <br>
              <p><textarea name='blogtext' rows='10' placeholder='Type here...' required></textarea></p>
              <br>
              <i class="fa fa-file-image-o" aria-hidden="true"></i>
              <input type='file' name='Filename' accept="image/*" onchange='loadFile(event)' required>
              <br><br>
              <img id="output"/>
              <br><br>
              <i class="fa fa-tag" aria-hidden="true"></i>
              <select name = 'category' required>
                <option class="placeholder" selected disabled value="">Category</option>
                <option value="Cuisine">Cuisine</option>
                <option value="Excursions">Excursions</option>
                <option value="Experiences">Experiences</option>
                <option value="Lodging">Lodging</option>
                <option value="Sports">Sports</option>
              </select>
              <input type = "hidden" name = "user" value = "<?php echo $_SESSION['username'];?>">
              <button type="submit" name="addsubmit"><i class="fa fa-paper-plane" aria-hidden="true"></i>
              </button>
            </form>
          </div>
          <div class="postvideo">
            <h3>Post Video</h3>
            <br>
            <form action="control.php" method="POST" enctype='multipart/form-data'>
              <i class="fa fa-globe" aria-hidden="true"></i>
              <select name = 'videolocation' required>
                <option class="placeholder" selected disabled value="">Location</option>
                <option value="Amsterdam">Amsterdam</option>
                <option value="Athens">Athens</option>
                <option value="Atlanta">Atlanta</option>
                <option value="Austin">Austin</option>
                <option value="Barcelona">Barcelona</option>
                <option value="Berlin">Berlin</option>
                <option value="Boston">Boston</option>
                <option value="Calgary">Calgary</option>
                <option value="Charlotte">Charlotte</option>
                <option value="Chicago">Chicago</option>
                <option value="Cincinnati">Cincinnati</option>
                <option value="Columbus">Columbus</option>
                <option value="Dallas">Dallas</option>
                <option value="Denver">Denver</option>
                <option value="Detroit">Detroit</option>
                <option value="Edmonton">Edmonton</option>
                <option value="Honolulu">Honolulu</option>
                <option value="Houston">Houston</option>
                <option value="Jacksonville">Jacksonville</option>
                <option value="Kansas City">Kansas City</option>
                <option value="Indianapolis">Indianapolis</option>
                <option value="Las Vegas">Las Vegas</option>
                <option value="London">London</option>
                <option value="Los Angeles">Los Angeles</option>
                <option value="Miami">Miami</option>
                <option value="Milan">Milan</option>
                <option value="Memphis">Memphis</option>
                <option value="Minneapolis">Minneapolis</option>
                <option value="Montreal">Montreal</option>
                <option value="Moscow">Moscow</option>
                <option value="Nashville">Nashville</option>
                <option value="New Orleans">New Orleans</option>
                <option value="New York City">New York City</option>
                <option value="Orlando">Orlando</option>
                <option value="Paris">Paris</option>
                <option value="Philadelphia">Philadelphia</option>
                <option value="Phoenix">Phoenix</option>
                <option value="Pittsburgh">Pittsburgh</option>
                <option value="Portland">Portland</option>
                <option value="Rome">Rome</option>
                <option value="Saint Louis">Saint Louis</option>
                <option value="San Antonio">San Antonio</option>
                <option value="San Diego">San Diego</option>
                <option value="San Francisco">San Francisco</option>
                <option value="Seattle">Seattle</option>
                <option value="Tampa">Tampa</option>
                <option value="Toronto">Toronto</option>
                <option value="Vancouver">Vancouver</option>
                <option value="Venice">Venice</option>
                <option value="Washington DC">Washington DC</option>
              </select>
              <br>
              <br>
              <p><textarea name='blogtext' rows='10' placeholder='Type here...' required></textarea></p>
              <br>
              <i class="fa fa-file-video-o" aria-hidden="true"></i>
              <input type='file' name='Filename' accept="video/mp4,video/x-m4v,video/*" required>
              <br><br>
              <i class="fa fa-tag" aria-hidden="true"></i>
              <select name = 'videocategory' required>
                <option class="placeholder" selected disabled value="">Category</option>
                <option value="Cuisine">Cuisine</option>
                <option value="Excursions">Excursions</option>
                <option value="Experiences">Experiences</option>
                <option value="Lodging">Lodging</option>
                <option value="Sports">Sports</option>
              </select>
              <input type = "hidden" name = "user" value = "<?php echo $_SESSION['username'];?>">
              <button type="submit" name="addvideosubmit"><i class="fa fa-paper-plane" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
        <div class='bottomprof'>
          <div class="secondtitle">
            <h4>Posts</h4>
          </div>
          <span id="editHere"></span>
          <div class='myprofposts'>
            <?php allPosts(); ?>
          </div>
          <div class='myprofvideoposts'>
            <?php allVideoPosts(); ?>
          </div>
          <div class='myprofplaces'>
            <div class="secondtitle">
              <h3>Places Visited</h3>
            </div>
            <ul id="myid"> 
              <?php placesVisited(); ?>
              <?php placesVideoVisited(); ?>
            </ul>
          </div>
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