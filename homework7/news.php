<?php

require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

const NEWS_FILENAME =  __DIR__ . '/news.txt';

/*
$news = new News(NEWS_FILENAME);
$news->addArticle( new Article('Заголовок4', 'Краткое содержание4', 'Полное содержание4') );
$news->save();
*/

$view = new View();
$view->assign( 'articles', ( new News( NEWS_FILENAME ) )->getArticles() );
$view->display( __DIR__ . '/templates/news.php');
