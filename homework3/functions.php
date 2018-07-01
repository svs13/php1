<?php

function calculator($n1, $op, $n2) { //Калькулятор. Вывод выражения и его результата
    switch ($operation) {
        case '+':
            $res = ($n1 . $op . $n2 . '=') . ( $n1 + $n2 );
            break;
        case '-':
            $res = ($n1 . $op . $n2 . '=') . ( $n1 - $n2 );
            break;
        case '*':
            $res = ($n1 . $op . $n2 . '=') . ( $n1 * $n2 );
            break;
        case '/':
            $res = ($n1 . $op . $n2 . '=') . ( $n1 / $n2 );
            break;
        case '^':
            $res = ($n1 . $op . $n2 . '=') . ( $n1 ** $n2 );
            break;
        default:
            $res = '0';
            break;
    }
    return $res;
}

function inputCheked( $op1, $op2 ) { //Калькулятор. Отмечает выбранную операцию в input
    if ($op1 == $op2) {
        return 'checked';
    } else {
        return '';
    }
}

function getImages() { //Получение массива картинок
    $images = [
        11=>'1.jpg',
        22=>'2.jpg',
        33=>'3.jpg',
        44=>'4.jpg'
    ];
    return $images;
}

?>