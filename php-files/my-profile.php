<?php
require_once 'functions.php';
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
  <div class="body-container">
    <div class="profile-cover">
      <img src="<?php mycurrentcoverpic(); ?>" alt="coverPic">
    </div>
    <div class="profile">
      <img src="<?php mycurrentprofpic(); ?>" alt="profilePic" align="middle">
      <div class="profile-header">
        <div class="section-title">
          <h2>@<?php echo htmlspecialchars($user); ?></h2>
        </div>
        <div class="section-title">
          <h5><?php echo htmlspecialchars($fname . ' ' . $lname); ?></h5>
        </div>
        <div class="follow-row">
          <div class="profile-followers">
            <?php profileFollowers(); ?>
          </div>
          <div class="profile-following">
            <?php profileFollowees(); ?>
          </div>
        </div>
      </div>
      <?php renderProfileActions('home'); ?>
      <?php renderProfileEditControls(); ?>
      <div class="profile-details">
        <?php profile(); ?>
      </div>
    </div>
    <div class="profile-post">
      <?php renderPostComposer(); ?>
    </div>
    <div class="profile-posts-section">
      <div class="section-header">
        <div class="section-title">
          <h2>posts</h2>
        </div>
      </div>
      <span id="edithere"></span>
      <div class="profile-post-list">
        <?php allPosts(); ?>
      </div>
      <div id="edit-container" style="display:none;">
      </div>
      <div class="profile-video-post-list">
        <?php allVideoPosts(); ?>
      </div>
    </div>
  </div>
  <div class="profile-places-section">
    <div class="body-container">
      <div class="section-header">
        <div class="section-title">
          <h2>places visited</h2>
        </div>
      </div>
      <ul id="profile-places-list">
        <?php placesVisited(); ?>
      </ul>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
<script src="js/post-form.js"></script>
</body>
</html>
