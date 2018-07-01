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
        $calc_values = ['number1'=>'', 'operation'=>'', 'number2'=>'', 'result'=>''];

        if ( isset($_GET['number1'], $_GET['operation'], $_GET['number2']) && is_numeric($_GET['number1']) && is_numeric($_GET['number2']) ) {
            $calc_values['number1'] = $_GET['number1'];
            $calc_values['operation'] = $_GET['operation'];
            $calc_values['number2'] = $_GET['number2'];
            $calc_values['result'] = calculator( $_GET['number1'], $_GET['operation'], $_GET['number2'] );
        }
        ?>

        <form action="/homework3/homework3.php" method="get">
            Первое число: <input type="text" name="number1" value="<?php echo $calc_values['number1']; ?>"><br>
            Операция:
            | + <input type="radio" name="operation" value="+" <?php echo input_cheked('+', $calc_values['operation'] ); ?> >
            | - <input type="radio" name="operation" value="-" <?php echo input_cheked('-', $calc_values['operation'] ); ?> >
            | * <input type="radio" name="operation" value="*" <?php echo input_cheked('*', $calc_values['operation'] ); ?> >
            | / <input type="radio" name="operation" value="/" <?php echo input_cheked('/', $calc_values['operation'] ); ?> >
            | ^ <input type="radio" name="operation" value="^" <?php echo input_cheked('^', $calc_values['operation'] ); ?> >|<br>
            Второе число: <input type="text" name="number2" value="<?php echo $calc_values['number2']; ?>"><br>
            <input type="submit" value="равно"><br>
            Результат: <?php echo $calc_values['result']; ?>
        </form>

        <h2>Работа 2. Фотогалерея</h2>

        <?php
        $arr_img = getArrImg(); //массив данных картинок

        foreach ($arr_img as $index => $value) {
        ?>
            <a href="/homework3/image.php?id=<?php echo $index; ?>">
            <img src="/homework3/images/<?php echo $value; ?>" width="20%">
            </a>
        <?php
        }
        ?>

    </body>
</html>