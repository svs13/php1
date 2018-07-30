<?php

require __DIR__ . '/autoload.php';

$gallery = new \App\Models\Gallery();

$view = new \App\Models\View();
$view->assign('images', $gallery->getImages() );
$view->display( __DIR__ . '/templates/gallery.php' );