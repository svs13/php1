<?php

include __DIR__ . '/functions.php';

?>
<html>
<head>
    <title>PHP-1. Урок 3. Галерея</title>
</head>
    <body>

    <?php
    $images = getImages();

    foreach ($images as $id => $name) {
    ?>

        <a href="/homework3/image.php?id=<?php echo $id; ?>">
            <img src="/homework3/images/<?php echo $name; ?>" width="20%">
        </a>

    <?php
    }
    ?>

    </body>
</html>