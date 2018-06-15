<html>
    <head>
        <title>PHP-1</title>
    </head>
    <body>
        <h1>PHP</h1>
        <p>1 урок</p>
        <p>Домашнее задание</p>
        <p><b>Пункт 1</b></p>

        <p>Вывод INT_MAX</p>
        <?php echo INT_MAX; ?>

        <p>Вывод PHP_INT_MAX</p>
        <?php echo PHP_INT_MAX; ?>

        <p>Сравнение</p>
        <?php var_dump( '012' == '12'); ?>

        <p>Случайное число rand()</p>
        <?php echo rand(); ?>

        <p>Замена str_replace();</p>
        <?php echo str_replace('a','b','aabb'); ?>

        <p>Мануал сила</p>

        <p><b>Пункт 2</b></p>
        Сделано

        <p><b>Пункт 3</b></p>

        <p>Исследуем:</p>
        <p>1. 3 / 1 : <?php var_dump( 3 / 1 ); ?></p>
        <p>__ 3 / 2 : <?php var_dump( 3 / 2 ); ?></p>
        <p>__ intdiv(3, 2); : <?php var_dump( intdiv(3, 2) ); ?></p>
        <p>2. 1 / 3 : <?php var_dump( 1 / 3 ); ?></p>
        <p>3. '20cats' + 40 : <?php var_dump( '20cats' + 40 ); ?></p>
        <p>__ '30cats' + 40 : <?php var_dump( '30cats' + 40 ); ?></p>
        <p>__ 'aa20cats' + 40 : <?php var_dump( 'aa20cats' + 40 ); ?></p>
        <p>__ '+20cats' + 40 : <?php var_dump( '+20cats' + 40 ); ?></p>
        <p>__ '-20cats' + 40 : <?php var_dump( '-20cats' + 40 ); ?></p>
        <p>__ 'a+20cats' + 40 : <?php var_dump( 'a+20cats' + 40 ); ?></p>
        <p>__ $a = '-20cats'; $a + 40 , $a .. неизменно :
            <?php
            $a = '-20cats';
            $b = $a + 40;
            var_dump( $b );
            var_dump( $a );
            ?></p>
        <p>4. 18 % 4 : <?php var_dump( 18 % 4 ); ?></p>
        <p>__ 18 % 18 : <?php var_dump( 18 % 18 ); ?></p>
        <p>__ 18 % 9 : <?php var_dump( 18 % 9 ); ?></p>
        <p>__ 18 % 9.2 : <?php var_dump( 18 % 9.2 ); ?></p>
        <p>__ 18 % 5 : <?php var_dump( 18 % 5 ); ?></p>
        <p>__ -18 % 4 : <?php var_dump( -18 % 4 ); ?></p>
        <p>__ 18 % -4 : <?php var_dump( 18 % -4 ); ?></p>
        <p>__ fmod(18.5,4.3) : <?php var_dump( fmod(18.5,4.3) ); ?></p>

        <p><b>Пункт 4</b></p>
        <p>1. echo ($a = 2); : <?php echo ($a = 2); ?></p>
        <p>__ echo ($a = 5); : <?php echo ($a = 5); ?></p>
        <p>__ echo ($a = '2'); : <?php echo ($a = '2'); ?></p>
        <p>__ var_dump(($a = '2')); : <?php var_dump(($a = '2')); ?></p>
        <p>__ var_dump($a = '2'); : <?php var_dump($a = '2'); ?></p>
        <p>2. $x=($y=12)-8; echo $x : <?php $x=($y=12)-8; echo $x; ?></p>
        <p>__ echo ($x=1)+(y=12); : <?php echo ($x=1)+($y=12); ?></p>

        <p><b>Пункт 5</b></p>
        <p>1. 1 == 1.0 : <?php var_dump(1 == 1.0); ?></p>
        <p>__ 1 == 1.1 : <?php var_dump(1 == 1.1); ?></p>
        <p>2. 1 === 1.0 : <?php var_dump(1 === 1.0); ?></p>
        <p>3. '02' == 2 : <?php var_dump('02' == 2); ?></p>
        <p>4. '02' === 2 : <?php var_dump('02' === 2); ?></p>
        <p>5. '02' == '2' : <?php var_dump('02' == '2'); ?></p>

        <p><b>Пункт 6</b></p>
        <p> var_dump($x); :
        <?php
        $x = true xor true;
        var_dump($x);
        ?>
        </p>
        <p>__ var_dump($x = true xor true); :
        <?php var_dump($x = true xor true); ?>
        </p>
    </body>
</html>
