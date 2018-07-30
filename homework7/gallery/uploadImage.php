<?php

require __DIR__ . '/../classes/View.php';
require __DIR__ . '/../classes/Uploader.php';

include __DIR__ . '/../functions.php'; //ф-и авторизации

const UPLOAD_TYPES = ['image/png', 'image/jpeg']; //список разрешенных для загрузки MIME-типов
const UPLOAD_DIR = __DIR__ . '/images'; //путь директории

session_start();

$username = getCurrentUser();

if ( null === $username ) { //Клиент не авторизован

    header('Location: /homework7/login.php');

    exit;
}

//Клиент авторизован


$uploader = new Uploader('image');

if ( in_array( $uploader->getMimeType(), UPLOAD_TYPES ) ) { //если загруженный файл удовлетворяет списку разрешенных типов

    $fileName = $uploader->getFileName();

    if ( '' !== $fileName ) { // если имя файла задано

        $filePath = UPLOAD_DIR . '/' . $fileName;

        if ( file_exists($filePath) ) { // если файл по данному пути уже существует

            $fileName = date('ymdHis') . '-' . $fileName;
            $filePath = UPLOAD_DIR . '/' . $fileName;

        }

        if ( !$uploader->upload($filePath) ) { // если перенести файл не удалось

            $fileName = '';

        }

    }

}

if ( !isset($fileName) ) {

    $fileName = '';

}

if ( '' !== $fileName ) { //если картинка успешно загружена - оставляем лог

    $log[] = 'uploadImage.php';
    $log[] = 'uploadImage';
    $log[] = 'UserName=' . $username;
    $log[] = 'ImageName=' . $fileName;

    putLog( implode( ' | ', $log) );

}

$view = new View;
$view->assign('username', $username);
$view->assign('fileName', $fileName);
$view->display(__DIR__ . '/../templates/gallery/uploadImage.php');

