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
      <div class='profile-cover'>
        <img src="<?php currentcoverpic($currentuser);; ?>" alt='coverPic'>
      </div>
      <div class="profile">
        <img src="<?php currentprofpic($currentuser); ?>" alt='profilePic' align='middle'>
        <div class='profile-header'>
          <div class="section-title">
            <h2>@<?php echo $currentuser; ?></h2>
          </div>
          <div class="section-title">
            <h5><?php echo $fname; ?> <?php echo $lname; ?></h5>
          </div>
          <div class="followrow">
            <div class="followrow">
              <div class='profile-followers'>
                <?php profileFollowers($currentuser); ?>
              </div>
              <div class='profile-following'>
                <?php profileFollowees($currentuser); ?>
              </div>
            </div>
          </div>
        </div>
        <div class='profile-details'>
          <div class='messagerow'>
            <?php profileOption(); ?>
          </div>
          <?php otherprofile();?>
        </div>
      </div>
      <div class='profile-posts-section'>
        <div class="section-header">
          <div class="section-title">
            <h2>posts</h2>
          </div>
        </div>
        <div class='profile-post-list'>
          <?php allOtherPosts($currentuser); ?>
        </div>
        <div class='profile-video-post-list'>
          <?php allOtherVideoPosts($currentuser); ?>
        </div>
      </div>
    </div>
    <div class='profile-places-section'>
      <div class="bodycontainer">
        <div class="section-header">
          <div class="section-title">
            <h2>places visited</h2>
          </div>
        </div>
        <ul id="profile-places-list">
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
