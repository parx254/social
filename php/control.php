<?php
$location = str_replace(' ', ' ', $name);
session_start();
/* Database credentials.*/
if (!defined('DB_SERVER'))   define('DB_SERVER', 'localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', 'pamcclel');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', 'Ozzie12!');
if (!defined('DB_NAME'))     define('DB_NAME', 'socialdestinationsdatabase');
/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
  echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n ");
} else {
  $user = $_SESSION['username'];
  // Profile appearance/function for user
  function Sent() {
    global $user;
    global $con;
      // Build SQL query
  $sql    = "SELECT * FROM messages WHERE from_user = '$user' AND sent_deleted = 'no'";
      // Execute SQL query
  $result = $con->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $messageid = $row['id'];
        echo "<table>";
        echo "</td></tr>";
        echo "<tr><td>";
        echo "To ";
        echo $row['to_user'];
        echo "</td></tr>";
        echo "<tr><td>";
        echo "<br>";
        echo $row['message'];
        echo "</td></tr>";
        echo "<form action='sent.php' method='post'>
            <td colspan='2' align='right'>
              <input type='hidden' name='id' value = '$messageid'>
              <button type='submit' name='sentdelete'><i class='far fa-trash' aria-hidden='true'></i></button>
            </td>
          </tr>
      </form>";
        echo "</table>";
        echo "</br>";
      }
    } else {
      echo "";
    }
  }
  function Received() {
    global $user;
    global $con;
      // Build SQL query
  $sql    = "SELECT * FROM messages WHERE to_user = '$user' AND deleted = 'no'";
      // Execute SQL query
  $result = $con->query($sql);
    if ($result->num_rows > 0) {
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $messageid = $row['id'];
        echo "<table>";
        echo "</td></tr>";
        echo "<tr><td>";
        echo "From ";
        echo $row['from_user'];
        echo " ";
        echo "</td></tr>";
        echo "<tr><td>";
        echo "<br> ";
        echo $row['message'];
        echo "</td></tr>";
        echo "<form action='reply.php' method='post'>
            <td colspan='2' align='right'>
              <input type='hidden' name='replyid' value = '$messageid'>
              <button type='submit' name='reply'><i class='fa fa-reply' aria-hidden='true'></i></button>
            </td>
          </tr>
      </form>";
      echo "<form action='inbox.php' method='post'>
            <td colspan='2' align='right'>
              <input type='hidden' name='id' value = '$messageid'>
              <button type='submit' name='delete'><i class='far fa-trash' aria-hidden='true'></i></button>
            </td>
          </tr>
      </form>";
        echo "</table>";
        echo "</br>";
        $q       = "UPDATE messages SET read = 'yes' WHERE to_user = '$user'";
        $result0 = $con->query($q);
      }
    } else {
      echo "";
    }
  }
  function TrashMessages() {
    global $user;
    global $con;
      // Build SQL query
  $sql    = "SELECT * FROM messages WHERE to_user = '$user' AND deleted = 'yes'";
      // Execute SQL query
  $result = $con->query($sql);
    if ($result->num_rows > 0) {
      // output data of each row
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        echo "<table>";
        echo "</td></tr>";
        echo "<tr><td>";
        echo "From ";
        echo $row['from_user'];
        echo "</td></tr>";
        echo "<tr><td>";
        echo "<br>";
        echo $row['message'];
        echo "</td></tr>";
        echo "</table>";
        echo "</br>";
      }
    } else {
      echo "";
    }
  }
