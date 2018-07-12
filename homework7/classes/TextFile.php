<?php

class TextFile
{
    protected $path;
    protected $data;


    public function __construct($path)
    {
        $this->path = $path;

        if ( is_readable($this->path) ) {
            $this->data = file( $this->path, FILE_IGNORE_NEW_LINES );
        } else {
            $this->data = [];
        }
    }


    public function getData()
    {
        return $this->data;
    }


    public function save()
    {
        file_put_contents( $this->path, implode("\n", $this->data) );
    }

}