<?php

include __DIR__ . '/functions.php';

$n = putUploadImage('image');

?>

<html>
    <head>
        <title>Загрузка изображения</title>
    </head>
    <body>
    <h4>Добавление изображения в галерею</h4>

    <form action="/homework4/uploadImage.php" method="post" enctype="multipart/form-data">

        <input type="file" name="image">

        <button type="submit">Добавить</button>

        <?php

        if ( $n != false ) {
            ?>

            <p>Файл '<?php echo $n; ?>' добавлен</p>

            <?php
        }
        ?>

    </form>

    </body>
</html>