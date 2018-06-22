<?php

function boolToStr($b)  { //Преобразование булевого значения в 'true'/'false'
    if ( $b ) {
        return 'true';
    } else {
        return 'false';
    }
}

function getD($a,$b,$c) { //Получение дискриминанта D квадратного уравнения вида ax2+bx+c=0
    return $b**2-4*$a*$c;
}

assert(0 == getD(1,2,1));
assert(-23 == getD(2,3,4));
assert(-800 == getD(10,20,30));

function addPlus($k) { //Добавляет плюс перед положительным числом при необходимости
    if ($k < 0) {
        return '';
    } else {
        return '+';
    }
}

function getGenderByName ($name) { //Возвращает пол человека, по его имени
    $s = mb_substr($name,-1); //последняя буква имени
    if ( strpos('ая',$s) !== false) {
        return 'женский';
    } else if ( strpos('йнртмхмпвдл',$s) !== false) {
        return 'мужской';
    } else {
        return null;
    }

}

assert( 'мужской' == getGenderByName('Владимир') );
assert( 'мужской' == getGenderByName('Иван') );
assert( 'мужской' == getGenderByName('Алексей') );
assert( 'мужской' == getGenderByName('Михаил') );
assert( 'женский' == getGenderByName('Анна') );
assert( 'женский' == getGenderByName('Мария') );
assert( null == getGenderByName('Любовь') );

?>