<?php

require __DIR__ . '/autoload.php';

$auth = new \App\Models\Authorization();

$head = 'Location: /homework9/adminPanel.php';


if ( null !== $auth->getUsername() ) { //если авторизован

    header($head);

    exit;
}

if ( isset( $_POST['login'] ) ) {
    if ( is_string( $_POST['login'] ) ) {

        $login = $_POST['login'];
    }
}

if ( isset( $_POST['password'] ) ) {
    if ( is_string( $_POST['password'] ) ) {

        $pass = $_POST['password'];
    }
}

if ( isset( $login, $pass) ) {
    if ( $auth->login( $login, $pass ) ) { //если проверка успешна (авторизован)

        header($head);

        exit;
    }
}

//не авторизован. Выводим в поток форму ввода логин/пароль

$v = new \App\Models\View();

if ( !isset($login) ) {

    $login = '';
}

$v->assign('login', $login);

$v->display( __DIR__ . '/templates/login.php' );


