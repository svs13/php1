<?php
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

const NEWS_FN =  __DIR__ . '/news.txt';

if ( isset( $_GET['id'] ) ) {

    $news = new News( NEWS_FN );

    if ( isset( $news->getArticles()[ $_GET['id'] ] ) ) {

        $ar = $news->getArticles()[ $_GET['id'] ];

        $header = $ar->getHeader();
        $content = $ar->getContent();

    }

}

if ( !isset($header) ) {

    header('Location: /homework7/news.php');

    exit;

}

$v = new View();
$v->assign( 'header', $header);
$v->assign( 'content', $content);

$v->display(__DIR__ . '/templates/article.php');
