<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавление новости</title>
</head>
<body>

    <form action="/homework8/addArticle.php" method="post">

        <b>Добавление новой новости</b><br>

        Автор<br>
        <input type="text" name="author" value="<?php echo $author; ?>"><br>

        Заголовок<br>
        <input type="text" name="header" value="<?php echo $header; ?>"><br>

        Текст<br>
        <textarea rows="10" name="text"><?php echo $text; ?></textarea><br>
        <br>

        <button type="submit">Добавить</button>

    </form>

    <?php
    if (true === $articleAdded) { ?>
        Новость добавлена
    <?php }

    if (false === $articleAdded) { ?>
        Новость не добавлена. Заполните все поля
    <?php } ?>


</body>
</html>