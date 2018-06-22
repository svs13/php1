<html>
    <head>
        <title>PHP-1. Урок 2</title>
    </head>
    <body>
        <h1>PHP-1. 2 урок</h1>
        <h2>Повторение урока</h2>
        (int)'42':
        <?php

        var_dump(
            (int)'42'
        );

        ?>
        <br>

        (bool)'':
        <?php

        var_dump(
            (bool)''
        );

        ?>
        <br>

        (bool)'Hi':
        <?php

        var_dump(
            (bool)'Hi'
        )

        ?>
        <br>

        <b>(bool)'0':
        <?php

        var_dump(
            (bool)'0'
        );

        ?>
        </b><br>

        (bool)0:
        <?php

        var_dump(
            (bool)0
        );

        ?>
        <br>

        (bool)12:
        <?php

        var_dump(
            (bool)12
        );

        ?>
        <br>

       (int)false:
        <?php

        var_dump(

            (int)false

        );

        ?>
        <br>

        (string)false:
        <?php

        var_dump(
            (string)false
        );

        ?>
        <br>

        (int)true:
        <?php

        var_dump(
            (int)true
        );

        ?>
        <br>

        (string)true:
        <?php

        var_dump(
            (string)true
        );

        ?>
        <br>

        <a href="http://php.net/manual/ru/language.types.type-juggling.php" target="_blank">Ссылка. Приведение типов</a><br>

        <br>

        <b>Ветвление.Оператор условия:</b>
        <?php

        $x = 42;
        $y = 42;

        if ( $x > $y ) {
            $max = $x;
        } elseif ( $x == $y) {
            echo 'Равны!';
        } else {
            $max = $y;
        }

        echo $max."aa"; //неизвестная переменная $max111

        ?>
        <br>

        x Операции с неизвестным именем (переменной) не вызывает ошибки/предупреждения, но на уроке вызывает ??? (из урока 1 - принимает значение null):
        <br>
        ПОСЛЕ ИЗМЕНЕНИЯ КОНФИГА PHP7.2 error_reporting = E_ALL Данная ошибка появилась. Возьму на заметку. (line 135,142,144)
        <br><br>

        <b>Ветвление.Оператор перебора:</b>
        <?php

        $color = 'black';

        switch ($color) {
            case 'red' :
            case 'pink' :
                echo 'Красный';
                break;
            case 'yellow' :
                echo 'Жёлтый';
                break;
            case 'green' :
                echo 'Зелёный';
                break;
            default:
                echo 'Неизвестный цвет';
                break;
        }

        switch ( true ) {
            case $color == 'black':
                echo ' Это чёрный цвет';
                break;
        }

        ?>
        <br><br>

        <b>Функция:</b>
        <?php

        function maxnumber($x, $y)
        {
            if ($x > $y) {
                $max = $x;
            }  else {
                $max = $y;
            }
            return $max;
        }

        $z = maxnumber(3,4);
        echo $z;

        ?>
        <br>

        x Функция с возвратом неизвестного имени (переменной) не вызывает ошибок/предупреждений:
        <br>
        ПОСЛЕ ИЗМЕНЕНИЯ КОНФИГА PHP7.2 error_reporting = E_ALL Данная ошибка появилась. Возьму на заметку.
        <?php

        function maxnumberError($x, $y)
        {
            if ($x > $y) {
                $max = $x;
            }  else {
                $max = $y;
            }
            return $maxError;
        }

        var_dump(
            maxnumberError(3,4)
        );

        ?>
        <br><br>

        Замкнутость контекста
        <?php

        $z = 42;

        function myfunc() {
            $z = 24;
            return $z;
        }

        echo $z;

        ?>
        <br>

        Вызов функции с недостающими аргументами:
        <?php

        //echo maxnumber(3);

        ?>
        <br>
        - вызвал ошибку, порядок.
        <br>

        Вызов функции с излишними аргументами:
        <?php

        echo maxnumber(3,4,5);

        ?>
        <br>
        - не вызвал ошибку.
        <br>

        Константы:
        <?php
        //по делу объявлять константу надо в начале программы.
        const PI = 3.14159;
        echo PI;
        //const PI = 3.14159*maxnumber(1,2); // Вызовет ошибку. порядок.

        ?>
        <br>

        Объявление константы PIX2X2 со значением PIX2*2 при наличии ниже объявления PIX2 - <b>предупреждение</b>, возьму на заметку
        <?php

        const PIX2X2 = PIX2*2;
        echo PIX2X2;

        ?>
        <br>

        Объявление константы PIX2 со значением PI*2 - без ошибок.
        <?php

        const PIX2 = PI*2;
        echo PIX2;

        ?>
        <br>

        Вывод в поток значения неизвестной константы  - предупреждение, В поток добавится имя этой константы, возьму на заметку.
        <?php

        echo PI_ERROR;

        ?>
        <br>

        Вывод в поток значения неизвестной функции  - фатал. ошибка, возьму на заметку.
        <?php

        //echo func_PI_ERROR();

        ?>
        <br>

        Если использовать функцию, объявленную ниже по коду ... Без ошибок, возьму на заметку:
        <?php
        echo myNextFunc();
        function myNextFunc() {
            return 'Hi';
        }
        ?>
        <br>

        Если объявить константу внутри функции (... НЕЛЬЗЯ так делать, но знать надо). Порядок - вызовет синтакс. ошибку:
        <?php
        function myFuncWithConst() {
            //const MYCONST = 1;
            return 'Hi';
        }
        ?>

        <br> <br>
        <b>Разделение программы на отдельные файлы</b> - АРХИТЕКТУРНО ВЕРНО. Выражение include (тоже для require)
        <br>
        Вызывает фатал. ошибку при вызове функции включаемого файла, если она расположена до включения этого файла.
        <br>
        <b>Но по мануалу "Однако все функции и классы, объявленные во включаемом файле, имеют глобальную область видимости."</b>
        <br>
        Следовательно глобальность появляется только по коду, рассположенному после включения файла. Возьму на заметку.
        <br>
        Вызывает предупреждение при выводе константы включаемого файла, если она выводится до включения этого файла. Возьму на заметку.
        <br>
        x В подключаемом файле переопределение константы PI - <b>ошибок не последовало, печально!!! Константа не перезаписана.</b> Возьму на заметку.
        <br>
        x После подключения файла при переопределении константы NEXT_CONST - <b>ошибок не последовало, печально!!! Константа не перезаписана.</b> Возьму на заметку.
        <br>
        x При повторном переопределении константы NEXT_CONST- также ошибок нет, печально. Возьму на заметку.
        <br>
        x При повторном переопределении в подключаемом файле NEXT_CONST - также ошибок нет, печально. Возьму на заметку.
        <br>
        При повторном определении функции circle() - фатал ошибка. Порядок.
        <br>
        x C require таже печаль, а ведь фаталить должен ... не спроста, 7.2х64 версия ведь.
        <br>
        ПОСЛЕ ИЗМЕНЕНИЯ КОНФИГА PHP7.2 error_reporting = E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT на error_reporting = E_ALL, все не выведенные ошибки ("печальки") появились. Это радует. Теперь порядок.
        <br>
        <b>Вывод: в конфиг PHP7.2 должен быть error_reporting = E_ALL</b>, возьму на заметку.
        <br>

        <?php

        //по делу надо include в начале программы писать. Но по мануалу не обязательно.
        //echo circle(300); // фатал. ошибка
        echo '_NEXT_CONST_before_include_' . NEXT_CONST;
        echo '_PI_' . PI;

        //include 'F:\OpenServer\OSPanel\domains\php1\homework2\repeat_functions.php';
        //include 'F:/OpenServer/OSPanel/domains/php1/homework2/repeat_functions.php';
        include __DIR__ . '/repeat_functions.php';
        //require __DIR__ . '/repeat_functions.php';

        echo '_circle(100)_' . circle(100);
        echo '_PI_' . PI;
        //x (проблема в конфиге) Печально - ошибок/предупреждений не вывело в умышленно ошибочных кодах ниже.
        echo '_NEXT_CONST_' . NEXT_CONST;
        const NEXT_CONST = 20;
        echo '_NEXT_CONST = 20_' . NEXT_CONST;
        const NEXT_CONST = 30;
        echo '_NEXT_CONST = 30_' . NEXT_CONST;
        //x (проблема в конфиге) Повторное определение констант ... ошибок нет. печально.

        //Повторное определение функции - фатал. ошибка. Порядок.
        //function circle($r) {
        //    return 'Hi';
        //}
        //echo '_circle';

        ?>
        <br><br>

        <a href="http://php.net/manual/ru/language.constants.predefined.php" target="_blank">Ссылка. Магические константы</a> Буду знать.

        <br><br>

        <b>Модульный тест. Утверждения assert</b>
        <br>
        Понятно.
        <br><br>

        А что если текст html '111' вставить внутрь функции ...
        <?php

        function myTestFunc() {
        ?>
        <br> 111
        <?php
        }

        myTestFunc();
        myTestFunc();
        myTestFunc();

        ?>
        <br>
        О как! Он и так даже может! Оно и логично, выполняется всё построчно. Возьму на заметку.

    </body>
</html>
