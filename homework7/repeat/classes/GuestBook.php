<?php

require __DIR__ . '/GuestBookRecord.php';

class GuestBook
{
    protected $records;

    public function __construct()
    {
        $lines = file( __DIR__ . '/../data.txt', FILE_IGNORE_NEW_LINES );
        $this->records = []; //если NULL и к NULL[] - может быть ошибка.
        foreach ($lines as $line) {
            $this->records[] = new GuestBookRecord($line);
        }
        //в итоге получили массив объектов

    }


    public function getRecords()
    {
        return $this->records;
    }

    public function add(GuestBookRecord $record) //тайп хинтинг GuestBookRecord
    {
        $this->records[] = $record;
    }

}