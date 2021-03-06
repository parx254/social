<?php
header("Content-type: text/css");
?>
*, .footer li a, h1, h2, h3, h4, h5 {
 text-decoration: none
}

.row:after, .search-box:before {
 content: ""
}

*, footer ul {
 list-style: none
}

a {
 list-style-type: none
}

@keyframes bounce {
 0%, 20%, 50%, 80%, to {
 -webkit-transform: translateY(0);
 -ms-transform: translateY(0);
 transform: translateY(0)
 }

 40% {
 -webkit-transform: translateY(10px);
 -ms-transform: translateY(10px);
 transform: translateY(10px)
 }

 60% {
 -webkit-transform: translateY(5px);
 -ms-transform: translateY(5px);
 transform: translateY(5px)
 }
}

@-webkit-keyframes fade {
 0% {
 opacity: .4
 }

 to {
 opacity: 1
 }
}

@keyframes fade {
 0% {
 opacity: .4
 }
}

@-webkit-keyframes spinner {
 to {
 -webkit-transform: rotate(360deg);
 transform: rotate(360deg)
 }
}

@keyframes spinner {
 to {
 -webkit-transform: rotate(360deg);
 transform: rotate(360deg)
 }
}

@font-face {
 font-family: MontHeavy;
 src: url(webfonts/Mont-Heavy.ttf) format("opentype")
}

@font-face {
 font-family: MontLight;
 src: url(webfonts/Mont-Light.ttf) format("opentype")
}

@font-face {
 font-family: MontRegular;
 src: url(webfonts/Mont-Regular.ttf) format("opentype")
}

@font-face {
 font-family: MontBold;
 src: url(webfonts/Mont-SemiBold.ttf) format("opentype")
}

@font-face {
 font-family: MontBlack;
 src: url(webfonts/Mont-Black.ttf) format("opentype")
}

* {
 margin: 0;
 padding: 0;
 box-sizing: border-box
}

body, p {
 font-family: MontRegular, sans-serif;
 color: #222
}

.noscroll {
 overflow: hidden
}

body {
 -webkit-font-smoothing: antialiased;
 -moz-osx-font-smoothing: auto;
 background: #fff
}

h1 {
 color: #000;
 font-family: MontBlack, sans-serif;
 font-size: 32px;
 letter-spacing: 1px
}

.profile h1, h5 {
 color: #fff
}

h2, h3, h4 {
 font-size: 28px
}

h3, h4 {
 font-size: 26px
}

h4 {
 font-size: 24px
}

a {
 display: list-item;
 color: #489eea
}

.login p, h5, p {
 font-size: 16px
}

.profile h1, .profile h2, h5 {
 font-family: MontRegular
}

.profile h1, h2, h3, h4, h5 {
 margin-top: 6px;
 margin-bottom: 6px;
 font-family: MontBold
}

.profile h2 {
 color: #489eea
}

.gallerytitle h2 {
 color: #000;
 text-align: left
}

p {
 text-align: left;
 max-width: 1680px
}

.feed p, .leftcontent {
 text-align: center
}

.messageuser p:hover, .myprofplaces a:hover {
 text-decoration: underline
}

.centered a, .hero-text h1 {
 color: #fff
}

nav-down {
 bottom: -40px
}

.disco, .fallen, .hidden, .magic, .tiger {
 display: none
}

.footer:hover, .show {
 display: block
}

.weather-container {
 margin-top: 50px;
 background: 0;
 text-align: center
}

.temp, .weather {
 color: #000;
 margin: 0
}

.home-scroll-down, .scroll-down {
 position: relative;
 bottom: 30px;
 left: 50%;
 margin-left: -16px;
 display: block;
 width: 32px;
 height: 32px;
 background-size: 14px auto;
 border-radius: 50%;
 z-index: 2;
 -webkit-animation: bounce 2s infinite 2s;
 animation: bounce 2s infinite 2s;
 -webkit-transition: all .2s ease-in;
 transition: all .2s ease-in;
 margin-top: 20px
}

.home-scroll-down:before, .scroll-down:before {
 position: relative;
 top: calc(50% - 7px);
 left: calc(50% - 7px);
 transform: rotate(-45deg);
 display: block;
 width: 12px;
 height: 12px;
 content: "";
 border: 2px solid #fff;
 border-width: 0 0 2px 2px
}

.coverpic {
 position: initial;
 min-height: 200px;
 background-color: #111;
 height: 30%;
 width: 100%;
 overflow: hidden
}

.coverpic .container {
 position: relative;
 z-index: 2
}

.coverpic img {
 width: 100%;
 height: 100%;
 opacity: .15
}

.coverpic video {
 position: absolute;
 top: 50%;
 left: 50%
}

.coverpic video {
 min-width: 100%;
 min-height: 100%;
 width: auto;
 height: auto;
 z-index: 0;
 -ms-transform: translateX(-50%) translateY(-50%);
 -o-transform: translateX(-50%) translateY(-50%);
 -moz-transform: translateX(-50%) translateY(-50%);
 -webkit-transform: translateX(-50%) translateY(-50%);
 transform: translateX(-50%) translateY(-50%);
 opacity: .25
}

.bodycontainer {
 max-width: 1600px;
 display: block;
 margin-left: auto;
 margin-right: auto
}

.feedposts2 p {
 font-size: 20px
}

.dropdown {
 float: right;
 overflow: hidden
}

.dropbtn:hover {
 background: 0
}

.dropbtn, nav #menu li a {
 color: #fff;
 padding: 23px 16px;
 font-weight: 600;
 text-transform: uppercase
}

.column a, nav #menu #response1 a {
 color: #2c3643;
 transition: .2s .2s ease-in-out
}

.dropbtn {
 border: 0;
 outline: 0;
 background-color: transparent;
 font: inherit;
 margin: 0
}

.dropdown-content, .responsive-image {
 border-radius: 5px
}

.leftcontent {
 width: 50%;
 height: auto;
 float: left;
 padding-left: 6px;
 padding-right: 6px
}

.bodycontainer p, .leftcontent p, .rightcontent p {
 text-align: left
}

.rightcontent {
 width: 50%;
 height: auto;
 float: right;
 text-align: center;
 padding-left: 6px;
 padding-right: 6px
}

.feedposts p, .login p, .message p {
 text-align: center
}

.dropdown-content, nav {
 width: 100%;
 position: absolute;
 z-index: 1
}

.dropdown-content {
 display: none;
 background-color: #fff;
 left: 0;
 box-shadow: 0 0 30px #333;
 padding: 10px
}

.column a, .dropdown:hover .dropdown-content {
 display: block
}

.column {
 float: left;
 width: 20%;
 padding: 2px;
 background-color: #fff;
 height: inherit;
 font-family: MontBold
}

.column a {
 float: none;
 padding: 8px;
 text-decoration: none;
 text-align: left;
 font-size: 12px
}

