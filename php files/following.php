<?php
require_once ('functions.php');
require_once ('control.php');
$title = "Following | Social Destinations";   // Set the title
$activePage = 'none';          // Set the active page
$city = 'Nashville';              // Set the city
$keywords = 'Following, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
$description = 'Following'; //Set the description
$currentcolor = '#4a90e2';           // (5) Set the color
$currentuser = $_GET['currentuser'];
include "header.php";             // Include the header
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
  <div class="bodycontainer">
    <div class='coverpic'>
      <img src="<?php currentcoverpic(); ?>" alt='coverPic'>
    </div>
    <div class="profile">
      <img src="<?php currentprofpic(); ?>" alt='profilePic' align='middle'>
      <div class='prof_names'>
        <div class="text-box">
          <h2>@<?php echo $currentuser; ?></h2>
        </div>
        <div class="text-box">
          <h5><i class="fa fa-users"></i> Following</h5>
        </div>
      </div>
    </div>
    <div class='feed'>
      <?php allfollowing();?>
    </div>
  </div>
</div>
<?php
include "footer.php";
?>
</body>
</html>