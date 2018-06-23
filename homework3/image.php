<?php

include __DIR__ . '/functions.php';

?>

<html>
    <head>
        <title>PHP-1. Урок 3</title>
    </head>
    <body>

        <?php


        if ( array_key_exists('id', $_GET) &&
                ( $img_url = getImgUrlById( getArrImg(), $_GET['id'] ) ) !== false ) {
            //учитываем приоритет операторов http://php.net/manual/ru/language.operators.precedence.php
            //$img_url = getImgUrlById( getArrImg(), $_GET['id'] );
            //$img_url значение уже присвоено чуть выше

        ?>

            <a href="homework3.php"><img src="<?php echo $img_url; ?>" width="100%"></a>

        <?php

        } else {

        ?>

        Ошибка. Запрашиваемое изображение не существует.
        <br>
        <a href="homework3.php">Вернуться на главную страницу</a>

        <?php

        }

        ?>
    </body>
</html>
