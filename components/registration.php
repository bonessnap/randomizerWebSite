<section id="registration">
        <section>
            <h2>Зарегистрируйтесь сейчас</h2>
            <p>Придумайте себе логин и пароль</p>
                <form action="lib/registration.php" method="get">
                <section class="block_input">
                      <span>Логин:</span>
                      <input type="text" placeholder="Login" name="username">

                      <span>Почта:</span>
                      <input type="email" pattern=".+@globex\.com" placeholder="email" name="useremail">

                      <span>Пароль:</span>
                      <input type="password" placeholder="Password" name="userpassword">

                      <span>Пароль повторно:</span>
                      <input type="password" placeholder="Password again" name="usersecondpassword">

                    <!-- ЗАТЫЧКА ЧТОБЫ БЛОК С ОШИБКОЙ БЫЛ СПРАВА -->
                    <span>
                    </span>

                    <!-- Тут будут ошибки регистрации-->
                     <span style="font-size: 15px;">
                        <?php
                            if (isset($_GET['errorCode'])) {
                                $errorCode = (int)$_GET['errorCode'];

                                switch ($errorCode) {
                                    case 0: 
                                        echo 'Нету доступа к базе данных :(';
                                        break;
                                    case 4:
                                        echo 'Пользователь существует.';
                                        break;
                                    case 5:
                                        echo 'Пароли не совпадают';
                                        break;
                                    case 6: 
                                        echo 'Некорректный пароль';
                                        break;
                                }
                            }
                        ?>
                     </span>
                </section>

                    <!--  Блок с кнопками -->
                    <section id="block_with_button">
                    <a href="/index.php"> <button type="button">Без авторизации</button></a>
                    <a href="#login"> <button type="button">Войти</button></a>
                    <button type="sumbit">
                        Зарегистрироваться
                    </button>
                    </section>
            </form>
            
        </section>
    </section>
