<?php

require __DIR__ . '/../classes/View.php';

include __DIR__ . '/functions.php';

$view = new View;
$view->assign( 'images', getImages() );
$view->display(__DIR__ . '/../templates/gallery/index.php');

