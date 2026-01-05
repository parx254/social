<footer class='footer'>
  <div class='footer-content'>
    <div class='footer-list'>
      <ul>
        <li class="<?php if($activePage =='home'){echo 'active';}else{echo 'not-active';}?>">
          <a href='https://www.socialdestinations.com/index.php' style='text-decoration: none'>
          Home
          </a>
        </li>
      </ul>
    </div>
    <div class='footer-list'>
      <ul>
        <li class="<?php if($activePage =='explore'){echo 'active';}else{echo 'not-active';}?>">
          <a href='https://www.socialdestinations.com/explore.php' style='text-decoration: none'>
          Explore
          </a>
        </li>
      </ul>
    </div>
    <div class='footer-list'>
      <ul>
        <li class="<?php if($activePage =='about'){echo 'active';}else{echo 'not-active';}?>">
          <a href='https://www.socialdestinations.com/about.php' style='text-decoration: none'>
          About
          </a>
        </li>
      </ul>
    </div>
    <?php
      if(!isset($_SESSION['username']) || empty($_SESSION['username'])) { 
          echo '<div class="footer-list">
                  <ul>
                      <li class="not-active">
                          <a href="https://www.socialdestinations.com/login.php" style="text-decoration: none">
                              Login
                          </a>
                      </li>
                  </ul>
              </div>';
      }
      else {
          if($activePage =='profile') {
          echo '<div class="footer-list">
                  <ul>
                      <li class="active">
                          <a href="https://www.socialdestinations.com/my-profile.php" style="text-decoration: none">
                              Profile
                          </a>
                      </li>
                  </ul>
              </div>';
          }
          else {
          echo '<div class="footer-list">
                  <ul>
                      <li class="not-active">
                          <a href="https://www.socialdestinations.com/my-profile.php" style="text-decoration: none">
                              Profile
                          </a>
                      </li>
                  </ul>
              </div>';
          }
          
          if($activePage =='messages') {
          echo '<div class="footer-list">
                  <ul>
                      <li class="active">
                          <a href="https://www.socialdestinations.com/messages.php" style="text-decoration: none">
                              Messages
                          </a>
                      </li>
                  </ul>
              </div>';
          }
          else {
          echo '<div class="footer-list">
                  <ul>
                      <li class="not-active">
                          <a href="https://www.socialdestinations.com/messages.php" style="text-decoration: none">
                              Messages
                          </a>
                      </li>
                  </ul>
              </div>';
          }
                if($activePage =='feed') {
          echo '<div class="footer-list">
                  <ul>
                      <li class="active">
                          <a href="https://www.socialdestinations.com/feed.php" style="text-decoration: none">
                              Feed
                          </a>
                      </li>
                  </ul>
              </div>';
          }
          else {
          echo '<div class="footer-list">
                  <ul>
                      <li class="not-active">
                          <a href="https://www.socialdestinations.com/feed.php" style="text-decoration: none">
                              Feed
                          </a>
                      </li>
                  </ul>
              </div>';
          }
      };
      ?>
  </div>
  <div class='footer-about'>
    <div class='copyright'>
      &copy;2026 Social Destinations, Inc. All rights reserved · <a href='privacy-policy.php'>Privacy</a>
    </div>
    <ul class='about-list'>
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
        <li class="<?php if($activePage =='home'){echo 'active';}else{echo 'not-active';}?>">
          <a href='https://www.socialdestinations.com/index.php' style='text-decoration: none'>
          <i class='fad fa-home-alt' aria-hidden='true'></i>
          </a>
        </li>
      </ul>
    </div>
    <div class='footer-list'>
      <ul>
        <li class="<?php if($activePage =='explore'){echo 'active';}else{echo 'not-active';}?>">
          <a href='https://www.socialdestinations.com/explore.php' style='text-decoration: none'>
          <i class='fad fa-globe'></i>
          </a>
        </li>
      </ul>
    </div>
    <div class='footer-list'>
      <div id='myOverlay' class='overlay'>
        <span class='closebtn' onclick='closeSearch()' title='Close Overlay'>&times;</span>
        <div class='overlay-content'>
          <input type='search' placeholder='Search users' id='searchbox2' />
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
    <?php
      if(!isset($_SESSION['username']) || empty($_SESSION['username'])) { 
          echo '<div class="footer-list">
                  <ul>
                        <li class="' . ($activePage == 'about' ? 'active' : 'not-active') . '">
                          <a href="https://www.socialdestinations.com/about.php" style="text-decoration: none">
                              <i class="fad fa-info-circle" aria-hidden="true"></i>
                          </a>
                      </li>
                  </ul>
              </div>
              <div class="footer-list">
                  <ul>
                      <li class="not-active">
                          <a href="https://www.socialdestinations.com/login.php" style="text-decoration: none">
                              <i class="fad fa-sign-in" aria-hidden="true"></i>
                          </a>
                      </li>
                  </ul>
              </div>
              ';
      }
      else {
          if($activePage =='profile') {
          echo '<div class="footer-list">
                  <ul>
                      <li class="active">
                          <a href="https://www.socialdestinations.com/my-profile.php" style="text-decoration: none">
                              <i class="fad fa-user-circle" aria-hidden="true"></i>
                          </a>
                      </li>
                  </ul>
              </div>';
          }
          else {
          echo '<div class="footer-list">
                  <ul>
                      <li class="not-active">
                          <a href="https://www.socialdestinations.com/my-profile.php" style="text-decoration: none">
                              <i class="fad fa-user-circle" aria-hidden="true"></i>
                          </a>
                      </li>
                  </ul>
              </div>';
          }
                if($activePage =='feed') {
          echo '<div class="footer-list">
                  <ul>
                      <li class="active">
                          <a href="https://www.socialdestinations.com/feed.php" style="text-decoration: none">
                              <i class="fad fa-users" aria-hidden="true"></i>
                          </a>
                      </li>
                  </ul>
              </div>';
          }
          else {
          echo '<div class="footer-list">
                  <ul>
                      <li class="not-active">
                          <a href="https://www.socialdestinations.com/feed.php" style="text-decoration: none">
                              <i class="fad fa-users" aria-hidden="true"></i>
                          </a>
                      </li>
                  </ul>
              </div>';
          }
      };
      ?>
  </div>
</footer>