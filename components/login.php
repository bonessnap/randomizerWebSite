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
                      <input type="password" placeholder="Password" name="userpassword">
                        <!-- Тут будет сообщение о ошибке логина-->
                        <span></span>
                        <span style="font-size: 15px;">
                        <?php  // если есть ошибка логина
                            if (isset($_GET['errorCode'])) {
                                $errorCode = (int)$_GET['errorCode'];

                                switch ($errorCode) {
                                    case 0: 
                                        echo 'Нету доступа к базе данных :(';
                                        break;
                                    case 1:
                                        echo 'Пользователя с таким ником нет';
                                        break;
                                    case 2:
                                        echo 'Неправильный пароль';
                                        break;
                                    case 3:
                                        echo 'Успешно зарегистрированно.';
                                        break;
                                }
                            }
                        ?>
                        </span>
                </section>

                    <!--  Блок с кнопками -->
                    <section id="block_with_button">
                      <a href="/index.php"> <button type="button">Без авторизации</button></a>
                      <button type="submit">
                          Войти
                      </button>

                      <a href="#registration"> <button type="button">Зарегистрироваться</button></a>
                    </section>
            </form>
        </section>
    </section>