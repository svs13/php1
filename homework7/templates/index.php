<?php

?>

<html>
<head>
    <title>Главная страница</title>
</head>
<body>

Здравствуйте, <?php echo $username; ?>! Мы рады видеть Вас на нашем ресурсе!<br>

<br>

Полезные ссылки:<br>

<a href="/homework7/guestbook/index.php"> Гостевая книга </a><br>
<a href="/homework7/gallery/index.php"> Галерея изображений </a><br>
<a href="/homework7/gallery/uploadImage.php"> Загрузка изображения в галерею </a><br>
<a href="/homework7/news.php"> Новости </a><br>

<br>

<?php

if ( !$auth ) {
    ?>

    <a href="/homework7/login.php">Вход в систему</a>

    <?php
} else {
    ?>

    <br><a href="/homework7/logout.php">Выход из системы</a>

    <?php
}
?>

</body>
</html>