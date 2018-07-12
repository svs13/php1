<?php

function getImages() { //возвращает список изображений

    $images = scandir(__DIR__ . '/images');
    $images = array_diff( $images, ['.', '..'] );

    return $images;

}

assert( true === is_array( getImages() ) ); //ф-я должна возвратить массив


