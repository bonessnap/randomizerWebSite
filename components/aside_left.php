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
              <li>
                <a href="/chat.php">
                  <img src="img/chat_icon.png" alt="Profile" width="30px">
                </a>
              </li>
              <li>Less</li>
            </ul>

            <!-- Блок пользователя снизу-->
            <section id="profile_block">
                  <?php
                    if(isset($_SESSION['username'])){
                    echo '<img src="/img/user/user_icon_hover.png" alt="user" style="width: 50px;">';
                    echo '<span>'. $_SESSION['username'] . '</span>';
                    echo '<a href="/lib/logout.php"><img src="img/logout_icon.png" alt="Profile" width="30px"></a>';
                    }
                    else {            
                      echo '<img src="/img/user/user_icon.png" alt="user" style="width: 50px;">';          
                      echo 
                      '<div style="display: flex; flex-direction: column;">
                        <span>anonymous</span>
                        <a href="/lib/login.php">Войти</a> 
                      </div>';
                    }
                  ?>
            </section>
        </aside>