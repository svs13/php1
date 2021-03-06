<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Галерея изображений</title>
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
    <h3 style="text-align: center">Галерея изображений</h3>
</header>

<nav>
    <a href="/homework9/"> Главная страница </a>
    <a href="/homework9/gallery.php"> Фотогаллерея </a>
    <a href="/homework9/trains.php"> Расписание поездов дального следования </a>
</nav>


<section style="min-height: 70vh">

    <?php foreach ($images as $id => $img) { ?>

    <a href="/homework9/image.php?id=<?php echo $id; ?>">
        <img src="/homework9/images/<?php echo $img->getName(); ?>" style="height: 20vh">
    </a>

    <?php } ?>


</section>

<br>

<footer>
    Телефон администрации города: +7 4942 31-44-40
</footer>

</body>
</html>