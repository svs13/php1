<?php

require __DIR__ . '/../classes/View.php';

include __DIR__ . '/functions.php';

$v = new View;

$v->assign( 'images', getImages() );

$v->display(__DIR__ . '/../templates/gallery/index.php');

