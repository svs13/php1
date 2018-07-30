<?php

require __DIR__ . '/autoload.php';

$trainTable = new \App\Models\TrainTable();

$view = new \App\Models\View();
$view->assign('trains', $trainTable->getTrains() );
$view->display( __DIR__ . '/templates/trains.php' );