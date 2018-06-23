<html>
    <head>
        <title>PHP-1. Урок 3</title>
    </head>
    <body>
        <h1>PHP-1. 3 урок</h1>
        <h2>Повторение урока</h2>

        <h3>Массивы</h3>

        <h4>Массив чисел [42, 45, 33, 18]:</h4>
        <?php

        $ages = [42, 45, 33, 18];
        var_dump( $ages );

        ?>

        <h4>Массив элементов разного типа [1, 13, 'bar', 'baz', 42]:</h4>
        <?php

        $foo = [1, 13, 'bar', 'baz', 42];
        var_dump( $foo );

        ?>

        <h4>Добавление элемента со значением 5 в массив $foo :</h4>
        <?php

        $foo[] = 5;
        var_dump( $foo );

        ?>

        <h4>Обращение к элементу массива по индексу $foo[3]:</h4>
        <?php

        var_dump( $foo[3] );

        ?>

        <h4>Указывание индекса явно $arr = [1=>'январь', 2=>'февраль', 'jan'=>'январь']:</h4>
        <?php

        $arr = [1=>'январь', 2=>'февраль', 'jan'=>'январь'];
        var_dump( $arr )

        ?>

        <h4>Вывод в поток значения элемента массива $arr['jan']:</h4>
        <?php

        echo $arr['jan'];

        ?>

        <h3>Многомерные массивы</h3>

        <h4>Многомерный массив:</h4>
        <?php

        $arr = [];
        $arr[1] = [10, 20, 30];
        $arr[2] = [100, 'jun', 300];
        $arr[3] = [1=>100, 'dec'=>'декабрь', 3=>300];

        var_dump( $arr );

        ?>

        <h4>Вывод в поток значения элемента многомерного массива $arr[3]['dec']:</h4>
        <?php

        echo $arr[3]['dec'];

        ?>


        <h3>Работа с массивами</h3>

        <h4>Цикл foreach</h4>
        <?php

        $arr = [1, 2, 3];

        foreach ($arr as $value) {
            echo '_' . $value;
        }
        ?>

        <h4>Тоже с индексами массива</h4>
        <?php

        $arr = [1, 2, 3];

        foreach ($arr as $index => $value) {
            echo '__' . $index . '=' . $value;
        }
        ?>

        <h4>Что может быть ключем массива?</h4>
        Из мануала, ключем может быть тип integer и string одновременно.
        <br><br>
        $arr2 = [1=>'a1', '1'=>'a2', ' 1'=>'a3', '1 '=>'a4', '1.5'=>'a5', 'true'=>'a6'] имеет вид:
        <br><br>
        <?php

        $arr2 = [1=>'a1', '1'=>'a2', ' 1'=>'a3', '1 '=>'a4', '1.5'=>'a5', 'true'=>'a6'];

        var_dump($arr2);

        ?>
        <br><br>
        Вывод - ключ типа строка с содержимым ТОЛЬКО ЧИСЛА преобразуется в число.

        <h4>Если в ключах массива попадают другие типы данных, что будет? Такого быть не долно, но знать надо</h4>
        <?php
        $arr2 = [1=>'a1', 1.25=>'a2', true=>'a3', false=>'a4', null=>'a5', '[1, 2, 3]'=>'a7', 4.99=>'a8'];

        var_dump($arr2);

        ?>
        <br>
        [1,2,3] Фатал. ошибка.
        <br>
        1.25 в int(1)
        <br>
        4.99 в int(4)
        <br>
        false в int(0)
        <br>
        null в string('')



        <h3>Функции для работы с массивами</h3>

        <h4>in_array() есть ли такое значение в значениях элементов массива</h4>
        <?php

        $el = 2;
        $res = in_array($el, $arr);

        var_dump($res);

        ?>

        <h4>array_merge() слияние</h4>
        ['a1'=>99, 1=>2, 2=>3, 'b'=>1] c [7=>4, 'a'=>5, 0=>6, 'a'=>7]
        <br><br>
        <?php

        $arr1 = ['a1'=>99, 1=>2, 2=>3, 'b'=>1];
        $arr2 = [7=>4, 'a'=>5, 0=>6, 'a'=>7, 'a1'=>66];
        $res = array_merge($arr1, $arr2);

        var_dump($res);

        ?>
        <br>
        Всё как в мануале описано. Числовые ключи начинаются с 0 и по порядку растут. Строковые ключи без изменений.
        <br>Значение совпадающего ключа перезаписываются последним массивом, при этом положение элемента не изменяется.

        <h4>array_interselect() "пересечение" ТОЛЬКО ЗНАЧЕНИЙ (ключи не сравниваются)</h4>
        ['a1'=>99, 1=>2, 2=>3, 'b'=>1] с
        <br>
        [7=>99, 'a'=>2, 0=>3, 'a'=>4, 'a1'=>66]
        <br><br>
        <?php

        $arr1 = ['a1'=>99, 1=>2, 2=>3, 'b'=>1];
        $arr2 = [7=>99, 'a'=>2, 0=>3, 'a'=>4, 'a1'=>66];

        $res = array_intersect($arr1,$arr2);

        var_dump($res);

        ?>
        <br>
        При этом ключ принимается основного массива.

        <h4>implode() кастинг массива в строку</h4>
        <?php

        $res = implode(',', $arr1);
        var_dump( $res );

        ?>

        <h4>explode() кастинг строки в массив </h4>
        <?php

        var_dump( explode(',', '1,5,8') );
        ?>

        <h4>Тоже но с указанием limit 2</h4>
        <?php

        var_dump( explode(',', '1,5,8', 2) );

        ?>



        <h3>Метод GET протокола HTTP</h3>

        <h4>Параметр id их GET запроса клиента</h4>
        is_null( $_GET['id'] ) вызывает ошибку, т.к. нет такого элемента.
        <br>
        array_key_exists() готовая функция есть! для проверки наличия ИНДЕКСА элемента в массиве
        (внутренние индексы многомерных массивов не ищет)
        <br><br>
        Результат: id=
        <?php

        if ( array_key_exists('id', $_GET) ) {
            echo $_GET['id'];
        } else {
            echo 'параметр серверу не передан';
        }

        ?>
        <br>
        <a href="repeat.php?id=42">Передать серверу параметр id со значением 42</a>



        <h3>Метод POST протокола HTTP</h3>

        <h4>POST. Передача параметров серверу через форму</h4>

        <form action="repeat.php" method="post">
            Передача параметра name серверу методом POST
            <br>
            <input type="text" name="name">
            <input type="submit">
        </form>

        POST. Параметр name =
        <?php

        if ( array_key_exists('name', $_POST) ) {
            echo $_POST['name'];
        } else {
            echo 'параметр серверу не передан';
        }

        ?>


        <h4>GET. Передача параметров серверу через форму</h4>

        <form action="repeat.php" method="get">
            Передача параметра name серверу методом GET
            <br>
            <input type="text" name="name">
            <input type="submit">
        </form>

        GET. Параметр name =
        <?php

        if ( array_key_exists('name', $_GET) ) {
            echo $_GET['name'];
        } else {
            echo 'параметр серверу не передан';
        }

        ?>

        <h4>POST. Передача данных в виде массива</h4>

        <b>Передача серверу одновременно двух параметров</b>
        <form action="repeat.php" method="post">
            Передать данные foo[1]=
            <br>
            <input type="text" name="foo[1]">
            <br>
            Передать данные foo[2]=
            <br>
            <input type="text" name="foo[2]">
            <br>
            <input type="submit">
        </form>

        <b>Передача серверу параметра foo[1]</b>
        <form action="repeat.php" method="post">
            Передать данные foo[1]=
            <br>
            <input type="text" name="foo[1]">
            <br>
            <input type="submit">
        </form>

        <b>Передача серверу параметра foo[2]</b>
        <form action="repeat.php" method="post">
            Передать данные foo[2]=
            <br>
            <input type="text" name="foo[2]">
            <br>
            <input type="submit">
        </form>

        var_dump( $_POST ) :
        <br><br>

        <?php

        var_dump( $_POST );

        ?>

    </body>
</html>