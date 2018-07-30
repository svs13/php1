<?php

require __DIR__ . '/classes/View.php';

require __DIR__ . '/functions.php';

session_start();

$username = getCurrentUser();

$view = new View;

if ( null === $username ) {

    $view->assign('username', 'Гость');
    $view->assign('auth', false);

} else {

    $view->assign('username', $username);
    $view->assign('auth', true);

}

$view->display(__DIR__ . '/templates/index.php');

