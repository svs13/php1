<?php

namespace App\Models;


class File
{
    protected $path;
    protected $data = null;

    public function __construct(string $path)
    {
        $this->path = realpath($path);

        if ( file_exists( $this->path ) ) {

            $this->data = file_get_contents( $this->path );
        }

    }

    public function getData()
    {
        return $this->data;
    }

    public function setData(string $data)
    {
        $this->data = $data;

        return $this;
    }

    public function save()
    {
        if ( isset($this->data) ) {

            file_put_contents($this->path, $this->data);

        }
    }

}