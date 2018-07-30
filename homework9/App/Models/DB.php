<?php

namespace App\Models;

class DB
{

    protected $dbh;

    public function __construct()
    {
        $path = realpath( __DIR__ . '/../../configs/configDB.php');
        $cfg = require $path;
        $this->dbh = new \PDO( $cfg['dsn'], $cfg['username'], $cfg['password']); //код "свой". Доп. проверки излишни
    }

    public function execute(string $sql)
    {
        $sth = $this->dbh->prepare( $sql ); //при неудаче возвращает либо false либо исключение

        if ( false === $sth ) {

            return false;
        }

        return $sth->execute(); //при успехе - true, неудаче - false
    }

    public function query(string $sql, array $data = [])
    {
        $sth = $this->dbh->prepare( $sql ); //при неудаче возвращает либо false либо исключение

        if ( false === $sth ) {

            return false;
        }

        if ( !$sth->execute($data) ) { //при успехе - true, неудаче - false

            return false;
        }

        return $sth->fetchAll(); // возвращает всегда массив
    }

}


