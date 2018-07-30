<?php

require __DIR__ . '/autoload.php';

if ( isset( $_GET['id'] ) ) {

    $gallery = new \App\Models\Gallery();
    $image = $gallery->getImageById( $_GET['id'] );

}

if ( !isset($image) ) {

    header('Location: /homework9/gallery.php');

    exit;
}

$view = new \App\Models\View();
$view->assign('image', $image->getName() );
$view->display( __DIR__ . '/templates/image.php' );

