<?php

include __DIR__ . '/functions.php';

session_start();


$us = getCurrentUser();

if ( null === $us ) {
    $name = 'Гость';
} else {
    $name = $us;
}

?>

<html>
    <head>
        <title>Главная страница</title>
    </head>
    <body>

        Здравствуйте, <?php echo $name; ?>! Мы рады видеть Вас на нашем ресурсе!<br>

        <a href="gallery/index.php"> Галерея изображений </a><br>
        <a href="gallery/uploadImage.php"> Загрузка изображения в галерею </a><br>

        <br>

        <?php

        if ( null === $us) {
            ?>

            <a href="/homework5/login.php">Вход в систему</a>

            <?php
        } else {
            ?>

            <br><a href="/homework5/logout.php">Выход из системы</a>

            <?php
        }
        ?>

    </body>
</html>