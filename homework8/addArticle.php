<?php

require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

const DB_NEWS_FN =  __DIR__ . '/configs/configDBHomework8.php';

if ( isset( $_POST['header'] ) ) {
    $header = $_POST['header'];
} else {
    $header = '';
}

if ( isset( $_POST['text'] ) ) {
    $text = $_POST['text'];
} else {
    $text = '';
}

if ( isset( $_POST['author'] ) ) {
    $author = $_POST['author'];
} else {
    $author = '';
}

if ( 0 === strlen( $header . $text . $author ) ) {
    $add = NULL;
} else {
    $add = ( new News( DB_NEWS_FN ) )->addArticle( new Article( $header, $text, $author ) );
}

if ( true === $add ) {
    $header = '';
    $text = '';
    $author = '';
}

$v = new View();

$v->assign('header', $header);
$v->assign('text', $text);
$v->assign('author', $author);
$v->assign('articleAdded', $add);

$v->display( __DIR__ . '/templates/addArticle.php');
