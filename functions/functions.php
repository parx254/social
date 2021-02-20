<?
/* Database credentials.*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'pamcclel');
define('DB_PASSWORD', 'Ozzie12!');
define('DB_NAME', 'socialdestinationsdatabase');

/* Attempt to connect to MySQL database */
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if (mysqli_connect_errno()) {
  echo nl2br("Error connecting to MySQL: " . mysqli_connect_error() . "\n ");
} else {
  function nav()
      {
        echo "<header>
    <nav>
      <div class='logo'>
        <a href='index.php'><img src='SiteImages/socialdestinationslogo.png' alt='social destinations logo'></a>    
      </div>
      <ul id='menu'>
        <li id='home5'><a href='index.php'><i class='fal fa-home-alt' aria-hidden='true' id='home'></i></a></li>
        <div class='dropdown'>
          <button class='dropbtn'>Explore
          <i class='fa fa-angle-double-down'></i>
          </button>
          <div class='dropdown-content'>
            <div class='row'>
              <div class='column'>
                <h5>Destinations</h5>
                <hr>
                <a href='Atlanta.php'>Atlanta</a>
                <a href='Austin.php'>Austin</a>
                <a href='Boston.php'>Boston</a>
                <a href='Charlotte.php'>Charlotte</a>
                <a href='Chicago.php'>Chicago</a>
                <a href='Cincinnati.php'>Cincinnati</a>
                <a href='Dallas.php'>Dallas</a>
                <a href='Denver.php'>Denver</a>
                <a href='Honolulu.php'>Honolulu</a>
                <a href='Houston.php'>Houston</a>
              </div>
              <div class='column'>
                <h5>United States</h5>
                <hr>
                <a href='Kansas-City.php'>Kansas City</a>
                <a href='Indianapolis.php'>Indianapolis</a>
                <a href='Las-Vegas.php'>Las Vegas</a>
                <a href='Los-Angeles.php'>Los Angeles</a>
                <a href='Miami.php'>Miami</a>
                <a href='Minneapolis.php'>Minneapolis</a>
                <a href='Nashville.php'>Nashville</a>
                <a href='New-Orleans.php'>New Orleans</a>
                <a href='New-York-City.php'>New York City</a>
                <a href='Orlando.php'>Orlando</a>
              </div>
              <div class='column'>
                <h5>United States</h5>
                <hr>
                <a href='Philadelphia.php'>Philadelphia</a>
                <a href='Phoenix.php'>Phoenix</a>
                <a href='Pittsburgh.php'>Pittsburgh</a>
                <a href='Portland.php'>Portland</a>
                <a href='Saint-Louis.php'>Saint Louis</a>
                <a href='San-Antonio.php'>San Antonio</a>
                <a href='San-Diego.php'>San Diego</a>
                <a href='San-Francisco.php'>San Francisco</a>
                <a href='Seattle.php'>Seattle</a>
                <a href='Washington-DC.php'>Washington DC</a>
              </div>
              <div class='column'>
                <h5>Europe</h5>
                <hr>
                <a href='Amsterdam.php'>Amsterdam</a>
                <a href='Barcelona.php'>Barcelona</a>
                <a href='London.php'>London</a>
                <a href='Paris.php'>Paris</a>
                <h5>Canada</h5>
                <hr>
                <a href='Calgary.php'>Calgary</a>
                <a href='Edmonton.php'>Edmonton</a>
                <a href='Montreal.php'>Montreal</a>
                <a href='Toronto.php'>Toronto</a>
                <a href='Vancouver.php'>Vancouver</a>
              </div>
              <div class='column'>
                <h5>Categories</h5>
                <hr>
                <a href='cuisine.php'>Cuisine</a>
                <a href='excursions.php'>Excursions</a>
                <a href='experiences.php'>Experiences</a>
                <a href='lodging.php'>Lodging</a>
                <a href='sports.php'>Sports</a>
                <br>
                <a href='photos.php'>Photos</a>
                <a href='videos.php'>Videos</a>
                <br>
                <a href='explore.php'>View All Locations <i class='fa fa-arrow-right' aria-hidden='true'></i>
                </a>
              </div>
            </div>
          </div>
        </div>
        <li class='globe'><a href='explore.php'><i class='fal fa-globe' aria-hidden='true' id='globe'></i></a></li>
        <li class='user'><a href='myprofile.php'><i class='fal fa-user-circle' aria-hidden='true'></i></a></li>
        <li class='users'><a href='feed.php'><i class='fal fa-users' aria-hidden='true'></a></i>
        <li class='inbox'><a href='inbox.php'><i class='fal fa-comments' aria-hidden='true'></a></i>
        <li class='select'><img src='SiteImages/searchicon.png' height='16px' width='16px'></li>
        <div class='search-box'>
          <input type='text' placeholder='Search Users' autofocus='autofocus' id='searchbox1'/>
          <div id='response1'></div>
        </div>
      </ul>
      </ul>
      </div>
      <div id='toggle'>
        <div class='span' id='one'></div>
        <div class='span' id='two'></div>
        <div class='span' id='three'></div>
      </div>
    </nav>
    <div id='resize'>
      <ul id='menu'>
        <li><a href='index.php'>Home</a></li>
        <li><a href='about.php'>About</a></li>
        <li><a href='explore.php'>Explore</a></li>
        <li><a href='myprofile.php'>Profile</a></li>
        <li><a href='feed.php'>Feed</a></li>
      </ul>
    </div>
  </header>
  ";
      }
  function footer()
  {
    echo "   
  <footer class='footer'>
    <div class='footer-content'>
      <div class='footer-list'>
        <ul>
          <li>
            <a href='https://www.socialdestinations.com/index.php' style='text-decoration: none'>
              <p>Home</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li>
            <a href='https://www.socialdestinations.com/about.php' style='text-decoration: none'>
              <p>About</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li>
            <a href='https://www.socialdestinations.com/explore.php' style='text-decoration: none'>
              <p>Explore</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li>
            <a href='https://www.socialdestinations.com/myprofile.php' style='text-decoration: none'>
              <p>Profile</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li>
            <a href='https://www.socialdestinations.com/feed.php' style='text-decoration: none'>
              <p>Feed</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class='footer-about'>
      <div class='copyright'>
        <i class='fa fa-map-marker' aria-hidden='true'></i>
        &copy; Social Destinations 2021
      </div>
      <ul class='about-list'>
        <li>
          <a style=text-decoration:none; href='privacypolicy.php'><i class='fa fa-user-secret'></i>
          </a>
        </li>
        <li>
          <a style=text-decoration:none; href='https://www.linkedin.com/company/social-destinations/'><i class='fa fa-linkedin'></i>
          </a>
        </li>
        <li>
      </ul>
    </div>
    <div class='footer-responsive-content'>
      <div class='footer-list'>
        <ul>
          <li id='home2'>
            <a href='https://www.socialdestinations.com/index.php' style='text-decoration: none'>
            <i class='far fa-home-alt' aria-hidden='true'></i>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li id='globe2'>
            <a href='https://www.socialdestinations.com/explore.php' style='text-decoration: none'>
            <i class='far fa-globe'></i>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <div id='myOverlay' class='overlay'>
          <span class='closebtn' onclick='closeSearch()' title='Close Overlay'>×</span>
          <div class='overlay-content'>
            <input type='search' placeholder='Search Users' id='searchbox2'/>
            <div id='response2'></div>
          </div>
        </div>
        <ul>
          <li>
            <button class='openbtn' onclick='openSearch()'><i class='fa fa-search' aria-hidden='true'></i>
            </button>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li id='user2'>
            <a href='https://www.socialdestinations.com/myprofile.php' style='text-decoration: none'>
            <i class='far fa-user-circle'></i>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li id='users2'>
            <a href='https://www.socialdestinations.com/feed.php' style='text-decoration: none'>
            <i class='far fa-users' aria-hidden='true'></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
  ";
  }
  function citysearch()
  {
    echo "   
        <div class='location'>
        <div class='secondtitle'>
          <h2>Search Cities</h2>
        </div>
        <br>
        <input type='text' placeholder='City' id='searchbox4' autocomplete='off'/>
        <div id='response4'></div>
      </div>
    </div>
  ";
  }
  function cityweather()
  {
    echo "   
        <div class='weather-container'>
          <img class='icon'>
          <h2 class='weather'></h2>
          <h3 class='temp'></h3>
          <span>&#8457;</span>
        </div>
  ";
  }
  function all_users()
  {
    global $con;
    $sql    = "SELECT * FROM users ORDER BY username";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        // test 1 - echo "<p>1 <a href='pages/" . $row['username'] . ".php'>" . $row['username'] . "</a></p>";
        // test 2 - echo "<p>2 <a href='test.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a></p>";
        echo "<p><a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a></p>";
      }
    }
  }
  function all_feed()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql2    = "SELECT username FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql2);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        echo "<h2><a href='profile.php?currentuser=" . $username . "'>" . $username . "</a></h2>";
        echo "<p>Location: '" . $row['Location'] . "'<br>";
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br></p>';
        echo $row['likes'] . '</b> <b>likes</b>';
        $sql     = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        echo "<div>";
        while ($row2 = $results->fetch_assoc()) {
          echo "<img src = 'Images/" . $row2['filename'] . "' height = '300' width = '300'>  ";
        }
        echo "</div>";
      }
    }
  }
  function all_experiences()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE category = 'experiences' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['Location'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videocategory in ('lodging', 'sports', 'excursions', 'cuisine', 'experiences') ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['videolocation'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Photos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE category in ('lodging', 'cuisine', 'sports', 'excursions', 'experiences') ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['Location'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_experiences_videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videocategory = 'experiences' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['videolocation'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_cuisine()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE category = 'cuisine' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['Location'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_cuisine_videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videocategory = 'cuisine' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['videolocation'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_sports_videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videocategory = 'sports' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['videolocation'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_sports()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE category = 'sports' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['Location'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_excursions()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE category = 'excursions' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['Location'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_lodging()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE category = 'lodging' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['Location'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_excursions_videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videocategory = 'excursions' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['videolocation'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_lodging_videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videocategory = 'lodging' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-map-marker" aria-hidden="true"></i> ' . $row['videolocation'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Nashville()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Nashville' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Nashville_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Nashville' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Atlanta_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Atlanta' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_New_Orleans()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'New Orleans' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_London()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'London' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_London_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'London' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Venice()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Venice' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Venice_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Venice' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Berlin()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Berlin' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Berlin_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Berlin' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Moscow()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Moscow' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Moscow_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Moscow' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Milan()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Milan' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Milan_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Milan' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Athens()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Athens' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Athens_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Athens' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Rome()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Rome' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Rome_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Rome' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Amsterdam()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Amsterdam' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Amsterdam_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Amsterdam' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Barcelona()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Barcelona' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Barcelona_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Barcelona' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Paris()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Paris' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Paris_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Paris' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_San_Antonio()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'San Antonio' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_San_Diego()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'San Diego' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Memphis()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Memphis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Saint_Louis()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Saint Louis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Montreal()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Montreal' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Cincinnati()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Cincinnati' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Jacksonville()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Jacksonville' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Kansas_City()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Kansas City' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Calgary()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Calgary' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Edmonton()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Edmonton' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Vancouver()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Vancouver' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Toronto()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Toronto' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Las_Vegas()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Las Vegas' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_San_Francisco()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'San Francisco' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Washington_DC()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Washington DC' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_New_York_City()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'New York City' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Pittsburgh()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Pittsburgh' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Los_Angeles()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Los Angeles' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        echo "<div class='feedPost'>";
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "<br>";
        echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
      }
    }
  }
  function all_Portland()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Portland' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Miami()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Miami' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Charlotte()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Charlotte' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Chicago()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Chicago' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Minneapolis()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Minneapolis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Columbus()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Columbus' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Dallas()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Dallas' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Boston()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Boston' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Atlanta()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Atlanta' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Seattle()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Seattle' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Orlando()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Orlando' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Honolulu()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Honolulu' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Phoenix()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Phoenix' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Philadelphia()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Philadelphia' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Houston()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Houston' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Detroit()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Detroit' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Austin()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Austin' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Indianapolis()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Indianapolis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Denver()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Denver' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Tampa()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE Location = 'Tampa' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
          echo "<div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_New_Orleans_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'New Orleans' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_San_Antonio_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'San Antonio' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_San_Diego_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'San Diego' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Memphis_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Memphis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Saint_Louis_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Saint Louis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Montreal_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Montreal' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Cincinnati_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Cincinnati' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Jacksonville_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Jacksonville' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Kansas_City_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Kansas City' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Calgary_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Calgary' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Edmonton_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Edmonton' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Vancouver_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Vancouver' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Toronto_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Toronto' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Las_Vegas_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Las Vegas' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_San_Francisco_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'San Francisco' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Washington_DC_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Washington DC' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_New_York_City_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'New York City' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Pittsburgh_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Pittsburgh' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Los_Angeles_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Los Angeles' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Portland_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Portland' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Miami_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Miami' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Charlotte_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Charlotte' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Chicago_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Chicago' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Minneapolis_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Minneapolis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Columbus_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Columbus' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Dallas_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Dallas' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Boston_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Boston' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Seattle_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Seattle' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Orlando_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Orlando' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Honolulu_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Honolulu' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Phoenix_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Phoenix' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Philadelphia_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Philadelphia' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Houston_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Houston' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Detroit_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Detroit' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Austin_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Austin' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Indianapolis_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Indianapolis' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Denver_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Denver' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function all_Tampa_Videos()
  {
    global $user;
    global $con;
    $sql    = "SELECT * FROM posts WHERE videolocation = 'Tampa' ORDER BY Last_Modified DESC";
    $result = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        $sql         = "SELECT * FROM videos WHERE postID = '" . $row['PostID'] . "'";
        $results     = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedPost'><div class='feedimg'><video controls disablePictureInPicture controlsList='nodownload' oncontextmenu='return false;'><source src = 'Videos/" . $row2['filename'] . "'  type='video/mp4' type='video/webm' type='video/ogg' class='object-fit_cover'> </video>  </div>";
          echo "<div class='videofeedPost2'><div class='videofeedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>";
          echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
          echo '<p><i class="fa fa-calendar-o" aria-hidden="true"></i> ' . $date_posted . '<br>';
          echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['videocategory'] . '<br><br>';
          echo ' ' . $row['Blog'] . '<br><br>';
          echo '<i class="fa fa-heart-o"></i> ' . $row['likes'] . ' </div></div>';
        }
      }
    }
  }
  function otherFollowers()
  {
    global $con;
    global $user;
    $currentuser = $_GET['currentuser'];
    $sql         = "SELECT COUNT(follower) FROM follows WHERE followee = (select userID from users where username = '$currentuser')";
    $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<div class='nums'><h3><a href='followers.php?currentuser=$currentuser'>" . $row['COUNT(follower)'] . " Followers </a></h3></div>";
    }
  }
  function otherFollowees()
  {
    global $con;
    global $user;
    $currentuser = $_GET['currentuser'];
    $sql2        = "SELECT COUNT(followee) FROM follows WHERE follower = (select userID from users where username = '$currentuser')";
    $result      = $con->query($sql2);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo "<div class='nums'><h3><a href='following.php?currentuser=$currentuser'>" . $row['COUNT(followee)'] . " Following </a></h3></div>";
    }
  }
  function allfollows()
  {
    global $con;
    $currentuser = $_GET['currentuser'];
    $sql         = "SELECT follower FROM follows WHERE followee = (select userID from users where username = '$currentuser')";
    $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql2    = "SELECT username, picName FROM users WHERE userID = '" . $row['follower'] . "'";
        $results = $con->query($sql2);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row2     = $results->fetch_assoc();
        $username = $row2['username'];
        $pic      = $row2['picName'];
        echo "<div class='follow'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "''></a>          ";
        echo "<a href='profile.php?currentuser=$username'>" . $username . '</a></div>';
      }
    }
  }
  function allfollowing()
  {
    global $con;
    $currentuser = $_GET['currentuser'];
    $sql         = "SELECT followee FROM follows WHERE follower = (select userID from users where username = '$currentuser')";
    $result      = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql2    = "SELECT username, picName FROM users WHERE userID = '" . $row['followee'] . "'";
        $results = $con->query($sql2);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row2     = $results->fetch_assoc();
        $username = $row2['username'];
        $pic      = $row2['picName'];
        echo "<div class='follow'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "''></a>          ";
        echo "<a href='profile.php?currentuser=$username'>" . $username . '</a></div>';
      }
    }
  }
  function allplaces()
  {
    global $user;
    global $con;
    $currentlocation = $_GET['location'];
    $sql             = "SELECT * FROM posts WHERE Location = '$currentlocation' ORDER BY Last_Modified DESC";
    $result          = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    }
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $sql3    = "SELECT username, picName FROM users WHERE userID = '" . $row['userID'] . "'";
        $results = $con->query($sql3);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        $row3        = $results->fetch_assoc();
        $username    = $row3['username'];
        $pic         = $row3['picName'];
        $date_posted = $row['Last_Modified'];
        $date_posted = date("F d, Y", strtotime($date_posted));
        echo "<div class='feedPost'><div class='feedPost2'><div class='feedPostTitle'><a href='profile.php?currentuser=$username'><img src='Images/prof_pics/" . $pic . "'></a>          ";
        echo "<b><a href='profile.php?currentuser=$username'>   " . $username . '</a></b></div>';
        echo '<br><p><i class="fa fa-calendar-o" aria-hidden="true"></i>
   ' . $date_posted . '<br>';
        echo '<i class="fa fa-tag" aria-hidden="true"></i> ' . $row['category'] . '<br><br>';
        echo ' ' . $row['Blog'] . '<br><br>';
        echo '<i class="fa fa-heart-o"></i> ' . $row['likes'];
        echo "<button id = 'like$postID' class='like'><i class='fa fa-thumbs-up'></i></button>" . ' </div>';
        $sql     = "SELECT * FROM images WHERE postID = '" . $row['PostID'] . "'";
        $results = $con->query($sql);
        if (!$result) {
          echo "Error: " . mysql_error() . "\n";
        }
        while ($row2 = $results->fetch_assoc()) {
          echo "<div class='feedimg'><img src = 'Images/" . $row2['filename'] . "' class='object-fit_cover'>  </div>";
        }
        echo "</p></div>";
      }
    } else {
      echo "<p style='text-align: center'>Be the first to post about " . $currentlocation . "!</p>";
    }
  }
  if (isset($_POST['searchppl'])) {
    $q         = trim($_POST["q"]);
    $response1 = "<ul><li>No results found</li></ul>";
    $sql       = "SELECT username FROM users WHERE username LIKE '$q%'";
    $result    = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      if ($result->num_rows > 0) {
        $response1 = '<ul>';
        $response2 = '<ul>';
        while ($row = $result->fetch_assoc()) {
          $response1 .= "<li><a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a></li>";
          $response2 .= "<li><a href='profile.php?currentuser=" . $row['username'] . "'>" . $row['username'] . "</a></li>";
        }
        $response1 .= '</ul>';
        $response2 .= '</ul>';
      }
      exit($response1);
    }
  }
  if (isset($_REQUEST['allfeed'])) {
    allfeed();
  }
  if (isset($_POST['searchplace'])) {
    $q         = trim($_POST["q"]);
    $response3 = "<ul><li>No results found</li></ul>";
    $sql       = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
    $result    = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      if ($result->num_rows > 0) {
        $response3 = '<ul>';
        while ($row = $result->fetch_assoc()) {
          $response3 .= "<li><a href='" . str_replace(" ", "-", $row['destinationName']) . ".php" . "'>" . $row['destinationName'] . "</a></li>";
        }
        $response3 .= '</ul>';
      }
      exit($response3);
    }
  }
  if (isset($_POST['searchplaceprof'])) {
    $q         = trim($_POST["q"]);
    $response3 = "<ul><li>No results found</li></ul>";
    $sql       = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
    $result    = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      if ($result->num_rows > 0) {
        $response3 = '<ul>';
        while ($row = $result->fetch_assoc()) {
          $response3 .= "<li>" . $row['destinationName'] . "</li>";
        }
        $response3 .= '</ul>';
      }
      exit($response3);
    }
  }
  if (isset($_POST['destination'])) {
    $q        = trim($_POST["q"]);
    $response = "<ul><li>No results found</li></ul>";
    $sql      = "SELECT destinationName FROM destinations WHERE destinationName LIKE '$q%'";
    $result   = $con->query($sql);
    if (!$result) {
      echo "Error: " . mysql_error() . "\n";
    } else {
      if ($result->num_rows > 0) {
        $response = '<ul>';
        while ($row = $result->fetch_assoc()) {
          $response .= "<li>" . $row['destinationName'] . "</li>";
        }
        $response .= '</ul>';
      }
      exit($response);
    }
  }
}
?>