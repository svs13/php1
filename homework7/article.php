<?php
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

const NEWS_FILENAME =  __DIR__ . '/news.txt';

if ( isset( $_GET['id'] ) ) {

    $news = new News( NEWS_FILENAME );
    $article = $news->getArticleById( $_GET['id'] );

}

if ( !isset($article) ) {

    header('Location: /homework7/news.php');

    exit;
}

$view = new View();
$view->assign( 'article', $article);
$view->display(__DIR__ . '/templates/article.php');
