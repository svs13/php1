<?php


namespace App\Models;


class Train
{
    protected $number;
    protected $route;
    protected $timeDeparture;
    protected $timeTravel;

    public function __construct($number, $route, $timeDeparture, $timeTravel)
    {
        $this->number = $number;
        $this->route = $route;
        $this->timeDeparture = $timeDeparture;
        $this->timeTravel = $timeTravel;
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function getTimeDeparture()
    {
        return $this->timeDeparture;
    }

    public function getTimeTravel()
    {
        return $this->timeTravel;
    }

}