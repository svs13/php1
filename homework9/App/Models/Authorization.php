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

        $username = $this->getUsernameFromSession();

        if ( null !== $username ) {
            if ( $this->isFindUsername($username) ) {

                $this->username = $username;
            }
        }

    }


    public function getUsername()
    {
        return $this->username;
    }


    public function login(string $login, string $password)
    {
        $user = $this->findUser($login); //логин и хэш-пароль пользователя специально не храню в св-вах.

        if ( null !== $user ) {
            if ( password_verify( $password, $user->getHashPassword() ) ) { //проверка пароля
                if ( $this->session->setValue('username', $user->getUsername() ) ) { // метим пользователя, иначе не авторизуем

                    $this->username = $user->getUsername(); //пользователь авторизован

                    return true;
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
        $username = $this->session->getValue('username');

        if ( null !== $username ) {
            if ( is_string($username) ) {

                return $username;
            }
        }

    }


    protected function isFindUsername($username)
    {
        $sql = 'SELECT username FROM users WHERE username=:us';
        $data = $this->database->query( $sql, [ ':us' => $username ] );

        if ( is_array($data) ) {

            return isset( $data[0] );//row есть, значит username тоже есть. Ответу БД доверяем.
        }

        return false;
    }


    protected function findUser($login)
    {
        $sql = 'SELECT * FROM users WHERE login=:login';
        $data = $this->database->query( $sql, [ ':login' => $login ] );

        if ( is_array($data) ) {
            if ( isset( $data[0] ) ) {

                $row = $data[0];

                return new User( $row['login'], $row['hashPassword'], $row['username'] );
            }
        }

    }


}


