<?php
require_once 'functions.php';
require_once 'control.php';
$title = "Edit Profile | Social Destinations";
$activePage = 'profile';
$city = 'Nashville';
$keywords = 'Edit Profile, Travel, Trips, Adventures, Social Destinations';
$description = 'Edit Your Profile';
$currentcolor = '#4a90e2';
verifySessionAndUser();
global $user, $con;
// Get user data
$userData = getUserProfileData($user);
// Update user profile if form submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateProfile'])) {
updateUserProfile($user, $_POST);
header("Location: my-profile.php");
exit;
}
include "header.php";
?>
<body>
<div id="wrapper">
  <div class="bodycontainer">
    <div class='profile-cover'>
      <img src="<?php mycurrentcoverpic(); ?>" alt='coverPic'>
    </div>
    <div class="profile">
      <img src="<?php mycurrentprofpic(); ?>" alt='profilePic' align='middle'>
      <div class='profile-header'>
        <div class="section-title">
          <a href="my-profile.php"><h2>@<?php echo htmlspecialchars($user); ?></h2></a>
        </div>
        <div class="section-title">
          <h5><?php echo htmlspecialchars($userData['firstname']); ?> <?php echo htmlspecialchars($userData['lastname']); ?></h5>
        </div>
        <div class="followrow">
          <div class='profile-followers'>
            <?php profileFollowers(); ?>
          </div>
          <div class='profile-following'>
            <?php profileFollowees(); ?>
          </div>
        </div>
      </div>
      <?php renderProfileActions('edit'); ?>
      <?php renderProfileEditControls(); ?>
    </div>
    <?php editProf(); ?>
  </div>
</div>
<?php include "footer.php"; ?>
<script src="/js/teleport-autocomplete.js"></script>
<script>
var $results = document.querySelector('.results');
var appendToResult = $results.insertAdjacentHTML.bind($results, 'afterend');
TeleportAutocomplete.init('.my-input').on('change', function(value) {
appendToResult('' +  + '');
});
var $j = jQuery.noConflict();
$j("#datepicker").datepicker();
</script>
</body>
</html>
