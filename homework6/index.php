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

<br>

Полезные ссылки:<br>

<a href="/homework6/guestbook/index.php"> Гостевая книга </a><br>
<a href="/homework6/gallery/index.php"> Галерея изображений </a><br>
<a href="/homework6/gallery/uploadImage.php"> Загрузка изображения в галерею </a><br>


<br>

<?php

if ( null === $us) {
    ?>

    <a href="/homework6/login.php">Вход в систему</a>

    <?php
} else {
    ?>

    <br><a href="/homework6/logout.php">Выход из системы</a>

    <?php
}
?>

</body>
</html>