.hidebutton, .hidebutton1, .hidebutton2, .hidebutton3, .hidebutton4, .showbutton, .showbutton1, .showbutton1:hover, .showbutton2, .showbutton2:hover, .showbutton3, .showbutton3:hover, .showbutton4, .showbutton4:hover, .showbutton:hover {
 background: 0 0 !important;
 padding: 16px 20px;
 font-family: MontBold, sans-serif;
 font-size: 16px
}

.column a:hover, .column h5, nav #menu #response1 a:hover {
 color: #000
}

.column a, .feedposts a:hover {
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out
}

.feedposts a:hover {
 transition: .2s ease-in-out;
 text-decoration: underline
}

.showbutton, .showbutton1 {
 transition: .5s ease-in-out
}

.showbutton {
 border: 2px solid transparent;
 -webkit-transition: .5s ease-in-out;
 -moz-transition: .5s ease-in-out;
 -o-transition: .5s ease-in-out;
 color: #fff
}

.hidebutton, .showbutton1:hover, .showbutton:hover {
 border: 2px solid #fff
}

.hidebutton, .hidebutton1, .showbutton1, .showbutton1:hover, .showbutton2, .showbutton:hover {
 color: #fff;
 margin: 2px
}

.showbutton1 {
 border: 2px solid transparent;
 -webkit-transition: .5s ease-in-out;
 -moz-transition: .5s ease-in-out;
 -o-transition: .5s ease-in-out
}

.showbutton2, .showbutton3 {
 transition: .5s ease-in-out
}

.hidebutton1, .showbutton2 {
 border: 2px solid #fff
}

.showbutton2 {
 border: 2px solid transparent;
 -webkit-transition: .5s ease-in-out;
 -moz-transition: .5s ease-in-out;
 -o-transition: .5s ease-in-out
}

.hidebutton2 {
 color: #fff
}

.hidebutton2, .showbutton2:hover, .showbutton3, .showbutton3:hover, .showbutton4:hover {
 border: 2px solid #fff
}

.showbutton3 {
 border: 2px solid transparent;
 color: #fff;
 -webkit-transition: .5s ease-in-out;
 -moz-transition: .5s ease-in-out;
 -o-transition: .5s ease-in-out
}

.hidebutton3 {
 border: 2px solid #fff
}

.hidebutton3, .hidebutton4, .showbutton4 {
 color: #fff
}

.search-box input[type=text], nav #menu li a {
 font-family: MontRegular, sans-serif
}

.showbutton4 {
 border: 2px solid transparent;
 transition: .5s ease-in-out;
 -webkit-transition: .5s ease-in-out;
 -moz-transition: .5s ease-in-out;
 -o-transition: .5s ease-in-out
}

.hidebutton4 {
 border: 2px solid #fff
}

.home-scroll-down:hover, .scroll-down:hover {
 -webkit-animation: paused
}

#buttons li, nav #menu li, nav .logo img {
 display: inline-block
}

.row:after {
 display: table;
 clear: both
}

#hide input[type=file] {
 display: none;
 margin: 10px
}

#hide input[type=file]:active + label {
 background-image: none;
 background-color: #2d6c7a;
 color: #fff
}

.feedposts p {
 text-align: left;
 word-wrap: break-word
}

#resize #menu li, .button-gap .btn, .city-hero-text, .hero-text, .title h1, nav #menu #response1 li {
 text-align: center
}

nav {
 background: 0;
 top: 0
}

nav .logo {
 position: static;
 float: left;
 background: #fff;
 border-bottom-right-radius: 60px;
 margin: 0;
 width: 300px;
 height: 50px
}

nav .logo a {
 display: inline-block
}

#resize, #resize.active, #toggle, .search-box {
 position: absolute
}

nav .logo img {
 max-width: 60%;
 height: auto;
 margin: 12px 40px
}

.button-image, nav #menu {
 max-width: 100%
}

nav #menu {
 float: right;
 padding-right: 5%;
 max-height: 100%
}

nav #menu li {
 cursor: hand;
 transition: all .3s ease-out
}

nav #menu li.select {
 padding: 23px 16px
}

nav #menu li.select:hover {
 border-bottom: transparent
}

nav #menu li a {
 display: block;
 position: relative
}

nav #menu li.active {
 background: 0;
 cursor: hand;
 border-bottom: 2px solid white
}

nav #menu li.active:hover {
 border-bottom: 2px solid white;
 background: 0
}

nav #menu li a.active-page, nav ul li:hover:not(active) {
 border-bottom: 2px solid #fff
}

nav #menu #response1 {
 background-color: #fff;

 margin-left: 20px;
 border-top-right-radius: 20px;
 border-top-left-radius: 20px;
 box-shadow: 0 4px 8px 0 rgba(0, 0, 0, .2), 0 6px 20px 0 rgba(0, 0, 0, .19)
}

nav #menu #response1 a {
 padding: 0;
 text-transform: none;
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out
}

nav #menu #response1 li {
 display: block
}

#resize ul li, #response1 ul li {
 border-bottom: 2px solid #fff
}

nav #menu #response1 ul li:hover:not(active) {
 border-bottom: 2px solid #000;
 transition: .2s .2s ease-in-out;
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out
}

#searchbox2 input {
 padding: 10px;
 width: 80%;
 transition: all 1s;
 border: 2px solid #999;
 font-size: 17px;
 color: #ccc
}

#searchbox2 input:focus {
 outline: 0;
 border-color: rgba(82, 168, 236, .8)
}

:placeholder {
 position: fixed
}

.search-box {
 right: 140;
 line-height: 60px;
 background: 0;
 display: none
}

.search-box:before {
 position: absolute;
 top: 1px;
 right: 0;
 border-right: 1px solid transparent;
 border-top: 1px solid transparent;
 border-left: 1px solid transparent
}

.search-box input[type=text] {
 border: 1px solid #000;
 border-radius: 20px;
 font-size: 14px;

 padding: 5px 10px;
 margin-top: 10px;
 margin-left: 20px;
 outline: 0
}

#resize {
 width: 100%;
 margin: 0
}

#resize {
 background: #fff;
 z-index: 1;
 top: 0;
 height: 100%;
 visibility: hidden;
 transition: all .5s ease-out;
 display: table;
 opacity: .2
}

#resize #menu {
 height: 100%;
 width: 90%;
 margin: auto}

#resize #menu li {
 display: block;
 min-height: 10px;
 height: 20%;
 cursor: hand;
 background: #fff;
 position: static;
 text-transform: uppercase
}

#resize li:nth-child(1) {
 margin-top: 0
}

#resize #menu li a {
 display: flex;
 justify-content: center;
 align-items: center;
 color: #000;
 height: 100%;
 font-family: MontBold;}

#resize.active {
 visibility: visible;
 opacity: .99;
 margin: 0;padding-top: 40px;padding-bottom: 40px;
 height: 100%;
 overflow: hidden
}

#resize ul li:hover:not(select) {
 border-bottom: 2px solid #000
}

