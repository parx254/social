<?php
require_once 'functions.php';
require_once 'control.php';
verifySessionAndUser();
$title = "Sent Messages | Social Destinations";
$city = 'Nashville';
$keywords = 'Sent, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';
$description = 'Discover Social Destinations';
$activePage = 'message';
$currentcolor = '#4a90e2';
// Handle sent message deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sentdelete'])) {
$messageID = intval($_POST['id'] ?? 0);
if ($messageID > 0) {
if (deleteSentMessage($messageID)) {
// ✅ Optional success redirect
header("Location: sent.php?deleted=1");
exit;
} else {
error_log("Delete failed for message ID: $messageID");
}
}
}
include "header.php";
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<div id="wrapper">
  <div class="bodycontainer">
    <div class='coverpic'>
      <img src="<?php mycurrentcoverpic(); ?>" alt='coverPic'>
    </div>
    <div class="profile">
      <img src="<?php mycurrentprofpic(); ?>" alt='profilePic' align='middle'>
      <div class='prof_names'>
        <div class="text-box">
          <h2>@<?php echo $_SESSION['username']; ?></h2>
        </div>
        <div class="text-box">
          <h5><i class="fa fa-id-card"></i> <?php echo getUserFullName(); ?></h5>
        </div>
      </div>
      <div class='prof_section'>
        <div class='myfollowers'><?php profileFollowers(); ?></div>
          <div class='myfollowees'><?php profileFollowees(); ?></div>
            <?php profile(); ?>
          </div>
        </div>
<?php renderProfileActions('sent'); ?>
        <div class="messages">
          <div class="maintitle">
            <div class="text-box"><h2>Sent Messages</h2></div>
            </div>
            <?php Sent(); ?>
          </div>
        </div>
        <?php include "footer.php"; ?>
      </div>
      </body>
      </html>
