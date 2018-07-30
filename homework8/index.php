<?php

require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

$view = new View();
$view->assign( 'articles', ( new News() )->getArticles() );
$view->display( __DIR__ . '/templates/index.php');
