<?php


namespace App\Models;


class Authorization
{

    protected $username = null; // == null если не авторизован.

    protected $database;
    protected $session;


    public function __construct()
    {
        $this->database = new DB();
        $this->session = new Session();

        $us = $this->getUsernameFromSession();

        if ( null !== $us ) {
            if ( $this->isFindUsername($us) ) {

                $this->username = $us;
            }
        }

    }


    public function getUsername()
    {
        return $this->username;
    }


    public function login(string $login, string $password)
    {
        $us = $this->findUser($login); //логин и хэш-пароль пользователя специально не храню в св-вах.

        if ( null !== $us ) {
            if ( $us->getLogin() === $login ) { //проверяем тот ли логин получили при поиске пользователя
                if ( password_verify( $password, $us->getHashPassword() ) ) { //проверка пароля
                    if ( $this->session->setValue('username', $us->getUsername() ) ) { // метим пользователя, иначе не авторизуем
                        $this->username = $us->getUsername(); //пользователь авторизован

                        return true;
                    }
                }
            }
        }

        return false;
    }


    public function logout()
    {
        if ( null !== $this->username ) {

            $this->session->destroy();
            $this->username = null;
        }
    }


    protected function getUsernameFromSession()
    {
        $us = $this->session->getValue('username');

        if ( null !== $us ) {
            if ( is_string($us) ) {

                return $us;
            }
        }

    }


    protected function isFindUsername($username)
    {
        $sql = 'SELECT username FROM users WHERE username=:us';
        $ar = $this->database->query( $sql, [ ':us' => $username ] );

        if ( is_array($ar) ) {
            if ( isset( $ar[0] ) ) {
                if ( isset( $ar[0]['username'] ) ) {
                    if ( $ar[0]['username'] === $username ) {

                        return true;
                    }
                }
            }
        }

        return false;
    }


    protected function findUser($login)
    {
        $sql = 'SELECT * FROM users WHERE login=:login';
        $ar = $this->database->query( $sql, [ ':login' => $login ] );

        if ( is_array($ar) ) {
            if ( isset( $ar[0] ) ) {
                if ( isset( $ar[0]['login'], $ar[0]['hashPassword'], $ar[0]['username'] ) ) {

                    return new User( $ar[0]['login'], $ar[0]['hashPassword'], $ar[0]['username'] );
                }
            }
        }

    }


}