function resize_image_and_save($file, $max_width, $max_height, $targetDirectory) {
    list($width, $height) = getimagesize($file);
    $ratio = $width / $height;
    if ($width > $max_width || $height > $max_height) {
        if ($max_width / $max_height > $ratio) {
            $max_width = $max_height * $ratio;
        } else {
            $max_height = $max_width / $ratio;
        }
    } else {
        $max_width = $width;
        $max_height = $height;
    }
    $resized_image = imagecreatetruecolor($max_width, $max_height);
    $image = imagecreatefromjpeg($file);
    imagecopyresampled($resized_image, $image, 0, 0, 0, 0, $max_width, $max_height, $width, $height);
    // Generate a new unique filename
    $new_filename = time() . '_' . basename($file);
    $targetPath = $targetDirectory . $new_filename;
    // Save the resized image to the target directory
    imagejpeg($resized_image, $targetPath);
    // Clean up memory
    imagedestroy($resized_image);
    imagedestroy($image);
    return $targetPath;
}
function addPost() {
    global $user, $con;
    $blogtext = trim($_POST["blogtext"]);
    $location = trim($_POST["location"]);
    $category = trim($_POST["category"]);
    $videolocation = trim($_POST["videolocation"]);
    $videocategory = trim($_POST["videocategory"]);
    $sql = "INSERT INTO posts (Blog, Location, userID, category, videolocation, videocategory) 
            VALUES ('$blogtext', '$location', (SELECT userID FROM users WHERE username = '$user'), '$category', '$videolocation', '$videocategory')";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $con->error;
    } else {
        $postID = $con->insert_id; // Retrieve the ID of the last inserted post
        if(isset($_FILES["Filename"])) {
            $tempFileName = $_FILES["Filename"]["tmp_name"];
            // Specify the target directory
            $targetDirectory = "/home/dzx0rrb61cz9/public_html/Images/";
            // Resize the image and save it to the target directory
            $resized_image_path = resize_image_and_save($tempFileName, 1080, 1080, $targetDirectory);
            // Save image path to the database
            $fileName = basename($resized_image_path);
            $query = "INSERT INTO images (filepath, filename, postID) VALUES ('$resized_image_path', '$fileName', '$postID')";
              // Execute SQL query
  $result = $con->query($query);
            if (!$result) {
                echo "Error: " . $con->error;
            } else {
                header("location: my-profile");
                exit();
            }
        } else {
            echo "Sorry !!! There was an error in uploading your file";
        }
    }
}
  function addVideoPost() {
    global $user;
    global $con;
    $post_err      = "";
    $blogtext      = trim($_POST["blogtext"]);
    $location      = trim($_POST["location"]);
    $category      = trim($_POST["category"]);
    $videolocation = trim($_POST["videolocation"]);
    $videocategory = trim($_POST["videocategory"]);
      // Build SQL query
  $sql           = "INSERT INTO posts (Blog, Location, userID, category, videolocation, videocategory) VALUES ('$blogtext', '$location', (select userID from users where username = '$user'), '$category', '$videolocation', '$videocategory')";
      // Execute SQL query
  $result        = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      $sql2   = "SELECT MAX(PostID) FROM posts";
        // Execute SQL query
  $result = $con->query($sql2);
      if (!$result) {
        echo "Error: " . mysql_error() . "\n";
      } else {
        if ($result->num_rows > 0) {
          $row           = $result->fetch_assoc();
          $postID        = $row['MAX(PostID)'];
          $fileName      = $_FILES['Filename']['name'];
          $new_file_name = time() . $fileName;
          $target        = "/home/dzx0rrb61cz9/public_html/Videos/";
          $fileTarget    = $target . $new_file_name;
          $tempFileName  = $_FILES["Filename"]["tmp_name"];
          $res           = move_uploaded_file($tempFileName, $fileTarget);
          if ($res) {
            $query = "INSERT INTO videos(filepath,filename,postID) VALUES ('$fileTarget','$new_file_name','$postID')";
            $con->query($query) or die("Error : " . mysqli_error($con));
            header("location: my-profile");
          } else {
            echo "Sorry !!! There was an error in uploading your file";
          }
          mysqli_close($con);
        }
      }
    }
  }
  //all javascript/ajax for user profile
  function allJS() {
    global $user;
    global $con;
      // Build SQL query
  $sql    = "SELECT * FROM posts WHERE userID = (select userID from users where username = '$user') ORDER BY Last_Modified DESC";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      echo "<script>";
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $postID = $row['PostID'];
        echo "$(document).ready(function() {";
        echo "$('#delete$postID').click(function(){";
        echo "var postID = $('#postID$postID').val();";
        echo "var dataString = 'postID=' + postID + '&deletePost=true';";
        echo "var c = confirm('Are you sure you want to delete this post?');";
        echo "if (c) {";
        echo "$.ajax({
                      type: 'POST',
                      url: 'control.php',
                      data: dataString,
                      cache: false,
                      success: function() { location.reload(); } });";
        echo "} else { location.reload();}";
        echo "});});";
        $postID = $row['PostID'];
        echo "$(document).ready(function() {";
        echo "$('#edit$postID').click(function(){";
        echo "var postID = $('#postID$postID').val();";
        echo "var dataString = 'postID=' + postID + '&editPost=true';";
        echo "$.ajax({
                      type: 'POST',
                      url: 'control.php',
                      data: dataString,
                      dataType: 'json',
                      cache: false,
                      success: function(data) { $('#editHere').html(data.edithere); $('html, body').animate({ scrollTop: 1200 }, 1000);} });";
        echo "});});";
      }
      echo "</script>";
    }
  }
  function allOtherJS() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT * FROM posts WHERE userID = (select userID from users where username = '$currentuser') ORDER BY Last_Modified DESC";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      echo "<script>";
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $postID = $row['PostID'];
        echo "$(document).ready(function() {";
        echo "$('#like$postID').click(function(){";
        echo "var postID = $('#postID$postID').val();";
        echo "var currentprof = $('#currentuserprof').val();";
        echo "var dataString = 'postID=' + postID + '&currentuser=' + currentprof + '&like=true';";
        echo "$.ajax({
                      type: 'POST',
                      url: 'control.php',
                      data: dataString,
                      cache: false,
                      success: function() { location.reload(); } });";
        echo "});});";
      }
      echo "</script>";
    }
  }
  //display all posts on page
  function allPosts() {
    global $user;
    global $con;
      // Build SQL query
  $sql    = "SELECT * FROM posts WHERE userID = (select userID from users where username = '$user') AND category in ('stays', 'events', 'eats', 'adventures', 'vibes') ORDER BY Last_Modified DESC";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $postID  = $row['PostID'];
          // Build SQL query
  $sql     = "SELECT * FROM images WHERE postID = '$postID'";
        $results = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        } else {
          $date_posted = $row['Last_Modified'];
          $date_posted = date("F d, Y", strtotime($date_posted));
          echo "<div class='postcontent'>";
          echo "<div class='postcontenttop'>";
          while ($row2 = $results->fetch_assoc()) {
            echo "<img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'> ";
          }
echo "<div class='post-details'>";
  echo "<div class='post-date'><i class='fa fa-calendar-o' aria-hidden='true'></i> $date_posted</div>";
  if (!empty($row['Location'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['Location']}</div>";
  }
  if (!empty($row['videolocation'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['videolocation']}</div>";
  }
  if (!empty($row['category'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['category']}</div>";
  }
  if (!empty($row['videocategory'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['videocategory']}</div>";
  }
  echo "<div class='post-content'>{$row['Blog']}</div>";
  echo "<div class='post-likes'><i class='fa fa-heart-o'></i> {$row['likes']}</div>";
echo "</div></div>";
          //echo $postID;
          echo "<input id = 'postID$postID' type = 'hidden' name = 'postID' value = '" . $postID . "'></form>";
          echo "<input id = 'formID' type = 'hidden' name = 'formID' value = '#form$postID'></form>";
          echo "<button id = 'delete$postID' class='delete'><i class='far fa-trash' aria-hidden='true'></i></button>";
          echo "<button id = 'edit$postID' class='edit'><i class='far fa-edit' aria-hidden='true' ></i></button><br></p>";
          echo "</div>";
        }
      }
    } else {
      echo "You haven't created any posts yet!";
    }
  }
  function allVideoPosts() {
    global $user;
    global $con;
      // Build SQL query
  $sql    = "SELECT * FROM posts WHERE userID = (select userID from users where username = '$user') AND videocategory in ('stays', 'eats', 'events', 'adventures', 'vibes') ORDER BY Last_Modified DESC";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $postID  = $row['PostID'];
          // Build SQL query
  $sql     = "SELECT * FROM videos WHERE postID = '$postID'";
        $results = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        } else {
          $date_posted = $row['Last_Modified'];
          $date_posted = date("F d, Y", strtotime($date_posted));
          echo "<div class='postcontent'>";
          echo "<div class='postcontenttop'>";
          while ($row2 = $results->fetch_assoc()) {
            echo "<div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' preload='metadata' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . '#t=.1' . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video></div>";
          }
echo "<div class='post-details'>";
  echo "<div class='post-date'><i class='fa fa-calendar-o' aria-hidden='true'></i> $date_posted</div>";
  if (!empty($row['Location'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['Location']}</div>";
  }
  if (!empty($row['videolocation'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['videolocation']}</div>";
  }
  if (!empty($row['category'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['category']}</div>";
  }
  if (!empty($row['videocategory'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['videocategory']}</div>";
  }
  echo "<div class='post-content'>{$row['Blog']}</div>";
  echo "<div class='post-likes'><i class='fa fa-heart-o'></i> {$row['likes']}</div>";
echo "</div></div>";
          //echo $postID;
          echo "<input id = 'postID$postID' type = 'hidden' name = 'postID' value = '" . $postID . "'></form>";
          echo "<input id = 'formID' type = 'hidden' name = 'formID' value = '#form$postID'></form>";
          echo "<button id = 'delete$postID' class='delete'><i class='far fa-trash' aria-hidden='true'></i></button><br></p>";
          echo "</div>";
        }
      }
    } else {
      echo "";
    }
  }
  //show more posts
  //delete a post from page and DB
  function deletePost() {
    global $user;
    global $con;
    $postID = $_POST['postID'];
      // Build SQL query
  $sql    = "DELETE FROM images WHERE postID ='$postID'";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
      // Build SQL query
  $sql    = "DELETE FROM posts WHERE PostID ='$postID'";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
  }
  //edit a post on the page and DB
  function editPost() {
    global $user;
    global $con;
    $postID = $_POST['postID'];
      // Build SQL query
  $sql    = "SELECT * FROM posts WHERE PostID ='$postID'";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row         = $result->fetch_assoc();
      $location    = $row['Location'];
      $date_posted = $row['Last_Modified'];
      $date_posted = date("F d, Y", strtotime($date_posted));
      $blog        = $row['Blog'];
      $editform    = "<div class='editprofposts'><form action='control' method='POST'>
      <p>
      <h3>Edit Post from $location on $date_posted</h3><br>
    <p><textarea name='blogtext' maxlength='160' rows='10' value='$blog' required>$blog</textarea></p>
      <br>
      <i class='far fa-globe' aria-hidden='true'></i>
          <select name = 'location' required>
          <option class='placeholder' selected disabled value=''>Location</option>
          <option value='Amsterdam'>Amsterdam</option>
          <option value='Athens'>Athens</option>
          <option value='Atlanta'>Atlanta</option>
          <option value='Austin'>Austin</option>
          <option value='Barcelona'>Barcelona</option>
          <option value='Berlin'>Berlin</option>
          <option value='Boston'>Boston</option>
          <option value='Calgary'>Calgary</option>
      <option value='Charlotte'>Charlotte</option>
          <option value='Chicago'>Chicago</option>
          <option value='Cincinnati'>Cincinnati</option>
          <option value='Columbus'>Columbus</option>
          <option value='Dallas'>Dallas</option>
          <option value='Denver'>Denver</option>
            <option value='Detroit'>Detroit</option>
            <option value='Edmonton'>Edmonton</option>
            <option value='Honolulu'>Honolulu</option>
            <option value='Houston'>Houston</option>
            <option value='Jacksonville'>Jacksonville</option>
            <option value='Kansas City'>Kansas City</option>
            <option value='Indianapolis'>Indianapolis</option>
            <option value='Las Vegas'>Las Vegas</option>
            <option value='London'>London</option>
            <option value='Los Angeles'>Los Angeles</option>
            <option value='Memphis'>Memphis</option>
            <option value='Miami'>Miami</option>
            <option value='Milan'>Milan</option>
            <option value='Minneapolis'>Minneapolis</option>
            <option value='Montreal'>Montreal</option>
            <option value='Moscow'>Moscow</option>
            <option value='Nashville'>Nashville</option>
            <option value='New Orleans'>New Orleans</option>
            <option value='New York City'>New York City</option>
            <option value='Orlando'>Orlando</option>
            <option value='Paris'>Paris</option>
            <option value='Philadelphia'>Philadelphia</option>
            <option value='Phoenix'>Phoenix</option>
            <option value='Pittsburgh'>Pittsburgh</option>
            <option value='Portland'>Portland</option>
            <option value='Rome'>Rome</option>
            <option value='Saint Louis'>Saint Louis</option>
            <option value='San Antonio'>San Antonio</option>
            <option value='San Diego'>San Diego</option>
            <option value='San Francisco'>San Francisco</option>
            <option value='Seattle'>Seattle</option>
            <option value='Tampa'>Tampa</option>
            <option value='Toronto'>Toronto</option>
            <option value='Vancouver'>Vancouver</option>
            <option value='Venice'>Venice</option>
            <option value='Washington DC'>Washington DC</option>
      </select></p>
      <br>
      <i class='far fa-tag' aria-hidden='true'></i>
      <select name = 'category' required>
            <option class='placeholder' selected disabled value=''>Category</option>
            <option value='Eats'>Eats</option>
            <option value='Excursion'>Excursion</option>
            <option value='Vibes'>Vibes</option>
            <option value='Stays'>Stays</option>
            <option value='Events'>Events</option>
      </select>
      <input type = 'hidden' name = 'postID' value = '$postID'>
      <button type='submit' name='editsubmit'><i class='fa fa-refresh' aria-hidden='true'></i>
              </button>
      <button type='submit' name='editno'><i class='far fa-times' aria-hidden='true'></i>
              </button>
      </form></div><br><br>";
      echo json_encode(array(
        'edithere' => $editform
      ));
    } else {
      echo json_encode(array(
        'edithere' => "cannot find post to edit!"
      ));
    }
  }
  //submit the edit and update DB
  function editSubmit() {
    global $user;
    global $con;
    $blogtext = trim($_POST["blogtext"]);
    $location = trim($_POST["location"]);
    $category = trim($_POST["category"]);
    $postID   = trim($_POST["postID"]);
      // Build SQL query
  $sql      = "UPDATE posts SET Blog = '$blogtext', Location = '$location', category = '$category' WHERE PostID ='$postID'";
      // Execute SQL query
  $result   = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      header("location: my-profile");
    }
  }
  function editno() {
    header("location: my-profile");
  }
  //edit personal information on profile
  function editProf() {
    global $user;
    global $con;
    $bio    = $birthday = $city = $new_user = $create = "";
      // Build SQL query
  $sql    = "SELECT Bio,Birthday,HomeCity FROM profiles where userID = (select userID from users where username = '$user')";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    } else {
      echo "We can't find your current info at the moment!";
    }
    echo "<div class='profpost'>";
    $bio      = "<textarea name='bio' ;' form = updateProfile required>" . $row['Bio'] . "</textarea><br>";
    $birthday = "<input type='date' name='birthday' value='" . $row['Birthday'] . "' required><br>";
    $city     = "<input type='text' class='my-input' name='city' tabindex='1' autocomplete='off' required>";
    $create   = "<br><button type='submit' name = 'updateProf' class = 'editprofposts button'><i class='fa fa-refresh' aria-hidden='true'></i>
