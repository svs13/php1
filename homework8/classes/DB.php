<?php

class DB
{

    protected $dbh;

    public function __construct(string $path)
    {

        $c = require $path;

        if ( is_array($c) ) {
            if ( isset( $c['dsn'], $c['username'], $c['password'] ) ) {

                $this->dbh = new PDO( $c['dsn'], $c['username'], $c['password']);

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

    public function query(string $sql, array $data)
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


