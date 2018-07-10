<?php

require __DIR__ . '/../class/Uploader.php';

include __DIR__ . '/../functions.php'; //ф-и авторизации

const UPLOAD_TYPES = ['image/png', 'image/jpeg']; //список разрешенных для загрузки MIME-типов
const UPLOAD_DIR = __DIR__ . '/images'; //путь директории

session_start();


$us = getCurrentUser();

if ( null === $us ) { //Клиент не авторизован

    header('Location: /homework6/login.php');

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
    $log[] = 'UserName=' . $us;
    $log[] = 'ImageName=' . $fn;

    putLog( implode( ' | ', $log) );

}


?>

<html>
    <head>
        <title>Загрузка изображения</title>
    </head>
    <body>

        <h4>Добавление изображения в галерею</h4>

        <p>Здравствуйте, <?php echo $us; ?>. Выберите и добавьте изображение.</p>

        <form action="/homework6/gallery/uploadImage.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <button type="submit">Добавить</button>
        </form>


        <?php
        if ( '' !== $fn ) {
            ?>

            <p>Файл '<?php echo $fn; ?>' добавлен</p>

            <?php
        } else {
            ?>

            <p>Файл не добавлен</p>

            <?php
        }
        ?>

        <br>

        <br><a href="/homework6/logout.php">Выход из системы</a>

    </body>
</html>
