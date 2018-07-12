<?php

require __DIR__ . '/classes/View.php';

require __DIR__ . '/functions.php';

session_start();

$v = new View;
$v->assign('username', getCurrentUser() );

if ( null === $v->get('username') ) {

    $v->assign('username', 'Гость');
    $v->assign('auth', false);

} else {

    $v->assign('auth', true);

}

$v->display(__DIR__ . '/templates/index.php');

