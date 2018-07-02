<?php

include __DIR__ . '/functions.php';

?>
<html>
    <head>
       <title>PHP-1. Урок 3. Работа 1. Программа-калькулятор</title>
    </head>
    <body>

        <?php
        if ( isset( $_GET['n1'] ) && is_numeric( $_GET['n1'] ) ) {
            $n1 = $_GET['n1'];
        } else {
            $n1 = 0;
        }

        $operations = ['+', '-', '*', '/', '^'];
        if ( isset( $_GET['op'] ) && in_array( $_GET['op'], $operations) ) {
            $op = $_GET['op'];
        } else {
            $op = $operations[0];
        }

        if ( isset( $_GET['n2'] ) && is_numeric( $_GET['n2'] ) ) {
            $n2 = $_GET['n2'];
        } else {
            $n2 = 0;
        }

        $res = calculator( $n1, $op, $n2 );

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