#toggle, #toggle .span {
 transition: all .3s ease-out
}

#toggle {
 right: 20px;
 top: 5px;
 z-index: 999;
 width: 20px;
 height: 20px;
 float: right;
 visibility: hidden;
 cursor: hand
}

#toggle .span {
 height: 2px;
 background: #fff;
 backface-visibility: hidden;
 margin: 5px auto
}

#toggle.on .span {
 background: #000
}

#toggle.on #one {
 transform: rotate(45deg) translateX(0) translateY(2px)
}

#toggle, #toggle.on #two {
 opacity: 0
}

#toggle.on #three {
 transform: rotate(-45deg) translateX(8px) translateY(-10px)
}

.cover {
 padding: 10% 0
}

.cover.top {
 padding: 15% 0 10%;
 height: 100vh;
 display: -webkit-box;
 display: -ms-flexbox;
 display: flex
}

.topslide {
 max-height: 1600px;
 min-height: 200px;
 position: relative;
 background-color: #000;
 height: 50%;
 width: 100%;
 overflow: hidden;
 clip-path: polygon(0 0, 100% 0, 100% 100%, 0 calc(100% - 20%));
 -webkit-clip-path: polygon(0 0, 100% 0, 100% 100%, 0 calc(100% - 20%))
}

.cell1 video::-webkit-media-controls, .topslide video::-webkit-media-controls {
 display: none !important
}

.topslide video {
 position: absolute;
 top: 50%;
 left: 50%;
 min-width: 100%;
 min-height: 100%;
 width: auto;
 height: auto;
 z-index: 0;
 -ms-transform: translateX(-50%) translateY(-50%);
 -o-transform: translateX(-50%) translateY(-50%);
 -moz-transform: translateX(-50%) translateY(-50%);
 -webkit-transform: translateX(-50%) translateY(-50%);
 transform: translateX(-50%) translateY(-50%);
 opacity: .1
}

.topslide .container {
 position: relative;
 z-index: 2
}

.city-hero-text, .hero-text {
 position: absolute;
 transform: translate(-50%, -50%);
 left: 50%;
 top: 50%
}

.hero-text {
 color: #fff
}

.city-hero-text h1 {
 font-size: 60px
}

.city-hero-text, .city-hero-text h1, .city-hero-text h2 {
 color: #fff;
 opacity: 1 !important
}

.button-gap .btn, .topslide .button-gap .btn {
 display: block;
 width: 200px;
 margin-top: 1px;
 margin-left: auto;
 margin-right: auto;
 text-decoration: none;
 font-family: MontBold, sans-serif;
 font-size: 16px;
 background-color: transparent;
 border-radius: 20px;
 transition: .5s ease-in-out
}

.gallerytitle, .secondtitle {
 font-family: MontHeavy, sans-serif
}

.button-gap .btn, .login .fill, .login .fill input, .responsive-image:hover, .topslide .button-gap .btn {
 -webkit-transition: .5s ease-in-out;
 -moz-transition: .5s ease-in-out;
 -o-transition: .5s ease-in-out
}

.topslide .button-gap .btn {
 text-align: center;
 padding: 10px;
 color: #fff;
 border: 2px solid #fff
}

.topslide .button-gap .btn:hover {
 background: #fff;
 color: #000
}

.button-gap .btn {
 padding: 6px;
 color: #000;
 border: 2px solid #000
}

.button-gap .btn:hover, form .submit:hover {
 background: #000;
 color: #fff
}

.active {
 background: linear-gradient(to right, #f9f9f9, #fbf7f5)
}

.fade {
 -webkit-animation-name: fade;
 -webkit-animation-duration: 2s;
 animation-name: fade;
 animation-duration: 2s
}

.img {
 display: block
}

.title {
 color: #fff
}

.feed a {
 font-family: MontRegular
}

#wrapper, .cell1 video, .center-fit {
 min-height: 100%}

.gallerytitle {
 text-align: left
}

.cell, .login, .maintitle, .message, .secondtitle {
 text-align: center
}

.gallerytitle {
 border-radius: 10px;
 background: 0;
 color: #fff
}

.feedposts a:visited, .feedposts i, .gallerytitle h1, .login p, .logintitle h3, .postcontent i, .title h1 {
 color: #000
}

.logintitle {
 max-width: 100%;
 padding: 0 1rem;
 text-align: center;
 font-size: 25px
}

.container {
 margin: 0 auto;
 max-width: 1600px;
 padding: 0
}

.centered {
 font-size: 16px;
 font-family: MontBold;
 cursor: hand;
 margin-top: 8px;
 text-align: left;
 background: #fff;
 padding-left: 4px;
 transform: skew(20deg)
}

.responsive-image {
 max-width: 100%;
 width: 100%;
 height: auto
}

.responsive-image:hover {
 box-shadow: 0 0 4px 2.5px rgba(0, 0, 0, .2);
 transition: .5s .5s ease-in-out
}

.cell img:hover {
 filter: brightness(100%)
}

.cell {
 padding: 6px;
 position: relative;
 color: #fff;
 font-family: MontHeavy, sans-serif;
 font-size: 16px
}

.feed, .inbox, .location input[type=text], .login .fill, .login .fill input, .sent {
 font-family: MontRegular, sans-serif
}

.cell img {
 filter: brightness(80%)
}

.cell img, .cell video {
 width: 100%;
 height: auto;
 display: inline-block
}

.grid {
 margin-left: auto;
 margin-right: auto;
 display: flex;
 flex-wrap: wrap;
 flex-direction: row;
 max-width: 2000px
}

.maintitle {
 margin-bottom: 20px;
 max-width: 100%;

 font-size: 25px
}

.login {
 margin: 10% 5%;
 vertical-align: middle;
 line-height: 90px
}

.login .fill, .login .fill input {
 width: 100%;
 background: 0;
 color: #808080;
 outline: 0;
 border-radius: 0;
 transition: .3s .3s ease-in-out;
 font-size: 16px
}

.login .fill span {
 color: #489eea
}

.login .fill input {
 height: 18px;
 border: 0;
 border-bottom: 2px solid #fff;
 color: #fff;
 margin-bottom: 20px;
 margin-top: 20px;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out;
 font-size: 14px
}

.location input[type=text]:focus, .login .fill input:focus {
 box-shadow: none;
 border-bottom: 2px solid #489eea;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.message {
 font-size: 15px;
 margin-right: auto;
 margin-left: auto
}

.message {
 width: 50%;
 padding-top: 6px;
 padding-bottom: 6px
}

.message textarea {
 width: 90%
}

.sent {
 width: 50%;
 padding-top: 2%;
 padding-bottom: 2%
}

.arrow-up {
 position: static;
 z-index: 0;
 width: 100%;
 height: 0;
 border-left: 310px solid transparent;
 border-right: 310px solid transparent;
 border-bottom: 310px solid #000;
 margin-bottom: 0
}

