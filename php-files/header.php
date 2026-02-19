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
        w[l].push({
          'gtm.start': new Date().getTime(),
          event: 'gtm.js'
        });
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
      
      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-131583482-4');
    </script>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-chrome-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileColor" content="#ffffff">
    <link rel="manifest" href="/manifest.json">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="5ScQQrjN7Mb_itI1x2Eb2_r_5LraJmgxI1K-4VlK3Zk">
    <meta name="Description" content="
      <?php echo $description; ?>">
    <meta name="KeyWords" content="
      <?php echo $keywords; ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php echo $title; ?> </title>
    <script src="https://www.google.com/recaptcha/api.js?render=6Ld8-MorAAAAAHIGKWJjUqLFYfvh1DR3QXUnBLU5"></script>
    <link rel="stylesheet" href="/css/style.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
      var city = "<?php echo addslashes($city); ?>";
    </script>
    <script src="/js/script.js"></script>
    <script src="/js/edit-post.js"></script>
    <link rel="stylesheet" href="/css/updated.lightbox.css">
    <script src="/js/sd-lightbox.jquery.js" defer></script>
    <style>
      #resize #menu li a,
      .column h5,
      .column a:hover,
      .feed-post a:visited,
      .feed-post a,
      .feed-post i,
      ul li a:hover,.sd-ai-suggestion {
      color:
      <?php echo $currentcolor;
        ?>;
      }
      .footer a:hover,
      .footer .active a {
          color:
      <?php echo $currentcolor;
        ?>;
      }
      .post-title img:hover,.sd-ai-suggestion:hover,#sd-ai-input:focus {
      border-color:
      <?php echo $currentcolor;
        ?>;
      }
      #toggle.on .span,
      .openbtn,
      .section-title h1::after,
      .section-title h2::after,
      .section-title h3::after,
      .section-title h4::after,
      .section-title h5::after,
      .footer-list li::before,
      .post-content button {
      background-color:
      <?php echo $currentcolor;
        ?>;
      }
      #sd-ai-toggle,#sd-ai-header,#sd-ai-send,.sd-ai-msg--user .sd-ai-bubble,.sd-ai-suggestion:hover {
      background:
      <?php echo $currentcolor;
        ?>;
      }
      .page-hero {
      background: linear-gradient(180deg,
      <?php echo $currentcolor; ?> 0%,
      color-mix(in srgb,
      <?php echo $currentcolor; ?> 70%, white) 50%,
      #ffffff 100%);
      }
      #resize #menu li a.active-page,
      #resize ul li:hover:not(select),
      .overlay #response2 li a:hover {
      border-bottom: solid <?php echo $currentcolor;
        ?>;
      }
      .footer-list li.active {
      border-top: 2px solid <?php echo $currentcolor;
        ?>;
      }
      .footer-list ul li.a.active,
      .footer-responsive-content a:hover,
      .post-title a,
      .overlay #response2 li a:hover {
      color:
      <?php echo $currentcolor;
        ?>;
      }
      #resize #menu li.active {
      border-bottom: 3px solid <?php echo $currentcolor;
        ?>;
      }
      input#searchbox2[type=search]:focus,
      nav #menu li.active,
      nav #menu li.active:hover,
      nav #menu li:hover {
      border-bottom: 2px solid <?php echo $currentcolor;
        ?>;
      }
      .overlay .closebtn {
      color:
      <?php echo $currentcolor;
        ?>;
      }
      .overlay #response2 li a {
      border-bottom: 1px solid <?php echo $currentcolor;
        ?>;
      }
      .post-feed::-webkit-scrollbar-thumb {
      border-bottom: 2px solid <?php echo $currentcolor;
        ?>;
      }
      .location input[type="text"]:focus {
      border-bottom: 2px solid <?php echo $currentcolor;
        ?>;
      }
      .location #response4 li a:hover {
      border-bottom: 1px solid <?php echo $currentcolor;
        ?>;
      color:
      <?php echo $currentcolor;
        ?>;
      }
    </style>
  </head>
  <body>
    <header>
      <nav>
        <!-- LEFT -->
        <div class="nav-left">
          <div class="logo">
            <a href="index.php">
            <img src="SiteImages/socialdestinationslogowhite.png" alt="social destinations logo">
            </a>
          </div>
        </div>
        <!-- CENTER -->
        <ul id="menu" class="nav-center">
          <li class="
            <?= ($activePage === 'home') ? 'active' : 'not-active' ?>">
            <a href="index.php">
            <i class="fad fa-home-lg-alt" aria-hidden="true"></i>
            </a>
          </li>
          <li class="
            <?= ($activePage === 'explore') ? 'active' : 'not-active' ?>">
            <a href="explore.php">
            <i class="fad fa-globe" aria-hidden="true"></i>
            </a>
          </li>
          <?php if (!isset($_SESSION['username']) || empty($_SESSION['username'])): ?> 
          <li class="not-active">
            <a href="login.php">
            <i class="fad fa-sign-in" aria-hidden="true"></i>
            </a>
          </li>
          <?php else: ?> 
          <li class="
            <?= ($activePage === 'profile') ? 'active' : 'not-active' ?>">
            <a href="my-profile.php">
            <i class="fad fa-user-circle" aria-hidden="true"></i>
            </a>
          </li>
          <li class="
            <?= ($activePage === 'messages') ? 'active' : 'not-active' ?>">
            <a href="messages.php">
            <i class="fad fa-comments" aria-hidden="true"></i>
            </a>
          </li>
          <li class="
            <?= ($activePage === 'feed') ? 'active' : 'not-active' ?>">
            <a href="feed.php">
            <i class="fad fa-users" aria-hidden="true"></i>
            </a>
          </li>
          <?php endif; ?>
        </ul>
        <!-- RIGHT -->
        <ul class="nav-right">
          <li class="search-item">
            <i class="fad fa-search" aria-hidden="true"></i>
            <div class="search-box">
              <input type="text" id="searchbox1" placeholder="Search users" autocomplete="off">
              <div id="response1"></div>
            </div>
          </li>
          <div class="dropdown">
            <button class="dropbtn">
            <i class="fad fa-compass" aria-hidden="true"></i>
            <i class="fad fa-angle-double-down" aria-hidden="true"></i>
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
                  <a href="explore.php"> View All Locations <i class="fa fa-arrow-right" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </ul>
        <!-- MOBILE TOGGLE -->
        <div id="toggle">
          <div class="span" id="one"></div>
          <div class="span" id="two"></div>
          <div class="span" id="three"></div>
        </div>
      </nav>
      <!-- MOBILE MENU (UNCHANGED) -->
      <div id="resize">
        <ul id="menu">
          <li class="
            <?= ($activePage === 'home') ? 'active' : 'not-active' ?>">
            <a href="index.php">Home</a>
          </li>
          <li class="
            <?= ($activePage === 'explore') ? 'active' : 'not-active' ?>">
            <a href="explore.php">Explore</a>
          </li>
          <?php if (!isset($_SESSION['username']) || empty($_SESSION['username'])): ?> 
          <li class="
            <?= ($activePage === 'about') ? 'active' : 'not-active' ?>">
            <a href="about.php">About</a>
          </li>
          <li class="not-active">
            <a href="login.php">Login</a>
          </li>
          <?php else: ?> 
          <li class="
            <?= ($activePage === 'profile') ? 'active' : 'not-active' ?>">
            <a href="my-profile.php">Profile</a>
          </li>
          <li class="
            <?= ($activePage === 'Messages') ? 'active' : 'not-active' ?>">
            <a href="inbox.php">Messages</a>
          </li>
          <li class="
            <?= ($activePage === 'feed') ? 'active' : 'not-active' ?>">
            <a href="feed.php">Feed</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </header>
