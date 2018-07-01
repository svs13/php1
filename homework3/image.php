<?php

include __DIR__ . '/functions.php';

?>

<html>
    <head>
        <title>PHP-1. Урок 3</title>
    </head>
    <body>

        <?php
        $images =  getImages(); //массив данных картинок

        if ( isset( $_GET['id'], $images[ $_GET['id'] ] ) ) {
        ?>

            <img src="/homework3/images/<?php echo $images[ $_GET['id'] ]; ?>" width="100%">

        <?php
        }
        ?>

    </body>
</html>
