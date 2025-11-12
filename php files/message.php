<?php
require_once 'control.php';
require_once 'functions.php';
$title = "Message | Social Destinations";
$activePage = 'message';
$city = 'Nashville';
$keywords = 'Message, Travel, Trips, Adventures, Social Destinations';
$description = 'Message';
$currentcolor = '#4a90e2';
verifySessionAndUser();
global $user;
$currentuser = $_GET['currentuser'] ?? '';
if ($user == $currentuser) {
header("location: my-profile.php");
exit;
}
// Handle message submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['submit'])) {
sendMessage($_POST['to_user'], $_POST['from_user'], $_POST['message']);
header("Location: sent.php");
exit;
}
if (isset($_POST['reply'])) {
replyMessage($_POST['to_user'], $_POST['from_user'], $_POST['message'], $_POST['row_id'] ?? null);
header("Location: sent.php");
exit;
}
}
include "header.php";
?>
<body>
<div id="wrapper">
  <div class="bodycontainer">
    <div class='coverpic'>
      <img src="<?php currentcoverpic(); ?>" alt='coverPic'>
    </div>
    <div class="profile">
      <div class="profiletop">
        <img src="<?php currentprofpic(); ?>" alt='profilePic' align='middle'>
        <div class='prof_names'>
          <h2><?php echo htmlspecialchars($currentuser); ?></h2>
          <h5>Send Message</h5>
        </div>
      </div>
      <div class='message'>
        <form action="message.php?currentuser=<?php echo urlencode($currentuser); ?>" method="POST">
        <input type="hidden" name="to_user" value="<?php echo htmlspecialchars($currentuser); ?>" required>
        <textarea name="message" maxlength="280" placeholder="Type here..." required></textarea><br><br>
        From <?php echo htmlspecialchars($user); ?>
        <input type="hidden" name="from_user" value="<?php echo htmlspecialchars($user); ?>">
        <button type="submit" name="submit" style="margin-top:20px">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
        </button>
        </form>
        <a href="my-profile.php">Return to my profile</a>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>