<?php
require_once 'control.php';
require_once 'functions.php';
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
    <div class='coverpic'>
      <img src="<?php mycurrentcoverpic(); ?>" alt='coverPic'>
    </div>
    <div class="profile">
      <img src="<?php mycurrentprofpic(); ?>" alt='profilePic' align='middle'>
      <div class='prof_names'>
        <div class="text-box"><h2>@<?php echo htmlspecialchars($user); ?></h2></div>
          <div class="text-box"><h5><i class="fa fa-id-card"></i> <?php echo htmlspecialchars($userData['firstname']); ?> <?php echo htmlspecialchars($userData['lastname']); ?></h5></div>
          </div>
          <div class='prof_section'>
            <div class='myfollowers'><?php profileFollowers(); ?></div>
              <div class='myfollowees'><?php profileFollowees(); ?></div>
                <?php profile(); ?>
              </div>
            </div>
            <div class='prof_actions'>
              <form action="my-profile.php"><button type="submit"><i class="far fa-home"></i><p>Home</p></button></form>
              <form action="inbox.php"><button type="submit"><i class="far fa-inbox"></i><p>Inbox</p></button></form>
              <form action="sent.php"><button type="submit"><i class="far fa-envelope"></i><p>Sent</p></button></form>
              <form action="edit-profile.php"><button type="submit" class="highlighted"><i class="fa fa-pencil-square-o"></i><p>Edit</p></button></form>
              <form action="control.php" method='POST'><button type="submit" name='logout'><i class="far fa-sign-out"></i><p>Logout</p></button></form>
              <button id='changePic'><i class='fa fa-picture-o'></i><p>Edit Photos</p></button>
            </div>
            <div class="maintitle">
              <div class="text-box"><h2>Edit Profile</h2></div>
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