</button>";
    echo "<form action='control' method='POST' id = 'updateProfile'><i class='far fa-info-circle' aria-hidden='true'></i>
" . $bio . "<br><i class='far fa-birthday-cake' aria-hidden='true'></i>
" . $birthday . "<br><i class='far fa-home-alt' aria-hidden='true'></i>" . $city . $create . "</form></div></div>";
    echo "<div class='results'></div>";
  }
  //update DB with edits to profile
  function updateProf() {
    global $user;
    global $con;
    $varbio     = $_POST['bio'];
    $varbirth   = $_POST['birthday'];
    $varcity    = $_POST['city'];
    $varcountry = $_POST['country'];
    echo $varbio . $varbirth . $varcity;
      // Build SQL query
  $sql    = "UPDATE profiles SET Bio = '$varbio', Birthday = '$varbirth', HomeCity = '$varcity' WHERE userID = (select userID from users where username = '$user');";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      header("location: my-profile");
    }
  }
  //not complete for explore page
  //log out of account
  function logout() {
    echo "Logged out!";
    // Initialize the session
    session_start();
    // Unset all of the session variables
    $_SESSION = array();
    // Destroy the session.
    session_destroy();
    // Redirect to login page
    header("location: index.php");
    exit;
  }
  //incomplete
  function newProfile() {
    echo "working - establish info on profile";
  }
  //locations visited on profile
