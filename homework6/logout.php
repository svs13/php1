<?php

include __DIR__ . '/functions.php';

session_start();

if ( null !== getCurrentUser() ) { //пользователь авторизован

    session_destroy();

}

header('Location: /homework6/login.php');

?>