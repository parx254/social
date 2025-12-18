/* ========================================
ROOT VARIABLES
======================================== */
/* =========================================
ROOT VARIABLES
========================================= */
:root {
  /* ========================================
 GLOBAL BASE
 ======================================== */
  /* Back-compat variables from original file */
  --background-dark-alt: #000;
  --color-border-dark: #222;
  --color-border-light: #333;
  --color-border-mid: #aaa;
  --color-border-white: #fff;
  --color-like-active: #e63946;
  --color-surface: #ffffff;
  --color-surface-alt: #000;
  --color-surface-inverse: #353E43;
  --color-text-inverse: #ffffff;
  --heading-accent: #FBF719;
  --link-color: #4a90e2;
  --link-hover: #FBF719;
  --base-font-size: 1.0000rem;
  --font-base: 1rem;
  --card-width: 20rem;
  /* =========================================
 POSTS / FEEDS
 ========================================= */
  --grid-gap: 1rem;
  --base-padding: 0.75rem;
  --base-margin: 1rem;
  --base-radius: 0.75rem;
  --transition-base: all 0.15s cubic-bezier(.22, .61, .36, 1);
  --ease-smooth: cubic-bezier(.22, .61, .36, 1);
  --ease-emphasized: cubic-bezier(.2, 0, 0, 1);
  --ease-decel: cubic-bezier(0, 0, .2, 1);
  --ease-accel: cubic-bezier(.4, 0, 1, 1);
  --motion-fast: 180ms;
  --motion-base: 240ms;
  --motion-slow: 420ms;
  --text-primary: #1a1a1a;
  --text-secondary: #3d3d3d;
  --text-tertiary: #666666;
  --text-muted: #8c8c8c;
  --text-heading: #111111;
  --text-inverse: #ffffff;
  --text-disabled: #b3b3b3;
  /* ========================================
    /* =========================================
 FOOTER
 ========================================= */
  FOOTER======================================== */
  --text-footer: #5c5c5c;
  --text-link: #4a90e2;
  --text-link-hover: #357ab8;
  --text-on-accent: #ffffff;
  --background-page: #fefefe;
  --background-light: #fafafa;
  --background-alt: #f5f5f5;
  --background-muted: #eaeaea;
  --background-soft: #f9f9f9;
  --background-dark: #000000;
  --background-accent: #fbf719;
  /* ========================================
    /* =========================================
 PROFILE
 ========================================= */
  PROFILE======================================== */
  --background-profile: #f3f4f6;
  --surface-1: #ffffff;
  --surface-2: #fafafa;
  --surface-3: #f5f5f5;
  --surface-soft: #f4f4f4;
  --surface-inverse: #353e43;
  /* =========================================
 MESSAGES
 ========================================= */
  --surface-message-sent: #f9fbff;
  --border-light: #dddddd;
  --border-mid: #aaaaaa;
  --border-dark: #222222;
  --border-muted: #eeeeee;
  --border-inverse: #ffffff;
  /* =========================================
 FORMS
 ========================================= */
  --border-input: #cccccc;
  --border-light-gray: #e0e0e0;
  --button-primary-bg: #4a90e2;
  --button-primary-hover: #357ab8;
  --button-primary-text: #ffffff;
  --button-secondary-bg: #1a1a1a;
  --button-secondary-text: #ffffff;
  --button-light-bg: #f5f5f5;
  --button-light-hover: #eaeaea;
  --button-light-text: #1a1a1a;
  --button-disabled-bg: #dddddd;
  --button-disabled-text: #888888;
  --accent-primary: #4a90e2;
  --accent-primary-hover: #357ab8;
  --accent-danger: #e94e77;
  --accent-success: #2ecc71;
  --accent-warning: #ffb347;
  --accent-like: #d32f2f;
  --accent-like-hover: #b71c1c;
  --alert-success-bg: #e8f6ee;
  --alert-success-border: #c9ebd7;
  --alert-danger-bg: #e94e77;
  --alert-warning-bg: #ffb347;
  /* =========================================
 NAVIGATION
 ========================================= */
  --nav-bg: #ffffff;
  --nav-border: #eaeaea;
  --nav-text: #1a1a1a;
  --shadow-color: rgba(0, 0, 0, 0.15);
  --shadow: 0 0.125rem 0.375rem rgba(0, 0, 0, 0.18);
  --focus-ring: #4a90e2;
  /* auto-generated vars */
  --color-1c1c1c: #1c1c1;
  --text-success: green;
  --accent-blue-secondary: #57666e;
  --accent-purple: #3F4B52;
  --surface-white: #fff;
}
/* ===============================
UTILITY CLASSES
=============================== */
.rounded {
  border-radius: var(--base-padding);
}
.shadow {
  box-shadow: 0 0.125rem 0.375rem var(--shadow-color);
}
.text-center {
  text-align: center;
}
.text-right {
  text-align: right;
}
.text-left {
  text-align: left;
}
.flex {
  display: flex;
}
.flex-column {
  flex-direction: column;
}
.flex-row {
  flex-direction: row;
}
.hidden {
  display: none;
}
.visible {
  display: block;
}
.transition-base {
  transition: var(--transition-base);
}
*, footer ul {
  list-style: none;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
/* Style links globally */
a {
  text-decoration: none;
  cursor: pointer;
}
/* Forms */
@font-face {
  font-family: MontHeavy;
  src: url("webfonts/Mont-Heavy.ttf") format("opentype");
}
@font-face {
  font-family: MontLight;
  src: url("webfonts/Mont-Light.ttf") format("opentype");
}
@font-face {
  font-family: MontRegular;
  src: url("webfonts/Mont-Regular.ttf") format("opentype");
}
@font-face {
  font-family: MontBold;
  src: url("webfonts/Mont-Bold.ttf") format("opentype");
}
/* =========================================
GLOBAL / BASE
========================================= */
/* Base styles for body */
body {
  font-family: MontRegular, sans-serif;
  color: var(--text-primary);
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: auto;
  overflow-x: hidden;
}
/* Typography */
h1, h2, h3, h4, h5 {
  font-family: MontBold, sans-serif;
  color: var(--text-heading);
  text-decoration: none;
}
/* Components */
#toggle, .dropdown, nav #menu {
  float: right;
}
#resize, #toggle {
  visibility: hidden;
}
/* Layout */
/* ========================================
POSTS & FEED
======================================== */
.column a, .message-reply-form button, .feedPostTitle img:hover, .feedposts a:hover, .feedposts button:hover, .postcontent button:hover, .videofeedPostTitle img:hover, .videofeedposts button:hover, nav #menu #response1 a, nav #menu #response1 ul li:hover:not(active) {
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
/* Style links globally */
a {
  cursor: pointer;
}
#resize, #resize #menu li, #toggle .span, body {
  /* Base styles for body */
  background: var(--color-surface);
}
/* =========================================
HERO / CITY SECTIONS
========================================= */
button {
  border: 0;
  border-radius: 0.3125rem;
  padding: 0.3125rem 1.5625rem;
}
#resize.active, .coverpic, .dropdown, .topslide {
  overflow: hidden;
}
.feed a:hover, .feedposts a:hover, .login a:hover, .messageuser p:hover, .myprofplaces a:hover {
  text-decoration: underline;
}
/* Utilities */
.centered a, .column a, .footer li, .footer-list, .footer-list li, .map-info-window .info-link, a, footer a, footer p, footer p:hover, h1, h2, h3, h4, h5, ul li a, ul li a:hover {
  text-decoration: none;
}
#toggle, #toggle.on #two, from {
  opacity: 0;
}
40%, from {
  transform: translateY(0.625rem);
}
0%, 100%, 20%, 50%, 80%, to {
  transform: translateY(0);
}
.row::after, .search-box::before {
  content: "";
}
60% {
  transform: translateY(0.3125rem);
}
0% {
  opacity: 0.4;
}
100% {
  opacity: 1;
  transform: rotate(360deg);
}
/* Heading 1 styles */
h1 {
  color: var(--text-heading);
  font-family: MontBold, sans-serif;
  font-size: 2.0rem;
  letter-spacing: 0.075rem;
}
#resize #menu li a, h2, h3, h4, h5 {
  font-family: MontBold;
}
.centered a, .hero-text, .hero-text h1, .myprofplaces h3, .profile h1, .title, h2, h3, h4, h5 {
  color: var(--color-surface);
}
h2 {
  font-size: 1.625rem;
  letter-spacing: 0.0625rem;
}
h3 {
  font-size: 1.5rem;
}
h4 {
  font-size: 1.375rem;
}
.map-info-window .info-desc, .map-info-window .info-title, a {
  /* Style links globally */
  font-family: MontRegular, sans-serif;
}
/* Style links globally */
a {
  cursor: pointer;
  color: var(--accent-primary);
}
a:hover {
  color: var(--accent-primary-hover);
}
.feedpost a, .postcontent a {
  cursor: pointer;
  font-size: 0.875rem;
  font-family: 'MontBold';
}
.login p, h5, p {
  font-size: 0.875rem;
}
.feedposts2 p {
  font-size: 1.25rem;
}
.column a, p {
  font-size: 0.875rem;
}
.age h3, .bio h3, .city h3, .column a:hover, .column h5, .feedposts a:visited, .feedposts i, .gallerytitle h1, .login p, .logintitle h3, .myprofplaces h1, .postcontent i, .profile h2, .title h1, nav #menu #response1 a:hover {
  color: var(--text-heading);
}
.gallerytitle h2 {
  color: var(--text-heading);
  text-align: Center;
}
.bodycontainer p, .leftcontent p, .rightcontent p, p {
  text-align: left;
}
p {
  max-width: 105.0rem;
}
#resize #menu li, .button-gap .btn, .cell, .cell1, .city-hero-text, .feed, .feed p, .feedimg, .feedposts p, .footer, .hero-text, .inbox, .leftcontent, .login, .login p, .maintitle, .message, .message p, .postcontenttop video, .prof_actions, .rightcontent, .secondtitle, .sent, .title h1, .weather-container, nav #menu #response1 li, table {
  text-align: center;
}
.nav-down {
  bottom: -2.5rem;
}
nav .logo {
  float: left;
  height: 3.125rem;
  margin: 0;
  position: static;
  width: 12.5rem;
}
.footer-list ul li.a.active, .dropbtn {
  color: var(--text-inverse);
}
input#searchbox2[type=search], nav #menu li.active, nav #menu li.active:hover, nav #menu li:hover {
  border-bottom: 0.0625rem solid var(--surface-white) !important;
}
nav #menu li a {
  position: relative !important;
  display: block !important;
  overflow: visible !important;
  transition: all var(--motion-base) var(--ease-smooth);
}
nav #menu li a::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  /* sits on the bottom edge of the link */
  height: 0.0938rem;
  width: 0;
  background-color: var(--text-inverse) !important;
  /* var(--color-text-inverse) underline */
  transition: all var(--motion-base) var(--ease-smooth);
  z-index: 1;
}
nav #menu li a:hover::after, nav #menu li a.active::after {
  width: 100%;
}
#buttons li, .cell a, .cell1 a, .cell1 video, .feedPost, .feedimg, .feedpost a, .postcontent a, .messageuser a, .messageuser p, .placesvisited a, .postcontenttop video, .prof_actions, .prof_actions form, .profilepic, .social-icons, nav #menu li, nav .logo a, nav .logo img {
  display: inline-block;
}
.column a, .dropdown:hover .dropdown-content, .footer:hover, .img, .profile img, .show, nav #menu #response1 li, nav #menu li a:hover .tooltip {
  display: block;
}
.weather-container {
  background: 0 0;
  margin-top: 2.5rem;
}
temp, .weather {
  color: var(--text-heading);
  margin: 0;
}
.city-hero-text h1 {
  color: var(--color-surface);
  text-shadow: none;
  text-transform: capitalize;
  opacity: 0;
  transform: translateY(1.25rem);
  animation: fadeUp 1s ease-out forwards;
}
@keyframes fadeUp {
 to {
    opacity: 1;
    transform: translateY(0);
 }
}
.home-scroll-down, .scroll-down, .explore-scroll-down {
  animation: bounce 2s infinite;
  background-size: 0.875rem auto;
  border-radius: 50%;
  bottom: 1.875rem;
  display: block;
  height: 2.0rem;
  left: 50%;
  margin-left: -1.0rem;
  margin-top: 1.875rem;
  position: relative;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 2.0rem;
  z-index: 2;
  animation-timing-function: var(--ease-smooth);
}
.home-scroll-down:before, .scroll-down:before, .explore-scroll-down:before {
  border: 0.125rem solid var(--color-surface);
  border-width: 0 0 0.125rem 0.125rem;
  content: "";
  display: block;
  height: 0.75rem;
  left: 50%;
  position: relative;
  top: calc(50% - 0.4375rem);
  transform: translate(-50%, -50%) rotate(-45deg);
  width: 0.75rem;
}
@keyframes bounce {
 0%, 20%, 50%, 80%, 100% {
    transform: translateY(0);
 }
 40% {
    transform: translateY(-0.625rem);
 }
 60% {
    transform: translateY(-0.3125rem);
 }
}
.coverpic {
  border-bottom-left-radius: 0.3125rem;
  border-bottom-right-radius: 0.3125rem;
  height: 15.625rem;
  min-height: 12.5rem;
  background-color: var(--background-dark-alt);
  position: initial;
  width: 100%;
}
.coverpic .container, .topslide .container {
  position: relative;
  z-index: 2;
}
#resize, #resize.active, #toggle, .coverpic video, .search-box, .search-box:before {
  position: absolute;
}
.coverpic video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  /* PERFECT for fullscreen video */
  object-position: center;
  pointer-events: none;
  /* keeps layout clean */
  opacity: 0;
  /* fades in */
  transition: opacity .6s ease-in-out;
}
.coverpic video.fade-in, .topslide video.fade-in {
  opacity: .2;
}
.cover {
  padding: 10% 0;
}
.cover.top {
  display: flex;
  display: -ms-flexbox;
  display: -webkit-box;
  height: 100vh;
  padding: 15% 0 10%;
}
/*****************************************
 * TOPSLIDE HERO (your original layout)
 *****************************************/
