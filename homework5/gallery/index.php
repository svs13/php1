<?php

include __DIR__ . '/functions.php';

$images = getImages();

?>

<html>
<head>
    <title>Простейшая фотогалерея</title>
</head>
    <body>

    <?php
    foreach ($images as $n) {
        ?>

        <img src="/homework5/gallery/images/<?php echo $n; ?>" width="33%">

        <?php
    }
    ?>

    </body>
</html>