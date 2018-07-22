<?php

require __DIR__ . '/autoload.php';

require __DIR__ . '/functions.php';

$auth = new \App\Models\Authorization();

if ( null === $auth->getUsername() ) {

    header('Location: /homework9/login.php');

    exit;
}

//пользователь авторизован

$v =  new \App\Models\View();

$v->assign('username', $auth->getUsername() );

//Текст приветствия

$tf = new \App\Models\File( __DIR__ . '/textFiles/welcomeText.txt');

if ( isset( $_POST['welcomeText'] ) ) {
    if ( is_string( $_POST['welcomeText'] ) ) {

        $tf->setData( $_POST['welcomeText'] )->save();
    }
}

$v->assign( 'welcomeText', $tf->getData() );

// Загрузка изображения

$gal = new \App\Models\Gallery();
$up = new \App\Models\Uploader( 'image', $gal->getImgTypes() );

$uploaded = null;

if ( $up->isUploaded() ) {

    $uploaded = $up->upload( $gal->getPath() . '/' . $up->getFileName() );
}

$v->assign('uploaded', $uploaded );

//Редактирование расписания поездов

if ( isset( $_POST['train'] ) ) {

    $tr = $_POST['train'];

    if ( is_array($tr) ) {

        if ( checkArrayValue($tr,'id') ) {
            $trId = $tr['id'];
        }
        if ( checkArrayValue($tr,'number') ) {
            $trNumber = $tr['number'];
        }
        if ( checkArrayValue($tr,'route') ) {
            $trRoute = $tr['route'];
        }
        if ( checkArrayValue($tr,'timeD') ) {
            $trTimeD = $tr['timeD'];
        }
        if ( checkArrayValue($tr,'timeT') ) {
            $trTimeT = $tr['timeD'];
        }
        if ( checkArrayValue($tr,'cmd') ) {
            $trCmd = $tr['cmd'];
        }

    }
}

$tt = new \App\Models\TrainTable();

if ( isset( $trCmd ) ) {

    switch ( $trCmd ) {

        case 'add':
            if ( isset( $trNumber, $trRoute, $trTimeD, $trTimeT ) ) {

                $tt->addTrain( new \App\Models\Train($trNumber, $trRoute, $trTimeD, $trTimeT) );
            }
            break;

        case 'edit':
            if ( isset( $trId, $trNumber, $trRoute, $trTimeD, $trTimeT ) ) {

                $tt->updateTrain($trId, new \App\Models\Train($trNumber, $trRoute, $trTimeD, $trTimeT) );
            }
            break;

        case 'del':
            if ( isset( $trId ) ) {

                $tt->delTrain( $trId );
            }
            break;
    }

}

$v->assign('trains', $tt->getTrains() );

//Вывод в поток

$v->display( __DIR__ . '/templates/adminPanel.php' );