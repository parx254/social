<?php
require_once 'functions.php';
require_once 'control.php';
verifySessionAndUser();
/* --------------------------------------
PAGE META
-------------------------------------- */
$conversationUser = $_GET['user'] ?? null;
$title         = "Messages | Social Destinations";
$city          = 'Nashville';
$keywords      = 'Messages, Inbox, Sent, Travel, Trips, Adventures, Events, Social Destinations';
$description   = 'View and manage your messages on Social Destinations';
$activePage    = 'messages';
$currentcolor  = '#4a90e2';
$conversations = getConversations();
if (!$conversationUser && !empty($conversations)) {
$conversationUser = $conversations[0]['other_user'];
}
/* --------------------------------------
HANDLE SEND MESSAGE
-------------------------------------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
$toUser  = trim($_POST['to_user'] ?? '');
$message = trim($_POST['message'] ?? '');
if ($toUser !== '' && $message !== '') {
sendreplyMessage($toUser, $message);
}
header("Location: messages.php?user=" . urlencode($toUser));
exit;
}
include 'header.php';
?>
<!-- ======================================
MESSAGES (USING EXISTING CSS)
====================================== -->
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<div id="wrapper">
  <div class="body-container">
    <div class='profile-cover'>
      <img src="<?php mycurrentcoverpic(); ?>" alt='coverPic'>
    </div>
    <div class="profile">
      <img src="<?php mycurrentprofpic(); ?>" alt='profilePic' align='middle'>
      <div class='profile-header'>
        <div class="section-title">
          <a href="my-profile.php"><h2>@<?php echo $_SESSION['username']; ?></h2></a>
        </div>
        <div class="section-title">
          <h5><?php echo getUserFullName(); ?></h5>
        </div>
        <div class="follow-row">
          <div class='profile-followers'>
            <?php profileFollowers(); ?>
          </div>
          <div class='profile-following'>
            <?php profileFollowees(); ?>
          </div>
        </div>
      </div>
      <?php renderProfileActions('messages'); ?>
      <?php renderProfileEditControls(); ?>
    </div>
    <div class="messages-container">
      <!-- LEFT: Conversations -->
      <div class="conversation-list">
        <?php
        foreach ($conversations as $conv) {
        $other  = $conv['other_user'];
        $active = ($conversationUser === $other) ? 'active' : '';
        $pic    = getProfilePic($other);
        echo "
        <a href='messages.php?user=$other'
        class='conversation-item $active'>
        <span class='conversation-name'>$other</span>
      </a>
      ";
      }
      ?>
    </div>
    <!-- RIGHT: Conversation Thread -->
    <div class="conversation-messages">
      <?php
      if ($conversationUser) {
      renderConversationMessages($conversationUser);
      }
      ?>
      <?php if ($conversationUser): ?>
      <form method="post" class="message-reply-form">
        <input type="hidden" name="to_user" value="<?= htmlspecialchars($conversationUser) ?>">
        <textarea
        name="message"
        placeholder="Type a message…"
        required
        ></textarea>
        <button type="submit" name="send_message">
        <i class="fa fa-paper-plane" aria-hidden="true"></i>
      </button>
    </form>
    <?php endif; ?>
  </div>
</div>
<?php include 'footer.php'; ?>
</div>
</body>
</html>
