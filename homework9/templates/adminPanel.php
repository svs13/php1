<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Панель администратора</title>
    <style>
        nav, footer {
            background: yellowgreen;
            padding: 5px 0px; /* внутренние отступы сверхуснизу слевасправа */

        }
        nav li {
            display: inline-block; /*горизонтально*/
        }
        nav a {
            text-decoration: none; /*без подчеркивания ссылок*/
            padding: 5px 10px; /* внутренние отступы сверхуснизу слевасправа */
        }
        nav a:hover {
            background: darkgray; /*без подчеркивания ссылок*/
        }
    </style>
</head>
<body>

<header>
    <h3 style="text-align: center">Панель администратора</h3>
</header>

<nav>
    <a href="/homework9/"> Главная страница </a>
    <a href="/homework9/gallery.php"> Фотогаллерея </a>
    <a href="/homework9/trains.php"> Расписание поездов дального следования </a>
    <a href="/homework9/logout.php"> Выход </a>
</nav>

<section style="min-height: 70vh">

    <br>

    Здравствуйте, <?php echo $username; ?>!


    <h4>Редактирование текста приветствия</h4>

    <form action="/homework9/adminPanel.php" method="post" enctype="multipart/form-data">

        <textarea name="welcomeText" rows="10" cols="90"><?php echo $welcomeText; ?></textarea><br>

        <button type="submit">Изменить</button>

    </form>


    <h4>Добавление изображения в галерею</h4>

    <form action="/homework9/adminPanel.php" method="post" enctype="multipart/form-data">

        <input type="file" name="image">

        <button type="submit">Добавить</button><br>

        <?php if ( true === $uploaded ) { ?>
            Изображение успешно загружено
        <?php } ?>

        <?php if ( false === $uploaded ) { ?>
            Изображение не загружено
        <?php } ?>

    </form>


    <h4>Редактирование расписания поездов</h4>

    <form action="/homework9/adminPanel.php" method="post" name="addTrain">
        <input type="text" name="train[number]" size="10">
        <input type="text" name="train[route]" size="20">
        <input type="text" name="train[timeD]" size="10">
        <input type="text" name="train[timeT]" size="10">
        <button type="submit" name="train[cmd]" value="add">Добавить</button>
    </form>

    <?php foreach ($trains as $id => $train) { ?>

        <form action="/homework9/adminPanel.php" method="post">
            <input type="hidden" name="train[id]" value="<?php echo $id; ?>">
            <input type="text" name="train[number]" size="10" value="<?php echo $train->getNumber(); ?>">
            <input type="text" name="train[route]" size="20" value="<?php echo $train->getRoute(); ?>">
            <input type="text" name="train[timeD]" size="10" value="<?php echo $train->getTimeDeparture(); ?>">
            <input type="text" name="train[timeT]" size="10" value="<?php echo $train->getTimeTravel(); ?>">
            <button type="submit" name="train[cmd]" value="edit">Изменить</button>
            <button type="submit" name="train[cmd]" value="del">Удалить</button>
        </form>

    <?php } ?>

</section>

<br>

<footer>
    Телефон администрации города: +7 4942 31-44-40
</footer>

</body>
</html>