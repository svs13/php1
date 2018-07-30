<html>
    <head>
        <title>Гостевая книга</title>
    </head>
    <body>

        <h1>Гостевая книга</h1>

        <?php

        foreach ( $records as $record) {
            ?>
            <article><?php echo $record; ?></article>
            <hr>
            <?php
        }

        ?>

        <form action="/homework7/guestbook/addRecord.php" method="get">
            <b>Добавление записи в гостевую книгу:</b><br>
            <input type="text" name="r">
            <input type="submit" value="Добавить">
        </form>

    </body>
</html>
