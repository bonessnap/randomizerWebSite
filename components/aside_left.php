<aside id="aside_left">
            <ul>
              <li>
                <a href="/random-between.php">
                  <img src="img/randomize_icon.png" alt="Profile" width="30px">
                </a>
              </li>
              <li>
                <a href="/index.php">
                  <img src="img/diagram_icon.png" alt="Profile" width="30px">
                </a>
              </li>
              <li>Soul</li>
              <li>Less</li>
            </ul>

            <!-- Блок пользователя снизу-->
            <section id="profile_block">
                  <?php
                    if(isset($_SESSION['username'])){
                    echo '<div id="authorised_user"></div>' . $_SESSION['username'];
                    echo '<a href="/lib/logout.php"><img src="img/logout_icon.png" alt="Profile" width="30px"></a>';
                    }
                    else {                      
                      echo '<a href="authorization.php"><div id="anonymous_user"></div></a>';
                      echo '<span>anonymous</span>';
                    }
                  ?>
            </section>
        </aside>