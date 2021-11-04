<?php
    session_start();

    if (isset($_SESSION['username'])) {
        header("Location: /");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/authorization.css">
    <title>Authorization</title>
</head>
<body>
    <!-- Это блок слева --> 
    <section id="aside_left">
        <img src="img/logo.png" alt="Profile" width="300px">

        <section id="block_welcome"> <!-- Это блок с логотипом и текстом--> 
            <h1>Добро пожаловать на рандомайзер!</h1>
            <span>Здесь вам пока что доступны:</span>
            <ul>
                <li>Логин</li>
                <li>Логаут</li>
                <li>Практически пустой сайт</li>
                <li>Красивый шаблон</li>
            </ul>
        </section>
        
        <!-- Это блок с инфой о авторе и контактом-->
        <section style="font-size: 16px;">
            <span>Фокша Константин KIT129a</span> <br>
                <a href="https://t.me/bonessnap">Связаться со мной</a>
                <a href="https://github.com/bonessnap/randomizerWebSite">Исходники</a>
        </section>
    </section>

    <!-- Это блок с ЛОГИНОМ-->
    <section id="login">
        <section>
            <h2>Привет!</h2>
            <p>Чтобы войти - введите свой логин и пароль.</p>
            <!-- Форма с данными-->
            <form action="/lib/login.php" method="get">
              <section class="block_input">
                      <span>Логин:</span> 
                      <input type="text" placeholder="Login" name="username">

                      <span>Пароль:</span>
                      <input type="password" placeholder="Password" name="userpasswd">
                        <!-- Тут будет сообщение о ошибке логина-->
                        <span></span>
                        <span style="font-size: 15px;">
                        <?php 
                            if (isset($_GET['errorCode'])) {
                                $errorCode = (int)$_GET['errorCode'];

                                switch ($errorCode) {
                                    case 1:
                                        echo 'Пользователя с таким ником нет';
                                        break;
                                    case 2:
                                        echo 'Неправильный пароль';
                                        break;
                                }
                            }
                        ?>
                        </span>
                </section>

                    <!--  Блок с кнопками -->
                    <section id="block_with_button">
                      <button type="submit">
                          Войти
                      </button>

                      <a href="#registration"> <button type="button">Зарегистрироваться</button></a>
                    </section>
            </form>
        </section>
    </section>
    
    <!-- это блок с РЕГИСТРАЦИЕЙ -->
    <section id="registration">
        <section>
            <h2>Зарегистрируйтесь сейчас</h2>
            <p>Придумайте себе логин и пароль</p>
                <form action="lib/registration.php" method="get">
                <section class="block_input">
                      <span>Логин:</span>
                      <input type="text" placeholder="Login" name="username">

                      <span>Пароль:</span>
                      <input type="password" placeholder="Password" name="userpasswd">

                      <span>Пароль повторно:</span>
                      <input type="password" placeholder="Password again" name="usersecondpasswd">

                    <!-- ЗАТЫЧКА ЧТОБЫ БЛОК С ОШИБКОЙ БЫЛ СПРАВА -->
                    <span>
                    </span>

                    <!-- Тут будут ошибки регистрации-->
                     <span style="font-size: 15px;">
                        <?php
                            if (isset($_GET['errorCode'])) {
                                $errorCode = (int)$_GET['errorCode'];

                                switch ($errorCode) {
                                    case 3:
                                        echo 'Пароли не совпадают.';
                                        break;
                                    case 4:
                                        echo 'Некорректный пароль.';
                                        break;
                                }
                            }
                        ?>
                     </span>
                </section>

                    <!--  Блок с кнопками -->
                    <section id="block_with_button">
                    <a href="#login"> <button type="button">Войти</button></a>
                    <button type="sumbit">
                        Зарегистрироваться
                    </button>
                    </section>
            </form>
            
        </section>
    </section>

    <!-- Скрипт автоматически редиректит на логин, если был передан неправильный параметр странице -->
    <script> 
        if (location.hash !== '#login' && location.hash !== '#registration') {
            location.hash = '#login';
        }
    </script>
</body>
</html>