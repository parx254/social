<?php
require_once 'functions.php';
$title = "Explore | Social Destinations";                 // (1) Set the title
$activePage = 'explore';                   // (2) Set the active page
$keywords = 'Explore, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
$description = 'Explore'; //Set the description
$currentcolor = '#4a90e2';           // (5) Set the color
$city = 'Amsterdam';                  // (5) Set the city
include "header.php";                 // (4) Include the header
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
  <div class="page-hero">
    <video id="bgVideo" playsinline muted autoplay loop preload="auto">
    <source src="SiteVideos/chicago.mp4" type="video/mp4">
    <source src="SiteVideos/chicago.webm" type="video/webm">
    <source src="SiteVideos/chicago.ogv" type="video/ogg">
    Your browser does not support the video tag.
    </video>
    <div class="city-hero-text">
      <h1>Explore</h1>
      <a href="#" class="explore-scroll-down" address="true"></a>
    </div>
  </div>
  <div class="bodycontainer">
    <div class="grid-tab-wrapper">
      <nav class="tab-nav">
        <ul>
        <li class="tab-item active" data-target="#categories">Categories</li>
        <li class="tab-item" data-target="#north-america">North America</li>
        <li class="tab-item" data-target="#europe">Europe</li>
        </ul>
      </nav>
      <div class="tab-section" id="categories">
        <div class="grid">
          <div class="cell">
            <a href="https://www.socialdestinations.com/eats.php">
            <img alt="Eats" class="responsive-image" loading="lazy" src="SiteImages/eats.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/eats.php">Eats</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/adventures.php">
            <img alt="Adventures" class="responsive-image" loading="lazy" src="SiteImages/adventures.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/adventures.php">Adventures</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/vibes.php">
            <img alt="Vibes" class="responsive-image" loading="lazy" src="SiteImages/vibes.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/vibes.php">Vibes</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/stays.php">
            <img alt="Stays" class="responsive-image" loading="lazy" src="SiteImages/stays.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/stays.php">Stays</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/events.php">
            <img alt="Events" class="responsive-image" loading="lazy" src="SiteImages/events.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/events.php">Events</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-section hidden" id="north-america">
        <div class="grid">
          <div class="cell">
            <a href="https://www.socialdestinations.com/Atlanta.php"><img alt="Atlanta" class="responsive-image" loading="lazy" src="SiteImages/atlanta.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Atlanta.php">Atlanta</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Austin.php"><img alt="Austin" class="responsive-image" loading="lazy" src="SiteImages/austin.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Austin.php">Austin</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Boston.php"><img alt="Boston" class="responsive-image" loading="lazy" src="SiteImages/boston.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Boston.php">Boston</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Charlotte.php"><img alt="Charlotte" class="responsive-image" loading="lazy" src="SiteImages/charlotte.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Charlotte.php">Charlotte</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Chicago.php"><img alt="Chicago" class="responsive-image" loading="lazy" src="SiteImages/chicago.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Chicago.php">Chicago</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Cincinnati.php"><img alt="Cincinnati" class="responsive-image" loading="lazy" src="SiteImages/cincinnati.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Cincinnati.php">Cincinnati</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Columbus.php"><img alt="Columbus" class="responsive-image" loading="lazy" src="SiteImages/columbus.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Columbus.php">Columbus</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Dallas.php"><img alt="Dallas" class="responsive-image" loading="lazy" src="SiteImages/dallas.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Dallas.php">Dallas</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Denver.php"><img alt="Denver" class="responsive-image" loading="lazy" src="SiteImages/denver.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Denver.php">Denver</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Detroit.php"><img alt="Detroit" class="responsive-image" loading="lazy" src="SiteImages/detroit.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Detroit.php">Detroit</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Honolulu.php"><img alt="Honolulu" class="responsive-image" loading="lazy" src="SiteImages/honolulu.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Honolulu.php">Honolulu</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Houston.php"><img alt="Houston" class="responsive-image" loading="lazy" src="SiteImages/houston.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Houston.php">Houston</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Jacksonville.php"><img alt="Jacksonville" class="responsive-image" loading="lazy" src="SiteImages/jacksonville.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Jacksonville.php">Jacksonville</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Kansas-City.php"><img alt="Cleveland" class="responsive-image" loading="lazy" src="SiteImages/kansas-city.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Kansas-City.php">Kansas City</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Indianapolis.php"><img alt="Indianapolis" class="responsive-image" loading="lazy" src="SiteImages/indianapolis.jpg" loading="lazy"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Indianapolis.php">Indianapolis</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Las-Vegas.php"><img alt="Las Vegas" class="responsive-image" loading="lazy" src="SiteImages/las-vegas.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Las-Vegas.php">Las Vegas</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Los-Angeles.php"><img alt="Los Angeles" class="responsive-image" loading="lazy" src="SiteImages/los-angeles.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Los-Angeles.php">Los Angeles</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Memphis.php"><img alt="Memphis" class="responsive-image" loading="lazy" src="SiteImages/memphis.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Memphis.php">Memphis</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Miami.php"><img alt="Miami" class="responsive-image" loading="lazy" src="SiteImages/miami.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Miami.php">Miami</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Minneapolis.php"><img alt="Minneapolis" class="responsive-image" loading="lazy" src="SiteImages/minneapolis.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Minneapolis.php">Minneapolis</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Nashville.php"><img alt="Nashville" class="responsive-image" loading="lazy" src="SiteImages/nashville.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Nashville.php">Nashville</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/New-Orleans.php"><img alt="New Orleans" class="responsive-image" loading="lazy" src="SiteImages/new-orleans.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/New-Orleans.php">New Orleans</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/New-York-City.php"><img alt="New York City" class="responsive-image" loading="lazy" src="SiteImages/new-york-city.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/New-York-City.php">New York City</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Orlando.php"><img alt="Orlando" class="responsive-image" loading="lazy" src="SiteImages/orlando.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Orlando.php">Orlando</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Philadelphia.php"><img alt="Philadelphia" class="responsive-image" loading="lazy" src="SiteImages/philadelphia.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Philadelphia.php">Philadelphia</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Phoenix.php"><img alt="Phoenix" class="responsive-image" loading="lazy" src="SiteImages/phoenix.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Phoenix.php">Phoenix</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Pittsburgh.php"><img alt="Pittsburgh" class="responsive-image" loading="lazy" src="SiteImages/pittsburgh.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Pittsburgh.php">Pittsburgh</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Portland.php"><img alt="Portland" class="responsive-image" loading="lazy" src="SiteImages/portland.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Portland.php">Portland</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Saint-Louis.php"><img alt="Saint Louis" class="responsive-image" loading="lazy" src="SiteImages/saint-louis.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Saint-Louis.php">Saint Louis</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/San-Antonio.php"><img alt="San Antonio" class="responsive-image" loading="lazy" src="SiteImages/san-antonio.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/San-Antonio.php">San Antonio</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/San-Diego.php"><img alt="San Diego" class="responsive-image" loading="lazy" src="SiteImages/san-diego.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/San-Diego.php">San Diego</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/San-Francisco.php"><img alt="San Francisco" class="responsive-image" loading="lazy" src="SiteImages/san-francisco.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/San-Francisco.php">San Francisco</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Seattle.php"><img alt="Seattle" class="responsive-image" loading="lazy" src="SiteImages/seattle.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Seattle.php">Seattle</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Tampa.php"><img alt="Tampa" class="responsive-image" loading="lazy" src="SiteImages/tampa.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Tampa.php">Tampa</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Washington-DC.php"><img alt="DC" class="responsive-image" loading="lazy" src="SiteImages/dc.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Washington-DC.php">Washington DC</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Calgary.php"><img alt="Calgary" class="responsive-image" loading="lazy" src="SiteImages/calgary.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Calgary.php">Calgary</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Edmonton.php"><img alt="Edmonton" class="responsive-image" loading="lazy" src="SiteImages/edmonton.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Edmonton.php">Edmonton</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Montreal.php"><img alt="Montreal" class="responsive-image" loading="lazy" src="SiteImages/montreal.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Montreal.php">Montreal</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Toronto.php"><img alt="Toronto" class="responsive-image" loading="lazy" src="SiteImages/toronto.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Toronto.php">Toronto</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Vancouver.php"><img alt="Vancouver" class="responsive-image" loading="lazy" src="SiteImages/vancouver.jpg"></a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Vancouver.php">Vancouver</a>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-section hidden" id="europe">
        <div class="grid">
          <div class="cell">
            <a href="https://www.socialdestinations.com/Amsterdam.php">
            <img alt="Amsterdam" class="responsive-image" loading="lazy" src="SiteImages/amsterdam.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Amsterdam.php">Amsterdam</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Athens.php">
            <img alt="Athens" class="responsive-image" loading="lazy" src="SiteImages/athens.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Athens.php">Athens</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Barcelona.php">
            <img alt="Barcelona" class="responsive-image" loading="lazy" src="SiteImages/barcelona.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Barcelona.php">Barcelona</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Berlin.php">
            <img alt="Berlin" class="responsive-image" loading="lazy" src="SiteImages/berlin.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Berlin.php">Berlin</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/London.php">
            <img alt="London" class="responsive-image" loading="lazy" src="SiteImages/london.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/London.php">London</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Milan.php">
            <img alt="Milan" class="responsive-image" loading="lazy" src="SiteImages/milan.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Milan.php">Milan</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Moscow.php">
            <img alt="Moscow" class="responsive-image" loading="lazy" src="SiteImages/moscow.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Moscow.php">Moscow</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Paris.php">
            <img alt="Paris" class="responsive-image" loading="lazy" src="SiteImages/paris.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Moscow.php">Paris</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Rome.php">
            <img alt="Rome" class="responsive-image" loading="lazy" src="SiteImages/rome.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Rome.php">Rome</a>
            </div>
          </div>
          <div class="cell">
            <a href="https://www.socialdestinations.com/Venice.php">
            <img alt="Venice" class="responsive-image" loading="lazy" src="SiteImages/venice.jpg">
            </a>
            <div class="centered">
              <a href="https://www.socialdestinations.com/Venice.php">Venice</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php citysearch(); ?>
</div>
<?php
include "footer.php";
?>
</body>
<script>
$(document).ready(function () {
$('.grid-tab-wrapper .tab-item').on('click', function () {
var target = $(this).data('target');
// Reset tab states
$('.grid-tab-wrapper .tab-item').removeClass('active');
$(this).addClass('active');
// Hide all sections, show selected
$('.grid-tab-wrapper .tab-section').addClass('hidden');
$(target).removeClass('hidden');
});
});
</script>
</html>