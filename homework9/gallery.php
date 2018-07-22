<?php

require __DIR__ . '/autoload.php';

$gal = new \App\Models\Gallery( __DIR__ . '/images/');

$v = new \App\Models\View();

$v->assign('images', $gal->getImages() );

$v->display( __DIR__ . '/templates/gallery.php' );