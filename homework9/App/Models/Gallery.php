<?php

namespace App\Models;


class Gallery
{
    protected $images;
    protected $path;
    protected $imgTypes = ['image/png', 'image/jpeg'];

    public function __construct()
    {

        $this->path = realpath( __DIR__ . '/../../images' );
        $files = scandir( $this->path );

        if ( !is_array( $files ) ) {

            //Фатальная ошибка
        }

        $files = array_diff( $files, ['.', '..'] );

        $this->images = [];

        foreach ($files as $filename) {

            //В галерее должны быть только изображения
            if ( in_array( $this->getMimeType( $this->path . '/' . $filename ),  $this->getImgTypes() ) ) {

                $this->images[] = new Image($filename);
            }

        }

    }

    public function getImages()
    {
        return $this->images;
    }

    public function getImageById(string $id)
    {
        if ( isset( $this->images[$id] ) ) {

            return $this->images[$id];
        }

    }

    public function getImgTypes()
    {
        return $this->imgTypes;
    }

    public function getPath()
    {
        return $this->path;
    }

    protected function getMimeType( $path ) //MIME тип содержимого файла
    {
        $res = mime_content_type($path);

        if ( false !== $res ) { // если без ошибок

            return $res;
        }

    }

}