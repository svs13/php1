<?php

namespace App\Models;

use App\Models\Person as Person;


class Persons
{

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=test';
        $this->dbh = new \PDO($dsn, 'root', '');

    }

    public function findAll()
    {

        $sql = 'SELECT * FROM persons';
        $sth = $this->dbh->prepare($sql);
        $sth->execute([':id' => 'Иванов']);

        $data = $sth->fetchAll();

        $ret = [];
        foreach ($data as $row) {
            $ret[] = new Person($row['id'], $row['lastname'], $row['age']);
        }

        return $ret;
    }

}