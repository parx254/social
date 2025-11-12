<?php
if (session_status() === PHP_SESSION_NONE) {
session_start();
}
?>
<html lang="en">
<head>
<!-- Google Tag Manager -->
<script>
(function(w, d, s, l, i) {
w[l] = w[l] || [];
w[l].push({ 'gtm.start': new Date().getTime(), event: 'gtm.js' });
var f = d.getElementsByTagName(s)[0],
j = d.createElement(s),
dl = l != 'dataLayer' ? '&l=' + l : '';
j.async = true;
j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
f.parentNode.insertBefore(j, f);
})(window, document, 'script', 'dataLayer', 'GTM-NBS5FHD');
</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131583482-4"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag() { dataLayer.push(arguments); }
gtag('js', new Date());
gtag('config', 'UA-131583482-4');
</script>
<link rel="preconnect" href="https://www.googletagmanager.com">
<link rel="preconnect" href="https://www.google-analytics.com">
<link rel="icon" href="/favicon/favicon.ico">
<link rel="manifest" href="/site.webmanifest">
<link rel="shortcut icon" href="/favicon/favicon.ico">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- Modern Browsers -->
<link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
<!-- Apple Touch Icon -->
<link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
<!-- Optional Web Manifest (for PWA or pinned apps) -->
<link rel="manifest" href="/favicon/site.webmanifest">
<!-- Optional MS Tile & Theme -->
<meta name="theme-color" content="#ffffff">
<meta name="msapplication-TileColor" content="#ffffff">
<link rel="manifest" href="/manifest.json">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
<meta name="google-site-verification" content="5ScQQrjN7Mb_itI1x2Eb2_r_5LraJmgxI1K-4VlK3Zk">
<meta name="Description" content="<?php echo $description; ?>">
<meta name="KeyWords" content="<?php echo $keywords; ?>">
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $title; ?></title>
<script src="https://www.google.com/recaptcha/api.js?render=6Ld8-MorAAAAAHIGKWJjUqLFYfvh1DR3QXUnBLU5"></script>
<link rel="stylesheet" href="/css/style.php" media="screen">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.0/css/all.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
var city = "<?php echo $city; ?>";
</script>
<script src="/js/script.js"></script>
<script src="/js/editpost.js"></script>
<link rel="stylesheet" href="/css/updated.lightbox.php">
<script src="/js/sd-lightbox.v6.jquery.js" defer></script>
<style>
#resize #menu li a,
.column h5,
.column a:hover,
.feedpost a:visited,
.feedpost a,
.feedpost i,
ul li a:hover,
footer a:hover,
footer .active a {
color: <?php echo $currentcolor; ?>;
}
.feedPostTitle img:hover,
.videofeedPostTitle img:hover {
border-color: <?php echo $currentcolor; ?>;
}
#toggle.on .span,
.openbtn,
.text-box h1::after,
.text-box h2::after,
.text-box h3::after,
.text-box h4::after,
.text-box h5::after,
.postcontent button {
background-color: <?php echo $currentcolor; ?>;
}
.topslide {
background-color: <?php echo $currentcolor; ?>;
background: linear-gradient(
180deg,
<?php echo $currentcolor; ?> 0%,
color-mix(in srgb, <?php echo $currentcolor; ?> 70%, white) 50%,
#ffffff 100%
);
}
#resize #menu li a.active-page,
#resize ul li:hover:not(select) {
border-bottom: solid <?php echo $currentcolor; ?>;
}
.footer-list li.active {
border-top: 2px solid <?php echo $currentcolor; ?>;
}
.footer-list ul li.a.active {
color: <?php echo $currentcolor; ?>;
}
#resize #menu li.active {
border-bottom: 3px solid <?php echo $currentcolor; ?>;
}
input#searchbox2[type=search],
nav #menu li.active,
nav #menu li.active:hover,
nav #menu li:hover {
border-bottom: 2px solid <?php echo $currentcolor; ?>;
}
.overlay .closebtn {
color: <?php echo $currentcolor; ?>;
}
.overlay #response2 li a {
border-bottom: 1px solid <?php echo $currentcolor; ?>;
}
.feedposts::-webkit-scrollbar-thumb {
border-bottom: 2px solid <?php echo $currentcolor; ?>;
}
.location input[type="text"]:focus {
border-bottom: 2px solid <?php echo $currentcolor; ?>;
}
.location #response4 li a:hover {
border-bottom: 1px solid <?php echo $currentcolor; ?>;
color: <?php echo $currentcolor; ?>;
}
</style>
</head>
<body>
<header>
  <nav>
    <div class="logo">
      <a href="index.php">
      <img src="SiteImages/socialdestinationslogowhite.png" alt="social destinations logo">
      </a>
    </div>
    <ul id="menu">
    <li class="<?php if ($activePage == 'home') { echo 'active'; } else { echo 'not-active'; } ?>">
    <a href="index.php">
    <i class="fad fa-home-lg-alt" aria-hidden="true" id="home"></i>
    <div class="tooltip">Home</div>
      </a>
      </li>
      <div class="dropdown">
        <button class="dropbtn">
        <i class="fad fa-compass" aria-hidden="true" id="globe"></i>
        <i class="fad fa-angle-double-down"></i>
        </button>
        <div class="dropdown-content">
          <div class="row">
            <div class="column">
              <h5>Destinations</h5>
              <hr>
              <a href="Atlanta.php">Atlanta</a>
              <a href="Austin.php">Austin</a>
              <a href="Boston.php">Boston</a>
              <a href="Charlotte.php">Charlotte</a>
              <a href="Chicago.php">Chicago</a>
              <a href="Cincinnati.php">Cincinnati</a>
              <a href="Dallas.php">Dallas</a>
              <a href="Denver.php">Denver</a>
              <a href="Honolulu.php">Honolulu</a>
              <a href="Houston.php">Houston</a>
            </div>
            <div class="column">
              <h5>United States</h5>
              <hr>
              <a href="Kansas-City.php">Kansas City</a>
              <a href="Indianapolis.php">Indianapolis</a>
              <a href="Las-Vegas.php">Las Vegas</a>
              <a href="Los-Angeles.php">Los Angeles</a>
              <a href="Miami.php">Miami</a>
              <a href="Minneapolis.php">Minneapolis</a>
              <a href="Nashville.php">Nashville</a>
              <a href="New-Orleans.php">New Orleans</a>
              <a href="New-York-City.php">New York City</a>
              <a href="Orlando.php">Orlando</a>
            </div>
            <div class="column">
              <h5>United States</h5>
              <hr>
              <a href="Philadelphia.php">Philadelphia</a>
              <a href="Phoenix.php">Phoenix</a>
              <a href="Pittsburgh.php">Pittsburgh</a>
              <a href="Portland.php">Portland</a>
              <a href="Saint-Louis.php">Saint Louis</a>
              <a href="San-Antonio.php">San Antonio</a>
              <a href="San-Diego.php">San Diego</a>
              <a href="San-Francisco.php">San Francisco</a>
              <a href="Seattle.php">Seattle</a>
              <a href="Washington-DC.php">Washington DC</a>
            </div>
            <div class="column">
              <h5>Europe</h5>
              <hr>
              <a href="Amsterdam.php">Amsterdam</a>
              <a href="Barcelona.php">Barcelona</a>
              <a href="London.php">London</a>
              <a href="Moscow.php">Moscow</a>
              <a href="Paris.php">Paris</a>
              <h5>Canada</h5>
              <hr>
              <a href="Edmonton.php">Edmonton</a>
              <a href="Montreal.php">Montreal</a>
              <a href="Toronto.php">Toronto</a>
              <a href="Vancouver.php">Vancouver</a>
            </div>
            <div class="column">
              <h5>Categories</h5>
              <hr>
              <a href="eats.php">Eats</a>
              <a href="adventures.php">Adventures</a>
              <a href="vibes.php">Vibes</a>
              <a href="stays.php">Stays</a>
              <a href="events.php">Events</a>
              <br>
              <a href="photos.php">Photos</a>
              <a href="videos.php">Videos</a>
              <br>
              <a href="explore.php">View All Locations
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <li class="<?php if ($activePage == 'explore') { echo 'active'; } else { echo 'not-active'; } ?>">
      <a href="explore.php">
      <i class="fad fa-globe" aria-hidden="true" id="globe"></i>
      <div class="tooltip">Explore</div>
        </a>
        </li>
        <?php
        if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        echo '<li class="not-active"><a href="login.php"><i class="fad fa-sign-in" aria-hidden="true"></i>
        <div class="tooltip">Login</div>
          </a></li>';
          } else {
          if ($activePage == 'profile') {
          echo '<li class="active"><a href="my-profile.php"><i class="fad fa-user-circle" aria-hidden="true"></i>
          <div class="tooltip">Profile</div>
            </a></li>';
            } else {
            echo '<li class="not-active"><a href="my-profile.php"><i class="fad fa-user-circle" aria-hidden="true"></i>
            <div class="tooltip">Profile</div>
              </a></li>';
              }
              if ($activePage == 'feed') {
              echo '<li class="active"><a href="feed.php"><i class="fad fa-users" aria-hidden="true"></i>
              <div class="tooltip">Feed</div>
                </a></li>';
                } else {
                echo '<li class="not-active"><a href="feed.php"><i class="fad fa-users" aria-hidden="true"></i>
                <div class="tooltip">Feed</div>
                  </a></li>';
                  }
                  if ($activePage == 'message') {
                  echo '<li class="active"><a href="inbox.php"><i class="fad fa-comments" aria-hidden="true"></i>
                  <div class="tooltip">Messages</div>
                    </a></li>';
                    } else {
                    echo '<li class="not-active"><a href="inbox.php"><i class="fad fa-comments" aria-hidden="true"></i>
                    <div class="tooltip">Messages</div>
                      </a></li>';
                      }
                      }
                      ?>
                      <li class="select"><i class="fas fa-search" aria-hidden="true"></i></li>
                      <div class="search-box">
                        <input type="text" placeholder="Search users" autofocus="autofocus" id="searchbox1">
                        <div id="response1"></div>
                        </div>
                        </ul>
                        <div id="toggle">
                          <div class="span" id="one"></div>
                            <div class="span" id="two"></div>
                              <div class="span" id="three"></div>
                              </div>
                            </nav>
                            <div id="resize">
                              <ul id="menu">
                              <li class="<?php if ($activePage == 'home') { echo 'active'; } else { echo 'not-active'; } ?>">
                              <a href="index.php">Home</a>
                              </li>
                              <li class="<?php if ($activePage == 'explore') { echo 'active'; } else { echo 'not-active'; } ?>">
                              <a href="explore.php">Explore</a>
                              </li>
                              <?php
                              if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
                              echo '<li class="' . ($activePage == 'about' ? 'active' : 'not-active') . '"><a href="about.php">About</a></li>
                              <li class="not-active"><a href="login.php">Login</a></li>';
                              } else {
                              if ($activePage == 'profile') {
                              echo '<li class="active"><a href="my-profile.php">Profile</a></li>';
                              } else {
                              echo '<li class="not-active"><a href="my-profile.php">Profile</a></li>';
                              }
                              if ($activePage == 'feed') {
                              echo '<li class="active"><a href="feed.php">Feed</a></li>';
                              } else {
                              echo '<li class="not-active"><a href="feed.php">Feed</a></li>';
                              }
                              if ($activePage == 'inbox') {
                              echo '<li class="active"><a href="inbox.php">Inbox</a></li>';
                              } else {
                              echo '<li class="not-active"><a href="inbox.php">Inbox</a></li>';
                              }
                              }
                              ?>
                              </ul>
                            </div>
                          </header>