<?php
require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

const DB_NEWS_FN =  __DIR__ . '/configs/configDBHomework8.php';

if ( isset( $_GET['id'] ) ) {

    $ar = ( new News( DB_NEWS_FN ) )->getArticleById( $_GET['id'] );

    if ( NULL !== $ar ) {

        $header = $ar->getHeader();
        $text = $ar->getText();
        $author = $ar->getAuthor();

    }

}

if ( !isset($ar) ) {

    header('Location: /homework8/index.php');

    exit;

}

$v = new View();
$v->assign( 'header', $header);
$v->assign( 'text', $text);
$v->assign( 'author', $author);

$v->display(__DIR__ . '/templates/article.php');