<?php
/**
 * Created by PhpStorm.
 * User: svs
 * Date: 12.07.18
 * Time: 13:01
 */

class File
{
    protected $path;
    protected $data;

    public function __construct($path)
    {
        $this->path = $path;

        if ( file_exists($this->path) ) {

            $this->data = file_get_contents($this->path);

        } else {

            $this->data = NULL;

        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function append($text)
    {
        $this->data .= $text;
    }

    public function save()
    {
        if ( isset($this->data) ) {

            file_put_contents($this->path, $this->data);

        }
    }

}