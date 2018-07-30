<?php

require __DIR__ . '/classes/News.php';
require __DIR__ . '/classes/View.php';

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

$added = false;

if ( 0 !== strlen( $header . $text . $author ) ) {

    $news = new News();
    $added = $news->addArticle( new Article( $header, $text, $author ) );

    if ( $added ) {
        $header = '';
        $text = '';
        $author = '';
    }

}

$view = new View();

$view->assign('header', $header);
$view->assign('text', $text);
$view->assign('author', $author);
$view->assign('articleAdded', $added);

$view->display( __DIR__ . '/templates/addArticle.php');