.topslide {
  position: relative;
  width: 100%;
  height: 60%;
  /* takes full viewport height */
  overflow: hidden;
  /* Your angled shape — this stays */
  clip-path: polygon(0 0, 100% 0, 100% 100%, 0 calc(100% - 20%));
}
/*****************************************
 * VIDEO (inside topslide — original behavior)
 *****************************************/
/* Poster fallback before fade-in */
#bgVideo:not(.fade-in) {
  background: url('Images/atlanta.jpg') center/cover no-repeat;
}
/* Fade in */
.topslide video.fade-in, #bgVideo.fade-in {
  opacity: .2;
}
/* Hide controls */
.topslide video::-webkit-media-controls {
  display: none !important;
}
/*****************************************
 * HERO TEXT (unchanged from your original)
 *****************************************/
.city-hero-text {
  position: absolute;
  top: 30%;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
  z-index: 10;
}
/*****************************************
 * COVER PIC SECTION (kept as-is)
 *****************************************/
.coverpic img {
  height: 100%;
  width: 100%;
  opacity: 0.5;
}
.coverpic video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  opacity: 0;
  transition: opacity .6s ease-in-out;
}
.coverpic video.fade-in {
  opacity: 1;
}
/*****************************************
 * OTHER COVER STYLING (kept original)
 *****************************************/
.cover {
  padding: 10% 0;
}
.cover.top {
  display: flex;
  height: 100vh;
  padding: 15% 0 10%;
}
/*****************************************
 * OTHER COVER STYLING (kept original)
 *****************************************/
