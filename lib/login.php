<?php // Страничка логина на сайт
    session_start();
    $users = [
        [
            'username' => 'bonessnap',
            'userpasswd' => '123'
        ],
        [
            'username' => 'loh2',
            'userpasswd' => '1234'
        ]
        ];

        foreach ($users as $user)
        {
            // Если юзер найден
            if($user['username'] === $_GET['username'])
            {  // если пароль подходит
                if($user['userpasswd'] === $_GET['userpasswd'])
                {
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['userpasswd'] = $user['userpasswd'];
                    return header("location: /index.php");
                }
                // если пароль не подходит
                else return header('Location: /authorization.php?errorCode=2');
            }
        }
    return header('Location: /authorization.php?errorCode=1');
?>