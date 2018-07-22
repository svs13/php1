<?php


namespace App\Models;


class TrainTable
{

    protected $trains = null;
    protected $dataBase;


    public function __construct()
    {
        $this->dataBase = new DB();

    }


    public function getTrains()
    {
        if ( null === $this->trains ) {

            $sql = 'SELECT * FROM trains ORDER BY id';
            $d = $this->dataBase->query($sql,[]);

            $this->trains = [];

            if ( is_array($d) ) { //записи есть

                foreach ($d as $ar) {
                    if ( isset( $ar['id'], $ar['number'], $ar['route'], $ar['timeDeparture'], $ar['timeTravel'] ) ) {

                        $this->trains[ $ar['id'] ] = new Train( $ar['number'], $ar['route'], $ar['timeDeparture'], $ar['timeTravel'] );
                    }
                }
            }
        }

        return $this->trains;

    }


    public function addTrain(Train $train)
    {

        $sql = 'INSERT INTO trains (number, route, timeDeparture, timeTravel) VALUE (:n, :r, :tD, :tT)';
        $ps = [ //params
            ':n' => $train->getNumber(),
            ':r' => $train->getRoute(),
            ':tD' => $train->getTimeDeparture(),
            ':tT' => $train->getTimeTravel(),
        ];

        $d = $this->dataBase->query($sql,$ps);

        if ( false === $d ) {

            return false;
        }

        $this->trains = null; //данные в БД обновились

        return true;
    }


    public function updateTrain($id, Train $train)
    {

        $sql = 'UPDATE trains SET number=:n, route=:r, timeDeparture=:tD, timeTravel=:tT WHERE id=:id';
        $ps = [ //params
            ':id' => $id,
            ':n' => $train->getNumber(),
            ':r' => $train->getRoute(),
            ':tD' => $train->getTimeDeparture(),
            ':tT' => $train->getTimeTravel(),
        ];

        $d = $this->dataBase->query($sql,$ps);

        if ( false === $d ) {

            return false;
        }

        $this->trains = null; //данные в БД обновились

        return true;
    }


    public function delTrain($id)
    {

        $sql = 'DELETE FROM trains WHERE id=:id';
        $ps = [ //params
            ':id' => $id,
        ];

        $d = $this->dataBase->query($sql,$ps);

        if ( false === $d ) {

            return false;
        }

        $this->trains = null; //данные в БД обновились

        return true;
    }

}