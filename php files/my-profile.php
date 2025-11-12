<?php
require_once 'functions.php';
require_once 'control.php';
// Load user data
$currentuser = $_GET['currentuser'] ?? '';
$userData = loadUserProfile($currentuser);
// Assign variables for display
$user = $userData['username'];
$fname = $userData['firstname'];
$lname = $userData['lastname'];
// Page metadata
$title = "$user | Social Destinations";
$activePage = 'profile';
$city = 'Nashville';
$keywords = 'Profile, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';
$description = 'Discover Nashville';
$currentcolor = '#4a90e2';
include "header.php";
?>
</head>
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
<?php renderProfileActions('home'); ?>
        <div class='profpost'>
          <div class="postphoto">
            <h3>Post Photo</h3>
            <br>
            <form action="control.php" method="POST" enctype='multipart/form-data'>
            <i class="far fa-globe" aria-hidden="true"></i>
            <select name='location' required>
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
            <p><textarea name='blogtext' maxlength='90' placeholder='Type here...' required></textarea></p>
            <br>
            <i class="far fa-file-image-o" aria-hidden="true"></i>
            <input type='file' name='Filename' accept="image/*" onchange='loadFile(event)' required>
            <br><br>
            <img id="output" />
            <br><br>
            <i class="far fa-tag" aria-hidden="true"></i>
            <select name='category' required>
            <option class="placeholder" selected disabled value="">Category</option>
            <option value="Eats">Eats</option>
            <option value="Adventures">Adventures</option>
            <option value="Vibes">Vibes</option>
            <option value="Stays">Stays</option>
            <option value="Events">Events</option>
            </select>
            <input type="hidden" name="user" value="<?php echo $_SESSION['username'];?>">
            <button type="submit" name="addsubmit"><i class="far fa-camera" aria-hidden="true"></i>
            </button>
            </form>
          </div>
          <div class="postvideo">
            <h3>Post Video</h3>
            <br>
            <form action="control.php" method="POST" enctype='multipart/form-data'>
            <i class="far fa-globe" aria-hidden="true"></i>
            <select name='videolocation' required>
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
            <p><textarea name='blogtext' maxlength='90' placeholder='Type here...' required></textarea></p>
            <br>
            <i class="far fa-file-video-o" aria-hidden="true"></i>
            <input type='file' name='Filename' accept="video/mp4,video/x-m4v,video/*" required>
            <br><br>
            <i class="far fa-tag" aria-hidden="true"></i>
            <select name='videocategory' required>
            <option class="placeholder" selected disabled value="">Category</option>
            <option value="Eats">Eats</option>
            <option value="Adventures">Adventures</option>
            <option value="Vibes">Vibes</option>
            <option value="Stays">Stays</option>
            <option value="Events">Events</option>
            </select>
            <input type="hidden" name="user" value="<?php echo $_SESSION['username'];?>">
            <button type="submit" name="addvideosubmit"><i class="fa fa-video-camera" aria-hidden="true"></i>
            </button>
            </form>
          </div>
        </div>
        <div class='bottomprof'>
          <div class="secondtitle">
            <div class="text-box">
              <h2>posts</h2>
            </div>
          </div>
          <span id="editHere"></span>
          <div class='myprofposts'>
            <?php allPosts(); ?>
          </div>
          <div id='edit-container' style='display:none;'></div>
            <div class='myprofvideoposts'>
              <?php allVideoPosts(); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class='myprofplaces'>
    <div class="bodycontainer">
      <div class="secondtitle">
        <div class="text-box">
          <h2>places visited</h2>
        </div>
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
</html>
