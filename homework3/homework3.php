<html>
    <head>
       <title>PHP-1. Урок 3</title>
    </head>
    <body>

        <h1>PHP-1. 3 урок</h1>

        <h1>Домашняя работа</h1>

        <h2>Работа 1. Программа-калькулятор</h2>

        <?php

        //var_dump( $_GET['num1'] );
        //var_dump( is_numeric( $_GET['num1'] ) );

<<<<<<< HEAD
        //Данные калькулятора
        $num1 = '';
        $num2 = '';
        $operation = '';
        $res = '';

        if  ( array_key_exists('num1', $_GET) ||
              array_key_exists('num2', $_GET) ||
              array_key_exists('operation', $_GET) ) { //клиентом нажата кнопка "равно" калькулятора

             switch (false) { //Второе число
                 case array_key_exists('num2', $_GET):
                 case $_GET['num2'] != '':
                     $res = 'Ошибка. Пожалуйста, введите второе число!';
                     break;
                 case is_numeric($_GET['num2']):
                     $res = 'Ошибка. Во второе поле введено не числовое значение!';
                 default:
                     $num2 = $_GET['num2'];
                     break;
             };

             switch (false) { //Операция
                 case array_key_exists('operation', $_GET):
                     $res = 'Ошибка. Пожалуйста, выберите операцию!';
                     break;
                 default:
                     $operation = $_GET['operation'];
                     break;
             };

             switch (false) { //Первое число
                 case array_key_exists('num1', $_GET):
                 case $_GET['num1'] != '':
                     $res = 'Ошибка. Пожалуйста, введите первое число!';
                     break;
                 case is_numeric($_GET['num1']):
                     $res = 'Ошибка. В первое поле введено не числовое значение!';
                 default:
                     $num1 = $_GET['num1'];
                     break;
             };

             if ($res === '') { //Ошибок не было
                 switch ($operation) { //Вычисление
                     case '+':
                         $res = $num1 + $num2;
                         break;
                     case '-':
                         $res = $num1 - $num2;
                         break;
                     case '*':
                         $res = $num1 * $num2;
                         break;
                     case '/':
                         $res = $num1 / $num2;
                         break;
                     case '^':
                         $res = $num1 ** $num2;
                         break;
                     default:
                         $res = 'Ошибка. Неизвестная операция';
                         break;
                 }

             }

        }

        function radio_cheked( $oper, $now_oper ) { //Отмечает операцию в form
            if ($oper == $now_oper) {
                return 'checked';
            } else {
                return '';
            }
        }

=======
            $num1 = null;
            $num2 = null;
            $operation = null;
            $res = '';

            switch ( false ) { //Второе число
                case array_key_exists('num2', $_GET):
                case $_GET['num2'] != '':
                    $res = 'Ошибка. Пожалуйста, введите второе число!';
                    break;
                case is_numeric( $_GET['num2'] ):
                    $res = 'Ошибка. Во второе поле введено не числовое значение!';
                default:
                    $num2 = $_GET['num2'];
                    break;
            };

            switch ( false ) { //Операция
                case array_key_exists('operation', $_GET):
                    $res = 'Ошибка. Пожалуйста, выберите операцию!';
                    break;
                default:
                    $operation = $_GET['operation'];
                    break;
            };

            switch ( false ) { //Первое число
                case array_key_exists('num1', $_GET):
                case $_GET['num1'] != '':
                    $res = 'Ошибка. Пожалуйста, введите первое число!';
                    break;
                case is_numeric( $_GET['num1'] ):
                    $res = 'Ошибка. В первое поле введено не числовое значение!';
                default:
                    $num1 = $_GET['num1'];
                    break;
            };

            if ( $res === '' ) { //Ошибок не было
                switch ($operation) { //Вычисление
                    case '+':
                        $res = $num1 + $num2;
                        break;
                    case '-':
                        $res = $num1 - $num2;
                        break;
                    case '*':
                        $res = $num1 * $num2;
                        break;
                    case '/':
                        $res = $num1 / $num2;
                        break;
                    case '^':
                        $res = $num1 ** $num2;
                        break;
                    default:
                        $res = 'Ошибка. Неизвестная операция';
                        break;
                }
            }



            function radio_cheked( $oper, $now_oper ) { //Отмечает операцию в form
                if ($oper == $now_oper) {
                    return 'checked';
                } else {
                    return '';
                }
            }
>>>>>>> b4feba0e7067df3a3ed2a69955187f4d24f02bda
        ?>


        <form action="homework3.php" method="get">
            Первое число: <input type="text" name="num1" value="<?php echo $num1; ?>">
            <br>
            Выберите операцию:
            | + <input type="radio" name="operation" value="+" <?php echo radio_cheked('+', $operation); ?> >
            | - <input type="radio" name="operation" value="-" <?php echo radio_cheked('-', $operation); ?> >
            | * <input type="radio" name="operation" value="*" <?php echo radio_cheked('*', $operation); ?> >
            | / <input type="radio" name="operation" value="/" <?php echo radio_cheked('/', $operation); ?> >
            | ^ <input type="radio" name="operation" value="^" <?php echo radio_cheked('^', $operation); ?> >
            |
            <br>
            Второе число: <input type="text" name="num2" value="<?php echo $num2; ?>">
            <br>
            <input type="submit" value="равно">
        </form>
        Результат: <?php echo $res; ?>


        <h2>Работа 2. Фотогалерея</h2>

        <?php

        include __DIR__ . '/functions.php';

        //получение массива данных картинок
        $arr_img = getArrImg();

        //создание нового многомерного массива с элементами [ id, url ]
        foreach ($arr_img as $index => $value) {
            $arr_pic[] = ['id'=>$index, 'url'=>$value];
        }

        ?>


        <a href="image.php?id=<?php echo $arr_pic[0]['id']; ?>"><img src="<?php echo $arr_pic[0]['url']; ?>" width="20%"></a>
        <a href="image.php?id=<?php echo $arr_pic[1]['id']; ?>"><img src="<?php echo $arr_pic[1]['url']; ?>" width="20%"></a>
        <a href="image.php?id=<?php echo $arr_pic[2]['id']; ?>"><img src="<?php echo $arr_pic[2]['url']; ?>" width="20%"></a>
        <a href="image.php?id=<?php echo $arr_pic[3]['id']; ?>"><img src="<?php echo $arr_pic[3]['url']; ?>" width="20%"></a>

    </body>
</html>