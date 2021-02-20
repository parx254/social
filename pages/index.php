<?php
  include('functions.php');
  $title = "Social Destinations";                 // (1) Set the title
  $activePage = 'home';                   // (2) Set the active page
  $city = 'Amsterdam';                  // (5) Set the city
  include "header.php";                 // (4) Include the header
  ?>
<body>
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div id="wrapper">
    <div class="topslide">
      <video playsinline autoplay loop muted controls="false">
        <source src="SiteVideos/chicago.mp4" type="video/mp4">
        <source src="SiteVideos/chicago.webm" type="video/webm">
        <source src="SiteVideos/chicago.ogv" type="video/ogg">
        Your browser does not support the video tag.
      </video>
      <div class="city-hero-text">
        <h1>BEYOND TRAVEL</h1>
        <div class='hero'>
          <input type='text' placeholder='Search Cities' id='searchbox5' autocomplete="off"/>
          <div id='response5'></div>
        </div>
          <a href="#" class="home-scroll-down" address="true"></a>
      </div>
    </div>
    <div class="intro">
      <h1>Go Somewhere</h1>
      <p>Join an interactive travel orientated social network where you can post photos or videos to share with their friends. See why life without Social Destinations is a distant memory for travelers. Messaging, weather updates, photos, videos, and more await you.</p>
      <div class="leftcontent">
        <h2>Start Your Journey</h2>
        <div class="button-gap">
          <a href="myprofile.php" class="btn">Get Started</a>
        </div>
      </div>
      <div class="rightcontent">
        <h2>Media</h2>
        <div class="socialcontainer">
          <a href="photos.php" class="social-icons"><i class="fa fa-picture-o" aria-hidden="true"></i></a>
          <a href="videos.php" class="social-icons"><i class="fa fa-film" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
    <div class="intro2">
      <div class="bodycontainer">
        <div class="gallerytitle">
          <h2>Categories</h2>
        </div>
        <div class="grid">
          <div class="cell">
            <a href="https://www.socialdestinations.com/cuisine.php"><img src="SiteImages/cuisine1.jpg" class="responsive-image" alt="Cuisine"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/cuisine.php">Cuisine</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/excursions.php"><img src="SiteImages/excursions1.jpg" class="responsive-image" alt="Excursions"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/excursions.php">Excursions</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/experiences.php"><img src="SiteImages/general1.jpg" class="responsive-image" alt="Experiences"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/experiences.php">Experiences</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/lodging.php"><img src="SiteImages/lodging1.jpg" class="responsive-image" alt="Lodging"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/lodging.php">Lodging</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/sports.php"><img src="SiteImages/sports1.jpg" class="responsive-image" alt="Sports"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/sports.php">Sports</a></div>
          </div>
        </div>
      </div>
    </div>
    <div class="bodycontainer">
      <div class="container">
        <div class="gallerytitle">
          <h2>Destinations <i class='fa fa-map-marker'></i></h2>
        </div>
        <div class="grid">
          <div class="cell">
            <a href="https://www.socialdestinations.com/Atlanta.php"><img src="SiteImages/atlanta.jpg" class="responsive-image" alt="Atlanta"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Atlanta.php">Atlanta</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Austin.php"><img src="SiteImages/charlotte.jpg" class="responsive-image" alt="Austin"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Austin.php">Austin</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Boston.php"><img src="SiteImages/boston.jpg" class="responsive-image" alt="Boston"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Boston.php">Boston</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Charlotte.php"><img src="SiteImages/charlotte.jpg" class="responsive-image" alt="Charlotte"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Charlotte.php">Charlotte</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Chicago.php"><img src="SiteImages/chicago.jpg" class="responsive-image" alt="Chicago"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Chicago.php">Chicago</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Cincinnati.php"><img src="SiteImages/cincinnati.jpg" class="responsive-image" alt="Cincinnati"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Cincinnati.php">Cincinnati</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Columbus.php"><img src="SiteImages/columbus.jpg" class="responsive-image" alt="Columbus"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Columbus.php">Columbus</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Dallas.php"><img src="SiteImages/texas.jpg" class="responsive-image" alt="Dallas"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Dallas.php">Dallas</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Denver.php"><img src="SiteImages/denver.jpg" class="responsive-image" alt="Denver"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Denver.php">Denver</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Detroit.php"><img src="SiteImages/detroit.jpg" class="responsive-image" alt="Detroit"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Detroit.php">Detroit</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Honolulu.php"><img src="SiteImages/honolulu.jpg" class="responsive-image" alt="Honolulu"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Honolulu.php">Honolulu</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Houston.php"><img src="SiteImages/houston.jpg" class="responsive-image" alt="Houston"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Houston.php">Houston</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Jacksonville.php"><img src="SiteImages/jacksonville.jpg" class="responsive-image" alt="Jacksonville"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Jacksonville.php">Jacksonville</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Kansas-City.php"><img src="SiteImages/kansascity.jpg" class="responsive-image" alt="Cleveland"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Kansas-City.php">Kansas City</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Indianapolis.php"><img src="SiteImages/indiana.jpg" class="responsive-image" alt="Indianapolis"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Indianapolis.php">Indianapolis</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Las-Vegas.php"><img src="SiteImages/lasvegas.jpg" class="responsive-image" alt="Las Vegas"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Las-Vegas.php">Las Vegas</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Los-Angeles.php"><img src="SiteImages/losangeles.jpg" class="responsive-image" alt="Los Angeles"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Los-Angeles.php">Los Angeles</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Memphis.php"><img src="SiteImages/memphis.jpg" class="responsive-image" alt="Memphis"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Memphis.php">Memphis</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Miami.php"><img src="SiteImages/miami.jpg" class="responsive-image" alt="Miami"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Miami.php">Miami</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Minneapolis.php"><img src="SiteImages/minneapolis.jpg" class="responsive-image" alt="Minneapolis"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Minneapolis.php">Minneapolis</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Nashville.php"><img src="SiteImages/tennessee.jpg" class="responsive-image" alt="Nashville"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Nashville.php">Nashville</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/New-Orleans.php"><img src="SiteImages/neworleans.jpg" class="responsive-image" alt="New Orleans"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/New-Orleans.php">New Orleans</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/New-York-City.php"><img src="SiteImages/newyork.jpg" class="responsive-image" alt="New York City"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/New-York-City.php">New York City</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Orlando.php"><img src="SiteImages/orlando.jpg" class="responsive-image" alt="Orlando"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Orlando.php">Orlando</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Philadelphia.php"><img src="SiteImages/philadelphia.jpg" class="responsive-image" alt="Philadelphia"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Philadelphia.php">Philadelphia</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Phoenix.php"><img src="SiteImages/phoenix.jpg" class="responsive-image" alt="Phoenix"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Phoenix.php">Phoenix</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Pittsburgh.php"><img src="SiteImages/pittsburgh.jpg" class="responsive-image" alt="Pittsburgh"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Pittsburgh.php">Pittsburgh</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Portland.php"><img src="SiteImages/portland.jpg" class="responsive-image" alt="Portland"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Portland.php">Portland</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Saint-Louis.php"><img src="SiteImages/saintlouis.jpg" class="responsive-image" alt="Saint Louis"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Saint-Louis.php">Saint Louis</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/San-Antonio.php"><img src="SiteImages/sanantonio.jpg" class="responsive-image" alt="San Antonio"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/San-Antonio.php">San Antonio</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/San-Diego.php"><img src="SiteImages/sandiego.jpg" class="responsive-image" alt="San Diego"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/San-Diego.php">San Diego</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/San-Francisco.php"><img src="SiteImages/california.jpg" class="responsive-image" alt="San Francisco"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/San-Francisco.php">San Francisco</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Seattle.php"><img src="SiteImages/washington.jpg" class="responsive-image" alt="Seattle"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Seattle.php">Seattle</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Tampa.php"><img src="SiteImages/tampa.jpg" class="responsive-image" alt="Tampa"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Tampa.php">Tampa</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Washington-DC.php"><img src="SiteImages/dc.jpg" class="responsive-image" alt="DC"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Washington-DC.php"> Washington DC</a></div>
          </div>
        </div>
        <br>
        <div class="gallerytitle">
          <h2>Canada <i class='fab fa-canadian-maple-leaf'></i>
          </h2>
        </div>
        <div class="grid">
          <div class="cell">
            <a href="https://www.socialdestinations.com/Calgary.php"><img src="SiteImages/calgary.jpg" class="responsive-image" alt="Calgary"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Calgary.php">Calgary</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Edmonton.php"><img src="SiteImages/edmonton.jpg" class="responsive-image" alt="Edmonton"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Edmonton.php">Edmonton</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Montreal.php"><img src="SiteImages/montreal.jpg" class="responsive-image" alt="Montreal"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Montreal.php">Montreal</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Toronto.php"><img src="SiteImages/toronto.jpg" class="responsive-image" alt="Toronto"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Toronto.php">Toronto</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Vancouver.php"><img src="SiteImages/vancouver.jpg" class="responsive-image" alt="Vancouver"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Vancouver.php">Vancouver</a></div>
          </div>
        </div>
        <br>
        <div class="gallerytitle">
          <h2>Europe <i class="fas fa-globe-europe"></i>
          </h2>
        </div>
        <div class="grid">
          <div class="cell">
            <a href="https://www.socialdestinations.com/Amsterdam.php"><img src="SiteImages/amsterdam.jpg" class="responsive-image" alt="Amsterdam"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Amsterdam.php">Amsterdam</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Athens.php"><img src="SiteImages/athens.jpg" class="responsive-image" alt="Athens"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Athens.php">Athens</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Barcelona.php"><img src="SiteImages/barcelona.jpg" class="responsive-image" alt="Barcelona"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Barcelona.php">Barcelona</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Berlin.php"><img src="SiteImages/berlin.jpg" class="responsive-image" alt="Berlin"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Berlin.php">Berlin</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/London.php"><img src="SiteImages/london.jpg" class="responsive-image" alt="London"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/London.php">London</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Milan.php"><img src="SiteImages/milan.jpg" class="responsive-image" alt="Milan"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Milan.php">Milan</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Moscow.php"><img src="SiteImages/moscow.jpg" class="responsive-image" alt="Moscow"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Moscow.php">Moscow</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Paris.php"><img src="SiteImages/paris.jpg" class="responsive-image" alt="Paris"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Paris.php">Paris</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Rome.php"><img src="SiteImages/rome.jpg" class="responsive-image" alt="Rome"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Rome.php">Rome</a></div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Venice.php"><img src="SiteImages/venice.jpg" class="responsive-image" alt="Venice"></a>
            <div class="centered"><a href="https://www.socialdestinations.com/Venice.php">Venice</a></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php citysearch(); ?>
</div>
</body>
<?php
  include "footer.php";
  ?>
<style>
  .topslide{height: 100%;min-height:450px}
</style>
</html>