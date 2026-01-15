<?php
require_once 'functions.php';
require_once 'control.php';
$title = "Message | Social Destinations";
$activePage = 'message';
$city = 'Nashville';
$keywords = 'Message, Travel, Trips, Adventures, Social Destinations';
$description = 'Message';
$currentcolor = '#4a90e2';
verifySessionAndUser();
global $user;
$currentuser = $_GET['currentuser'] ?? '';
$currentuser = trim($currentuser);
if ($user === $currentuser) {
header("Location: my-profile.php");
exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$to = $_POST['to_user'] ?? '';
$from = $_POST['from_user'] ?? '';
$msg = $_POST['message'] ?? '';
$row_id = $_POST['row_id'] ?? null;
if (isset($_POST['submit'])) {
sendMessage($to, $from, $msg);
header("Location: messages.php");
exit;
}
if (isset($_POST['reply'])) {
replyMessage($to, $from, $msg, $row_id);
header("Location: messages.php");
exit;
}
}
include "header.php";
?>
<body>
<div id="wrapper">
  <div class="body-container">
    <div class="profile-cover">
      <img src="<?php currentcoverpic(); ?>" alt="Cover Photo">
    </div>
    <div class="profile">
      <img src="<?php currentprofpic($currentuser); ?>" alt="Profile Picture" class="profile-photo">
      <div class="profile-header">
        <div class="section-title">
          <h2>@<?php echo htmlspecialchars($currentuser); ?></h2>
        </div>
        <div class="section-title">
          <h5>Send Message</h5>
        </div>
      </div>
    </div>
    <div class="messages-container">
      <form action="message.php?currentuser=<?php echo urlencode($currentuser); ?>
        " method="POST" class="message-reply-form">
        <input type="hidden" name="to_user" value="<?php echo htmlspecialchars($currentuser); ?>" required>
        <textarea
        name="message"
        placeholder="Type a message…"
        required
        ></textarea>
        <input type="hidden" name="from_user" value="<?php echo htmlspecialchars($user); ?>">
        <button type="submit" name="submit">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
      </button>
    </form>
  </div>
</div>
</div>
<?php include "footer.php"; ?>
</body>
</html>
