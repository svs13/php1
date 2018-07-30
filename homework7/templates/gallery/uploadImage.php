<html>
    <head>
        <title>Загрузка изображения</title>
    </head>
    <body>

        <h4>Добавление изображения в галерею</h4>

        <p>Здравствуйте, <?php echo $username; ?>. Выберите и добавьте изображение.</p>

        <form action="/homework7/gallery/uploadImage.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <button type="submit">Добавить</button>
        </form>


        <?php if ( '' !== $fileName ) { ?>

            <p>Файл '<?php echo $fileName; ?>' добавлен</p>

        <?php } else { ?>

            <p>Файл не добавлен</p>

        <?php } ?>

        <br>

        <br><a href="/homework7/logout.php">Выход из системы</a>

    </body>
</html>