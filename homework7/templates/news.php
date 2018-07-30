<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
</head>
<body>

    <?php

    foreach ($articles as $id => $article ) {
        ?>

        <a href="/homework7/article.php?id=<?php echo $id; ?>">
            <header>
                <h3><?php echo $article->getHeader(); ?></h3>
            </header>
        </a>
        <article><?php echo $article->getShotContent(); ?></article>

        <?php
    }
    ?>

</body>
</html>