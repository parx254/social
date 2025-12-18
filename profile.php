<?php
require_once ('control.php');
require_once ('functions.php');
// --- Load current and viewed user info ---
$currentuser = $_GET['currentuser'] ?? '';
$profileData = loadOtherUserProfile($currentuser);
$user  = $profileData['logged_user'];
$fname = $profileData['firstname'];
$lname = $profileData['lastname'];
// --- Page meta info ---
$title = "{$currentuser} | Social Destinations";
$activePage = 'profile';
$city = 'Nashville';
$keywords = 'Profile, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';
$description = 'Discover Nashville';
$currentcolor = '#4a90e2';
include "header.php";
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
  <div class="bodycontainer">
    <div class='coverpic'>
      <img src="<?php currentcoverpic($currentuser);; ?>" alt='coverPic'>
    </div>
    <div class="profile">
      <img src="<?php currentprofpic($currentuser); ?>" alt='profilePic' align='middle'>
      <div class='prof_names'>
        <div class="text-box">
          <h2>@<?php echo $currentuser; ?></h2>
        </div>
        <div class="text-box">
          <h5><?php echo $fname; ?> <?php echo $lname; ?></h5>
        </div>
        <div class="followrow">
          <div class='myfollowers'>
            <?php otherFollowers(); ?>
          </div>
          <div class='myfollowees'>
            <?php otherFollowees(); ?>
          </div>
        </div>
      </div>
      <div class='prof_section'>
        <?php profileOption(); ?>
        <?php otherprofile();?>
      </div>
    </div>
    <div class='bottomprof'>
      <div class="secondtitle">
        <div class="text-box">
          <h2>posts</h2>
        </div>
      </div>
      <div class='myprofposts'>
        <?php allOtherPosts($currentuser); ?>
      </div>
      <div class='myprofvideoposts'>
        <?php allOtherVideoPosts($currentuser); ?>
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
        <?php otherplacesVisited(); ?>
        <?php otherplacesVideoVisited(); ?>
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
