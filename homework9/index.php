<?php

require __DIR__ . '/autoload.php';

$v = new \App\Models\View();

$tf = new \App\Models\File( __DIR__ . '/textFiles/welcomeText.txt');

$v->assign( 'welcomeText', $tf->getData() );

$v->display( __DIR__ . '/templates/index.php' );