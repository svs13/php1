<?php

namespace App\Models;

class Person
{

    public $id;
    public $lastname;
    public $age;

    public function __construct($id, $lastname, $age)
    {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->age = $age;
    }
}