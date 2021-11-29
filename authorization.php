<?php
include_once 'lib/include.php';

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
    <main>
        <!-- Это блок слева -->
        <section id="aside_left">
            <div id="cat">

            </div>

            <!-- Это блок с текстом-->
            <section id="block_welcome">
                <h1>Добро пожаловать на рандомайзер!</h1>
                <span>Здесь вам пока что доступны:</span>
                <ul>
                    <li>Логин</li>
                    <li>Логаут</li>
                    <li>Практически не пустой сайт</li>
                    <li>Красивый шаблон</li>
                    <li>Что-то ещё будет</li>
                </ul>
            </section>

            <!-- Это блок с инфой о авторе и контактом-->
            <section style="font-size: 16px;">
                <span>(С) Фокша Константин KIT129a</span> <br>
                <a href="https://t.me/bonessnap">Связаться со мной</a>
                <a href="https://github.com/bonessnap/randomizerWebSite">Исходники</a>

            </section>
        </section>

        <!-- Это блок с ЛОГИНОМ-->
        <?php include 'components/login.php' ?>

        <!-- это блок с РЕГИСТРАЦИЕЙ -->
        <?php include 'components/registration.php' ?>

        <!-- Скрипт автоматически редиректит на логин, если был передан неправильный параметр странице -->
        <script>
            if (location.hash !== '#login' && location.hash !== '#registration') {
                location.hash = '#login';
            }
        </script>
    </main>
</body>

</html>