<?php 
  
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <title>Randomizer</title>
    <link rel="shortcut icon" href="img/icon.png" type="image/png">
    <meta name="viewport" content="device-width">
</head>
    <body>
      <header>
        <section class="header_fill_block">
          <img src="img/logo.png" alt="Profile" width="80px">
          <span>Randomizer</span>
        </section>

        <section class="header_fill_block" style="justify-content: right;"> 
        </section>

      </header>
      
      <main>
        <aside id="aside_left">
            <ul>
              <li>
                <a href="authorization.php">
                  <img src="img/randomize_icon.png" alt="Profile" width="30px">
                </a>
              </li>
              <li>
                <a href="authorization.php">
                  <img src="img/diagram_icon.png" alt="Profile" width="30px">
                </a>
              </li>
              <li>Soul</li>
              <li>Less</li>
            </ul>

            <!-- Блок пользователя слева снизу-->
            <section id="profile_block">
                <a href="authorization.php#login"><img src="img/profile_icon.png" alt="Profile" width="40px"></a>
                  <?php
                    if(isset($_SESSION['username'])){
                    echo $_SESSION['username'];
                    echo '<a href="/lib/logout.php"><img src="img/logout_icon.png" alt="Profile" width="30px"></a>';
                    }
                    else echo '<span>anonymous</span>';
                  ?>
            </section>
        </aside>

        <section id="content_block">

        </section>

        <aside id="aside_right">

        </aside>
      </main>
    </body>
</html>