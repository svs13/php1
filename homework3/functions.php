<?php

function calculator($number1, $operation, $number2) { //Калькулятор. Вывод выражения и его результата
    switch ($operation) {
        case '+':
            $res = ($number1 . $operation . $number2 . '=') . ( $number1 + $number2 );
            break;
        case '-':
            $res = ($number1 . $operation . $number2 . '=') . ( $number1 - $number2 );
            break;
        case '*':
            $res = ($number1 . $operation . $number2 . '=') . ( $number1 * $number2 );
            break;
        case '/':
            $res = ($number1 . $operation . $number2 . '=') . ( $number1 / $number2 );
            break;
        case '^':
            $res = ($number1 . $operation . $number2 . '=') . ( $number1 ** $number2 );
            break;
        default:
            $res = '';
            break;
    }
    return $res;
}

function input_cheked( $input_value, $operation ) { //Калькулятор. Отмечает выбранную операцию
    if ($input_value == $operation) {
        return 'checked';
    } else {
        return '';
    }
}

function getArrImg() { //Получение массива картинок
    $arr_img = [
        11=>'1.jpg',
        22=>'2.jpg',
        33=>'3.jpg',
        44=>'4.jpg'
    ];
    return $arr_img;
}

?>