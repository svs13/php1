<?php

include __DIR__ . '/functions.php'; //ф-и галереи

include __DIR__ . '/../functions.php'; //ф-и авторизации

session_start();


$us = getCurrentUser();

if ( null === $us ) { //Клиент не авторизован

    header('Location: /homework5/login.php');

    exit;

}

//Клиент авторизован

$n = putUploadImage('image');

if ( null !== $n ) { //если картинка успешно загружена - оставляем лог

    $log[] = 'UploadImage.php';
    $log[] = 'UploadImage';
    $log[] = 'UserName=' . $us;
    $log[] = 'ImageName=' . $n;

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

        <form action="/homework5/gallery/uploadImage.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <button type="submit">Добавить</button>
        </form>


        <?php
        if ( null !== $n ) {
            ?>

            <p>Файл '<?php echo $n; ?>' добавлен</p>

            <?php
        } else {
            ?>

            <p>Файл не добавлен</p>

            <?php
        }
        ?>

        <br>

        <br><a href="/homework5/logout.php">Выход из системы</a>

    </body>
</html>

