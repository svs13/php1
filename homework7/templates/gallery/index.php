<html>
    <head>
        <title>Простейшая фотогалерея</title>
    </head>
    <body>

        <?php foreach ($images as $filename) { ?>

            <img src="/homework7/gallery/images/<?php echo $filename; ?>" width="33%">

        <?php } ?>

    </body>
</html>