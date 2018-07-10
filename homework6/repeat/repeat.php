<html>
    <head>
        <title>PHP-1. Урок 5. Повторение</title>
    </head>
    <body>
        <h1>PHP-1. Урок 5. Повторение</h1>

        <h4>Класс</h4>
        <?php

        class Table
        {
            public $color;
            public $leds;

            public function show()
            {
                echo 'Я - стол!';
                echo 'Мой цвет: ' . $this->color;
            }
        }

        ?>

        <h4>Создаем новый объект класса Table</h4>
        <?php

        var_dump( new Table );
        $table = new Table;

        $table->color = 'red';
        $table->leds  = 4;

        $table1 = new Table;

        $table1->color = 'red';
        $table1->legs  = 4;

        $table2 = new Table;

        $table2->color = 'black';
        $table2->legs  = 3;

        ?>


        <h4>Создание метода (ф-и объекта)</h4>
        <h5>добавлен метод public function show() в класс Table</h5>
        <?php

        $table->show();

        ?>


        <h4>Свойство защищённое - protected. Модификатор доступа - protected</h4>
        <?php

        class Table1
        {
            public $color;
            protected $leds;

            public function setLegsCount($count)
            {
                if ($count < 1) {
                    die('Неверноек количество ножек. СТРОКА 67');
                }
                $this->legs = $count;
            }

            public function show()
            {
                echo 'Я - стол!';
                echo 'Мой цвет: ' . $this->color;
                echo 'У мены ног: ' . $this->legs;
            }
        }

        $table = new Table1;

        $table->color = 'red';
        $table->setLegsCount(3);

        $table->show();

        ?>


        <h4>Повторное определние класса</h4>
        <h5>До повторного определения</h5>
        <?php var_dump( new Table ); ?>
        <h5>После повторного определения. ФАТАЛЬНАЯ ОШИБКА при повторном определении </h5>
        <?php

        /*
        class Table
        {
        public $legs;
        }

        var_dump( new Table );
        */
        ?>




        <h4>Наследование и parent::showColor();</h4>
        <?php

        class Item2
        {
            public $color;
            public $weight;

            public function showColor()
            {
                echo 'Мой цвет: ' . $this->color;
            }
        }

        class Table2 extends Item2
        {
            public $legs;

            public function show()
            {
                echo 'Я стол. ';
                parent::showColor();
            }
        }

        $table = new Table2;
        $table->color = 'red';
        $table->weight = 14;
        $table->legs = 4;

        $table->show();

        ?>


        <h4>Конструктор</h4>
        <?php

        class Item3
        {
            protected $color;
            public $weight;

            public function __construct($color)
            {
                $this->color = $color;
            }

            public function showColor()
            {
                echo 'Мой цвет: ' . $this->color;
            }
        }

        class Table3 extends Item3
        {
            public $legs;

            public function show()
            {
                echo 'Я стол. ';
                parent::showColor();
            }

            public function getThis()
            {
                return $this;
            }

        }

        $table = new Table3('black');
//        $table->color = 'red';
        $table->weight = 14;
        $table->legs = 4;

        $table->show();


        ?>

        <h4> mime_content_type ('') </h4>
        <?php
        var_dump( mime_content_type('') );
        ?>

        <h4> var_dump( mime_content_type(__DIR__ . '/repeat.php') ) </h4>
        <?php
        var_dump( mime_content_type(__DIR__ . '/repeat.php') );
        ?>

        <h4>  var_dump( is_uploaded_file('') ) </h4>
        <?php
        var_dump( is_uploaded_file('') );
        ?>

        <h4>( new Table3('') )->show();</h4>
        <?php

        ( new Table3('') )->show();

        ?>

        <h4>pathinfo('/path/emptyextension.');</h4>
        <?php  var_dump( pathinfo('/path/emptyextension.') );  ?>

        <h4>pathinfo('');</h4>
        <?php  var_dump( pathinfo('') );  ?>

        <h4>pathinfo('', PATHINFO_DIRNAME)</h4>
        <?php  var_dump( pathinfo('', PATHINFO_DIRNAME) );  ?>

        <h4>pathinfo('', PATHINFO_BASENAME)</h4>
        <?php  var_dump( pathinfo('', PATHINFO_BASENAME) );  ?>

        <h4>pathinfo(NULL);</h4>
        <?php  var_dump( pathinfo(NULL) );  ?>

        <h4>pathinfo(NULL, PATHINFO_DIRNAME)</h4>
        <?php  var_dump( pathinfo(NULL, PATHINFO_DIRNAME) );  ?>

        <h4>pathinfo(NULL, PATHINFO_BASENAME)</h4>
        <?php  var_dump( pathinfo(NULL, PATHINFO_BASENAME) );  ?>

        <h4>pathinfo('one.jpg')</h4>
        <?php  var_dump( pathinfo('one.jpg') );  ?>

        <h4>str_replace('one', 'two', 'one.one.one', 1)</h4>
        <?php  var_dump( str_replace('one', 'two', 'one.one.one', 2) );  ?>


    </body>
</html>

