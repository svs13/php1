<?php

require __DIR__ . '/autoload.php';

$file = new \App\Models\File( __DIR__ . '/textFiles/welcomeText.txt');

$view = new \App\Models\View();
$view->assign( 'welcomeText', $file->getData() );
$view->display( __DIR__ . '/templates/index.php' );