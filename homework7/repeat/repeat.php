<?php

//declare( strict_types=1 ); //строгий режим контроля типов НЕ ГОВОРИТЬ СТРОГАЯ ТИПИЗАЦИЯ - это ошибка.

?>


<html>
    <head>
        <title>PHP-1. Урок 7. Повторение</title>
    </head>
    <body>
        <h1>PHP-1. Урок 7. Повторение</h1>

        <h4>gettype( $obj ) //object </h4>
        <?php

        class SomeClass
        {
            public $msg;
        }

        $obj = new SomeClass;
        echo gettype( $obj );

        ?>


        <h4>get_class( $obj ) //SomeClass</h4>
        <?php

        echo get_class( $obj );

        ?>


        <h4>type hinting (Тайп-хинтинг)</h4>
        <?php

        function sum(int $a, int $b) {

            return $a + $b;
        }

        var_dump( sum(2.5, 3.2) );

        ?>


        <h4>Type hinting + class</h4>
        <?php

        class User
        {
            public $email;
        }

        function send(User $user, string $message)
        {
            echo 'Sent';
        }

        $user = new User();

        send($user, 'Hello!');

        //send('str', 'Hello!'); //Фатальная ошибка

        ?>


        <h4>Оператор instanceof</h4>
        <?php

        class Admin extends User
        {

        }

        $user = new User(); //true
        $user = 'test'; //false
        $user =  new Admin(); // TRUE - потому что Admin это тоже User!!!

        if ($user instanceof User) {
            echo 'Это пользователь';
        }

        ?>

        <h4>Объекто-ориентированный подход</h4>

        <a href="/homework7/repeat/index.php"> Здесь </a>


        <h4>БУФЕР ВЫВОДА для накопления буфера</h4>
        <?php

        ob_start(); //ставит платину, здесь начинает накапливаться всё, все кораблики
        echo 'Hello!';
        ?> World <?php

        $contents = ob_get_contents();

        ob_end_clean(); //очищает накопленный буфер, воду спускает - кораблики уничтожает
        //ob_end_flush(); // весь буфер отправляется клиенту

        var_dump($contents);
        ?>


        <h4>шаги ОТДЕЛЕНИЯ ПРЕДСТАВЛЕНИЯ ОТ БИЗНЕС-ЛОГИКИ</h4>
        ===Логика представления===<br>
        1. Сверстать шаблон:
        <a href="/homework7/repeat/templates/index.php"> ссылка </a><br>
        2. Определить данные, которые надо передавать:
        <a href="/homework7/repeat/index1.php"> ссылка </a><br>
        3. Подготовить данные, получив их от моделей<br>
        4. Передать данные в шаблон<br>
        5. В шаблоне отобразить эти даные ЛОГИКА ПРЕДСТАВЛЕНИЯ<br>
        6. Спец объект, который будет хранить в себе данные и отображать шаблон с этими данными<br>




    </body>
</html>
