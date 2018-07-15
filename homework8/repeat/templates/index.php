<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Сотрудники</title>
</head>
<body>

    <h1>Сотрудники</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Фамилия</th>
            <th>Возраст</th>
        </tr>
        <?php foreach ($data as $person) { ?>
            <tr>
                <td><?php echo $person['id']; ?></td>
                <td><?php echo $person['lastname']; ?></td>
                <td><?php echo $person['age']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>