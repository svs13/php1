<?php

class DB
{

    protected $dbh;

    public function __construct()
    {
        $params = require __DIR__ . '/../configs/configDBHomework8.php';

        if ( is_array($params) ) {
            if ( isset( $params['dsn'], $params['username'], $params['password'] ) ) {

                $this->dbh = new PDO( $params['dsn'], $params['username'], $params['password']);

            }
        }

        if ( !isset( $this->dbh ) ) {
            //исключение.
            die('FatalError');
        }

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


