<?php

require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

const DB_NEWS_FN =  __DIR__ . '/configs/configDBHomework8.php';


$v = new View();

$v->assign( 'articles', ( new News( DB_NEWS_FN ) )->getArticles() );

$v->display( __DIR__ . '/templates/index.php');
