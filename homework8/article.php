<?php
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';


if ( isset( $_GET['id'] ) ) {

    $article = ( new News() )->getArticleById( $_GET['id'] );

}

if ( !isset($article) ) {

    header('Location: /homework8/index.php');

    exit;
}

$view = new View();
$view->assign( 'article', $article);
$view->display(__DIR__ . '/templates/article.php');