<?php

require __DIR__ . '/../classes/View.php';
require __DIR__ . '/../classes/Uploader.php';

include __DIR__ . '/../functions.php'; //ф-и авторизации

const UPLOAD_TYPES = ['image/png', 'image/jpeg']; //список разрешенных для загрузки MIME-типов
const UPLOAD_DIR = __DIR__ . '/images'; //путь директории

session_start();


$v = new View;

$v->assign('username', getCurrentUser() );

if ( null === $v->get('username') ) { //Клиент не авторизован

    header('Location: /homework7/login.php');

    exit;

}

//Клиент авторизован


$up = new Uploader('image');

if ( in_array( $up->getMimeType(), UPLOAD_TYPES ) ) { //если загруженный файл удовлетворяет списку разрешенных типов

    $fn = $up->getFileName();

    if ( '' !== $fn ) { // если имя файла задано

        $fp = UPLOAD_DIR . '/' . $fn;

        if ( file_exists($fp) ) { // если файл по данному пути уже существует

            $fn = date('ymdHis') . '-' . $fn;
            $fp = UPLOAD_DIR . '/' . $fn;

        }

        if ( !$up->upload($fp) ) { // если перенести файл не удалось

            $fn = '';

        }

    }

}

if ( !isset($fn) ) {

    $fn = '';

}

if ( '' !== $fn ) { //если картинка успешно загружена - оставляем лог

    $log[] = 'uploadImage.php';
    $log[] = 'uploadImage';
    $log[] = 'UserName=' . $v->get('username');
    $log[] = 'ImageName=' . $fn;

    putLog( implode( ' | ', $log) );

}


$v->assign('filename', $fn);

$v->display(__DIR__ . '/../templates/gallery/uploadImage.php');

