<?php

include __DIR__ . '/functions.php';

?>

<html>
    <head>
        <title>PHP-1. Урок 3</title>
    </head>
    <body>

        <?php
        $arr_img =  getArrImg(); //массив данных картинок

        if ( isset( $_GET['id'], $arr_img[ $_GET['id'] ] ) ) {
        ?>

            <a href="/homework3/homework3.php"><img src="/homework3/images/<?php echo $arr_img[ $_GET['id'] ]; ?>" width="100%"></a>

        <?php
        }
        ?>

    </body>
</html>
