<?php

include __DIR__ . '/functions.php';

?>
<html>
    <head>
       <title>PHP-1. Урок 3</title>
    </head>
    <body>
        <h2>Работа 1. Программа-калькулятор</h2>

        <?php
        $n1 = '';
        $op = '';
        $n3 = '';
        $res = 0;

        if ( isset($_GET['n1'], $_GET['op'], $_GET['n2']) && is_numeric($_GET['n1']) && is_numeric($_GET['n2']) ) {
            $n1 = $_GET['n1'];
            $op = $_GET['op'];
            $n2 = $_GET['n2'];
            $res = calculator( $_GET['n1'], $_GET['op'], $_GET['n2'] );
        }
        ?>

        <form action="/homework3/homework3.php" method="get">
            Первое число: <input type="text" name="n1" value="<?php echo $n1; ?>"><br>
            Операция:
            | + <input type="radio" name="op" value="+" <?php echo inputCheked('+', $op ); ?> >
            | - <input type="radio" name="op" value="-" <?php echo inputCheked('-', $op ); ?> >
            | * <input type="radio" name="op" value="*" <?php echo inputCheked('*', $op ); ?> >
            | / <input type="radio" name="op" value="/" <?php echo inputCheked('/', $op ); ?> >
            | ^ <input type="radio" name="op" value="^" <?php echo inputCheked('^', $op ); ?> >|<br>
            Второе число: <input type="text" name="n2" value="<?php echo $n2; ?>"><br>
            <input type="submit" value="равно"><br>
            Результат: <?php echo $res; ?>
        </form>

        <h2>Работа 2. Фотогалерея</h2>

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