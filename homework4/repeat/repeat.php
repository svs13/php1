<html>
    <head>
        <title>PHP-1. Урок 4. Повторение</title>
    </head>
    <body>
        <h1>PHP-1. Урок 4. Повторение</h1>

        <h4>Цикл while (условие) { тело цикла } </h4>

        <?php

        $i = 0;

        while (true) {

            $i = $i + 1;
            echo $i;

            if ($i >= 10) {
                break;
            }
        }

        echo 'Done';

        ?>

        <h4>Цикл do { тело цикла } while (условие) - цикл с пост-условием</h4>

        <?php

        $i = 0;

        do {
            echo $i;
            $i++;
        } while ($i <= 10);

        echo 'Done1';

        ?>

        <h4>Операция инкремента $x++; для строки А</h4>
        <?php $x = 'A'; $x++; echo $x; ?>
        <h4>тоже для Z</h4>
        <?php $x = 'Z'; $x++; echo $x; ?>
        <h4>тоже для A1</h4>
        <?php $x = 'A1'; $x++; echo $x; ?>
        <h4>тоже для 1A</h4>
        <?php $x = '1A'; $x++; echo $x; ?>
        <h4>тоже для a1b</h4>
        <?php $x = 'a1b'; $x++; echo $x; ?>
        <h4>Операция $x = $x + $x; для строки А вызовет предупреждение, т.к. требуется числовое значение строки</h4>
        <?php $x = 'A'; $x= $x + 1; echo $x; ?>
        <h4>Операция декремента $x--; для строки А</h4>
        <?php $x = 'A'; $x--; echo $x; ?>
        <h4>тоже для C</h4>
        <?php $x = 'C'; $x--; echo $x; ?>

        <h3>Работа с файлами. Чтение файла</h3>

        <h4>echo __DIR__ . '/test.txt';</h4>
        <?php echo __DIR__ . '/test.txt'; ?>

        <h4>fopen(). fgets() - считывает строку и сдвигает внутренний указатель</h4>

        <?php

        var_dump(
        fopen( __DIR__ . '/test.txt', 'r' )
        );

        $fh = fopen( __DIR__ . '/test.txt', 'r' );
        $line = fgets($fh);
        echo $line;

        $line = fgets($fh);
        echo $line;

        $line = fgets($fh);
        echo $line;

        fclose($fh);

        ?>

        <h4>тоже циклом</h4>
        <?php
        $fh = fopen(__DIR__ . '/test.txt', 'r');
        while ( !feof($fh) ) {
            $line = fgets($fh);
            echo $line;
        }
        fclose($fh);
        ?>

        <h4>fread(ресурс, кол-во байт) - для получения содержимого файла целиком - filesize($filename) - возвращает кол-во байт файла целиком </h4>
        <?php
        $fh = fopen(__DIR__ . '/test.txt', 'r');
        while ( !feof($fh) ) {
            $line = fread($fh, 10);
            echo $line;
        }
        fclose($fh);
        ?>

        <h4>file_get_contents(__DIR__ . 'test.txt'); - возвращает всё содержимое файла в виде строки</h4>
        <?php var_dump( file_get_contents(__DIR__ . '/test.txt') ); ?>

        <h4>file() - возвращает содержимое файла в виде массива строк</h4>
        <?php
            $lines = file(__DIR__ . '/test.txt');
            var_dump($lines);
        ?>

        <h4>readfile() - читает и скидывает в поток, не помещая в память</h4>
        <?php
            $lines = readfile(__DIR__ . '/test.txt');
            var_dump($lines);
        ?>

        <h4>file_exists() - проверяет существует ли файл</h4>
        <?php
            var_dump( file_exists(__DIR__ . '/test.txt') );
        ?>

        <h4>is_readable() - проверяет существует ли файл и доступность для чтения</h4>
        <?php
            var_dump( is_readable(__DIR__ . '/test.txt') );
        ?>

        <h3>Работа с файлами. Запись в файл</h3>

        <h4>fwrite() - запись в файл</h4>
        <?php

        $fh = fopen(__DIR__ . '/test.txt', 'a');
        fwrite($fh, "\n" . 'Привет!');
        fwrite($fh, PHP_EOL . 'PHP_EOL');
        fclose($fh);

        ?>

        <h4>PHP_EOL</h4>
        <a href="http://php.net/manual/ru/reserved.constants.php">Предопределенные константы</a><br>
        <?php echo PHP_EOL; ?>

        <h4>file_put_contents(__DIR__ . '/test.txt', 'Привет') - запись в файл </h4>
        <a href="http://php.net/manual/ru/reserved.constants.php">Предопределенные константы</a><br>
        <?php file_put_contents(__DIR__ . '/test.txt', 'Привет') ?>

        <h4>Спец код для вставки содержимого картинки в код html </h4>
        <img
            src="data:image/gif;base64,R0lGODdhMAAwAPAAAAAAAP///ywAAAAAMAAw
            AAAC8IyPqcvt3wCcDkiLc7C0qwyGHhSWpjQu5yqmCYsapyuvUUlvONmOZtfzgFz
            ByTB10QgxOR0TqBQejhRNzOfkVJ+5YiUqrXF5Y5lKh/DeuNcP5yLWGsEbtLiOSp
            a/TPg7JpJHxyendzWTBfX0cxOnKPjgBzi4diinWGdkF8kjdfnycQZXZeYGejmJl
            ZeGl9i2icVqaNVailT6F5iJ90m6mvuTS4OK05M0vDk0Q4XUtwvKOzrcd3iq9uis
            F81M1OIcR7lEewwcLp7tuNNkM3uNna3F2JQFo97Vriy/Xl4/f1cf5VWzXyym7PH
            hhx4dbgYKAAA7"
            alt="Larry" />

        <h4>Запись с 6-го байта файла 'Test' fseek() - сдвигает внутренний указатель файла</h4>
        <?php

        $fh = fopen(__DIR__ . '/test.txt', 'r+');
        fseek($fh, 6);
        fwrite($fh, 'Test');
        fclose($fh);

        ?>

        <h3>Список файлов</h3>

        <h4>scandir() - список файлов в виде массива, пригодится array_diff($list, ['.', '..'])</h4>
        <?php
            $list = scandir(__DIR__ . '/images');
            var_dump($list);
            $list = array_diff($list, ['.', '..']);
            var_dump($list);
        ?>
        <br>
        <?php

            foreach ($list as $img) {
                ?>
                <img src="/homework4/repeat/images/<?php echo $img; ?>">
                <?php
            }
        ?>

        <h4>dirname(__DIR__ . '/images') - полное имя род папки</h4>
        <?php
            echo dirname(__DIR__ . '/images');
        ?>

        <h4>pathinfo(__DIR__ . '/images/' . $list[2] ) - массив вида путь/имя.расш/имя/расширение файла</h4>
        <?php
        var_dump( pathinfo(__DIR__ . '/images/' . $list[2] ) );
        ?>

        <h4>тоже pathinfo( ' ./.?./game/  &!.=  ' , PATHINFO_BASENAME); </h4>
        <?php
        var_dump( pathinfo( ' ./.?./game/  &!.= .png ' , PATHINFO_BASENAME) );
        ?>

        <h4>тоже basename( ' ./.?./game/  &!.=  '); </h4>
        <?php
        var_dump( basename( ' ./.?./game/  &!.=  ') );
        ?>


        <h4>filesize(__DIR__ . '/images/1.jpg' )- размер файла</h4>
        <?php
        var_dump( filesize(__DIR__ . '/images/1.jpg' ) );
        ?>

        <h4>realpath(__DIR__ . '/images/1.jpg' ) - Возвращает канонизированный абсолютный путь к файлу аскрывает все символические ссылки, переходы типа /./, /../ и лишние символы / </h4>
        <?php
        var_dump( realpath(__DIR__ . '/images/1.jpg' ) );
        ?>


        <h3>Загрузка файлов</h3>

        <h4>Форма загрузки файлов</h4>

        <form action="/homework4/repeat/upload.php" method="post" enctype="multipart/form-data">

            <input type="file" name="myimage">

            <button type="submit">Давай!</button>

        </form>


    </body>
</html>


