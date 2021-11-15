<?php // Страничка логина на сайт

    include_once 'lib/include.php';
    
    // Если нету связи с базоой данных редирект с ошибкой 0
    if ($mysql->connect_error) {
        return header('Location: /authorization.php?errorCode=0#login');
    }

    // получаем инфу о пользователе
    $username = $_GET['username'];
    $userpassword = sha1($_GET['userpassword']);
    $user = null;
    
    // ищем пользователей в базе
    $users = $mysql->query("SELECT * FROM users WHERE username = '$username'");

    // если пользователи нашлись
    if ($users->num_rows > 0) {
        $user = $users->fetch_assoc();
    } // Если юзера по нейму нету редиректим на логин с ошибкой 1
    else return header('Location: /authorization.php?errorCode=1#login');
    
    // Если неправильный пароль редиректим на логин с ошибкой 2
    if ($user['userpassword'] !== $userpassword) {
        return header('Location: /authorization.php?errorCode=2#login');
    } 

    // если всё ок, то добавляем пользователя в сессию
    $_SESSION['userid'] = $user['userid'];
    $_SESSION['username'] = $user['username'];
    return header('Location: /index.php');
?>