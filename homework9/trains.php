<?php

require __DIR__ . '/autoload.php';

$tt = new \App\Models\TrainTable();

$v = new \App\Models\View();

$v->assign('trains', $tt->getTrains() );

$v->display( __DIR__ . '/templates/trains.php' );