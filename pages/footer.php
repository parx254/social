  <footer class='footer'>
    <div class='footer-content'>
      <div class='footer-list'>
        <ul>
          <li class="<?php if($activePage =='home'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/index.php' style='text-decoration: none'>
              <p>Home</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li class="<?php if($activePage =='about'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/about.php' style='text-decoration: none'>
              <p>About</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li class="<?php if($activePage =='explore'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/explore.php' style='text-decoration: none'>
              <p>Explore</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li class="<?php if($activePage =='profile'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/myprofile.php' style='text-decoration: none'>
              <p>Profile</p>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li class="<?php if($activePage =='feed'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/feed.php' style='text-decoration: none'>
              <p>Feed</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class='footer-about'>
      <div class='copyright'>
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
          <li class="<?php if($activePage =='home'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/index.php' style='text-decoration: none'>
            <i class='far fa-home-alt' aria-hidden='true'></i>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li class="<?php if($activePage =='explore'){echo 'active';}else{echo 'notactive';}?>" >
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
          <li class="<?php if($activePage =='profile'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/myprofile.php' style='text-decoration: none'>
            <i class='far fa-user-circle'></i>
            </a>
          </li>
        </ul>
      </div>
      <div class='footer-list'>
        <ul>
          <li class="<?php if($activePage =='feed'){echo 'active';}else{echo 'notactive';}?>" >
            <a href='https://www.socialdestinations.com/feed.php' style='text-decoration: none'>
            <i class='far fa-users' aria-hidden='true'></i>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
</body>
</html>