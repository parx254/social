<?php
require_once 'control.php';
require_once 'functions.php';
verifySessionAndUser();   // if you have a session-check helper
$title = "Reply | Social Destinations";
$description = 'Reply';
$city = 'Phoenix';
$keywords = 'Reply, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';
$activePage = 'message';
$currentcolor = '#4a90e2';
$user = $_SESSION['username'] ?? null;
$currentuser = $_GET['currentuser'] ?? null;
$replyid = $_POST['replyid'] ?? null;
$newuser = $replyid ? getMessageReplyTarget($replyid) : null;
if (isset($_POST['submitreply'])) {
$to_user   = $_POST['to_user'];
$from_user = $_POST['from_user'];
$message   = $_POST['message'];
if (sendMessageReply($to_user, $from_user, $message)) {
header('Location: sent.php');
exit;
} else {
echo "<p style='color:red;'>Error sending reply.</p>";
}
}
include "header.php";
?>
<body>
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<div id="wrapper">
  <div class="bodycontainer">
    <div class='coverpic'><img src="<?php mycurrentcoverpic(); ?>" alt='coverPic'></div>
      <div class="profile">
        <form action='reply.php' method='POST'>
        <div class="profiletop">
          <div class='profilepic'>
            <img src="<?php mycurrentprofpic(); ?>" alt='profilePic'>
            <div class='prof_names'>
              <div class="text-box"><h2>@<?php echo $user; ?></h2></div>
                <div class="text-box"><h5><i class="fa fa-id-card"></i> Reply to <?php echo $newuser; ?></h5></div>
                </div>
              </div>
            </div>
            <div class='message'>
              <input type='hidden' name='replyid' value='<?php echo $replyid; ?>'>
              <textarea name='message' maxlength='280' placeholder="Type here..." required></textarea>
              <input type='hidden' name='to_user' value='<?php echo $newuser; ?>'>
              <input type='hidden' name='from_user' value='<?php echo $user; ?>'>
              <button type="submit" name="submitreply" style="margin-top:20px">
              <i class="fa fa-paper-plane" aria-hidden="true"></i>
              </button>
            </div>
            </form>
            <br>
            <a href="my-profile.php">Return to my profile</a>
          </div>
        </div>
      </div>
      <?php include "footer.php"; ?>
      </body>
      </html>