.content {
 position: relative;
 margin-right: 10%;
 float: right;
 text-align: left
}

.location {
 position: relative;
 text-align: center
}

.location #response4 {
 margin-left: 25%;
 text-align: left;
 width: 50%;
 position: absolute;
 display: block;
 z-index: 1;
 transition-duration: 1s
}

.location {
 overflow: visible;
 transform: skewY(-1.5deg);
 transform-origin: 100%;
 padding-bottom: 450px;
 background: #000;
 margin-top: 100px;
 padding-top: 50px
}

.location input[type=text] {
 padding: 16px;
 color: #fff;
 font-size: 16px;
 width: 50%;
 height: 18px;
 background: 0;
 border: 0;
 border-bottom: 2px solid #fff;
 outline: 0;
 border-radius: 0;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.location #response4 li {
 color: #489eea;
 width: 100%;
 font-size: 16px;
 text-align: center;
 display: inline-block;
 cursor: hand
}

.hero #response5 ul li:hover:not(select), .location #response4 ul li:hover:not(select) {
 color: #000;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.location #response4 li a, input[type=submit] {
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.location #response4 li a, .location #response4 li a:hover {
 font-family: MontRegular, sans-serif;
 font-weight: 600;
 position: relative
}

.location #response4 li a {
 text-align: left;
 border-bottom: 1px solid #fff;
 font-size: 16px;
 color: #fff;
 padding: 8px;
 transition: .3s ease-in-out
}

.inbox, .sent {
 font-size: 15px
}

.location #response4 li a:hover {
 color: #489eea;
 border-bottom: 1px solid #489eea
}

.posts {
 float: left;
 margin-left: 10%
}

.profile img {
 display: block
}

.inbox {
 margin: 5px 5px 5px 10px
}

.feed, .inbox, .sent {
 text-align: center
}

.sent {
 margin: 5px 5px 5px 10px
}

.feedPost2 {
 margin-bottom: 2px;
 text-align: left
}

.feed {
 padding-top: 6px;
 padding-bottom: 6px;
 font-size: 25px




}

.feed a {
 font-size: 14px;
 color: #fff
}

.feed a:hover {
 text-decoration: underline
}

.feedPost2, .feedimg video {
 display: inline-block;
 width: 100%
}

.feedPost2 {
 margin-top: -30px
}

.feedimg video {
 background: #d3d3d3;
 border-radius: 5px;
 z-index: 0;
 text-align: center;
 position: relative;
 max-width: 800px;
 height: auto;
 overflow: hidden
}

.places {
 float: left;
 text-align: center;
 border-left: solid #000
}

input[type=submit] {
 color: #000;
 padding: 5px 20px;
 font-family: MontRegular, sans-serif;
 background: #fff;
 cursor: pointer;
 border-radius: 5px;
 margin: 2px;
 font-size: 12px;
 transition: .3s .3s ease-in-out
}

input:hover[type=submit] {
 color: #fff;
 background: #000
}

.prof_names, .profile {
 padding: 10px;
 width: 100%;
 text-align: center
}

.prof_names {
 font-family: MontRegular, sans-serif;
 font-size: 25px
}

.profile {display: table;background: #000;margin-top: 8px;}

.prof_new2 input[type=date], .prof_new2 input[type=text], .profile input[type=date], .profile input[type=text], .profile textarea {
 border-radius: 25px;
 border-style: solid;
 border-width: thin;
 padding: 5px;
 font-family: MontRegular, sans-serif;
 width: 30%
}

.prof_new2 input[type=date], .prof_new2 input[type=text], .profile textarea {
 width: 90%;
 height: 60px;
 background: 0;
 border: 0;
 border-bottom: 2px solid #fff;
 font-family: MontRegular, sans-serif;
 color: #fff;
 outline: 0;
 border-radius: 0;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out;
 font-size: 14px
}

.prof_new2 input[type=date], .prof_new2 input[type=text], .profile textarea:focus {
 border-bottom: 2px solid #489eea
}

.profiletop img {
 border: 3px solid #fff;
 z-index: 1;
 opacity: .99 !important;
 width: 120px;
 height: 120px;
 border-radius: 50%;
 margin: -100px auto 1px
}

.myfollowees, .myfollowers {
 display: inline-block;
 width: 50%
}

.age, .bio, .city, .nums {
 width: 100%
}

.myfollowers {
 padding: 2px;
 float: left
}

.myfollowees a, .myfollowers a {
 font-size: 16px;
 font-family: MontRegular;
 color: #fff
}

.myfollowees {
 float: right
}

.myfollowees a {
 padding: 2px
}

.nums {
 font-family: MontRegular;
 height: auto
}

.bio {
 display: inline-block;
 text-align: left
}

.age h3, .bio h3, .city h3, .myprofplaces h1 {
 color: #000;
 font-family: MontHeavy
}

.age, .bio, .bio h4, .bio p, .city {
 color: #fff
}

.prof_section {
 display: inline-block;
 text-align: center
}

.prof_section i {
 color: #fff
}

.age, .city {
 display: inline-block;
 margin-top: 6px;
 text-align: left
}

.prof_section {
 width: 100%
}

.prof_section {

}

.prof_new {
 display: block;
 width: 80%;
 margin-left: 10%;
 padding: 3%;
 border-style: solid;
 border-radius: 25px;
 border-colo r: #C0C0C0;
 text-align: center
}

.bottomprof, .myprofplaces {
 display: inline-block;
 width: 100%
}

.prof_new2 {
 text-align: left;
 width: 50%;
 margin-left: 25%
}

.prof_new2 textarea, .profpost input[type=text] {
 border-radius: 25px;
 font-family: MontRegular, sans-serif
}

.profpost {
 width: 100%
}

.profpost {
 display: inline-block;
 padding: 20px;
 background: #000;
 border-radius: 20px
}

.profpost input[type=text] {
 border-style: solid;
 border-width: thin;
 padding: 2px;
 border: 0;
 border-bottom: 2px solid white;
 border-radius: 0px
}

.myprofplaces, .myprofposts {
 max-width: 2000px;
 margin-left: auto;
 margin-right: auto
}

.profpost textarea, .editprofposts textarea {
 width: 100%;
 height: 60px;
 background: 0;
 border: 0;
 border-bottom: 2px solid #fff;
 font-family: MontRegular, sans-serif;
 color: #fff;
 outline: 0;
 border-radius: 0;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out;
 font-size: 14px
}

.profpost textarea::placeholder, .editprofposts textarea::placeholder {
 color: #fff
}

.profpost textarea:focus, .editprofposts textarea:focus {
 border-bottom: 2px solid #489eea
}

.myprofposts {
 align-items: center;
 background: #fff;
 width: 100%
}

.myprofplaces {
 background: #000;
 border-radius: 20px;
 display: table;
 margin-top: 20px;
 margin-bottom: 200px;
 padding: 16px
}

.myprofplaces p {
 margin-top: 6px
}

.myprofplaces h3 {
 color: #fff
}

.myprofposts h1, h3, h4 {
 color: #000;
 font-family: MontBold
}

.myprofplaces p, .postcontent {
 vertical-align: top;
 display: inline-block;
 width: 33.33%
}

.postcontent {
 position: relative;
 padding: 2px;
 text-align: left
}

.postcontent p {
 text-align: left;
 word-wrap: break-word;
 overflow-y: auto;
 overflow-x: auto;
 max-height: 250px;
 margin-top: 5px
}

.footer {
 text-align: center
}

.postcontenttop {
 position: relative;
 width: 100%;
 overflow: hidden
}

.footer {
 position: relative
}

.form-group {
 font-family: MontRegular, sans-serif;
 width: 100%
}

.object-fit_fill {
 object-fit: fill;
 max-width: 100%
}

.object-fit_none {
 object-fit: none
}

.object-fit_scale-down {
 object-fit: scale-down
}

#changeHere, button#changePic:hover {
 border-bottom: 1px solid #489eea
}

