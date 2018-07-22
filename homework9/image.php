<?php

require __DIR__ . '/autoload.php';

if ( isset( $_GET['id'] ) ) {

    $gal = new \App\Models\Gallery( __DIR__ . '/images/' );
    $im = $gal->getImageById( $_GET['id'] );

}

if ( !isset($im) ) {

    header('Location: /homework9/gallery.php');

    exit;
}

$v = new \App\Models\View();

$v->assign('image', $im->getName() );

$v->display( __DIR__ . '/templates/image.php' );

