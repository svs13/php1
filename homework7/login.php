<?php

require __DIR__ . '/classes/View.php';

include __DIR__ . '/functions.php';

session_start();

$username = getCurrentUser();

if ( null !== $username ) { // если пользователь авторизован

    header('Location: /homework7/index.php');

    exit;
}

//авторизация

if ( isset( $_POST['login'] ) ) {
    if ( isset( $_POST['password'] ) ) { //если введены данные в форму входа
        if ( checkPassword( $_POST['login'], $_POST['password'] ) ) {

            $_SESSION['username'] = $_POST['login'];  //пометили клиента
            header('Location: /homework7/index.php');

            exit;
        }
    }
}

//пользователь не авторизован - отображаем форму входа
$view = new View;
$view->assign('username', $username);
$view->display(__DIR__ . '/templates/login.php');