button#changePic {
 padding: 0 5px;
 color: #000;
 background: 0;
 border: 0;
 cursor: hand;
 transition: .2s;
 -webkit-border-radius: 5px;
 border-radius: 0
}

#changeHere {
 display: none;
 width: 100%;
 margin: 4px auto;
 padding: 10px
}

.contact-form {
 background: 0;
 color: #fff;
 width: 100%
}

.contact-form::placeholder {
 color: #000;
 opacity: 1
}

.contact-form:-ms-input-placeholder, .contact-form::-ms-input-placeholder {
 color: #fff
}

.form-group {
 background: 0;
 border: 0;
 margin-left: 25%;
 border-bottom: 2px solid #000;
 width: 50%;
 color: #000;
 margin-bottom: 16px;
 margin-top: 16px;
 outline: 0;
 border-radius: 0;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out;
 font-size: 16px
}

.form-group:focus {
 box-shadow: none;
 border-bottom: 2px solid #489eea
}

.form-group input {
 height: 45px;
 color: #fff
}

.footer-list h3, form .submit {
 font-family: MontHeavy, sans-serif
}

form .submit {
 background: 0;
 cursor: hand;
 border: 2px solid #000;


 color: #000;
 font-family: MontBold;
 margin-top: 20px;
 font-size: 20px;
 border-radius: 20px;
 transition: .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.footer li, footer a, footer p {
 text-decoration: none;
 font-family: MontRegular, sans-serif
}

footer a, footer p {
 color: #222
}

.footer, .footer-content {
 margin-left: auto;
 margin-right: auto
}

.footer {
 width: 100%;
 border-top: 1px solid #f5f5f5;
 padding: 20px 40px;
 transition: .2s ease-in-out;
 background-color: #ffff
}

.footer li {
 max-width: 2000px;
 font-size: 1em
}

.footer a {
 color: #2c3643
}

footer p:hover, ul li a, ul li a:hover {
 text-decoration: none;
 color: #000
}

.footer-content {
 max-width: 1600px;
 display: flex;
 flex-wrap: wrap;
 justify-content: space-between;
 padding: 0 10px 10px;
 border-bottom: 1px solid #f5f5f5
}

.select-icon {
 position: absolute;
 top: 50%;
 right: 15px;
 display: inline-block;
 width: 15px;
 height: 15px;
 transform: translateY(-70%)
}

.footer-list, .footer-list li {
 margin: 0 10px 10px;
 text-decoration: none
}

.footer-list li:not(active) {
    border-top: 2px solid transparent
}

.footer-responsive-content {
 display: none
}

.footer-list h3 {
 margin-bottom: 10px;
 font-size: 1em;
 font-weight: 500;
 color: #fff
}

.footer-list li {
 margin: 5px 0
}

.footer-about {
 margin-left: auto;
 margin-right: auto;
 max-width: 1600px;
 display: flex;
 flex-wrap: wrap;
 justify-content: space-between;
 padding-top: 30px;
 padding-bottom: 10px
}

.login-group.submit a, .social-icon:hover {
 color: #fff
}

.about-list {
 display: flex;
 align-items: center
}

.feedPost, .feedimg, .postcontenttop video {
 display: inline-block
}

.about-list, .copyright {
 margin: 5px 0;
 color: #222
}

.about-list li {
 margin: 0 5px;
 color: #767676
}

.feedposts button:hover, .videofeedposts button:hover {
 background: #000;
 float: right;
 color: #fff;
 transition: .2s .2s ease-in-out
}

.feedposts button, .videofeedposts button {
 float: right;
 padding: 5px;
 color: #000;
 background: #fff;
 border: 1px solid #000;
 border-radius: 50%;
 font-family: MontRegular, sans-serif
}

.videofeedposts button {
 cursor: hand;
 -webkit-border-radius: 5px
}

.feedposts button {
 padding: 5px;
 border: 1px solid #fff;
 border-radius: 50%;
 margin: 2px
}

.feedposts button:hover {
 border: 1px solid #000;
 background: #fff
}

.openbtn, button {
 background: #000;
 color: #fff
}

.feedPostTitle img:hover, .feedposts button:hover, .postcontent button:hover, .videofeedPostTitle img:hover, .videofeedposts button:hover {
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out
}

.postcontent button:hover {
 border: 1px solid #000;
 transition: .2s .2s ease-in-out
}

.cell1 video:hover, .feedPostTitle img:hover, .openbtn {
 transition: all .2s ease-in-out
}

.feedposts button, .postcontent button, button {
 cursor: hand
}

.postcontent button {
 float: right;
 padding: 5px;
 border: 1px solid #fff;
 border-radius: 50%
}

.feedposts, .intro, .videofeedposts {
 margin-left: auto;
 margin-right: auto
}

.openbtn:hover, button.openbtn:hover {
 filter: brightness(85%) !important
}

button {
 padding: 5px 25px;
 border: 0;
 border-radius: 5px
}

.feedposts, .videofeedposts {
 max-width: 2000px;
 text-align: left;
 font-size: 25px
}

.videofeedPostTitle {
 text-align: center;
 font-size: 18px;
 padding-top: 1px
}

.feedPostTitle img, .videofeedPostTitle img {
 z-index: 99;
 border: 2px solid #fff;
 width: 60px;
 height: 60px;
 border-radius: 50%;
 display: inline-block
}

.feedPost {
 vertical-align: top;
 position: relative;
 padding: 4px;
 width: calc(100% / 3);
 text-align: left
}

.cell1, .feedPostTitle, .feedimg, .postcontenttop video, .prof_actions, table {
 text-align: center
}

.feedPostTitle {
 font-size: 18px
}

.feedPostTitle img:hover, .videofeedPostTitle img:hover {
 border-color: #000
}

.feedimg {
 position: initial;
 width: 100%;
 max-width: 800px;
 height: auto;
 overflow: hidden
}

.cell1, .hero, .postcontenttop video {
 position: relative
}

.feedimg img, .postcontenttop img, .postcontenttop video {
 border-radius: 5px;
 width: 100%;
 max-width: 600px;
 height: auto
}

.object-fit_cover {
 object-fit: cover;
 max-width: 100%
}

.openbtn {
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out;
 border-radius: 0;
 padding: 15px;
 height: 100%;
 margin-top: 0;
 margin-bottom: 0;
 border: 0;
 cursor: hand
}

.postcontenttop video {
 z-index: 0;
 max-width: 800px;
 overflow: hidden
}

.login-group.submit {
 color: #fff;
 border-radius: 20px;
 background: 0;
 border: 2px solid #fff;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.login-group.submit:hover, .postcontent button {
 background: #fff;
 color: #000
}

.intro, .intro h1, h2 {
 color: #000;
 text-align: center
}

.intro {
 max-width: 1600px;
 display: table;
 padding: 20px 40px
}

.intro3 {
 max-width: 1600px;
 display: table;
 padding: 40px 0
}

.intro3 h1, h2 {
 font-family: MontHeavy;
 margin-bottom: 6px;
 margin-top: 6px
}

.intro3 p {
 margin-top: 16px;
 margin-bottom: 16px
}

.cell a, .cell1 a, .cell1 video, .feedpost a, .messageuser a, .messageuser p, .prof_actions, .profilepic, .social-icons {
 display: inline-block
}

.intro h1, h2 {
 font-family: MontHeavy;
 margin-bottom: 6px;
 margin-top: 6px
}

.intro p {
 margin-top: 16px;
 margin-bottom: 16px
}

.intro, header {
 background: #fff
}

.social-icons {
 border: 2px solid #000;
 border-radius: 50%;
 padding: 6px;
 color: #000;
 background: 0;
 transition: .5s .5s ease-in-out;
 -webkit-transition: .5s ease-in-out;
 -moz-transition: .5s ease-in-out;
 -o-transition: .5s ease-in-out
}

.social-icons:hover {
 background: #000;
 color: #fff
}

.prof_actions form {
 display: inline-block

}

.profilepic {
 width: 50%
}

.prof_actions {
 padding-bottom: 20px;

 width: 100%;
padding-top: 12px;}

.prof_actions button {
 padding: 0 5px
}

.city-hero-text h1 {
 font-size: 50px;
 color: #fff;
 text-shadow: none
}

.prof_actions p {
 margin-top: 3px;
 font-size: 12px
}

.cell1 video {
 right: 0;
 bottom: 0;
 min-width: 100%;
 z-index: -100;
 background-size: cover;
 opacity: .2
}

.cell1, .cell1 video {
 height: auto;
 width: calc(100% / 3);
 object-fit: fill;
 background: #000
}

.myprofvideoposts, table {
 max-width: 2000px;
 width: 100%
}

.cell1 {
 padding: 0;
 font-family: MontHeavy, sans-serif;
 font-size: 22px
}

.hero #response5 li a, .hero #response5 li a:hover, .hero input[type=text], .profpost button {
 font-family: MontRegular, sans-serif
}

