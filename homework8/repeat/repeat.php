<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Повторение</title>
</head>
<body>

<h4>Подключение базы данных</h4>
<?php
$dsn = 'mysql:host=localhost;dbname=test'; //имя источника данных , содержащее
// информацию необходимую для подключения к базе данных

$dbh = new PDO($dsn, 'root', '');

var_dump( $dbh ); //php data object

?>

<br><b>При отсутсвии соединения - фатальная ошибка</b>

<h4>Методы</h4>
<?php

$sth = $dbh->prepare('SELECT * FROM persons');
//staytmant handler - запрос который ещё не отправлялся

$sth->execute();

?>


<h4>ответ базы данных</h4>
<?php
$data = $sth->fetchAll(); // возвращаемое знаение
var_dump($data);
?>

<h4>Подключаем шаблон</h4>
<?php

//да. html теги не на месте в итоге
include __DIR__ . '/templates/index.php';

?>

<h4>1. ВСЕГДА ИСПОЛЬЗУЕМ PDO()</h4>
<h4>2. ВСЕГДА ИСПОЛЬЗУЕМ ПОДСТАНОВКУ В ЗАПРОСЫ</h4>

<h4>Подстановка в запросы</h4>
<?php

$sql = 'SELECT * FROM persons WHERE lastname=:id'; //id=:id шаблон запроса.
$sth = $dbh->prepare($sql);
//$sth->execute([':id' => $_GET['id']]); //а это данные, которые надо подставить (по типу)
$sth->execute([':id' => 'Иванов']); //а это данные, которые надо подставить (по типу)
//нельзя подставить название таблицы , название столбца.
// А ВОТ ДАННЫЕ - ВСЕГДА ПОДСТАНОВКОЙ.
//ПОЭТОМУ ВСЕГДА в 2 фазы делается.
$data = $sth->fetchAll(); // возвращаемое знаXение
var_dump($data);

//что-то не робит с SELECT * FROM persons WHERE id=1 UNION SELECT * FROM passwords
//не понимать )))

?>

<h4>Подключаем шаблон</h4>
<?php

//да. html теги не на месте в итоге
include __DIR__ . '/templates/index.php';

?>


<h4>realpath('')</h4>
<?php var_dump( realpath('') ); ?>

</body>
</html>