function placesVisited() {
    global $user;
    global $con;
    // Build SQL query: only pull rows with a non-empty Location
    $sql = "SELECT DISTINCT Location 
            FROM posts 
            WHERE userID = (SELECT userID FROM users WHERE username = '$user')
              AND TRIM(Location) <> ''";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $con->error . "\n"; // use mysqli error, not mysql_error
        return;
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $location = trim($row['Location']);
            if ($location !== "") {
                echo "<li class='placesvisited'>
                        <a href='" . str_replace(" ", "-", $location) . "'>" . htmlspecialchars($location) . "</a>
                      </li>";
            }
        }
    } else {
        echo "You haven't posted any photos yet!";
    }
}
function placesVideoVisited() {
    global $user;
    global $con;
    $sql = "SELECT DISTINCT videolocation 
            FROM posts 
            WHERE userID = (SELECT userID FROM users WHERE username = '$user')
              AND TRIM(videolocation) <> ''";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $con->error . "\n";
        return;
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $videoLocation = trim($row['videolocation']);
            if ($videoLocation !== "") {
                echo "<li class='placesvisited'>
                        <a href='" . str_replace(" ", "-", htmlspecialchars($videoLocation)) . "'>" 
                            . htmlspecialchars($videoLocation) . 
                        "</a>
                      </li>";
            }
        }
    } else {
        echo "You haven't post any videos yet!";
    }
}
function otherplacesVisited() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
    $sql = "SELECT DISTINCT Location 
            FROM posts 
            WHERE userID = (SELECT userID FROM users WHERE username = '$currentuser')
              AND TRIM(Location) <> ''";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $con->error . "\n";
        return;
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $location = trim($row['Location']);
            if ($location !== "") {
                echo "<li class='placesvisited'>
                        <a href='" . str_replace(" ", "-", htmlspecialchars($location)) . "'>" 
                            . htmlspecialchars($location) . 
                        "</a>
                      </li>";
            }
        }
    } else {
        echo "No places yet.";
    }
}
function otherplacesVideoVisited() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
    $sql = "SELECT DISTINCT videolocation 
            FROM posts 
            WHERE userID = (SELECT userID FROM users WHERE username = '$currentuser')
              AND TRIM(videolocation) <> ''";
    $result = $con->query($sql);
    if (!$result) {
        echo "Error: " . $con->error . "\n";
        return;
    }
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $videoLocation = trim($row['videolocation']);
            if ($videoLocation !== "") {
                echo "<li class='placesvisited'>
                        <a href='" . str_replace(" ", "-", htmlspecialchars($videoLocation)) . "'>" 
                            . htmlspecialchars($videoLocation) . 
                        "</a>
                      </li>";
            }
        }
    } else {
        echo "";
    }
}
  //if not entered yet, prompts user to finish profile. if done, displays it
  function profile() {
    global $user;
    global $con;
    $bio    = $birthday = $city = $new_user = $create = "";
      // Build SQL query
  $sql    = "SELECT Bio,Birthday,HomeCity FROM profiles where userID = (select userID from users where username = '$user')";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (empty($row['Bio']) && empty($row['Birthday']) && empty($row['HomeCity'])) {
        $new_user = "<h2>Welcome!</h2><br> <h5>Please fill out the following information to complete your profile.</h5><br>";
        $bio      = "<textarea name='blogtext' rows='10' placeholder='Biography' required></textarea><br><br>";
        $birthday = "<input type='date' name='birthday' value='" . $row['Birthday'] . "' required><br><br>";
        $city     = "<input type='text' class='my-input' name='city' tabindex='1' autocomplete='off' required>";
        echo "<div class='results'></div>";
        $create = "<center><input type='submit' class='login-group submit' name = 'userinfo-submit' value='Submit'></center>";
        echo "" . $new_user . "<form action='control' method='POST'><b>Bio:</b> " . $bio . "<b>Birthday:</b> " . $birthday . "<b>Home Town:</b> " . $city . $create . "</form>";
      } else {
        $bio        = $row['Bio'];
        $birthday   = $row['Birthday'];
        $city       = $row['HomeCity'];
        $dob        = new DateTime($birthday);
        $now        = new DateTime();
        $difference = $now->diff($dob);
        $age        = $difference->y;
        echo "<div class='bio'><i class='far fa-info-circle' aria-hidden='true'></i> " . $bio . "</div>";
        echo "<div class='age'><i class='far fa-birthday-cake' aria-hidden='true'></i> " . $age . " years old</div>";
        echo "<div class='city'><i class='far fa-home-alt' aria-hidden='true'></i> From " . $city . "</div></div>";
        echo "
              <div id='changeHere'>
              <form method='post' action='control' enctype='multipart/form-data'>
                  Change Profile Photo
                  <input type='file' name='Filename' required>
                  <br>
                  <br>
              <button type='submit' name='profilePic'><i class='far fa-camera' aria-hidden='true'></i></button></form>
              <br>
              <form method='post' action='control' enctype='multipart/form-data'>
                  Change Cover Photo
                  <input type='file' name='Filename' required>
                  <br>
                  <br>
              <button type='submit' name='coverPic'><i class='far fa-camera' aria-hidden='true'></i></button></form>
              ";
      }
    } else {
      echo "you don't exist";
    }
  }
  //edit profile picture
  function profilePic() {
    global $user;
    global $con;
    $fileName      = $_FILES['Filename']['name'];
    $random_digit  = rand(0000, 9999);
    $new_file_name = $random_digit . $fileName;
    $target        = "/home/dzx0rrb61cz9/public_html/Images/prof_pics/";
    $fileTarget    = $target . $new_file_name;
    $tempFileName  = $_FILES["Filename"]["tmp_name"];
    $result        = move_uploaded_file($tempFileName, $fileTarget);
    /*
    *    If file was successfully uploaded in the destination folder
    */
    if ($result) {
      $query = "UPDATE users SET profilePic = '$fileTarget', picName = '$new_file_name' WHERE username = '$user'";
      $con->query($query) or die("Error : " . mysqli_error($con));
      header("location: my-profile");
    } else {
      echo "Sorry !!! There was an error in uploading your file";
    }
    mysqli_close($con);
  }
  //display profile picture
  function currentprofpic() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT picName FROM users WHERE userID = (select userID from users where username = '$currentuser')";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "Images/prof_pics/" . $row['picName'];
    }
  }
  function mycurrentprofpic() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT picName FROM users WHERE userID = (select userID from users where username = '$user')";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "Images/prof_pics/" . $row['picName'];
    }
  }
  //edit profile picture
  function coverPic() {
    global $user;
    global $con;
    $fileName      = $_FILES['Filename']['name'];
    $random_digit  = rand(0000, 9999);
    $new_file_name = $random_digit . $fileName;
    $target        = "/home/dzx0rrb61cz9/public_html/Images/cover_pics/";
    $fileTarget    = $target . $new_file_name;
    $tempFileName  = $_FILES["Filename"]["tmp_name"];
    $result        = move_uploaded_file($tempFileName, $fileTarget);
    /*
    *    If file was successfully uploaded in the destination folder
    */
    if ($result) {
      $query = "UPDATE users SET coverPic = '$fileTarget', coverName = '$new_file_name' WHERE username = '$user'";
      $con->query($query) or die("Error : " . mysqli_error($con));
      header("location: my-profile");
    } else {
      echo "Sorry !!! There was an error in uploading your file";
    }
    mysqli_close($con);
  }
  //display profile picture
  function currentcoverpic() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT coverName FROM users WHERE userID = (select userID from users where username = '$currentuser')";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "Images/cover_pics/" . $row['coverName'];
    }
  }
  function mycurrentcoverpic() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT coverName FROM users WHERE userID = (select userID from users where username = '$user')";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "Images/cover_pics/" . $row['coverName'];
    }
  }
  //remove photo from post
  function removePhotos() {
    global $user;
    global $con;
    $postID = $_POST['postID'];
      // Build SQL query
  $sql    = "DELETE FROM images WHERE postID ='$postID'";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
  }
  //feed - only people you follow