.cell1 video:hover {
 opacity: .3
}

.feedpost a {
 font-size: 18px;
 font-family: MontRegular
}

table {
 margin-left: auto;
 margin-right: auto;
 border: 0
}

.intro2 h2, .location h2 {
 color: #fff
}

.button-gap, .socialcontainer {
 margin-top: 6px;
 margin-bottom: 6px
}

.weather-container h3, span {
 display: inline-block;
 vertical-align: middle
}

.bottomprof {
 padding-top: 20px;
 padding-bottom: 20px
}

.placesvisited {
 vertical-align: top;
 padding: 8px 0;
 width: calc(100% / 3);
 display: inline-block;
 text-align: left
}

.placesvisited a {
 display: inline-block
}

.cell1 video:hover, .messageuser p, .profpost button {
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out
}

.messageuser a, .messageuser p {
 font-size: 16px;
 color: #2c3643;
 text-align: center;
 transition: all .2s ease-in-out
}

.cell1, .hero, .infologin h3, .infologin h4, .location h1, .login h1, .login h2, .login h3, .login h4 {
 color: #fff
}

.profpost button, .editprofposts button {
 padding: 5px;
 background: 0;
 border: 1px solid #fff;
 cursor: hand;
 -webkit-border-radius: 5px;
 border-radius: 50%;
 margin: 2px;
 transition: .2s .2s ease-in-out;
 -o-transition: .2s ease-in-out
}

.profpost button:hover, .editprofposts button:hover {
 border: 1px solid #489eea
}

.profileinfo {

 padding: 20px 20px 20px 20px;
 border-bottom-left-radius: 20px;
 border-bottom-right-radius: 20px;
 max-width: 1600px;
 font-size: 16px;
 margin: 0 auto
}

.profiletop {margin: 8;font-variant: common-ligatures;padding: 20px 20px 20px 20px;border-bottom-left-radius: 20px;border-bottom-right-radius: 20px;margin: 0 auto}

.myprofvideoposts {
 align-items: center;
 margin-left: auto;
 margin-right: auto;
 background: #fff;
 display: table
}

.hero {
 border-radius: 5px;
 text-align: center
}

.hero #response5, .hero #response5 li {
 width: 100%;
 text-align: left;
 color: #fff
}

.hero input[type=text] {
 color: #fff;
 font-size: 16px;
 width: 100%;
 height: 18px;
 background: 0;
 padding: 14px;
 border-radius: 14px;
 border: 2px solid #fff;
 margin-bottom: 8px;
 margin-top: 8px;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.hero input[type=text]:focus {
 box-shadow: none;
 border: 2px solid #000;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.hero #response5 {
 display: block;
 margin-left: 0;
 background: 0;
 z-index: 1;
 transition-duration: 1s;
 border-radius: 25px
}

.hero #response5 li {
 font-size: 16px;
 display: inline-block;
 cursor: hand
}

.hero #response5 li a, .hero #response5 li a:hover {
 font-weight: 600;
 position: relative
}

.hero #response5 li a {
 font-size: 16px;
 color: #fff;
 padding: 6px;
 transition: .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.hero #response5 li a:hover {
 color: #489eea
}

input:focus, textarea:focus {
 outline: 0
}

.hero input[type=text]::placeholder, .location input[type=text]::placeholder {
 color: #fff
}

#output {
 height: 100px;
 width: 100px;
 border: 2px solid #fff;
 border-radius: 5px
}

.intro2 {
 margin-left: auto;
 margin-right: auto;
 background: #000
}

.profile button {
 padding: 5px;
 background: transparent;
 border-radius: 50%;
 transition: all .2s ease-in-out;
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out
}

.profile button:hover {
 background: #489eea
}

.follow img {
 width: 80px;
 height: 80px;
 border-radius: 50%;
 display: inline-block;
 border: 2px solid #fff;
 transition: all .2s ease-in-out;
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out
}

