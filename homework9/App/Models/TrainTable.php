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
            $data = $this->dataBase->query($sql);

            $this->trains = [];

            if ( is_array($data) ) { //записи есть

                foreach ($data as $row) {

                    $this->trains[ $row['id'] ] = new Train( $row['number'], $row['route'], $row['timeDeparture'], $row['timeTravel'] );
                }
            }
        }

        return $this->trains;
    }


    public function addTrain(Train $train)
    {

        $sql = 'INSERT INTO trains (number, route, timeDeparture, timeTravel) VALUE (:n, :r, :tD, :tT)';
        $params = [
            ':n' => $train->getNumber(),
            ':r' => $train->getRoute(),
            ':tD' => $train->getTimeDeparture(),
            ':tT' => $train->getTimeTravel(),
        ];

        if ( false === $this->dataBase->query($sql, $params) ) {

            return false;
        }

        $this->trains = null; //данные в БД обновились

        return true;
    }


    public function updateTrain($id, Train $train)
    {

        $sql = 'UPDATE trains SET number=:n, route=:r, timeDeparture=:tD, timeTravel=:tT WHERE id=:id';
        $params = [
            ':id' => $id,
            ':n' => $train->getNumber(),
            ':r' => $train->getRoute(),
            ':tD' => $train->getTimeDeparture(),
            ':tT' => $train->getTimeTravel(),
        ];


        if ( false === $this->dataBase->query($sql, $params) ) {

            return false;
        }

        $this->trains = null; //данные в БД обновились

        return true;
    }


    public function delTrain($id)
    {

        $sql = 'DELETE FROM trains WHERE id=:id';
        $params = [
            ':id' => $id,
        ];

        if ( false === $this->dataBase->query($sql, $params) ) {

            return false;
        }

        $this->trains = null; //данные в БД обновились

        return true;
    }

}