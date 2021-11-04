<?php // страничка для регистрации на сайт
    session_start();

if($_GET['userpasswd'] !== '')
  if($_GET['userpasswd'] !== $_GET['usersecondpasswd'] )
  { // если пароли не совпадают
    return header('Location: /authorization.php?errorCode=3#registration');
  }
  else
  {
    $_SESSION['username'] = $_GET['username'];
    $_SESSION['userpasswd'] = $_GET['userpasswd'];
    
    return header('Location: /index.php');
}
else return header('Location: /authorization.php?errorCode=4#registration');