.follow img:hover {
 border: 2px solid #489eea
}

.centered i, .rightside {
 background: #000;
 color: #fff
}

.leftside, .rightside {
 width: 50%;
 height: 100vh;
 float: right;
 transition: .6s .6s ease-in-out;
 -webkit-transition: .6s ease-in-out;
 -moz-transition: .6s ease-in-out;
 -o-transition: .6s ease-in-out
}

.leftside {
 color: #000;
 float: left;
 background: #fff
}

.center-fit {
 max-width: 100%;
 max-height: 100vh;
 margin: auto;
 width: 100%
}

.leftside:hover {
 filter: brightness(85%)
}

.centered i {
 padding: 6px;
 font-size: 22px;
 border-radius: 50%
}

input:-webkit-autofill:focus textarea:-webkit-autofill, select:-webkit-autofill, select:-webkit-autofill:focus, select:-webkit-autofill:hover, textarea:-webkit-autofill:hover textarea:-webkit-autofill:focus {
 -webkit-box-shadow: 0 0 0 1000px #fff inset !important
}

.infologin {
 margin: 10% 5%;
 text-align: center;
 vertical-align: middle;
 line-height: 90px
}

input:-webkit-autofill, input:-webkit-autofill:active, input:-webkit-autofill:focus, input:-webkit-autofill:hover {
 -webkit-box-shadow: 0 0 0 30px #000 inset !important
}

.prof_actions button {
 border-radius: 0;
 background: 0;
 color: #000
}

.prof_actions button:hover {
 border-bottom: 1px solid #489eea
}

.prof_actions i {
 color: #fff;
 background: #000;
 padding: 5px;
 border-radius: 50%
}

textarea {
 width: 100%;
 font-family: MontRegular;

 padding: 16px;
 color: #fff;
 border: 1px solid transparent;

 background-color: transparent;
 font-size: 14px;
 font-weight: 700;
 border-bottom: 2px solid white;
 -webkit-appearance: none;
 text-overflow: ellipsis
}

.info-login-group.submit a, .infologin h1, .infologin h2 {
 color: #000
}

.info-login-group.submit {
 color: #000;
 border-radius: 20px;
 background: 0;
 border: 2px solid #000;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.info-login-group.submit:hover {
 background: #000;
 color: #fff
}

.login a {
 display: inline;
 color: #fff
}

.login a:hover {
 text-decoration: underline
}

.myprofplaces a {
 color: #000
}

login::placeholder {
 color: #fff;
 opacity: 1
}

.follow {
 display: inline-block;
 padding: 8px
}

form {
    color:#fff
}

input:-webkit-autofill {
 -webkit-text-fill-color: #fff !important
}


@media screen and (max-width: 480px) {
 .cell {
 width: 50%
 }

 .cell img {
 max-width: 2000px
 }

 .postvideo {
 margin-top: 20px
 }
}

@media screen and (min-width: 480px) {
 .postphoto, .postvideo {
 width: 50%;
 display: inline-block;
 float: left;
 padding: 2px
 }

 .postvideo {
 float: right
 }

 .cell {
 width: calc(100% / 3)
 }
}

@media screen and (min-width: 768px) {
 .cell {
 width: calc(100% / 5)
 }

 .bodycontainer {
 margin-left: auto;
 margin-right: auto;
 background: 0;
 text-align: left;
 padding: 20px 40px
 }

 .intro p {
 max-width: 100%;
 text-align: left
 }

 .profileinfo input, .profileinfo textarea {
 border: 1px solid #000
 }

 .profpost h4 {
 font-size: 16px
 }

 #resize {
 visibility: hidden !important
 }
}

@media only screen and (max-width: 768px) {
 .leftside, .overlay, nav #menu {
 display: none
 }

 #menu a, .feedposts, .videofeedposts, input#searchbox2[type=search] {
 font-family: MontRegular, sans-serif
 }

 .leftcontent {
 width: 50%;
 height: auto;
 float: left;
 text-align: center;
 padding-bottom: 12px;
 padding-right: 12px
 }

 .feedposts p, .feedposts2 p, .hero-text .btn, .location #response4 li a {
 font-size: 14px
 }

 .cell1 {
 width: 50%
 }

 .rightside, nav {
 width: 100%
 }

 #toggle {
 visibility: visible;
 opacity: 1;
 margin-top: 6px
 }

 nav, nav .logo {
 position: static
 }

 nav .logo {
 max-width: 80%;
 margin: 0;
 height: 0
 }

 #menu a {
 font-size: 15px
 }

 nav {
 height: inherit;
 z-index: 1
 }

 .postcontent {
 width: 50%
 }

 .age, .bio, .city, .overlay, .profile {
 width: 100%
 }

 nav, nav .logo {
 background: #fff
 }

 .overlay {
 height: 100%;
 position: fixed;
 z-index: 1;
 top: 0;
 left: 0;
 background-color: #000;
 opacity: .99
 }

 .message {
 width: 100%;
 font-size: 15px;
 text-align: center;
 padding: 5px
 }

 input#searchbox2[type=search] {
 color: #fff;
 -webkit-appearance: none;
 font-size: 16px;
 width: 100%;
 height: 18px;
 background: 0;
 padding: 14px;
 border-radius: 14px;
 border: 2px solid #fff;
 margin-bottom: 8px;
 margin-top: 8px;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
 }

 .overlay #response2 {
 background: 0
 }

 .overlay #response2 li a {
 background: 0;
 color: #fff;
 padding: 8px;
 border-bottom: 1px solid #fff
 }

 .overlay #response2 li a:hover {
 color: #489eea;
 border-bottom: 1px solid #489eea
 }

 .overlay #response2 li {
 display: block;
 text-align: left;
 color: #fff
 }

 .overlay-content {
 position: relative;
 top: 0;
 width: 80%;
 text-align: center;
 margin: auto
 }

 .overlay .closebtn {
 position: absolute;
 top: -5px;
 left: 5px;
 font-size: 40px;
 cursor: hand;
 color: #fff
 }

 .overlay .closebtn:hover {
 color: #ccc
 }

 .overlay input[type=text] {
 padding: 15px;
 border-radius: 0;
 font-size: 17px;
 border: 0;
 float: left;
 width: 100%;
 background: #fff
 }

 .overlay input[type=text]:hover {
 background: #f1f1f1
 }

 .footer, .overlay #response2 li a:hover {
 transition: .2s .2s ease-in-out;
 -webkit-transition: .2s ease-in-out;
 -moz-transition: .2s ease-in-out;
 -o-transition: .2s ease-in-out
 }

 .footer {
 position: fixed;
 right: 0;
 bottom: 0;
 background: #fff;
 left: 0;
 border-top: 1px solid #f5f5f5
 }

 .footer-list, .footer-list li {
 margin: 0;
 text-decoration: none;
 width: 20%
 }

 .footer-list li {
 width: 100%
 }

 .footer-list li.active {
 border-top: 2px solid #000;
 background: #fff
 }

 .footer-list li.notactive {
 border-top: 2px solid transparent;
 background: #fff
 }

 .footer-list ul a {
 vertical-align: middle;
 padding: 10px}

 .footer-content {
 display: none
 }

 .footer-responsive-content {
 display: flex;
 flex-wrap: wrap;
 justify-content: space-between;
 padding: 0
 }

 .footer-responsive-content a {
 text-decoration: none
 }

 .footer-about {
 display: none
 }

 .location #response4 {
 position: absolute;
 display: block;
 margin-left: 25%;
 z-index: 1;
 transition-duration: 1s;
 text-align: left;
 width: 50%
 }

 #changeHere {
 margin: auto;
 width: 100%
 }

 .rightcontent {
 font-size: 16px;
 width: 50%;
 height: auto;
 padding-left: 12px;
 padding-bottom: 12px;
 float: right;
 text-align: center
 }

 .footer {
 padding: 0
 }

 .footer-content {
 padding-top: 50px
 }

 .feedPost, .profpost {
 display: inline-block
 }

 .feedPost {
 position: relative;
 padding: 2px;
 width: 50%;
 text-align: left
 }

 .feedposts, .videofeedposts {
 text-align: left;
 font-size: 20px
 }

 .feedPostTitle, p {
 font-size: 25px
 }

 .bodycontainer {
 padding: 10px 8px;}

 .city-hero-text h1 {
 font-size: 46px;em;}

 .nums, h3 {
 font-size: 20px
 }

 .profileinfo {
 font-size: 12px
 }

 h1 {
 font-size: 28px
 }

 h2 {
 font-size: 22px
 }

 h4 {
 font-size: 18px
 }

 h5 {
 font-size: 16px
 }

 p {
 font-size: 14px
 }

 .intro3 {
 padding: 30px 0
 }

 .form-group {
 font-size: 14px
 }

 .form-group.submit {
 font-size: 18px
 }

 .placesvisited {
 font-size: 14px
 }

 .rightcontent {
 display: visible
 }

 .profilepic img {
 width: 120px;
 height: 120px
 }

 .login, .myprofplaces, .myprofposts {
 padding-top: 20px;
 padding-bottom: 20px
 }

 .login {
 width: 90%;
 font-size: 15px;
 text-align: center;
 border-radius: 5px;
 margin: 5%
 }

 .myprofplaces, .myprofposts {
 width: 100%;
 display: table-cell;
 float: left
 }

 .myprofplaces {
 text-align: center;
 float: right;
 margin-bottom: 200px
 }

 .topslide {
 height: 60%
 }

 #changeHere, .hero #response4, .hero #response4 li a {
 display: none
 }

 .text {
 font-size: 35px
 }

 .intro {
 padding: 10px 8px
 }

 .profileinfo p {
 font-size: 14px
 }

 .placesvisited {
 width: calc(100% / 2)
 }
}

