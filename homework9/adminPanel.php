<?php

require __DIR__ . '/autoload.php';

require __DIR__ . '/functions.php';

$auth = new \App\Models\Authorization();

$username = $auth->getUsername();

if ( null === $username ) {

    header('Location: /homework9/login.php');

    exit;
}

//пользователь авторизован

$view =  new \App\Models\View();

$view->assign('username', $auth->getUsername() );


//Текст приветствия

$file = new \App\Models\File( __DIR__ . '/textFiles/welcomeText.txt');

if ( isset( $_POST['welcomeText'] ) ) {
    if ( is_string( $_POST['welcomeText'] ) ) {

        $file->setData( $_POST['welcomeText'] )->save();
    }
}

$view->assign( 'welcomeText', $file->getData() );


// Загрузка изображения

$gallery = new \App\Models\Gallery();
$uploader = new \App\Models\Uploader( 'image', $gallery->getImgTypes() );

$uploaded = null;

if ( $uploader->isUploaded() ) {

    $uploaded = $uploader->upload( $gallery->getPath() . '/' . $uploader->getFileName() );
}

$view->assign('uploaded', $uploaded );


//Редактирование расписания поездов

if ( isset( $_POST['train'] ) ) {

    $train = $_POST['train'];

    if ( is_array($train) ) {

        if ( checkArrayValue($train,'id') ) {
            $trainId = $train['id'];
        }
        if ( checkArrayValue($train,'number') ) {
            $trainNumber = $train['number'];
        }
        if ( checkArrayValue($train,'route') ) {
            $trainRoute = $train['route'];
        }
        if ( checkArrayValue($train,'timeD') ) {
            $trainTimeD = $train['timeD'];
        }
        if ( checkArrayValue($train,'timeT') ) {
            $trainTimeT = $train['timeT'];
        }
        if ( checkArrayValue($train,'cmd') ) {
            $trainCmd = $train['cmd'];
        }

    }
}

$trainTable = new \App\Models\TrainTable();

if ( isset( $trainCmd ) ) {

    switch ( $trainCmd ) {

        case 'add':
            if ( isset( $trainNumber, $trainRoute, $trainTimeD, $trainTimeT ) ) {

                $trainTable->addTrain( new \App\Models\Train($trainNumber, $trainRoute, $trainTimeD, $trainTimeT) );
            }
            break;

        case 'edit':
            if ( isset( $trainId, $trainNumber, $trainRoute, $trainTimeD, $trainTimeT ) ) {

                $trainTable->updateTrain($trainId, new \App\Models\Train($trainNumber, $trainRoute, $trainTimeD, $trainTimeT) );
            }
            break;

        case 'del':
            if ( isset( $trainId ) ) {

                $trainTable->delTrain( $trainId );
            }
            break;
    }

}

$view->assign('trains', $trainTable->getTrains() );

//Вывод в поток

$view->display( __DIR__ . '/templates/adminPanel.php' );