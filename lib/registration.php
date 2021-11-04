<?php // страничка для регистрации на сайт
    session_start();

    $mysql = new mysqli('localhost', 'root', '', 'mydb');

    // Если нету связи с базоой данных редирект с ошибкой 0
    if ($mysql->connect_error) {
      return header('Location: /authorization.php?errorCode=0#registration');
    }

    // получаем инфу о пользователе
    $username = $_GET['username'];
    $userpassword = sha1($_GET['userpassword']);
    $usersecondpassword = sha1($_GET['usersecondpassword']);
    $user = null;

    // ищем пользователей в базе
    $users = $mysql->query("SELECT * FROM users WHERE username = '$username'");
    // закрываем базу
    
    // если пользователи нашлись
    if ($users->num_rows > 0) {
      return header('Location: /authorization.php?errorCode=4#registration');
    }

    if($_GET['userpassword'] === '' || $_GET['usersecondpassword'] === '')
      return header('Location: /authorization.php?errorCode=6#registration');

    if($userpassword !== $usersecondpassword)
    {
      return header('Location: /authorization.php?errorCode=5#registration');
    }
    $mysql->query("INSERT INTO users (username, userpassword) VALUES ('$username', '$userpassword')");
    return header('Location: /authorization.php?errorCode=3#login');