.cover {
  padding: 10% 0;
}
.cover.top {
  display: flex;
  height: 100vh;
  padding: 15% 0 10%;
}
.bodycontainer {
  display: block;
  margin: 0 auto;
  max-width: 100.0rem;
}
.button-image, .logintitle, nav #menu {
  max-width: 100%;
}
/* Navigation bar styling */
nav {
  top: 0;
  background-color: transparent;
  /* border-bottom: 0.0625rem solid var(--text-inverse); */
  border-radius: 0.0rem;
  padding: 0 0.3125rem;
  margin: 0.125rem auto;
  left: 5.0rem;
  right: 5.0rem;
  max-width: 90.0rem;
}
nav .logo img {
  height: auto;
  margin: 1.25rem 1.375rem;
  max-width: 10.0rem;
  padding-top: 0.25rem;
}
nav #menu {
  max-height: 100%;
}
nav #menu li {
  cursor: pointer;
  transition: all var(--motion-base) var(--ease-smooth);
}
nav #menu li.select {
  color: var(--text-inverse);
  padding: 1.4375rem 1.0rem;
}
nav #menu li.select:hover {
  border-bottom: transparent;
}
#resize ul li:hover:not(select), nav #menu li a.active-page, nav #menu li.active, nav #menu li.active:hover, nav ul li:hover:not(active) {
  border-bottom: none;
}
nav #menu li a {
  display: block;
  position: relative;
}
nav #menu li.active {
  background: 0;
  cursor: pointer;
}
nav #menu li.active:hover {
  background: 0;
}
nav #menu #response1 {
  background-color: var(--color-surface);
  border-radius: 1.25rem;
  box-shadow: 0 0.25rem 0.5rem 0 rgba(0, 0, 0, 0.2), 0 0.375rem 1.25rem 0 rgba(0, 0, 0, 0.19);
  margin-left: 1.25rem;
}
nav #menu #response1 a {
  padding: 0;
  text-transform: none;
}
/*nav #menu #response1 li:last-child { border-bottom-left-radius: 1.25rem; border-bottom-right-radius: 1.25rem; }
*/
nav #menu #response1 ul li:hover:not(active) {
  transition: all var(--motion-base) var(--ease-smooth);
}
nav #menu #response1 ul li:hover {
  border-bottom: 0.125rem solid var(--color-border-dark);
  transition: all var(--motion-base) var(--ease-smooth);
  background: var(--background-accent);
  border: none !important;
}
nav #menu #response1 ul li:hover a {
  text-decoration: none !important;
}
nav #menu #response1 li:hover:first-child {
  border-top-left-radius: 1.25rem;
  border-top-right-radius: 1.25rem;
}
nav #menu #response1 li:hover:last-child {
  border-bottom-left-radius: 1.25rem;
  border-bottom-right-radius: 1.25rem;
}
.dropbtn:hover {
  background: 0 0;
}
.dropbtn, nav #menu li a {
  color: var(--text-inverse);
  /* font-weight: 600; */
  padding: 1.3125rem 1.0rem;
  cursor: pointer;
  text-transform: uppercase;
}
.openbtn:hover, button.openbtn:hover {
  filter: brightness(85%) !important;
}
.openbtn {
  border: 0;
  border-radius: 0;
  color: var(--color-surface);
  cursor: pointer;
  height: 100%;
  margin-bottom: 0;
  margin-top: 0;
  -o-transition: all var(--motion-base) var(--ease-smooth);
  padding: 0.9375rem;
}
.dropbtn {
  background-color: transparent;
  border: none;
  font: inherit;
  margin: 0;
  outline: 0;
}
.column a, nav #menu #response1 a {
  color: var(--text-primary);
  transition: all var(--motion-base) var(--ease-smooth);
}
.dropdown-content, .responsive-image {
  border-radius: 0.3125rem;
}
.dropdown-content, nav {
  /* Navigation bar styling */
  position: absolute;
  z-index: 1;
}
.dropdown-content {
  background-color: var(--color-surface);
  box-shadow: 0 0 1.875rem var(--shadow-color);
  display: none;
  left: 0;
  right: 0;
  padding: 0.625rem;
}
#resize {
  display: table;
  height: 100%;
  margin: 0;
  opacity: 0.2;
  top: 0;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 100%;
  z-index: 1;
}
#resize #menu {
  height: 100%;
  margin: auto;
  width: 90%;
}
#resize #menu li {
  cursor: pointer;
  display: block;
  height: 20%;
  min-height: 0.625rem;
  position: static;
  text-transform: uppercase;
}
#resize li:first-child {
  margin-top: 0;
}
#resize #menu li a {
  align-items: center;
  color: var(--text-heading);
  display: flex;
  height: 100%;
  justify-content: center;
}
#resize.active {
  height: 100%;
  margin: 0;
  opacity: 0.99;
  padding-bottom: 2.5rem;
  padding-top: 2.5rem;
  visibility: visible;
}
#toggle, #toggle .span {
  transition: all var(--motion-base) var(--ease-smooth);
}
#toggle {
  cursor: pointer;
  height: 1.25rem;
  right: 1.25rem;
  top: 0.3125rem;
  width: 1.25rem;
  z-index: 999;
}
#toggle .span {
  backface-visibility: hidden;
  height: 0.125rem;
  margin: 0.3125rem auto;
}
#toggle.on .span {
  background: var(--color-border-dark);
}
#toggle.on #one {
  transform: rotate(45deg) translateX(0) translateY(0.125rem);
}
#toggle.on #three {
  transform: rotate(-45deg) translateX(0.5rem) translateY(-0.625rem);
}
.leftcontent {
  float: left;
  height: auto;
  padding: 0 0.375rem;
  width: 50%;
}
.rightcontent {
  float: right;
  height: auto;
  padding: 0 0.375rem;
}
.column {
  background-color: var(--color-surface);
  float: left;
  height: inherit;
  padding: 0.125rem;
  width: 20%;
}
.column a {
  float: none;
  padding: 0.5rem;
  text-align: left;
}
.feedposts a:hover {
  transition: all var(--motion-base) var(--ease-smooth);
}
.home-scroll-down:hover, .scroll-down:hover {
  --webkit-animation: paused;
  animation-timing-function: var(--ease-smooth);
}
.row:after {
  clear: both;
  display: table;
}
#hide input[type="file"] {
  display: none;
  margin: 0.625rem;
}
#hide input[type="file"]:active+label {
  background-color: var(--background-accent);
  background-image: none;
  color: var(--color-surface);
}
#searchbox2 input {
  border: 0.125rem solid var(--color-border-mid);
  color: var(--text-disabled);
  font-size: 1.0625rem;
  padding: 0.625rem;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 80%;
}
#searchbox2 input:focus {
  border-color: rgba(82, 168, 236, 0.8);
  outline: 0;
}
:placeholder {
  position: fixed;
}
.search-box {
  background: 0;
  display: none;
  line-height: 2.5rem;
  right: 70;
}
.search-box:before {
  border-left: 0.0625rem solid transparent;
  border-right: 0.0625rem solid transparent;
  border-top: 0.0625rem solid transparent;
  right: 0;
  top: 0.0625rem;
}
.search-box input[type="text"] {
  background: var(--color-surface);
  border: 0.125rem solid var(--color-surface-alt);
  border-radius: 1.25rem;
  color: var(--text-primary);
  font-size: 0.875rem;
  margin-left: 1.25rem;
  margin-top: 0.625rem;
  outline: 0;
  padding: 0.3125rem 0.625rem;
}
.cell1 video::-webkit-media-controls, .topslide video::-webkit-media-controls {
  display: none !important;
}
#bgVideo {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: absolute;
  object-position: center;
  left: 0;
  top: 0;
  opacity: 0;
  transition: opacity .6s ease-in-out;
  background-color: var(--background-dark-alt);
  /* Helps Safari render poster */
}
.city-hero-text, .hero-text {
  left: 50%;
  position: absolute;
  top: 50%;
  transform: translate(-50%, -50%);
}
.city-hero-text, .city-hero-text h1, .city-hero-text h2 {
  color: var(--text-inverse);
  opacity: 1 !important;
}
.button-gap .btn, .topslide .button-gap .btn {
  background-color: transparent;
  border-radius: 1.25rem;
  display: block;
  margin-left: auto;
  margin-right: auto;
  margin-top: 0.0625rem;
  text-decoration: none;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 12.5rem;
}
.button-gap .btn, .login .fill, .login .fill input, .responsive-image:hover, .topslide .button-gap .btn {
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.hero #response5 ul li:hover:not(select), .location #response4 li a, .location #response4 ul li:hover:not(select), .location input[type="text"], .location input[type="text"]:focus, .login .fill input, .login .fill input:focus, input[type="submit"] {
  /* Submit button styles */
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.topslide .button-gap .btn {
  border: 0.125rem solid var(--color-surface);
  color: var(--color-surface);
  padding: 0.625rem;
  text-align: center;
}
.login-group.submit:hover, .postcontent button, .topslide .button-gap .btn:hover {
  background: var(--color-surface);
  color: var(--text-heading);
}
.button-gap .btn {
  border: 0.125rem solid var(--color-border-dark);
  color: var(--text-heading);
  padding: 0.375rem;
}
.button-gap .btn:hover, form .submit:hover {
  background: var(--color-border-dark);
  color: var(--color-surface);
}
.active {
  background: linear-gradient(to right, var(--background-page), var(--background-soft));
}
.fade {
  animation-duration: 2s;
  animation-name: fade;
  --webkit-animation-duration: 2s;
  --webkit-animation-name: fade;
}
.gallerytitle {
  text-align: left;
  background: 0;
  border-radius: 0.625rem;
  color: var(--color-surface);
}
.logintitle {
  font-size: 1.5625rem;
  padding: 0 1.0rem;
  text-align: center;
}
.container {
  margin: 0 auto;
  max-width: 100.0rem;
  padding: 2.5rem 0;
}
.maintitle {
  margin-bottom: 1.25rem;
  margin-top: 1.25rem;
}
cell {
  flex: 0 0 auto;
  border-radius: 0.75rem;
  overflow: hidden;
  height: inherit;
  transition: all var(--motion-base) var(--ease-smooth);
}
.cell:hover {
  transform: scale(1.02);
}
.contact-us .secondtitle, .location #response4, .location .secondtitle, .myprofplaces .bodycontainer, .myprofplaces h3, form#contact-form {
  transform: skewY(1.5deg);
}
.cell img {
  filter: brightness(80%);
  transition: all var(--motion-base) var(--ease-smooth);
  max-height: 12.5rem;
}
.cell img:hover {
  filter: brightness(100%);
}
.responsive-image {
  width: 100%;
  height: auto;
  display: block;
  object-fit: cover;
}
.responsive-image:hover {
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.25);
  transition: all var(--motion-base) var(--ease-smooth);
}
.centered {
  font-family: MontBold, sans-serif;
  padding: 0.625rem 0.5rem;
  text-align: left;
  background: var(--color-surface);
  color: var(--color-surface);
  font-size: 0.875rem;
}
.maintitle {
  font-size: 1.5625rem;
  max-width: 100%;
}
.login {
  line-height: 5.625rem;
  margin: 1.25rem;
  vertical-align: middle;
}
.login .fill, .login .fill input {
  background: 0;
  border-radius: 0;
  color: var(--text-secondary);
  outline: 0;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 100%;
}
.hero #response5 li a:hover, .login .fill span {
  color: var(--heading-accent);
}
.login .fill input {
  border: 0;
  margin-bottom: 0.9375rem;
  margin-top: 0.9375rem;
  border-bottom: 0.125rem solid var(--color-surface);
  font-size: 0.875rem;
  color: var(--color-surface);
  height: 1.125rem;
}
.location input[type="text"]:focus, .login .fill input:focus {
  border-bottom: 0.125rem solid var(--button-primary-bg);
  box-shadow: none;
  transition: all var(--motion-base) var(--ease-smooth);
}
.message {
  margin-left: auto;
  margin-right: auto;
  max-width: 31.25rem;
  min-height: 6.25rem;
  padding-bottom: 6.25rem;
  padding-top: 0.375rem;
  width: 100%;
}
.conversation-list {
  display: flex;
  flex-direction: column;
  gap: 0.375rem;
  padding: 0.375rem;
  margin: 1.5rem 0rem;
}
.messages-container {
  max-width: 31.25rem;
  min-height: 6.25rem;
  margin: -0.9375rem auto 0;
}
.message-reply-form {
  display: flex;
  gap: 0.625rem;
  margin-top: 1.875rem;
  margin-bottom: 3.75rem;
}
.message-reply-form textarea {
  flex: 1;
  resize: none;
  color: var(--text-primary);
  padding: 0.625rem;
  border-radius: 0.375rem;
}
.message-reply-form textarea::placeholder {
  color: var(--text-heading) !important;
}
.message-reply-form button {
  padding: 0.625rem 1rem;
  border-radius: 0.375rem;
  cursor: pointer;
}
.message-reply-form button:hover {
 background-color: var(--button-primary-bg)
}
.message-row {
  display: flex;
  gap: 0.625rem;
  margin: 0.75rem 0;
 align-items: flex-end
}
.message-row.sent {
 flex-direction: row-reverse
}
.message-avatar {
  width: 2.125rem;
  height: 2.125rem;
  border-radius: 50%;
 object-fit: cover
}
.message textarea {
  width: 90%;
}
sent {
  padding-bottom: 2%;
  padding-top: 2%;
  width: 50%;
}
.arrow-up {
  border-bottom: 19.375rem solid var(--color-border-dark);
  border-left: 19.375rem solid transparent;
  border-right: 19.375rem solid transparent;
  height: 0;
  margin-bottom: 0;
  position: static;
  width: 100%;
  z-index: 0;
}
.content, .feedimg video, .footer, .location, .postcontent, .postcontenttop {
  position: relative;
}
.content {
  float: right;
  margin-right: 10%;
  text-align: left;
}
.location {
  text-align: center;
  background-color: var(--color-surface-inverse);
  margin-top: 5.0rem;
  overflow: visible;
  padding-bottom: 28.75rem;
  padding-top: 2.5rem;
  transform: skewY(-1.5deg);
  transform-origin: 100%;
}
.location #response4 {
  display: block;
  margin: 0 25%;
  position: absolute;
  text-align: left;
  transition-duration: 1s;
  width: 50%;
  z-index: 1;
}
.location input[type="text"] {
  background: 0;
  border: 0;
  border-bottom: 0.125rem solid var(--color-surface);
  font-size: 0.875rem;
  border-radius: 0;
  font-family: 'MontRegular';
  color: var(--color-surface);
  height: 1.125rem;
  outline: 0;
  padding: 1.0rem;
  transform: skewY(1.5deg);
  transition: all var(--motion-base) var(--ease-smooth);
  width: 50%;
}
.location #response4 li {
  color: var(--accent-primary-hover);
  cursor: pointer;
  display: inline-block;
  text-align: center;
  width: 100%;
}
.hero #response5 ul li:hover:not(select), .location #response4 ul li:hover:not(select) {
  color: var(--text-heading);
  transition: all var(--motion-base) var(--ease-smooth);
}
.hero #response5 li a, .hero #response5 li a:hover, .location #response4 li a, .location #response4 li a:hover {
  font-weight: 600;
  position: relative;
}
.location #response4 li a {
  border-bottom: 0.0625rem solid var(--color-surface);
  color: var(--color-surface);
  display: list-item;
  font-size: 0.875rem;
  padding: 0.375rem;
  text-align: left;
  transition: all var(--motion-base) var(--ease-smooth);
}
.location #response4 li a:hover {
  border-bottom: 0.0625rem solid var(--button-primary-hover);
  color: var(--accent-primary-hover);
}
.posts {
  margin-left: 10%;
}
.inbox, .sent {
  margin: 0.3125rem 0.3125rem 0.3125rem 0.625rem;
}
.feed {
  padding-bottom: 5.0rem;
  padding-top: 1.25rem;
}
.feed a {
  color: var(--text-primary);
  display: list-item;
}
.bottomprof, .feedimg video, .myprofplaces {
  display: inline-block;
  width: 100%;
}
.places {
  border-left: solid var(--color-border-dark);
  text-align: center;
}
/* Submit button styles */
input[type="submit"] {
  background: var(--color-surface);
  border-radius: 0.3125rem;
  color: var(--text-heading);
  cursor: pointer;
  margin: 0.125rem;
  padding: 0.3125rem 1.25rem;
  transition: all var(--motion-base) var(--ease-smooth);
}
input:hover[type="submit"] {
  background: var(--color-border-dark);
  color: var(--color-surface);
}
.prof_names, .profile {
  /* User profile card styling */
  text-align: center;
  width: 100%;
}
.prof_names {
  border-radius: 0.625rem;
  margin-top: -1.5625rem;
  padding: 0.625rem;
  background: linear-gradient(120deg, var(--accent-blue-secondary) 0%, var(--accent-purple) 100%);
  max-width: 31.25rem;
  min-height: 6.25rem;
  margin: -0.9375rem auto 0;
}
.prof_names .text-box {
  padding: 0.3125rem 0.0rem;
}
.prof_names h5 {
 color: var(--text-inverse)
}
.prof_names .text-box h2, .prof_names .text-box h5 {
  background: 0 0;
  color: var(--surface-white);
  margin: 0.3125rem 0;
}
/* User profile card styling */
.profile {
  border-radius: 0.625rem;
  display: block;
  background: var(--background-profile);
  /* margin: 1.25rem auto; */
  /* padding: 0.625rem; */
}
.myfollowees, .myfollowers {
  padding: 0.8rem 0;
  text-align: left;
}
.profile input[type="text"], .profile textarea {
  padding: 0.75rem;
  margin-bottom: 0.9375rem;
  font-size: 0.875rem;
  background-color: var(--background-dark);
}
.profile input[type="text"]:focus, .profile textarea:focus {
  outline: 0;
  border-bottom-color: var(--accent-primary);
}
.profile button, .profile input[type="submit"] {
  background-color: var(--button-primary-bg);
  color: var(--color-surface);
  border: none;
  padding: 0.75rem 1.25rem;
  font-size: 1.0rem;
  border-radius: 0.375rem;
  cursor: pointer;
  transition: all var(--motion-base) var(--ease-smooth);
  margin-top: 0.625rem;
}
.profile button:hover, .profile input[type="submit"]:hover {
  background-color: var(--button-primary-bg);
}
.profile input[type="text"], .profile textarea {
  background-position: 0 center;
  border: none;
  border-bottom: 0.125rem solid var(--color-surface);
  border-radius: 0;
  color: var(--text-heading);
  height: 4rem;
  background: transparent;
  border: none;
  outline: 0;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 100%;
}
.prof_new input[type="text"] {
  background: 0 0;
  border: none;
  border-bottom: 0.125rem solid var(--color-border-dark);
  border-radius: 0;
  color: var(--color-surface);
  height: 3.75rem;
  outline: 0;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 90%;
}
.editprofposts textarea:focus, .prof_new2 input[type="date"], .prof_new2 input[type="text"], .profile textarea:focus, .profpost textarea:focus, button.highlighted, button.highlighted:hover {
  border-bottom: 0.125rem solid var(--button-primary-bg);
}
.profile img {
  border: 0.3125rem solid var(--color-surface);
  border-radius: 50%;
  height: 8.75rem;
  box-shadow: 0 0.25rem 0.9375rem rgba(0, 0, 0, 0.2);
  margin: -6.375rem auto 0.0625rem;
  opacity: 0.99 !important;
  width: 8.75rem;
  z-index: 1;
}
.followrow {
  display: flex;
  justify-content: space-between;
  /* pushes left item left, right item right */
  align-items: center;
  width: 100%;
  margin-top: 0.5rem;
}
.myfollowers, .myfollowees {
  flex: 1;
  font-weight: 600;
  padding: 0.25rem 0.2rem;
}
.myfollowers {
  text-align: left;
  border-right: 0.125rem solid white;
}
.myfollowees {
  text-align: right;
}
.myfollowees, .myfollowers {
  letter-spacing: 0.075rem;
  text-align: center;
}
.myfollowees {
  float: right;
}
.myfollowees a, .myfollowers a {
  color: var(--text-inverse);
  padding: 0.125rem;
  font-family: 'MontBold';
  font-size: 0.875rem;
}
#editHere, .age, .bio, .city, .nums, .placesvisited, .prof_section, .profilepic, .tab-nav .tab-item.active::after, .tab-nav .tab-item:hover::after {
  width: 100%;
}
.nums {
  height: auto;
}
.age, .bio, .city {
  display: inline-block;
  margin: 0.625rem 0;
  color: var(--text-inverse);
  font-size: 0.875rem;
  text-align: left;
}
.prof_section, .profpost {
  max-width: 31.25rem;
  padding: 0.625rem;
  border: 0.0625rem solid #e0e0e0;
  min-height: 6.25rem;
  margin: 0.625rem auto;
  background: linear-gradient(120deg, var(--accent-blue-secondary) 0%, var(--accent-purple) 100%);
  border-radius: 0.625rem;
  box-shadow: 0 0.125rem 0.375rem rgba(0, 0, 0, 0.18);
  transition: all var(--motion-base) var(--ease-smooth);
}
.profpost {
  margin-bottom: 4rem;
}
.prof_new, .prof_new2 textarea, .profpost input[type="text"] {
  border-radius: 1.5625rem;
}
.form-group, textarea {
  transition: all var(--motion-base) var(--ease-smooth);
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
  outline: 0;
}
.prof_section:hover {
  box-shadow: 0 0.375rem 1.25rem rgba(0, 194, 203, 0.3);
}
.prof_section i {
  color: var(--text-inverse);
  font-size: 1.125rem;
  margin-right: 0.375rem;
  vertical-align: middle;
}
.prof_new {
  border-style: solid;
  display: block;
  margin-left: 10%;
  padding: 3%;
  text-align: center;
  width: 80%;
}
.prof_new2 {
  margin-left: 25%;
  text-align: left;
  width: 50%;
}
.profpost:hover {
  box-shadow: 0 0.375rem 1.0rem rgba(0, 0, 0, 0.12);
  transform: translateY(-0.125rem);
  transition: all var(--motion-base) var(--ease-smooth);
}
.profpost input[type="text"] {
  border: 0;
  border-bottom: 0.125rem solid var(--color-border-white);
  border-radius: 0;
  background: transparent;
  padding: 0.625rem;
}
/* Base textarea styles */
textarea {
  background: 0;
  border: 0;
  font-size: 0.875rem;
  border-bottom: 0.125rem solid var(--text-inverse);
  border-radius: 0;
  color: var(--text-heading);
  height: 3.75rem;
  width: 100%;
}
textarea::placeholder {
  color: var(--text-heading);
}
.myprofplaces {
  background: var(--color-surface-inverse);
  color: var(--color-surface);
  display: table;
  margin-top: 5.0rem;
  overflow: visible;
  padding: 2.5rem 0 7.5rem;
  transform: skewY(-1.5deg);
  transform-origin: 100%;
}
.myprofplaces p, .postcontent {
  display: inline-block;
  vertical-align: top;
}
.object-fit_fill {
  max-width: 100%;
  object-fit: fill;
}
.object-fit_none {
  object-fit: none;
}
.object-fit_scale-down {
  object-fit: scale-down;
}
#changeHere {
  display: none;
  margin: 0.25rem auto;
  padding: 0.625rem;
  max-width: 31.25rem;
  width: 100%;
  color: var(--text-inverse);
}
.contact-form {
  background: 0;
  color: var(--color-surface);
  width: 100%;
}
.contact-form::placeholder {
  color: var(--text-heading);
  opacity: 1;
}
.contact-form:-ms-input-placeholder, .contact-form::-ms-input-placeholder {
  color: var(--color-surface);
}
.form-group {
  background: 0;
  border: 0;
  border-bottom: 0.125rem solid var(--color-border-dark);
  border-radius: 0;
  color: var(--text-heading);
  margin-bottom: 1.0rem;
  margin-left: 25%;
  margin-top: 1.0rem;
  width: 50%;
}
.form-group:focus {
  border-bottom: 0.125rem solid var(--button-primary-hover);
  box-shadow: none;
}
.form-group input {
  color: var(--color-surface);
  height: 2.8125rem;
}
form .submit {
  background: 0;
  border: 0.125rem solid var(--color-border-dark);
  border-radius: 1.25rem;
  color: var(--text-heading);
  cursor: pointer;
  margin-top: 1.25rem;
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.cell1 video:hover, .messageuser p, .openbtn, .profpost button {
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
footer a, footer p {
  color: var(--text-primary);
  font-size: 0.875rem;
}
.feedposts, .footer, .footer-content, .intro, .videofeedposts {
  margin-left: auto;
  margin-right: auto;
}
/* Footer base styles */
.footer {
  background-color: var(--color-surface);
  padding: 1.875rem 5.0rem;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 100%;
}
.footer li {
  max-width: 125.0rem;
}
.footer a {
  color: var(--link-color);
}
ul li a {
  color: var(--link-color);
}
ul li a:hover {
  color: var(--link-hover);
}
footer p:hover {
  color: var(--text-secondary);
}
.footer-content {
  border-bottom: 0.0625rem solid var(--color-surface-alt);
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 100.0rem;
  padding: 0 0.625rem 0.625rem;
  text-transform: uppercase;
}
.select-icon {
  display: inline-block;
  height: 0.9375rem;
  position: absolute;
  right: 0.9375rem;
  top: 50%;
  transform: translateY(-70%);
  width: 0.9375rem;
}
.footer-about {
  margin-left: auto;
  margin-right: auto;
}
.footer-list li:not(active) {
  border-top: 0.125rem solid transparent;
}
.footer-responsive-content {
  display: none;
}
.footer-list h3 {
  color: var(--color-surface);
  font-weight: 500;
  margin-bottom: 0.625rem;
}
.footer-list li {
  margin: 0.3125rem 0;
}
.footer-about {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  max-width: 100.0rem;
  padding-bottom: 0.625rem;
  padding-top: 1.875rem;
}
.cell1, .hero, .infologin h3, .infologin h4, .intro2 h2, .location h1, .location h2, .login h1, .login h2, .login h3, .login h4, .login-group.submit a, .social-icon:hover {
  color: var(--text-inverse);
}
.about-list {
  align-items: center;
  display: flex;
}
.about-list, .copyright {
  color: var(--text-primary);
  margin: 0.3125rem 0;
  font-size: 0.875rem;
}
about-list li {
  color: var(--text-muted);
  margin: 0 0.3125rem;
}
.postcontent {
  background: var(--color-surface);
  border-radius: 0.75rem;
  box-shadow: 0 0.125rem 0.375rem rgba(0, 0, 0, 0.18);
  /* padding: 0.25rem; */
}
.postcontent p {
  margin: 0.625rem;
  overflow-x: auto;
  overflow-y: auto;
  font-size: 0.875rem;
  text-align: left;
  word-wrap: break-word;
}
.postcontent:hover {
  box-shadow: 0 0.1875rem 0.5625rem rgba(0, 0, 0, 0.18);
  transform: translateY(-0.125rem);
  transition: all var(--motion-base) var(--ease-smooth);
}
.postcontenttop {
  overflow: hidden;
  width: auto;
}
.postcontent button {
  border-radius: 0.3125rem;
  float: right;
  background: var(--button-primary-bg);
  padding: 0.3125rem;
  margin: 0.125rem;
}
.postcontent button i {
  color: var(--color-surface);
}
.feedimg video {
  background: var(--background-muted);
  border-top-right-radius: 0.3125rem;
  border-top-left-radius: 0.3125rem;
  height: auto;
  max-width: 50.0rem;
  overflow: hidden;
  text-align: center;
  z-index: 0;
}
.feedposts p {
  padding: 0.625rem;
  overflow-x: auto;
  overflow-y: auto;
  font-size: 0.875rem;
  text-align: left;
  word-wrap: break-word;
}
.profpost i {
 color: white
}
.feedposts button:hover, .videofeedposts button:hover {
  float: right;
  transition: all var(--motion-base) var(--ease-smooth);
}
.feedposts button, .videofeedposts button {
  background: var(--color-surface);
  color: var(--text-heading);
  float: right;
  padding: 0.3125rem;
}
/* button:hover {
  background: var(--button-primary-bg);
} */
.videofeedposts button {
  cursor: pointer;
  -webkit-border-radius: 0.3125rem;
}
.postcontent button:hover {
  transition: all var(--motion-base) var(--ease-smooth);
}
.cell1 video:hover, .feedPostTitle img:hover, .openbtn {
  transition: all var(--motion-base) var(--ease-smooth);
}
.feedposts button, .postcontent button, button {
  cursor: pointer;
}
.feedposts, .videofeedposts {
  max-width: 125.0rem;
  text-align: left;
  background: var(--background-page);
  border-radius: 0.75rem;
  display: grid;
  padding: 0.125rem;
  grid-template-columns: repeat(3, 1fr);
  gap: 1.0rem;
}
.videofeedPostTitle {
  padding-top: 0.0625rem;
  text-align: left;
}
.feedPostTitle img, .videofeedPostTitle img {
  border: 0.125rem solid var(--color-surface);
  border-radius: 50%;
  display: inline-block;
  height: 2.875rem;
  margin-left: 0.125rem;
  width: 2.875rem;
  transition: all var(--motion-base) var(--ease-smooth);
  z-index: 99;
}
.feedPostTitle img, .videofeedPostTitle img:hover {
  border: 0.125rem solid var(--color-surface);
}
.feedPost {
  background: var(--color-surface);
  border-radius: 0.75rem;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.08);
  /* padding: 0.25rem; */
}
.feedPost:hover {
  box-shadow: 0 0.375rem 1.0rem rgba(0, 0, 0, 0.12);
  transform: translateY(-0.125rem);
  transition: all var(--motion-base) var(--ease-smooth);
}
.feedimg {
  height: auto;
  overflow: hidden;
  position: initial;
  width: 100%;
}
.cell1, .hero, .postcontenttop video {
  position: relative;
}
.feedimg img, .postcontenttop img, .postcontenttop video {
  max-height: 15.0rem;
  width: 100%;
  height: 100%;
  border-top-right-radius: 0.75rem;
  border-top-left-radius: 0.75rem;
}
.videofeedposts p {
  margin: 0.625rem;
}
.postcontenttop video {
  width: 100%;
  height: 100%;
  max-width: none;
  object-fit: cover;
  display: block;
}
/* === Custom Horizontal Scroll for Video Feed Posts === */
.videofeedposts {
  display: flex;
  flex-direction: row;
  overflow-x: auto;
  overflow-y: hidden;
  var(--color-text-inverse)-space: nowrap;
  gap: 0.9375rem;
  padding: 0.625rem 0;
  scroll-behavior: smooth;
  border-radius: 0.75rem;
  background: var(--background-page);
}
/* Custom scrollbar */
.videofeedposts::-webkit-scrollbar {
  height: 0.625rem;
}
.videofeedposts::-webkit-scrollbar-track {
  background: var(--color-surface-alt);
  border-radius: 0.625rem;
}
.videofeedposts::-webkit-scrollbar-thumb {
  background: var(--accent-primary);
  border-radius: 0.625rem;
}
.videofeedposts::-webkit-scrollbar-thumb:hover {
  background: var(--accent-primary-hover);
}
/* Make each video post inline */
.videofeedposts>div {
  display: inline-block;
  min-width: 15.625rem;
  flex-shrink: 0;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.08);
  /* max-width: 26.875rem; */
}
/* === Custom Horizontal Scroll for Posts === */
.myprofposts, .myprofvideoposts {
  display: flex;
  flex-direction: row;
  overflow-x: auto;
  max-width: 125.0rem;
  text-align: left;
  background: var(--background-page);
  border-radius: 0.75rem;
  margin: 1.25rem auto;
  overflow-y: hidden;
  var(--color-text-inverse)-space: nowrap;
  gap: 0.9375rem;
  /* spacing between posts */
  padding: 0.625rem 0;
  scroll-behavior: smooth;
}
/* Custom scrollbar */
.myprofposts::-webkit-scrollbar, .myprofvideoposts::-webkit-scrollbar {
  height: 0.625rem;
}
.myprofposts::-webkit-scrollbar-track, .myprofvideoposts::-webkit-scrollbar-track {
  background: var(--color-surface-alt);
  border-radius: 0.625rem;
}
.myprofposts::-webkit-scrollbar-thumb, .myprofvideoposts::-webkit-scrollbar-thumb {
  background: var(--accent-primary);
  border-radius: 0.625rem;
}
.myprofposts::-webkit-scrollbar-thumb:hover, .myprofvideoposts::-webkit-scrollbar-thumb:hover {
  background: var(--accent-primary-hover);
}
/* Make each post stay inline */
.myprofposts>div, .myprofvideoposts>div {
  display: inline-table;
  min-width: 15.625rem;
  /* adjust based on your design */
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.08);
  max-width: 21.875rem;
  flex-shrink: 0;
}
/* === Custom Horizontal Scroll for Feed Posts (photos.php) === */
.feedposts {
  display: flex;
  flex-direction: row;
  overflow-x: auto;
  overflow-y: hidden;
  gap: 0.75rem;
  padding: 0.625rem 0;
  scroll-behavior: smooth;
}
.feedposts::-webkit-scrollbar {
  height: 0.625rem;
}
.feedposts::-webkit-scrollbar-track {
  background: var(--color-surface-alt);
  border-radius: 0.625rem;
}
.feedposts::-webkit-scrollbar-thumb {
  background: var(--accent-primary);
  border-radius: 0.625rem;
}
.feedposts::-webkit-scrollbar-thumb:hover {
  background: var(--accent-primary-hover);
}
.feedposts>div {
  display: inline-table;
  min-width: 15.625rem;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.08);
  max-width: 21.875rem;
  flex-shrink: 0;
}
/* === Custom Horizontal Scroll for Grid Sections === */
.grid {
  display: flex;
  flex-direction: row;
  overflow-x: auto;
  overflow-y: hidden;
  gap: 0.75rem;
  padding: 0.375rem 0;
  scroll-behavior: smooth;
}
.grid::-webkit-scrollbar {
  height: 0.625rem;
}
.grid::-webkit-scrollbar-track {
  background: var(--color-surface-alt);
  border-radius: 0.625rem;
}
.grid::-webkit-scrollbar-thumb {
  background: var(--accent-primary);
  border-radius: 0.625rem;
}
.grid::-webkit-scrollbar-thumb:hover {
  background: var(--accent-primary-hover);
}
.grid .cell {
  flex: 0 0 auto;
  /* min-width: 15.625rem; */
}
/* ===== Post Details Styling ===== */
.post-details {
  display: flex;
  flex-direction: column;
  gap: 0.625rem;
  padding: 0.625rem;
  font-size: 0.875rem;
}
.post-details>div {
  display: flex;
  align-items: left;
}
/* ===== Individual Sections ===== */
.post-date i, .post-location i, .post-category i, .post-likes i {
  margin-right: 0.375rem;
}
.post-date {
  font-family: montbold;
}
.post-location {
 font-family: montbold
}
.post-category {
 font-family: montbold
}
.post-content {
  margin-top: 0.25rem;
  margin-bottom: 0.25rem;
  font-family: montregular;
  overflow-y: hidden;
  var(--color-text-inverse)-space: normal;
  /* ensures text wraps onto new lines */
  word-wrap: break-word;
  /* breaks long words if needed */
  overflow-wrap: break-word;
  /* modern alternative */
  height: inherit;
}
.post-likes {
  color: var(--accent-like);
  /* red heart */
  font-weight: bold;
}
/* Hover effect for likes */
.post-likes:hover {
  cursor: pointer;
  color: var(--accent-like-hover);
  filter: brightness(85%);
}
.secondtitle {
 margin-bottom: 0.625rem
}
.like-button i {
  transition: transform 0.2s ease, color 0.2s ease;
}
.like-button:active i {
  transform: scale(1.3);
}
.like-button.liked i {
  color: var(--color-like-active);
}
.like-count {
 color: var(--color-text-inverse)
}
.form-alert {
  margin: 1rem auto;
  max-width: 45rem;
  /* 45.0000rem */
  padding: 0.75rem 0.875rem;
  /* 0.7500rem 0.8750rem */
  border-radius: 0.5rem;
  /* 0.5000rem */
  font-weight: 600;
  text-align: center;
}
.form-alert-success {
  background: #e8f6ee;
  color: var(--text-success);
  border: 0.0625rem solid #c9ebd7;
  /* 0.0625rem */
}
.message-card {
  background: var(--surface-white);
  border-radius: 0.5rem;
  padding: 0.875rem 1rem;
  margin-bottom: .5rem;
  box-shadow: 0 0.125rem 0.375rem rgba(0, 0, 0, 0.08);
}
.message-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: .5rem;
}
.message-actions form {
  display: inline-block;
  margin-left: .5rem;
}
.message-actions button {
  background: none;
  border: none;
  cursor: pointer;
}
.message-body {
  line-height: 1.5;
  color: var(--text-secondary);
  text-align: left;
}
.message-card.trash {
  background: var(--background-soft);
  opacity: 0.75;
}
.message-card.sent {
  background: var(--surface-message-sent);
}
.object-fit_cover {
  max-width: 100%;
  object-fit: cover;
}
.login-group.submit {
  background: 0;
  border: 0.125rem solid var(--color-surface);
  border-radius: 1.25rem;
  margin: 0.0rem auto;
  color: var(--color-surface);
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.intro p, .intro3 p, .prof_actions {
  margin-bottom: .5rem;
  margin-top: .5rem;
}
.intro, .intro h1, h2 {
  color: var(--text-heading);
  text-align: center;
}
.intro, .intro3 {
  display: table;
  max-width: 100.0rem;
  padding: 2.5rem 0;
}
.intro, header {
  background: var(--color-surface);
}
.social-icons {
  background: 0;
  border: 0.125rem solid var(--color-border-dark);
  border-radius: 50%;
  color: var(--text-heading);
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  padding: 0.375rem;
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.centered i, .info-login-group.submit:hover, .rightside, .social-icons:hover {
  background: var(--color-surface-inverse);
  color: var(--color-surface);
}
.prof_actions {
  border-radius: 0.5rem;
  width: 100%;
}
.prof_actions p {
  font-size: 0.75rem;
  margin-top: 0.1875rem;
}
.cell1 video {
  bottom: 0;
  min-width: 100%;
  opacity: 0.2;
  right: 0;
  z-index: -100;
}
.cell1, .cell1 video {
  background: var(--color-border-dark);
  height: auto;
  object-fit: fill;
  width: calc(100% / 3);
}
.cell1 {
  padding: 0;
}
.cell1 video:hover {
  opacity: 0.3;
}
.hero, .prof_info, .profileinfo {
  border-radius: 0.3125rem;
}
.button-gap, .socialcontainer {
  margin-bottom: 0.375rem;
  margin-top: 0.375rem;
}
.weather-container h3, span {
  display: inline-block;
  vertical-align: middle;
  color: var(--text-heading);
}
.bottomprof {
  padding-bottom: 1.25rem;
  /* padding-top: 1.25rem; */
}
.placesvisited {
  color: var(--color-surface);
  display: inline-block;
  padding: 0.5rem 0;
  text-align: left;
  vertical-align: top;
}
.hero, .infologin {
  text-align: center;
}
.hero #response5 li a, .hero input[type="text"], .hero input[type="text"]:focus {
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.messageuser a, .messageuser p {
  color: var(--text-heading);
  text-align: center;
  transition: all var(--motion-base) var(--ease-smooth);
}
.editprofposts button, .profpost button {
  cursor: pointer;
  background: transparent;
  margin: 0.625rem 0;
  color: white;
  -o-transition: all var(--motion-base) var(--ease-smooth);
  padding: 0.3125rem;
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-border-radius: 0.3125rem;
}
.editprofposts button:hover, .profpost button:hover {
  background: var(--button-primary-bg);
}
.follow img, .profile button {
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.profileinfo {
  background: var(--color-surface-inverse);
  max-width: 100.0rem;
  padding: 0.625rem;
}
.prof_info {
  background: var(--color-surface-inverse);
  margin-top: 0.3125rem;
  padding: 0.625rem;
}
.intro1, .intro2 {
  margin-left: auto;
  margin-right: auto;
  transform-origin: 100%;
  overflow: visible;
}
.intro2 {
  padding: 2.5rem 0;
}
.follow, .follow img, .followuser, .hero #response5 li {
  display: inline-block;
}
.hero #response5, .hero #response5 li {
  color: var(--color-surface);
  text-align: left;
  width: 100%;
}
.hero input[type="text"] {
  background: 0;
  border: 0.125rem solid var(--color-surface);
  border-radius: 1.0rem;
  color: var(--color-surface);
  font-size: 0.875rem;
  height: 1.125rem;
  margin-bottom: 0.5rem;
  margin-top: 0.5rem;
  padding: 1.0rem;
  transition: all var(--motion-base) var(--ease-smooth);
  width: 100%;
}
.hero input[type="text"]:focus {
  border: 0.125rem solid var(--background-accent);
  box-shadow: none;
  transition: all var(--motion-base) var(--ease-smooth);
}
.hero #response5 {
  background: 0;
  border-radius: 1.5625rem;
  display: block;
  margin-left: 0;
  transition-duration: 1s;
  z-index: 1;
}
.hero #response5 li {
  cursor: pointer;
}
.hero #response5 li a {
  color: var(--color-surface);
  display: list-item;
  padding: 0.25rem;
  transition: all var(--motion-base) var(--ease-smooth);
}
input:focus, textarea:focus {
  outline: 0;
}
.hero input[type="text"]::placeholder, .location input[type="text"]::placeholder {
  color: var(--color-surface);
}
.overlay input[type="search"]::placeholder {
  color: var(--text-heading);
}
#output {
  border: 0.1875rem solid var(--color-surface);
  border-radius: 0.3125rem;
  height: 6.25rem;
  width: 6.25rem;
}
.intro1 {
 background: var(--background-profile)
}
.profile button {
  padding: 0.3125rem;
  background: transparent;
  color: var(--color-surface);
  color: var(--text-heading);
}
.profile button:hover {
  background: var(--button-primary-hover);
}
.follow img {
  border: 0.125rem solid var(--color-surface);
  border-radius: 50%;
  height: 5.0rem;
  width: 5.0rem;
}
.info-login-group.submit, input.form-group {
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
}
.follow img:hover {
  border: 0.125rem solid var(--color-border-dark);
}
.leftside, .rightside {
  float: right;
  height: 100vh;
  -moz-transition: all var(--motion-base) var(--ease-smooth);
  -o-transition: all var(--motion-base) var(--ease-smooth);
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-transition: all var(--motion-base) var(--ease-smooth);
  width: 50%;
}
.leftside {
  color: var(--text-heading);
  float: left;
}
.my-input, select {
  background-color: transparent;
  color: var(--text-heading);
  font-weight: 700;
}
.center-fit {
  margin: auto;
  max-height: 100vh;
  max-width: 100%;
  width: 100%;
}
.leftside:hover {
  filter: brightness(85%);
}
.centered i {
  border-radius: 50%;
  font-size: 1.375rem;
  padding: 0.375rem;
}
input:-webkit-autofill:focus textarea:-webkit-autofill, select:-webkit-autofill, select:-webkit-autofill:focus, select:-webkit-autofill:hover, textarea:-webkit-autofill:hover textarea:-webkit-autofill:focus {
  -webkit-box-shadow: 0 0 0 62.5rem var(--color-surface) inset !important;
}
.infologin {
  line-height: 5.625rem;
  margin: 1.25rem;
  vertical-align: middle;
}
.bioupdate, .messages {
  margin-bottom: 6.25rem;
}
input:-webkit-autofill, input:-webkit-autofill:active, input:-webkit-autofill:focus, input:-webkit-autofill:hover {
  -webkit-box-shadow: 0 0 0 1.875rem var(--color-border-dark) inset !important;
}
.prof_actions button {
  background: 0;
  border-radius: 0;
  color: var(--text-heading);
  text-transform: uppercase;
  padding: 0.1875rem 0.375rem;
}
.prof_actions button:hover {
  background: var(--color-surface);
  border-radius: 0;
  color: var(--button-primary-bg);
  text-transform: uppercase;
}
.prof_actions i {
  border-radius: 50%;
  color: var(--text-heading);
  padding: 0.3125rem;
}
.info-login-group.submit a, .infologin h1, .infologin h2, .tp-ac__list {
  color: var(--text-heading);
}
.bioupdate i, .login a, .myprofplaces a {
  color: var(--color-surface);
}
.info-login-group.submit {
  background: 0;
  border: 0.125rem solid var(--color-border-dark);
  border-radius: 1.25rem;
  color: var(--text-heading);
  display: block;
  margin: 0 auto;
  /* centers horizontally */
}
.login a {
  display: inline;
}
.login::placeholder {
  color: var(--color-surface);
  opacity: 1;
}
.follow {
  padding: 0.5rem;
}
input:-webkit-autofill {
  -webkit-text-fill-color: var(--color-surface) !important;
}
.myprofplaces a:hover {
  color: var(--color-surface);
}
.my-input {
  border: 0.0625rem solid transparent;
  border-bottom: 0.125rem solid var(--color-surface);
  border-radius: 0;
  padding: 0.25rem;
  width: 100%;
}
select {
  appearance: none;
  border: 0;
  border-bottom: 0.125rem solid var(--color-text-inverse);
  border-radius: 0;
  cursor: pointer;
  font-size: 0.875rem;
  margin-left: 0.125rem;
  -moz-appearance: none;
  padding: 0.625rem;
  transition: all var(--motion-base) var(--ease-smooth);
  -webkit-appearance: none;
}
select::-ms-expand {
  display: none;
}
select:focus, select:hover {
  background-color: var(--color-surface);
  border-bottom-color: var(--color-border-light);
  color: var(--accent-primary-hover);
}
.centered a {
  color: var(--text-heading);
  padding-left: 0.125rem;
}
.bioupdate {
  background: var(--color-surface-inverse);
  border-radius: 1.25rem;
}
.bioupdate form {
  padding: 1.25rem;
}
.followuser {
  float: right;
  padding: 0.25rem;
  text-align: left;
  width: 50%;
}
.messageuser {
  float: left;
  padding: 0.25rem;
  text-align: right;
  width: 50%;
}
.contact-us {
  background: var(--background-page);
  margin-top: 2.5rem;
  overflow: visible;
  padding-bottom: 3.75rem;
  padding-top: 2.5rem;
  transform: skewY(-1.5deg);
  transform-origin: 100%;
}
input.form-group {
  background: 0;
  border: 0;
  border-bottom: 0.125rem solid var(--color-border-dark);
  border-radius: 0;
  color: var(--text-primary);
  height: 1.125rem;
  outline: 0;
  padding: 1.0rem;
  width: 50%;
}
.editprofposts {
  background: var(--color-surface);
  border-radius: 0.3125rem;
  margin: 1.25rem 0;
  padding: 0.625rem;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.08);
}
.editprofposts h1, .editprofposts h2, .editprofposts h3, .editprofposts h4, .editprofposts h5, .editprofposts select, .editprofposts textarea {
 color: var(--text-heading) !important
}
.tooltip {
  background: var(--color-surface);
  border-radius: 0.125rem;
  bottom: -3.4375rem;
  color: var(--text-primary);
  display: none;
  font-size: 0.625rem;
  font-weight: 700;
  left: -2.1875rem;
  letter-spacing: 0.1875rem;
  padding: 0.625rem;
  position: absolute;
  text-transform: uppercase;
}
nav #menu li a .tooltip:before {
  border-bottom: 0.0625rem solid transparent;
  border-left: 0.0625rem solid transparent;
  border-right: 0.0625rem solid transparent;
  border-top: 0.0625rem solid var(--color-surface);
  content: "";
  position: absolute;
  transform: translateX(-50%);
}
/* === Custom Horizontal Scroll for #myid === */
#myid {
  /* display: flex; */
  flex-direction: row;
  overflow-x: auto;
  overflow-y: hidden;
  /* var(--color-text-inverse)-space: nowrap; */
  gap: 0.9375rem;
  /* spacing between posts */
  padding: 0.625rem 0;
  scroll-behavior: smooth;
}
/* Custom scrollbar */
#myid::-webkit-scrollbar {
  height: 0.625rem;
}
#myid::-webkit-scrollbar-track {
  background: var(--color-surface-alt);
  border-radius: 0.625rem;
}
#myid::-webkit-scrollbar-thumb {
  background: var(--accent-primary);
  border-radius: 0.625rem;
}
#myid::-webkit-scrollbar-thumb:hover {
  background: var(--accent-primary-hover);
}
/* Make each post stay inline */
#myid>div {
  display: inline-block;
  min-width: 15.625rem;
  /* adjust based on your design */
  max-width: 21.875rem;
  flex-shrink: 0;
}
.hidden {
  display: none;
}
.text-box {
  display: flex;
  justify-content: flex-start;
  align-items: flex-start;
  position: relative;
  letter-spacing: 0.075rem;
}
.text-box h2, .text-box h3, .text-box h4, .text-box h5 {
  position: relative;
  display: inline-block;
  cursor: pointer;
  text-transform: capitalize;
  padding: 0.625rem;
  transition: all var(--motion-base) var(--ease-smooth);
}
/* === Underline Effect (40% visible by default) === */
.text-box h2::after, .text-box h3::after, .text-box h4::after, .text-box h5::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -0.1875rem;
  height: 0.125rem;
  width: 40%;
  /* 👈 visible underline before hover */
  background-color: var(--accent-primary);
  border-radius: 0.125rem;
  transition: all var(--motion-base) var(--ease-smooth);
}
/* Expand on hover */
.text-box h2:hover::after, .text-box h3:hover::after, .text-box h4:hover::after, .text-box h5:hover::after {
  width: 100%;
}
.myprofplaces .text-box h2 {
 color: var(--color-text-inverse) !important
}
.myprofplaces .text-box h2::after {
 background-color: var(--color-surface)
}
.prof_names .textbox h3 {
  background-color: var(--color-border-dark) !important;
}
.intro2 .text-box h2 {
  background-color: var(--text-heading);
  color: var(--color-surface);
}
.text-box h5 {
  background-color: transparent;
}
.rightcontent {
  padding-left: 0;
  width: 100%;
}
.places {
  margin-top: 2%;
}
.city-hero-text h1 {
  font-size: 2.625rem;
}
.myprofplaces h3 {
  margin-bottom: 1.0rem;
  overflow: visible;
  transform-origin: 100%;
}
.gm-style-iw-d {
  padding: 0 !important;
  overflow: hidden !important;
}
.gm-style-iw-c {
  padding: 0 !important;
  border-radius: 0.25rem !important;
}
.gm-style-iw-ch, .gm-ui-hover-effect {
  display: none !important;
}
.map-info-window {
  max-width: 12.5rem;
  animation: 0.3s var(--ease-accel) fadeIn;
  animation-timing-function: var(--ease-smooth);
}
.map-info-window img {
  width: 100%;
  height: auto;
  border-radius: 0.25rem 0.25rem 0 0;
  display: block;
}
.map-info-window .info-body {
  padding: 0.5rem 0.625rem;
}
.map-info-window .info-title {
  font-size: 0.875rem;
  font-weight: 700;
  margin-bottom: 0.125rem;
}
.map-info-window .info-desc {
  font-size: 0.75rem;
  margin: 0 0 0.25rem;
  color: var(--text-tertiary);
}
.map-info-window .info-link {
  font-size: 0.75rem;
}
to {
  opacity: 1;
}
.tab-nav {
  all: unset;
  display: block;
  border-bottom: 0.1875rem solid var(--accent-primary);
  margin: 1.25rem 0;
}
.tab-nav ul {
  display: flex;
  list-style: none;
  padding: 0;
  margin: 0;
}
.tab-nav .tab-item {
  font-weight: 700;
  padding: 0.375rem 0.625rem;
  cursor: pointer;
  background: 0 0;
  color: var(--text-heading);
  position: relative;
  border: none;
  border-radius: 0;
  transition: all var(--motion-base) var(--ease-smooth);
}
.tab-nav .tab-item::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 0.125rem;
  width: 0;
  background-color: var(--text-heading);
  transition: all var(--motion-base) var(--ease-smooth);
}
.tab-nav .tab-item.active, .tab-nav .tab-item:hover {
  color: var(--text-primary);
}
/* Media Queries */
/* Responsive styles for tablets and smaller devices */
/* === Smooth underline LTR animation for inputs, textarea, select, and .form-group === */
input[type="text"], input[type="search"], input.form-group, textarea, select, .form-group, .my-input {
  background-image: linear-gradient(var(--button-primary-bg), var(--button-primary-bg));
  background-repeat: no-repeat;
  background-position: 0 100%;
  background-size: 0 0.125rem;
  transition: all var(--motion-base) var(--ease-smooth);
}
input[type="text"]:hover, input[type="text"]:focus, input[type="search"]:hover, input[type="search"]:focus, input.form-group:focus, textarea:hover, textarea:focus, select:hover, select:focus, .form-group:hover, .form-group:focus, .my-input:hover, .my-input:focus {
  background-size: 100% 0.125rem;
}
/* Slight rounded-feel for underline */
input[type="text"], input[type="search"], textarea, select, .form-group, .my-input {
  box-shadow: inset 0 -0.0312rem 0 var(--shadow-color);
  color: var(--text-inverse);
}
textarea::placeholder {
 color: white !important
}
/* === Prefers-reduced-motion: minimize movement === */
/* === Smooth underline LTR animation for .prof_actions buttons & #changePic === */
.prof_actions button, button#changePic {
  position: relative;
  background-image: linear-gradient(var(--button-primary-bg), var(--button-primary-bg));
  background-repeat: no-repeat;
  background-position: 0 100%;
  background-size: 0 0.125rem;
  transition: all var(--motion-base) var(--ease-smooth);
}
.prof_actions button:hover, .prof_actions button:focus, button#changePic:hover, button#changePic:focus {
  background-size: 100% 0.125rem;
}
/* === Fix: refine .prof_actions button underline so it doesn't mess up filled buttons === */
/* Keep #changePic background-underline as-is (user-approved). Switch .prof_actions buttons to a ::after underline. */
.prof_actions button {
  position: relative;
  background-image: none;
  /* cancel previous background-based underline */
  box-shadow: none;
  /* cancel inset line */
  overflow: visible;
  font-size: 1.25rem;
}
.prof_actions button::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -0.125rem;
  height: 0.125rem;
  width: 0;
  background: var(--button-primary-bg);
  transition: all var(--motion-base) var(--ease-smooth);
  pointer-events: none;
  border-radius: 0.0625rem;
}
.prof_actions button:hover::after, .prof_actions button:focus::after {
  width: 100%;
}
/* Opt-out utility: add .no-underline to any prof_actions button to disable */
.prof_actions button.no-underline::after {
  width: 0 !important;
}
@media (prefers-reduced-motion: reduce) {
 * {
    animation-duration: 1ms !important;
    animation-iteration-count: 1 !important;
    transition-duration: 1ms !important;
    scroll-behavior: auto !important;
 }
}
@media only screen and (max-width: 48.0rem) {
  /* Navigation bar styling */
  /* Footer base styles */
  /* Heading 1 styles */
 .leftcontent, .message, .overlay-content, .rightcontent {
    text-align: center;
 }
 #changeHere, .footer-about, .footer-content, .hero #response4, .hero #response4 li a, .leftside, .overlay, nav #menu {
    display: none;
 }
 nav .logo img {
    margin: 0.75rem 1.375rem;
 }
 .noscroll {
    overflow: hidden;
 }
 .leftcontent {
    float: left;
    height: auto;
    padding-bottom: 0.75rem;
    padding-right: 0.75rem;
    width: 50%;
 }
 .feedposts p, .feedposts2 p, .form-group, .hero-text .btn, .location #response4 li a, .placesvisited, .prof_section, .profileinfo p, p {
    font-size: 0.875rem;
 }
 .cell1, .postcontent {
    /* grid-template-columns: repeat(2, 1fr); */
 }
 .age, .bio, .city, .footer-list li, .overlay, .profile, .rightside, nav {
    /* Navigation bar styling */
    width: 100%;
 }
 #toggle {
    margin-top: 0.375rem;
    opacity: 1;
    visibility: visible;
 }
 nav, nav .logo {
    position: static;
    background: var(--color-surface);
 }
 nav .logo {
    height: 0;
    margin: 0;
    max-width: 80%;
 }
 nav {
    height: inherit;
    margin: 0.0rem;
    z-index: 1;
 }
 .overlay {
    background-color: var(--color-surface);
    height: 100%;
    left: 0;
    opacity: 0.99;
    position: fixed;
    top: 0;
    z-index: 1;
 }
 input#searchbox2[type="search"] {
    background: 0;
    border: 0;
    border-bottom: 0.125rem solid var(--color-border-dark);
    border-radius: 0;
    color: var(--text-heading);
    height: 1.125rem;
    font-family: 'MontRegular';
    font-size: 0.875rem;
    margin-top: 0.5rem;
    -moz-transition: all var(--motion-base) var(--ease-smooth);
    -o-transition: all var(--motion-base) var(--ease-smooth);
    padding: 1.0rem;
    transition: all var(--motion-base) var(--ease-smooth);
    -webkit-appearance: none;
    -webkit-transition: all var(--motion-base) var(--ease-smooth);
    width: 100%;
 }
 input#searchbox2[type="search"]:focus {
    border-bottom: 0.125rem solid var(--button-primary-hover);
 }
 .overlay #response2 {
    background: 0;
 }
 .overlay #response2 li a {
    background: 0;
    border-bottom: 0.0625rem solid var(--color-border-dark);
    color: var(--text-heading);
    padding: 0.5rem;
 }
 .overlay #response2 li a:hover {
    border-bottom: 0.0625rem solid var(--button-primary-bg);
    color: var(--accent-primary);
 }
 .overlay #response2 li {
    color: var(--color-surface);
    display: block;
    text-align: left;
 }
 .overlay-content {
    margin: auto;
    position: relative;
    top: 0;
    width: 80%;
 }
 .overlay .closebtn {
    color: var(--text-heading);
    cursor: pointer;
    font-size: 2.0rem;
 }
 .overlay .closebtn:hover {
    color: var(--text-disabled);
 }
 .overlay input[type="text"] {
    background: var(--color-surface);
    border: 0;
    border-radius: 0;
    float: left;
    padding: 0.9375rem;
    width: 100%;
 }
 .overlay input[type="text"]:hover {
    background: var(--background-alt);
 }
 .footer-content .footer-responsive-content, .footer-responsive-content .footer-responsive-content, .footer-list ul .footer-responsive-content, .footer-list li .footer-responsive-content {
    display: flex;
    flex-wrap: nowrap;
    overflow-x: auto;
    background: var(--color-surface);
 }
 .footer-content .footer-list, .footer-responsive-content .footer-list, .footer-list ul .footer-list, .footer-list li .footer-list {
    flex: 0 0 20%;
    max-width: 20%;
    text-align: center;
 }
 .footer-content .footer-list a, .footer-responsive-content .footer-list a, .footer-list ul .footer-list a, .footer-list li .footer-list a, .footer-content .footer-list button, .footer-responsive-content .footer-list button, .footer-list ul .footer-list button, .footer-list li .footer-list button {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: left;
    width: 100%;
    padding: 0.75rem 0;
    text-decoration: none;
    border: none;
 }
 .footer-content {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 0.625rem;
 }
 .footer-list {
    flex: 1 1 20%;
    text-align: center;
 }
 .footer-list ul {
    justify-content: center;
 }
 .footer-list li {
    width: 100%;
 }
 .footer-list li a, .footer-list li button {
    color: inherit;
    cursor: pointer;
 }
 .footer-list i {
    font-size: 0.875rem;
 }
 .footer-list li.active {
    background: var(--color-surface);
    border-top: 0.125rem solid var(--color-border-dark);
 }
 .footer-list li.not-active {
    background: var(--color-surface);
    border-top: 0.125rem solid transparent;
 }
 .footer-list .openbtn {
    border: none;
    cursor: pointer;
    padding: 0.75rem;
    color: var(--color-surface);
 }
 .footer-about {
    padding: 1.25rem;
    text-align: center;
 }
 .footer-about .copyright {
    font-size: 0.8125rem;
    color: var(--text-footer);
 }
 .footer-about .about-list {
    list-style: none;
    padding: 0;
    margin: 0.625rem 0 0;
    display: flex;
    justify-content: center;
    gap: 0.625rem;
 }
 .footer-about .about-list a {
    font-size: 1.125rem;
    color: var(--link-color);
    text-decoration: none;
 }
 .footer-responsive-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    background: var(--background-page);
 }
 .footer-responsive-content .footer-list {
    flex: 1 0 20%;
    max-width: 20%;
 }
 .footer-content {
    display: flex;
 }
 #changeHere {
    margin: auto;
    width: 100%;
 }
 .rightcontent {
    float: right;
    height: auto;
    padding-bottom: 0.75rem;
    padding-left: 0.75rem;
    width: 50%;
 }
 .feedPost, .feedposts, .videofeedposts {
    text-align: left;
 }
 .footer {
    background: var(--color-surface);
    border-top: 0.0625rem solid #f5f5f5;
    bottom: 0;
    left: 0;
    position: fixed;
    right: 0;
    padding: 0;
 }
 .footer-content {
    padding-top: 3.125rem;
 }
 .feedPost, .profpost {
    /* display: inline-block; */
 }
 .feedPost {
    /* padding: 0.5rem; */
    position: relative;
 }
 .bodycontainer {
    margin: 0 0.5rem;
 }
 .city-hero-text h1 {
    font-size: 2.375rem;
 }
 .nums, h3 {
    font-size: 1.125rem;
 }
 .profileinfo {
    font-size: 0.75rem;
 }
 h1 {
    font-size: 1.75rem;
 }
 h2 {
    font-size: 1.375rem;
 }
 .form-group.submit, h4 {
    font-size: 1.125rem;
 }
 h5 {
    font-size: 1.0rem;
 }
 .intro3 {
    padding: 1.875rem 0;
 }
 .rightcontent {
    display: visible;
 }
 .profilepic img {
    height: 7.5rem;
    width: 7.5rem;
 }
 .login {
    border-radius: 0.3125rem;
    font-size: 0.875rem;
    margin: 5%;
    text-align: center;
    width: 90%;
 }
 .myprofplaces, .myprofposts {
    /* display: grid; */
    /* float: left; */
    /* width: 100%; */
    /* grid-template-columns: repeat(2, 1fr); */
 }
 .myprofplaces {
    float: right;
    padding-bottom: 12.5rem;
    text-align: center;
 }
 .text {
    font-size: 2.1875rem;
 }
 .intro {
    padding: 1.25rem 0;
 }
}
@media screen and (max-width: 37.5rem) {
  /* User profile card styling */
 .profile {
    /* padding: 0.9375rem; */
 }
 .profile input[type="text"], .profile textarea {
    font-size: 0.875rem;
 }
 .profile button, .profile input[type="submit"] {
    /* width: 100%; */
 }
}
/* Responsive styles for tablets and smaller devices */
@media screen and (max-width: 48.0rem) {
 .prof_section {
    padding: 0.9375rem;
    /* margin-top: 1.25rem; */
 }
 .prof_section i {
    font-size: 0.875rem;
 }
 .footer-list li {
    margin: 0.0rem 0;
 }
 .feedposts {
    /*  grid-template-columns: repeat(2, 1fr); */
 }
 .footer-list {
    flex: 1 0 33.33%;
    max-width: 33.33%;
 }
 .footer-responsive-content .footer-list {
    flex: 1 0 25%;
    max-width: 20%;
 }
 .footer-content {
    display: none;
 }
}
/* Responsive styles for mobile phones */
@media screen and (max-width: 30.0rem) {
 .cell {
    width: 33%;
 }
 .cell img {
    max-width: 125.0rem;
 }
 .postvideo {
    margin-top: 3.75rem;
 }
 .footer-list {
    flex: 1 0 33.33%;
    max-width: 33.33%;
 }
 .footer-responsive-content .footer-list {
    flex: 1 0 25%;
    max-width: 20%;
 }
 .footer-content {
    display: none;
 }
 .footer-responsive-content {
    display: flex;
    background: var(--color-surface);
 }
 .feedposts {
    grid-template-columns: repeat(1, 1fr);
 }
 .feedPost, .leftcontent, .rightcontent {
    padding-right: 0;
 }
 .feedPost {
    display: inline-block;
    text-align: left;
 }
 .column {
    height: auto;
 }
 .leftcontent {
    padding-left: 0;
 }
 .cell1, .column, .feedimg, .leftcontent, .places, .placesvisited, .postcontent, .prof_section, .profilepic {
    width: 100%;
 }
 .myfollowees, .myfollowers {
    /* width: 100%; */
 }
 .feedPost, .rightcontent {
    padding-left: 0;
    width: 100%;
 }
 .feedPost {
    position: relative;
 }
 .myprofplaces, .myprofposts {
    grid-template-columns: repeat(1, 1fr);
 }
}
@media screen and (min-width: 30.0rem) {
 .postphoto, .postvideo {
    /* display: inline-block; */
    /* float: left; */
    padding: 0.125rem;
    /* width: 50%; */
 }
 .postvideo {
    /* float: right; */
 }
 .cell {
    width: calc(100% / 4);
 }
}
@media screen and (min-width: 48.0rem) {
 .cell {
    width: calc(100% / 7);
 }
 .bodycontainer {
    background: 0;
    padding: 0 5.0rem;
    text-align: left;
 }
 .intro p {
    max-width: 100%;
    text-align: left;
 }
 .profileinfo input, .profileinfo textarea {
    border: 0.0625rem solid var(--color-border-dark);
 }
 .profpost h4 {
    font-size: 1.0rem;
 }
 #resize {
    visibility: hidden !important;
 }
}
