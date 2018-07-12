<?php

require __DIR__ . '/classes/View.php';

include __DIR__ . '/functions.php';

session_start();

$v = new View;

$v->assign( 'username', getCurrentUser() );

if ( null !== $v->get('username') ) { // ЕСЛИ пользователь уже вошёл

    header('Location: /homework7/index.php');

    exit;

} else {

    if ( isset( $_POST['login'] ) ) {
        if ( isset( $_POST['password'] ) ) { //ЕСЛИ введены данные в форму входа
            if ( checkPassword($_POST['login'], $_POST['password']) ) {

                $_SESSION['username'] = $_POST['login'];  //пометили клиента
                header('Location: /homework7/index.php');

                exit;

            }
        }
    }

}

//ЕСЛИ пользователь не вошел - отображаем форму входа

$v->display(__DIR__ . '/templates/login.php');

?>