function myfeed() {
    global $user;
    global $con;
    // build posts query with subquery
    $sql2 = "
        SELECT * 
        FROM posts 
        WHERE userID IN (
            SELECT followee 
            FROM follows 
            WHERE follower = (SELECT userID FROM users WHERE username = '" . $con->real_escape_string($user) . "')
        )
        AND Location IS NOT NULL 
        AND Location <> '' 
        ORDER BY Last_Modified DESC
    ";
    $resultPosts = $con->query($sql2);
    if (!$resultPosts) {
        echo "Error: " . $con->error . "\n";
        return;
    }
    if ($resultPosts->num_rows > 0) {
        while ($row = $resultPosts->fetch_assoc()) {
            // fetch user info
            $sql3 = "SELECT username, picName FROM users WHERE userID = " . intval($row['userID']);
            $userResult = $con->query($sql3);
            if (!$userResult) {
                echo "Error: " . $con->error . "\n";
                continue;
            }
            $row3 = $userResult->fetch_assoc();
            $username = $row3['username'];
            $pic = $row3['picName'];
            $date_posted = date("F d, Y", strtotime($row['Last_Modified']));
            // fetch images for this post
            $sql4 = "SELECT * FROM images WHERE postID = " . intval($row['PostID']);
            $imageResults = $con->query($sql4);
            echo "<div class='feedPost'>";
            while ($img = $imageResults->fetch_assoc()) {
                echo "<div class='feedimg'>
                        <img src='Images/" . $img['filename'] . "' class='object-fit_cover'>
                      </div>";
            }
            // post info
            echo "<div class='feedPost2'>
                    <div class='feedPostTitle'>
                        <a href='profile.php?currentuser=$username'>
                            <img src='Images/prof_pics/$pic'>
                        </a>
                        <b><a href='profile.php?currentuser=$username'>$username</a></b>
                    </div>
                    <form method='POST'>
                        <br><p><i class='far fa-calendar'></i> $date_posted<br>
                        <p><i class='far fa-map-marker-alt'></i> " . $row['Location'] . "<br>
                        <i class='far fa-tag'></i> " . $row['category'] . "<br><br>
                        " . $row['Blog'] . "<br><br>
                        <i class='far fa-heart'></i> " . $row['likes'] . "
                        <button id='like" . $row['PostID'] . "' class='like'>
                            <i class='far fa-thumbs-up'></i>
                        </button>
                    </form>
                  </div></div>";
        }
    }
}
  function myvideofeed() {
    global $user;
    global $con;
    // build posts query directly with subquery
    $sql2 = "
        SELECT * 
        FROM posts 
        WHERE userID IN (
            SELECT followee 
            FROM follows 
            WHERE follower = (SELECT userID FROM users WHERE username = '" . $con->real_escape_string($user) . "')
        )
        AND videocategory IN ('stays','eats','events','adventures','vibes')
        AND videolocation IS NOT NULL 
        AND videolocation <> '' 
        ORDER BY Last_Modified DESC
    ";
    $resultPosts = $con->query($sql2);
    if (!$resultPosts) {
        echo "Error: " . $con->error . "\n";
        return;
    }
    if ($resultPosts->num_rows > 0) {
        while ($row = $resultPosts->fetch_assoc()) {
            // fetch user info
            $sql3 = "SELECT username, picName FROM users WHERE userID = " . intval($row['userID']);
            $userResult = $con->query($sql3);
            if (!$userResult) {
                echo "Error: " . $con->error . "\n";
                continue;
            }
            $row3 = $userResult->fetch_assoc();
            $username = $row3['username'];
            $pic = $row3['picName'];
            $date_posted = date("F d, Y", strtotime($row['Last_Modified']));
            // fetch videos for this post
            $sql4 = "SELECT * FROM videos WHERE postID = " . intval($row['PostID']);
            $videoResults = $con->query($sql4);
            while ($video = $videoResults->fetch_assoc()) {
                echo "<div class='feedPost'><div class='feedimg'>
                        <video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'>
                            <source src='Videos/" . $video['filename'] . "' type='video/mp4'>
                        </video>
                      </div>";
            }
            // post info
            echo "<div class='videofeedPost2'>
                    <div class='videofeedPostTitle'>
                        <a href='profile.php?currentuser=$username'>
                            <img src='Images/prof_pics/$pic'>
                        </a>
                        <b><a href='profile.php?currentuser=$username'>$username</a></b>
                    </div>
                    <p><i class='far fa-calendar'></i> $date_posted<br>
                    <p><i class='far fa-map-marker-alt'></i> " . $row['videolocation'] . "<br>
                    <i class='far fa-tag'></i> " . $row['videocategory'] . "<br><br>
                    " . $row['Blog'] . "<br><br>
                    <i class='far fa-heart'></i> " . $row['likes'] . "
                  </div></div>";
        }
    }
}
  //displays button to follow/unfollow
  function profileOption() {
    global $user;
    global $con;
    if(isset($_SESSION['username'])){
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT * FROM follows WHERE follower = (select userID from users where username = '$user') AND followee = (select userID from users where username = '$currentuser')";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      echo "<div class='followuser'><form action='control' method='POST'>";
      echo "<input type = 'hidden' name = 'currentuser' value = '$currentuser'>";
      echo "<button type='submit' name='unfollow'><i class='far fa-user-minus'></i></button>";
      echo "</form></div>";
      echo "<div class='messageuser'><button><a href='message.php?currentuser=$currentuser'>";
      echo "<i class='far fa-envelope' aria-hidden='true'></i></a></button></div>";
    } else {
      echo "<div class='followuser'><form action='control' method='POST'>";
      echo "<input type = 'hidden' name = 'currentuser' value = '$currentuser'>";
      echo "<button type='submit' name='follow'><i class='far fa-user-plus'></i></button>";
      echo "</form></div>";
      echo "<div class='messageuser'><button><a href='message.php?currentuser=$currentuser'>";
      echo "<i class='far fa-envelope' aria-hidden='true'></i></a></button></div>";
    }
  }
  }
  //follow another user 
  function follow() {
    global $user;
    global $con;
    $currentuser = $_POST['currentuser'];
      // Build SQL query
  $sql         = "select userID from users where username = '$currentuser'";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row      = $result->fetch_assoc();
      $followee = $row['userID'];
    }
    $sql2   = "select userID from users where username = '$user'";
      // Execute SQL query
  $result = $con->query($sql2);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row      = $result->fetch_assoc();
      $follower = $row['userID'];
    }
    $sql3   = "INSERT INTO follows (follower, followee) VALUES ($follower, $followee)";
      // Execute SQL query
  $result = $con->query($sql3);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  //unfollow another user
  function unfollow() {
    global $user;
    global $con;
    $currentuser = $_POST['currentuser'];
      // Build SQL query
  $sql         = "DELETE FROM follows WHERE follower = (select userID from users where username = '$user') AND followee = (select userID from users where username = '$currentuser')";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  //follows for user profile
  function profileFollowers() {
    global $con;
    global $user;
      // Build SQL query
  $sql    = "SELECT COUNT(follower) FROM follows WHERE followee = (select userID from users where username = '$user')";
      // Execute SQL query
  $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<div class='nums'><h5><a href='followers.php?currentuser=$user'>" . $row['COUNT(follower)'] . " Followers </a></h5></div>";
    }
  }
  function profileFollowees() {
    global $con;
    global $user;
    $sql2   = "SELECT COUNT(followee) FROM follows WHERE follower = (select userID from users where username = '$user')";
      // Execute SQL query
  $result = $con->query($sql2);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<div class='nums'><h5><a href='following.php?currentuser=$user'>" . $row['COUNT(followee)'] . " Following </a></h5></div>";
    }
  }
  //incomplete
  function registration() {
    global $con;
    $username         = $_POST['username'];
    $fullname         = $_POST['fullname'];
    $email            = $_POST['email'];
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
  }
  //All profile of other users
  //incomplete -- or not necessary
  function test() {
    global $user;
    $currentuser = $_GET['currentuser'];
    echo $user;
    echo $currentuser;
    if ($user == $currentuser) {
      echo "true";
    } else {
      echo "false";
    }
  }
  //other user profiles -- cannot edit this personal info
  function otherprofile() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
    $bio         = $birthday = $age = $city = $new_user = $create = "";
      // Build SQL query
  $sql         = "SELECT Bio,Birthday,HomeCity FROM profiles where userID = (select userID from users where username = '$currentuser')";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (empty($row['Bio']) && empty($row['Birthday']) && empty($row['HomeCity'])) {
        echo "<div class='bio'>This user has not yet completed their profile.</div>";
      } else {
        $bio        = $row['Bio'];
        $birthday   = $row['Birthday'];
        $city       = $row['HomeCity'];
        $dob        = new DateTime($birthday);
        $now        = new DateTime();
        $difference = $now->diff($dob);
        $age        = $difference->y;
        echo "<div class='bio'><i class='far fa-info-circle' aria-hidden='true'></i> " . $bio . "</div>";
        echo "<div class='age'><i class='far fa-birthday-cake' aria-hidden='true'></i> " . $age . " years old</div>";
        echo "<div class='city'><i class='far fa-home-alt' aria-hidden='true'></i> From " . $city . "</div>";
      }
    }
  }
  function like() {
    global $user;
    global $con;
    $postID = $_POST['postID'];
    $query  = "UPDATE posts SET likes = likes + 1 WHERE PostID = $postID";
    $con->query($query) or die("Error : " . mysqli_error($con));
  }
  function allOtherPosts() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT * FROM posts WHERE userID = (select userID from users where username = '$currentuser') AND category in ('stays', 'eats', 'events', 'adventures', 'vibes') ORDER BY Last_Modified DESC";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $postID  = $row['PostID'];
          // Build SQL query
  $sql     = "SELECT * FROM images WHERE postID = '$postID'";
        $results = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        } else {
          $date_posted = $row['Last_Modified'];
          $date_posted = date("F d, Y", strtotime($date_posted));
          echo "<div class='postcontent'>";
          echo "<div class='postcontenttop'>";
          while ($row2 = $results->fetch_assoc()) {
            echo "<img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'></div>";
          }
          //echo "<div class='overlap'><h3>" . $row['Location'] . "</h3>"   . "<br></div>*/</div><br>";
          echo "<form method='POST'>";
echo "<div class='post-details'>";
  echo "<div class='post-date'><i class='fa fa-calendar-o' aria-hidden='true'></i> $date_posted</div>";
  if (!empty($row['Location'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['Location']}</div>";
  }
  if (!empty($row['videolocation'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['videolocation']}</div>";
  }
  if (!empty($row['category'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['category']}</div>";
  }
  if (!empty($row['videocategory'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['videocategory']}</div>";
  }
  echo "<div class='post-content'>{$row['Blog']}</div>";
  echo "<div class='post-likes'><i class='fa fa-heart-o'></i> {$row['likes']}</div>";
          echo "<input type = 'hidden' name = 'postID' value = '$postID'>";
            if(isset($_SESSION['username']) || !empty($_SESSION['username'])) { 
          echo "<button type='submit' class='like' name='like'><i class='far fa-thumbs-up'></i></button>";
            }
          echo "</form>";
          echo "</div></div>";
        }
      }
    } else {
      echo "No posts yet.</div></div><div>";
    }
  }
  function allOtherVideoPosts() {
    global $user;
    global $con;
    $currentuser = $_GET['currentuser'];
      // Build SQL query
  $sql         = "SELECT * FROM posts WHERE userID = (select userID from users where username = '$currentuser') AND videocategory in ('stays', 'eats', 'events', 'adventures', 'vibes') ORDER BY Last_Modified DESC";
      // Execute SQL query
  $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
        // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
        $postID  = $row['PostID'];
          // Build SQL query
  $sql     = "SELECT * FROM videos WHERE postID = '$postID'";
        $results = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        } else {
          $date_posted = $row['Last_Modified'];
          $date_posted = date("F d, Y", strtotime($date_posted));
          echo "<div class='postcontent'>";
          echo "<div class='postcontenttop'>";
          while ($row2 = $results->fetch_assoc()) {
            echo "<video controls disablePictureInPicture controlsList='nodownload' preload='metadata' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . '#t=.1' . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'></video></div>";
          }
          echo "<form method='POST'>";
echo "<div class='post-details'>";
  echo "<div class='post-date'><i class='fa fa-calendar-o' aria-hidden='true'></i> $date_posted</div>";
  if (!empty($row['Location'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['Location']}</div>";
  }
  if (!empty($row['videolocation'])) {
    echo "<div class='post-location'><i class='far fa-map-marker-alt' aria-hidden='true'></i> {$row['videolocation']}</div>";
  }
  if (!empty($row['category'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['category']}</div>";
  }
  if (!empty($row['videocategory'])) {
    echo "<div class='post-category'><i class='far fa-tag' aria-hidden='true'></i> {$row['videocategory']}</div>";
  }
  echo "<div class='post-content'>{$row['Blog']}</div>";
  echo "<div class='post-likes'><i class='fa fa-heart-o'></i> {$row['likes']}</div>";
          echo "<input type = 'hidden' name = 'postID' value = '$postID'>";
            if(isset($_SESSION['username']) || !empty($_SESSION['username'])) { 
          echo "<button type='submit' class='like' name='like'><i class='far fa-thumbs-up'></i></button>";
            }
          echo "</form>";
          echo "</div></div>";
        }
      }
    } else {
      echo "";
    }
  }
  //like other posts -- incomplete
  /*
  function like() {
  global $user;
  global $con;
  $currentuser = $_POST['currentuser'];
  $postID = $_POST['postID'];
  $query = "UPDATE posts SET likes = likes + 1 WHERE PostID = '$postID'";
  $con->query($query) or die("Error : ".mysqli_error($con));
  if (!$result){
  echo "Error: " . mysql_error() . "\n";
  }
  if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $likee = $row['userID'];
  }
  $sql2 = "select username from users where username = '$user'";
    // Execute SQL query
  $result = $con->query($sql2);
  if (!$result){
  echo "Error: " . mysql_error() . "\n";
  }
  if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $liker = $row['userID'];
  }
  $sql4 = "select PostID from posts where PostID = $postID";
    // Execute SQL query
  $result = $con->query($sql4);
  if (!$result){
  echo "Error: " . mysql_error() . "\n";
  }
  if ($result->num_rows > 0){
  $row = $result->fetch_assoc();
  $PostID = $row['PostID'];
  }
  $sql3 = "INSERT INTO likes (postID, likee, liker) VALUES ($PostID, $likee, $liker)";
    // Execute SQL query
  $result = $con->query($sql3);
  if (!$result){
  echo "Error: " . mysql_error() . "\n";
  }
  //$query2 = "INSERT INTO likes (postID, likee, liker) VALUES ($postID, '$currentuser', '$user')";
  //$con->query($query2) or die("Error : ".mysqli_error($con));
  }
  */
  //check for submits and run corresponding function(s)
  //from profile page
  if (isset($_POST['userinfo-submit'])) {
    updateProf();
  }
  if (isset($_POST['addsubmit'])) {
    addPost();
  }
  if (isset($_POST['addvideosubmit'])) {
    addVideoPost();
  }
  if (isset($_POST['deletePost'])) {
    deletePost();
  }
  if (isset($_POST['editPost'])) {
    editPost();
  }
  if (isset($_POST['editsubmit'])) {
    editSubmit();
  }
  if (isset($_POST['editno'])) {
    editno();
  }
  if (isset($_POST['removePhotos'])) {
    removePhotos();
  }
  if (isset($_POST['editInfo'])) {
    editProf();
  }
  if (isset($_POST['updateProf'])) {
    updateProf();
  }
  if (isset($_POST['profilePic'])) {
    profilePic();
  }
  if (isset($_POST['coverPic'])) {
    coverPic();
  }
  if (isset($_POST['logout'])) {
    logout();
  }
  if (isset($_REQUEST['myfeed'])) {
    myfeed();
  }
  //from destination page
  if (isset($_POST['locationsubmit'])) {
    $test = locationPosts();
  }
  if (isset($_REQUEST['resetpass'])) {
    $mailbox = "<br><p><form action='control' method='post'> <h4>Please enter the email associated with your account:</h4><input type='text name='email' value=''><input type='submit' name='sendemail' value='Send Link'></form></p><br>";
    exit($mailbox);
  }
  if (isset($_POST['sendemail'])) {
    echo "<br><p style='color: gray;'>***Please check the email associated with your account for your password reset link!</p><br>";
  }
  //from registration page
  if (isset($_POST['registerSubmit'])) {
    registration();
  }
  if (isset($_POST['follow'])) {
    follow();
  }
  if (isset($_POST['unfollow'])) {
    unfollow();
  }
  if (isset($_POST['like'])) {
    like();
  }
  if (isset($_POST['unlike'])) {
    unlike();
  }
  if (isset($_REQUEST['eats'])) {
    eats();
  }
  if (isset($_POST['Submit1'])) {
    echo "delete";
    echo $_POST['postID'];
  }
  if (isset($_POST['searchplaceProf'])) {
    $q         = trim($_POST["q"]);
    $response3 = "<ul><li>No results found</li></ul>";
      // Build SQL query
  $sql       = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
      // Execute SQL query
  $result    = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      if ($result->num_rows > 0) {
        $response3 = '<ul>';
          // Loop through each row returned from query
  while ($row = $result->fetch_assoc()) {
          $response3 .= "<li><a href='" . str_replace(" ", "-", $row['destinationName']) . "" . "'>" . $row['destinationName'] . "</a></li><br>";
        }
        $response3 .= '</ul>';
      }
      exit($response3);
    }
  }
}
?>
