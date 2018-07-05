<?php

header('Set-Cookie: foo=42');
setcookie('foo', 24);

session_start();

?>


Пример готов<br>

<h4>echo true === $_POST['aaa'];</h4>
<?php
echo true === $_POST['aaa'];
?>

<h4>Время в формате unix. time()</h4>
<?php
    echo time();
?>

<h4>Дата/время date()</h4>
<?php
echo date("Y-m-d H:i:s");
?>

<h4>Дата/время по гринвичу gmdate()</h4>
<?php
echo gmdate("Y-m-d H:i:s");
?>

<h4>var_dump( $_COOKIE );</h4>

<?php

var_dump( $_COOKIE );

?>

<h4>var_dump( $_SESSION );</h4>

<?php

//session_start(); // вызовет ошибку, т.к. вывод в поток уже был, заголовки сервер уже отослал

var_dump( $_SESSION );

?>

<h4> Хэш текста '12345' </h4>
<?php

echo sha1('12345');

?>

<h4> Хэширование паролей </h4>
<?php

$users = [
    ['login' => 'Vasya', 'password' => '40bd001563085fc35165329ea1ff5c5ecbdbbeef'],
    ['login' => 'Petya', 'password' => '456'],
];

echo sha1('123');
echo "\n";

$form = ['login' => 'Vasya', 'password' => '123'];

var_dump(
    sha1($form['password']),
    $users[0]['password']
);

?>

<h4> password_hash('123456',  PASSWORD_DEFAULT)</h4>
<?php

echo password_hash('123456', PASSWORD_DEFAULT);

$hash = '$2y$10$kcTUc04QkWrucPxgZpHPBeyPO0T9av1bsTC0xuhv41C0QOw6PhgRq'; //допустим хранится в базе данных
$password = '123456';

?>

<h4> password_verify($password, $hash)</h4>
<?php

var_dump( password_verify($password, $hash) );

$hash = '$2y$10$kcTUc04QkWrucPxgZpHPBeyPO0T9av1bsTC0xuhv41C0QOw6PhgRq'; //допустим хранится в базе данных
$password = '123456';

?>

<h4> проверка перезапишет ли ф-я $a = 1; func($a); echo $a; ВЫВОД - НЕТ</h4>
<?php
$a = 1;

function func($b) {
    $b = 2;
}

echo $a;

?>

<h4> что возвратит ф-я без необязательного оператора возврата return?</h4>
<?php

function aaa(){

}
    var_dump( aaa() );
?>

<h4> что возвратит ф-я bbb(): void ?</h4>
<?php

function bbb():void
{

}
    var_dump( bbb() );
?>


<h4> echo implode('=',['aa' => 'bb', 'cc' => 'dd']); Только значения </h4>
<?php

echo implode('=', ['aa' => 'bb', 'cc' => 'dd'] );

?>


