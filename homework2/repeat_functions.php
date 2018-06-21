<?php
const PI = 13;
echo '_include_PI_'.PI; //константа PI не перезаписана и ошибок выдало, После изм. конфига - ошибка. Порядок.

const NEXT_CONST = 10;
const NEXT_CONST = 20; // повторное переопределение - ошибок нет. После изм. конфига - ошибка. Порядок.
echo '_include_NEXT_CONST=20:' . NEXT_CONST;

function circle($r) {
    return PI*$r*$r;
}

assert(0 == circle(0));
assert(PI == circle(1));
assert(100*PI == circle(10));

