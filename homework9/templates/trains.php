<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Расписание поездов</title>
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
        table td {
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h3 style="text-align: center">Расписание поездов дальнего следования</h3>
</header>

<nav>
    <a href="/homework9/"> Главная страница </a>
    <a href="/homework9/gallery.php"> Фотогаллерея </a>
    <a href="/homework9/trains.php"> Расписание поездов дального следования </a>
</nav>


<section style="min-height: 70vh">

    <table border="1px" cellspacing="0px">
        <tr>
            <th width="5%">
                Поезд
            </th>
            <th width="20%">
                Маршрут
            </th>
            <th width="10%">
                Отправление
            </th>
            <th width="10%">
                Время в пути
            </th>
        </tr>

        <?php foreach ($trains as $train) { ?>
            <tr>
                <td><?php echo $train->getNumber(); ?></td>
                <td><?php echo $train->getRoute(); ?></td>
                <td><?php echo $train->getTimeDeparture(); ?></td>
                <td><?php echo $train->getTimeTravel(); ?></td>
            </tr>
        <?php } ?>

    </table>

</section>

<br>

<footer>
    Телефон администрации города: +7 4942 31-44-40
</footer>

</body>
</html>