<?php
require_once 'control.php';
require_once 'functions.php';
verifySessionAndUser();
$title = "Inbox | Social Destinations";
$city = 'Nashville';
$keywords = 'Inbox, Travel, Trips, Messages, Social Destinations, Social, Destinations';
$description = 'Discover Social Destinations';
$activePage = 'message';
$currentcolor = '#4a90e2';
// Handle inbox message deletion (optional: could be a different column)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inboxdelete'])) {
deleteInboxMessage($_POST['id']);
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
        <div class='prof_actions'>
          <form action="my-profile.php"><button type="submit"><i class="far fa-home"></i><p>Home</p></button></form>
          <form action="inbox.php"><button type="submit" class="highlighted"><i class="far fa-inbox"></i><p>Inbox</p></button></form>
          <form action="sent.php"><button type="submit"><i class="far fa-envelope"></i><p>Sent</p></button></form>
          <form action="edit-profile.php"><button type="submit"><i class="fa fa-pencil-square-o"></i><p>Edit</p></button></form>
          <form action="control.php" method='POST'><button type="submit" name='logout'><i class="far fa-sign-out"></i><p>Logout</p></button></form>
          <button id='changePic'><i class='fa fa-picture-o'></i><p>Edit Photos</p></button>
        </div>
        <div class="messages">
          <div class="maintitle">
            <div class="text-box"><h2>Received Messages</h2></div>
            </div>
            <?php Received(); ?>
          </div>
        </div>
        <?php include "footer.php"; ?>
      </div>
      </body>
      </html>