<?php

include __DIR__ . '/functions.php';

?>
<html>
    <head>
       <title>PHP-1. Урок 3. Работа 1. Программа-калькулятор</title>
    </head>
    <body>

        <?php
        $n1 = '';
        $op = '';
        $n2 = '';
        $res = 0;
        $operations = ['+', '-', '*', '/', '^'];

        if ( isset($_GET['n1'], $_GET['op'], $_GET['n2']) && is_numeric($_GET['n1']) && is_numeric($_GET['n2']) ) {
            $n1 = $_GET['n1'];
            $op = $_GET['op'];
            $n2 = $_GET['n2'];
            $res = calculator( $n1, $op, $n2 );
        }
        ?>

        <form action="/homework3/calculator.php" method="get">
            <input type="text" name="n1" size="5" value="<?php echo $n1; ?>">
            <select name="op">
                <?php
                foreach ($operations as $value) {
                ?>
                <option value="<?php echo $value; ?>"> <?php echo $value; ?> </option>
                <?php
                }
                ?>
            </select>
            <input type="text" name="n2" size="5" value="<?php echo $n2; ?>">
            <input type="submit" value="равно">
            <?php echo $res; ?>
        </form>

    </body>
</html>