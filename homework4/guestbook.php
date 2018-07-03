<?php

    include __DIR__ . '/functions.php';

?>

<html>
    <head>
        <title>Гостевая книга</title>
    </head>
    <body>

        <h1>Гостевая книга</h1>

        <?php

        $guestbook = getGuestbook();

        foreach ($guestbook as $record) {
            ?>

            <p><?php echo $record; ?></p>

            <?php
        }

        ?>

        <form action="/homework4/addRecord.php" method="get">
            <b>Добавление записи в гостевую книгу:</b><br>
            <input type="text" name="r">
            <input type="submit" value="Добавить">
        </form>

    </body>
</html>
