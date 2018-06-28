<?php

include __DIR__ . '/functions.php';

?>

<html>
    <head>
        <title>PHP-1. Урок 3</title>
    </head>
    <body>

        <?php

        $arr_img =  getArrImg();

        if ( isset( $_GET['id'] ) && isset( $arr_img[ $_GET['id'] ] ) ) {
            $img_name = $arr_img[ $_GET['id'] ];

        ?>

            <a href="/homework3/homework3.php"><img src="/homework3/images/<?php echo $img_name; ?>" width="100%"></a>

        <?php

        } else {

        ?>

        Ошибка. Запрашиваемое изображение не существует.
        <br>
        <a href="/homework3/homework3.php">Вернуться на главную страницу</a>

        <?php

        }

        ?>
    </body>
</html>
