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

        if ( false === $this->path ) {

            die('FatalError. Class Gallery. Error in path');
        }

        $files = scandir( $this->path );

        if ( !is_array( $files ) ) {

            die('FatalError. Class Gallery. Error in path');
        }

        $files = array_diff( $files, ['.', '..'] );

        $this->images = [];

        foreach ($files as $file) {

            //В галерее должны быть только изображения
            if ( in_array( $this->getMimeType( $this->path . '/' . $file ),  $this->getImgTypes() ) ) {

                $this->images[] = new Image($file);
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

    public function getImgTypes(): array
    {
        return $this->imgTypes;
    }

    public function getPath()
    {
        return $this->path;
    }

    protected function getMimeType( $path ) //MIME тип содержимого файла
    {
        if ( file_exists($path) ) {

            $res = mime_content_type($path);

            if ( false !== $res ) { // если без ошибок

                return $res;
            }
        }

    }

}