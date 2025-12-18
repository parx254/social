<?php
require_once 'functions.php';
require_once 'control.php';
$currentuser = $_GET['currentuser'] ?? '';
$userData = loadUserProfile($currentuser);
$user = $userData['username'] ?? '';
$fname = $userData['firstname'] ?? '';
$lname = $userData['lastname'] ?? '';
$title = "$user | Social Destinations";
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
    <div class="coverpic">
      <img src="<?php mycurrentcoverpic(); ?>" alt="coverPic">
    </div>
    <div class="profile">
      <img src="<?php mycurrentprofpic(); ?>" alt="profilePic" align="middle">
      <div class="prof_names">
        <div class="text-box">
          <a href="my-profile.php"><h2>@<?php echo htmlspecialchars($user); ?></h2></a>
        </div>
        <div class="text-box">
          <h5><?php echo htmlspecialchars($fname . ' ' . $lname); ?></h5>
        </div>
        <div class="followrow">
          <div class="myfollowers">
            <?php profileFollowers(); ?>
          </div>
          <div class="myfollowees">
            <?php profileFollowees(); ?>
          </div>
        </div>
      </div>
      <?php renderProfileActions('home'); ?>
      <?php renderProfileEditControls(); ?>
      <div class="prof_section">
        <?php profile(); ?>
      </div>
    </div>
    <div class="profpost">
      <?php renderPostForm('photo'); ?>
      <?php renderPostForm('video'); ?>
    </div>
    <div class="bottomprof">
      <div class="secondtitle">
        <div class="text-box">
          <h2>posts</h2>
        </div>
      </div>
      <span id="editHere"></span>
      <div class="myprofposts">
        <?php allPosts(); ?>
      </div>
      <div id="edit-container" style="display:none;">
      </div>
      <div class="myprofvideoposts">
        <?php allVideoPosts(); ?>
      </div>
    </div>
  </div>
  <div class="myprofplaces">
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
<?php include "footer.php"; ?>
<script src="js/postform.js"></script>
</body>
</html>
