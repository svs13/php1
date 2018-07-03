<?php

include __DIR__ . '/functions.php';

?>

<html>
<head>
    <title>Простейшая фотогалерея</title>
</head>
    <body>

    <?php
    $images = getImages();

    foreach ($images as $n) {
        ?>

        <img src="/homework4/images/<?php echo $n; ?>" width="33%">

        <?php
    }
    ?>

    </body>
</html>