@media screen and (max-width: 480px) {
 .feedPost, .leftcontent {
 padding-right: 0
 }

 .feedPost, .feedPost2 {
 display: inline-block;
 text-align: left
 }

 .column {
 height: auto
 }

 .leftcontent {
 padding-left: 0
 }

 .rightcontent {
 padding-right: 0
 }

 .cell1, .column {
 width: 100%
 }

 .myfollowers {
 width: 50%
 }

 .feedPost {
 padding-left: 0;
 position: relative;
 width: 100%
 }

 .myfollowees {
 width: 50%
 }

 .feedPost2, .feedimg, .leftcontent, .places, .postcontent, .prof_section, .profilepic {
 width: 100%
 }

 .rightcontent {
 width: 100%;
 padding-left: 0
 }

 .places {
 margin-top: 2%
 }

 .city-hero-text h1 {
 font-size: 42px}

 .topslide {
 position: relative;
 height: 60%
 }

 .placesvisited {
 width: 100%
 }

 .feedPost2 {
 padding-top: 2px;
 padding-bottom: 2px
 }
}

.myprofplaces h3 {
 margin-bottom: 16px
}

.myprofplaces a {
 color: #fff
}

.myprofplaces a:hover {
 color: #fff;
 text-decoration: underline
}

.my-input {
 width: 100%;
 font-family: MontRegular;
 padding: 4px;
 border: 1px solid transparent;
 border-radius: 0;
 color: #fff;
 background-color: transparent;
 font-size: 14px;
 border-bottom: 2px solid #fff;
 font-weight: 700
}

button.highlighted, button.highlighted:hover {
 border-bottom: 2px solid #489eea
}

select {
 margin-left: 2px;
 font-size: 100%;
 font-weight: 700;
 cursor: pointer;
 border-radius: 0;
 background-color: transparent;
 border: 0;
 border-bottom: 2px solid #fff;
 color: #fff;
 padding: 10px;
 appearance: none;
 -webkit-appearance: none;
 -moz-appearance: none;
 transition: color .3s ease, background-color .3s ease, border-bottom-color .3s ease
}

select::-ms-expand {
 display: none
}

select:focus, select:hover {
 color: #489eea;
 background-color: #fff;
 border-bottom-color: #dcdcdc
}

.postvideo h3 {
 color: #fff
}

.postphoto h3 {
 color: #fff
}

#editHere {
 width: 100%
}

.profpost i {
 color: #fff
}

.centered a {
 color: #000;
 transform: skew(-20deg)
}

.messages {
 margin-bottom: 100px
}

table {
 background: #000;
 border-radius: 20px;
 color: #fff;
 padding: 5px
}

table button {
 border-radius: 50%;
 padding: 5px;
 border: 1px solid transparent;
 background: 0;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

table button:hover {
 border: 1px solid #fff
}

.bioupdate {
 margin-bottom: 100px;
 background: #000;
 border-radius: 20px
}

.bioupdate i {
 color: #fff
}

.bioupdate form {
 padding: 20px
}

.followuser {
 padding: 5px;
 width: 50%;
 float: left;
 text-align: right
}

.messageuser {
 padding: 5px;
 width: 50%;
 float: right;
 text-align: left
}

.contact-us {
 overflow: visible;
 transform: skewY(-1.5deg);
 transform-origin: 100%;
 background: #ff0;
 margin-top: 100px;
 padding-top: 50px;
 padding-bottom: 50px
}

input.form-group {
 padding: 16px;
 color: #000;
 width: 50%;
 height: 18px;
 background: 0;
 border: 0;
 border-bottom: 2px solid #000;
 outline: 0;
 border-radius: 0;
 transition: .3s .3s ease-in-out;
 -webkit-transition: .3s ease-in-out;
 -moz-transition: .3s ease-in-out;
 -o-transition: .3s ease-in-out
}

.editprofposts {
 background: #000;
 padding: 20px;
 border-radius: 20px
}

.editprofposts h3, .editprofposts i {
 color: #fff
}

.tp-ac__list {
 color: #fff
}
