<?php
  include ('functions.php');
  ?>
<html lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-NBS5FHD');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131583482-4"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-131583482-4');
    </script>
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Berlin | Social Destinations</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script>
      var city = "Berlin";
    </script>
    <script src="/js/myscript.js"></script> 
    <style>
      .column h5{color:#FFCE00}
      .feedpost a:visited, .feedpost a, .feedpost i{color: #FFCE00}
      .column a:hover{color:#FFCE00}
      .feedPostTitle img:hover, .videofeedPostTitle img:hover{border-color:#FFCE00}
      .location,#toggle.on .span, .openbtn, .topslide {background-color: #FFCE00}
      #resize #menu li a.active-page{border-bottom:solid #FFCE00}
      #resize ul li:hover:not(select){border-bottom:solid #FFCE00}
      #resize #menu li a, ul li a:hover, footer a:hover{color:#FFCE00} 
    </style>
  </head>
  <?php nav(); ?>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NBS5FHD"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div id="wrapper">
      <div class="topslide">
        <video playsinline autoplay loop muted controls="false">
          <source src="SiteVideos/berlin.mp4" type="video/mp4">
          <source src="SiteVideos/SiteVideos/berlin.webm" type="video/webm">
          <source src="SiteVideos/berlin.ogv" type="video/ogg">
          Your browser does not support the video tag.
        </video>
        <div class="city-hero-text">
          <h1>Berlin</h1>
          <p>
            <a href="#" class="scroll-down" address="true"></a>
          </p>
        </div>
      </div>
      <div class="bodycontainer">
        <div class="maintitle">
          <h3>Posts</h3>
        </div>
          <div class='feedposts'>
          <?php allBerlin(); ?>
        </div>
        <div class='videofeedposts'>
          <?php allBerlin_Videos(); ?>
        </div>
          <?php cityweather(); ?>
      </div>        
      <?php citysearch(); ?>
    </div>
  <?php footer(); ?>
    </body>
  <script src="/js/script.js"></script> 
</html>