<?php

require __DIR__ . '/../class/GuestBook.php';

const GB_PATH = __DIR__ . '/guestbook.txt';

?>

<html>
    <head>
        <title>Гостевая книга</title>
    </head>
    <body>

        <h1>Гостевая книга</h1>

        <?php

        foreach ( ( new GuestBook(GB_PATH) )->getData() as $record) {
            ?>
            <article><?php echo $record; ?></article>
            <hr>
            <?php
        }

        ?>

        <form action="/homework6/guestbook/addRecord.php" method="get">
            <b>Добавление записи в гостевую книгу:</b><br>
            <input type="text" name="r">
            <input type="submit" value="Добавить">
        </form>

    </body>
</html>
