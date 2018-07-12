<?php

require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

const NEWS_FN =  __DIR__ . '/news.txt';

/*
$news = new News();
if ( 0 === count( $news->getArticles() ) ) {
    $news->addArticle( new Article('Заголовок1', 'Краткое содержание1', 'Полное содержание1') );
    $news->addArticle( new Article('Заголовок2', 'Краткое содержание2', 'Полное содержание2') );
    $news->addArticle( new Article('Заголовок3', 'Краткое содержание3', 'Полное содержание3') );
    $news->save();
}
*/

$v = new View();

$v->assign( 'articles', ( new News( NEWS_FN ) )->getArticles() );

$v->display( __DIR__ . '/templates/news.php');
