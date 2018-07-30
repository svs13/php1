<?php


namespace App\Models;


class Session
{
    public function __construct()
    {
        $this->start();
    }


    public function start()
    {
        if ( $this->isActive() ) {

            return true;
        }

        return session_start(); //true - в случае успеха, иначе false
    }


    public function destroy()
    {
        if ( $this->isActive() ) {

            session_destroy();
        }
    }


    public function isActive()
    {
        if ( PHP_SESSION_ACTIVE === session_status() ) { // если механизм сессий вкл и сессия создана

            return true;
        }

        return false;
    }


    public function getValue(string $index)
    {
        if ( $this->isActive() ) {
            if ( isset( $_SESSION ) ) {
                if ( isset( $_SESSION[$index] ) ) {

                    return $_SESSION[$index];
                }
            }
        }

    }

    public function setValue(string $index, $value) {

        if ( $this->isActive() ) {
            if ( isset( $_SESSION ) ) {

                $_SESSION[$index] = $value;

                return true;
            }
        }

        return false;
    }

}

