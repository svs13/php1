<?php


namespace App\Models;


class User
{
    protected $login;
    protected $hashPassword;
    protected $username;


    public function __construct(string $login, string $hashPassword, string $username)
    {
        $this->login = $login;
        $this->hashPassword = $hashPassword;
        $this->username = $username;
    }


    public function getLogin()
    {
        return $this->login;
    }


    public function getHashPassword()
    {
        return $this->hashPassword;
    }


    public function getUsername()
    {
        return $this->username;
    }


}