<?php

require __DIR__ . '/classes/GuestBook.php';

$gb = new GuestBook();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Гостевая книга</title>
</head>
<body>

    <?php foreach ( $gb->getRecords() as $record ) {
        ?>

            <?php echo $record->getMessage(); ?>
            <hr>

        <?php


    }

    ?>

</body>
</html>
