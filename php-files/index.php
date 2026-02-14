<?php
require_once 'functions.php';
$title = "Social Destinations";                 // (1) Set the title
$activePage = 'home';                   // (2) Set the active page
$city = 'Amsterdam';                  // (5) Set the city
$keywords = 'Home, Travel, Trips, Travel Tips, Adventures, Events, Holidays, Social Destinations, Social, Destinations';          // Set the keywords
$description = 'Home'; //Set the description
$currentcolor = '#4a90e2';           // (5) Set the color
include "header.php";                 // (4) Include the header
?>
<!DOCTYPE html>
<html>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe height="0" src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD" style="display:none;visibility:hidden" width="0"></iframe></noscript> <!-- End Google Tag Manager (noscript) -->
<div id="wrapper">
  <div class="page-hero">
    <video id="bgVideo" playsinline muted autoplay loop preload="metadata" poster="Images/atlanta.jpg">
    <source src="SiteVideos/chicago_fixed.mp4" type="video/mp4">
    <source src="SiteVideos/chicago_fixed.webm" type="video/webm">
    <source src="SiteVideos/chicago_fixed.ogv" type="video/ogg"> Your browser does not support the video tag.
    </video>
    <div class="city-hero-text">
      <h1>Start Exploring</h1>
      <div class='hero'>
        <input autocomplete="off" id='searchbox5' placeholder='Search destinations' type='text'>
        <div id='response5'></div>
        </div><a class="home-scroll-down" href="#"></a>
      </div>
    </div>
    <div class="intro">
      <div class="body-container">
        <div class="section-title">
          <h2>go somewhere</h2>
        </div>
        <p>Embark on an unforgettable journey with Social Destinations, a travel-oriented social network where you can connect with fellow travelers and share your adventures. Explore exciting destinations, capture your travel moments through photos and videos, stay connected with friends and fellow explorers, and receive real-time weather updates. Join this future of travel networking to ensure you don't miss any moment of your journeys. It's a vibrant community of wanderlust seekers sharing stories, memories, and valuable insights.</p>
      </div>
    </div>
  </div>
  <div class="explore-map">
    <div class="body-container">
      <div class="container">
        <div class="section-title">
          <h2>cities</h2>
        </div>
        <div id="map" style="height: 500px; width: 100%; margin-bottom: 20px; margin-top: 20px;"></div>
        </div>
      </div>
    </div>
    <div class="explore-content">
      <div class="body-container">
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
    <script>
    function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 2,
    center: { lat: 20, lng: 0 },
    styles: mapStyles
    });
    addMarkersToMap(map);
    }
    const cities = [
    { name: "Atlanta", lat: 33.749, lng: -84.388, url: "/Atlanta.php" },
    { name: "Austin", lat: 30.2672, lng: -97.7431, url: "/Austin.php" },
    { name: "Boston", lat: 42.3601, lng: -71.0589, url: "/Boston.php" },
    { name: "Charlotte", lat: 35.2271, lng: -80.8431, url: "/Charlotte.php" },
    { name: "Chicago", lat: 41.8781, lng: -87.6298, url: "/Chicago.php" },
    { name: "Cincinnati", lat: 39.1031, lng: -84.512, url: "/Cincinnati.php" },
    { name: "Columbus", lat: 39.9612, lng: -82.9988, url: "/Columbus.php" },
    { name: "Dallas", lat: 32.7767, lng: -96.797, url: "/Dallas.php" },
    { name: "Denver", lat: 39.7392, lng: -104.9903, url: "/Denver.php" },
    { name: "Detroit", lat: 42.3314, lng: -83.0458, url: "/Detroit.php" },
    { name: "Honolulu", lat: 21.3069, lng: -157.8583, url: "/Honolulu.php" },
    { name: "Houston", lat: 29.7604, lng: -95.3698, url: "/Houston.php" },
    { name: "Jacksonville", lat: 30.3322, lng: -81.6557, url: "/Jacksonville.php" },
    { name: "Kansas City", lat: 39.0997, lng: -94.5786, url: "/Kansas-City.php" },
    { name: "Indianapolis", lat: 39.7684, lng: -86.1581, url: "/Indianapolis.php" },
    { name: "Las Vegas", lat: 36.1699, lng: -115.1398, url: "/Las-Vegas.php" },
    { name: "Los Angeles", lat: 34.0522, lng: -118.2437, url: "/Los-Angeles.php" },
    { name: "Memphis", lat: 35.1495, lng: -90.049, url: "/Memphis.php" },
    { name: "Miami", lat: 25.7617, lng: -80.1918, url: "/Miami.php" },
    { name: "Minneapolis", lat: 44.9778, lng: -93.265, url: "/Minneapolis.php" },
    { name: "Nashville", lat: 36.1627, lng: -86.7816, url: "/Nashville.php" },
    { name: "New Orleans", lat: 29.9511, lng: -90.0715, url: "/New-Orleans.php" },
    { name: "New York City", lat: 40.7128, lng: -74.006, url: "/New-York-City.php" },
    { name: "Orlando", lat: 28.5383, lng: -81.3792, url: "/Orlando.php" },
    { name: "Philadelphia", lat: 39.9526, lng: -75.1652, url: "/Philadelphia.php" },
    { name: "Phoenix", lat: 33.4484, lng: -112.074, url: "/Phoenix.php" },
    { name: "Pittsburgh", lat: 40.4406, lng: -79.9959, url: "/Pittsburgh.php" },
    { name: "Portland", lat: 45.5051, lng: -122.675, url: "/Portland.php" },
    { name: "Saint Louis", lat: 38.627, lng: -90.1994, url: "/Saint-Louis.php" },
    { name: "San Antonio", lat: 29.4241, lng: -98.4936, url: "/San-Antonio.php" },
    { name: "San Diego", lat: 32.7157, lng: -117.1611, url: "/San-Diego.php" },
    { name: "San Francisco", lat: 37.7749, lng: -122.4194, url: "/San-Francisco.php" },
    { name: "Seattle", lat: 47.6062, lng: -122.3321, url: "/Seattle.php" },
    { name: "Tampa", lat: 27.9506, lng: -82.4572, url: "/Tampa.php" },
    { name: "Washington DC", lat: 38.9072, lng: -77.0369, url: "/Washington-DC.php" },
    { name: "Calgary", lat: 51.0447, lng: -114.0719, url: "/Calgary.php" },
    { name: "Edmonton", lat: 53.5461, lng: -113.4938, url: "/Edmonton.php" },
    { name: "Montreal", lat: 45.5017, lng: -73.5673, url: "/Montreal.php" },
    { name: "Toronto", lat: 43.6532, lng: -79.3832, url: "/Toronto.php" },
    { name: "Vancouver", lat: 49.2827, lng: -123.1207, url: "/Vancouver.php" },
    { name: "Amsterdam", lat: 52.3676, lng: 4.9041, url: "/Amsterdam.php" },
    { name: "Athens", lat: 37.9838, lng: 23.7275, url: "/Athens.php" },
    { name: "Barcelona", lat: 41.3851, lng: 2.1734, url: "/Barcelona.php" },
    { name: "Berlin", lat: 52.52, lng: 13.405, url: "/Berlin.php" },
    { name: "London", lat: 51.5074, lng: -0.1278, url: "/London.php" },
    { name: "Milan", lat: 45.4642, lng: 9.19, url: "/Milan.php" },
    { name: "Moscow", lat: 55.7558, lng: 37.6173, url: "/Moscow.php" },
    { name: "Paris", lat: 48.8566, lng: 2.3522, url: "/Paris.php" },
    { name: "Rome", lat: 41.9028, lng: 12.4964, url: "/Rome.php" },
    { name: "Venice", lat: 45.4408, lng: 12.3155, url: "/Venice.php" }
    ];
    const mapStyles = [
    { featureType: "all", elementType: "geometry", stylers: [{ color: "#1d2c4d" }] },
    { featureType: "all", elementType: "labels.text.fill", stylers: [{ color: "#ffffff" }] },
    { featureType: "all", elementType: "labels.text.stroke", stylers: [{ color: "#1a3646" }] },
    { featureType: "administrative", elementType: "geometry", stylers: [{ visibility: "on" }, { color: "#1d2c4d" }] },
    { featureType: "landscape", elementType: "geometry", stylers: [{ color: "#1e3a5b" }] },
    { featureType: "poi", elementType: "geometry", stylers: [{ color: "#283d6a" }] },
    { featureType: "road", elementType: "geometry", stylers: [{ color: "#2c467f" }] },
    { featureType: "water", elementType: "geometry", stylers: [{ color: "#17263c" }] }
    ];
    function addMarkersToMap(map) {
    const infoWindow = new google.maps.InfoWindow();
    cities.forEach(city => {
    const marker = new google.maps.Marker({
    position: { lat: city.lat, lng: city.lng },
    map,
    title: city.name,
    animation: google.maps.Animation.DROP
    });
    map.addListener("click", () => {
    infoWindow.close();
    });
    marker.addListener("click", () => {
    const citySlug = city.name.toLowerCase().replace(/\s+/g, '-');
    const content = `
    <div class="map-info-window">
      <img src="/SiteImages/${citySlug}.jpg" alt="${city.name}">
      <div class="info-body">
        <div class="info-title">${city.name}</div>
          <p class="info-desc">Explore sights and highlights.</p>
          <a href="${city.url}" class="info-link">Explore →</a>
        </div>
      </div>
      `;
      infoWindow.setContent(content);
      infoWindow.open(map, marker);
      });
      });
      }
      </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCu60smYfzPCKs80T2agrEziGOB82z8tg&callback=initMap"></script>
    </div>
  </div>
</div>
</div>
</div>
<?php citysearch(); ?><?php
include "footer.php";
?>
<style>
.page-hero {
min-height: 600px;
}
</style>
</body>
</html>
