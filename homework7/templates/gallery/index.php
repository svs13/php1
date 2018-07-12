<html>
<head>
    <title>Простейшая фотогалерея</title>
</head>
    <body>

    <?php
    foreach ($images as $n) {
        ?>

        <img src="/homework7/gallery/images/<?php echo $n; ?>" width="33%">

        <?php
    }
    ?>

    </body>
</html>