<?php

include __DIR__ . '/functions.php';

session_start();

if ( null !== getCurrentUser() ) { // ЕСЛИ пользователь уже вошёл

    header('Location: /homework6/index.php');

    exit;

} else {

    if ( isset( $_POST['login'] ) ) {
        if ( isset( $_POST['password'] ) ) { //ЕСЛИ введены данные в форму входа
            if ( checkPassword($_POST['login'], $_POST['password']) ) {

                $_SESSION['username'] = $_POST['login'];  //пометили клиента
                header('Location: /homework6/index.php');

                exit;

            }
        }
    }

}

//ЕСЛИ пользователь не вошел - отображает форму входа
    ?>

<html>
    <head>
        <title>Вход на ресурс</title>
    </head>
    <body>
        <h4>Авторизация:</h4>

        <form action="/homework6/login.php" method="post">
            Логин:<br>
            <input type="text" name="login"><br>
            Пароль:<br>
            <input type="password" name="password"><br>
            <br>
            <input type="submit" value="Вход">
        </form>

    </body>
</html>
