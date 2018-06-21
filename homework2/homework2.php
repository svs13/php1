<html>
    <head>
        <title>PHP-1. Урок 2</title>
    </head>
    <body>
        <h1>PHP-1. 2 урок</h1>
        <p><b>Домашняя работа</b></p>

        <p><b>Пункт 1</b></p>

        <?php
        include __DIR__ . '/functions.php';
        ?>

        Таблица истинности логического оператора &&
        <table cellspacing="0" border="1">
            <tbody align="center">
            <tr>
                <td>$a</td>
                <td>$b</td>
                <td>$a && $b</td>
            </tr>
            <tr>
                <td>false</td>
                <td>false</td>
                <td><?php echo boolToStr( false && false); ?></td>
            </tr>
            <tr>
                <td>true</td>
                <td>false</td>
                <td><?php echo boolToStr( true && false); ?></td>
            </tr>
            <tr>
                <td>false</td>
                <td>true</td>
                <td><?php echo boolToStr( false && true); ?></td>
            </tr>
            <tr>
                <td>true</td>
                <td>true</td>
                <td><?php echo boolToStr( true && true); ?></td>
            </tr>
            </tbody>
        </table>

        <br> Таблица истинности логического оператора ||
        <table cellspacing="0" border="1">
            <tbody align="center">
            <tr>
                <td>$a</td>
                <td>$b</td>
                <td>$a && $b</td>
            </tr>
            <tr>
                <td>false</td>
                <td>false</td>
                <td><?php echo boolToStr( false || false); ?></td>
            </tr>
            <tr>
                <td>true</td>
                <td>false</td>
                <td><?php echo boolToStr( true || false); ?></td>
            </tr>
            <tr>
                <td>false</td>
                <td>true</td>
                <td><?php echo boolToStr( false || true); ?></td>
            </tr>
            <tr>
                <td>true</td>
                <td>true</td>
                <td><?php echo boolToStr( true || true); ?></td>
            </tr>
            </tbody>
        </table>

        <br> Таблица истинности логического оператора xor
        <table cellspacing="0" border="1">
            <tbody align="center">
            <tr>
                <td>$a</td>
                <td>$b</td>
                <td>$a && $b</td>
            </tr>
            <tr>
                <td>false</td>
                <td>false</td>
                <td><?php echo boolToStr( false xor false); ?></td>
            </tr>
            <tr>
                <td>true</td>
                <td>false</td>
                <td><?php echo boolToStr( true xor false); ?></td>
            </tr>
            <tr>
                <td>false</td>
                <td>true</td>
                <td><?php echo boolToStr( false xor true); ?></td>
            </tr>
            <tr>
                <td>true</td>
                <td>true</td>
                <td><?php echo boolToStr( true xor true); ?></td>
            </tr>
            </tbody>
        </table>

        </table>

        <p><b>Пункт 2</b></p>

        <?php

        $a = -7;
        $b = -22;
        $c =-11;

        $d = getD($a,$b,$c);

        ?>

        Квадратное уравнение
        <?php echo $a; ?>&#183;x<sup>2</sup><?php echo addPlus($b) . $b; ?>&#183;x<?php echo addPlus($c) . $c; ?>=0
        <?php

        if ( $d > 0 ) { //D > 0 Уравнение имеет 2 решения
            $x1 = ( -$b + $d**0.5 ) / ( 2 * $a );
            $x2 = ( -$b - $d**0.5 ) / ( 2 * $a );
        ?>
            имеет 2 решения:<br>
            x<sub>1</sub> = <?php echo round( $x1, 3 ); ?><br>
            x<sub>2</sub> = <?php echo round( $x2, 3 ); ?><br>
        <?php

        } else if ( $d == 0 ) { //D == 0 Уравнение имеет 1 решение
            $x = -$b / ( 2 * $a );

        ?>
         имеет 1 решение:<br>
         x = <?php echo round( $x, 3 ); ?><br>
         <?php

        } else { //D < 0 Уравнение вещественных корней не имеет

        ?>
        вещественных корней не имеет <br>
        <?php

        }

        ?>

        <p><b>Пункт 3</b></p>

        Успешное включение файла :
        <?php
             var_dump(
                include __DIR__ . '/test.php'
             );
        ?>
        <br>

        Безуспешное включение файла :
        <?php
             var_dump(
                 include __DIR__ . '/null.php'
             );
        ?>
        <br>

        Успешное включение файла c выполнением return 'ok':
        <?php
            var_dump(
                include __DIR__ . '/test_return.php'
            );
        ?>

        <p><b>Пункт 4</b></p>

        __echo substr('Александр', -1) :
        <?php
        echo '__' . substr('Александр', -1); //читает побайтово
        echo '__' . substr('Александр', -2);
        ?>
        <br>

        __echo mb_substr('Александр', -1) :
        <?php
        echo '__' . mb_substr('Александр', -1); //читает посимвольно ( с учетом кодировки )

        ?>

        <br><br>

        <?php

        $name = 'Владимир';
        $gender = getGenderByName($name);
        echo 'Имя ' . $name . ', пол - ' . $gender;

        ?>

    </body>
</html>
