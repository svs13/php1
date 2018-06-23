<?php

function getArrImg() { //Получение массива картинок, к примеру из баз данных
    $arr_img = [
        11=>'images/1.jpg',
        22=>'images/2.jpg',
        33=>'images/3.jpg',
        44=>'images/4.jpg'
    ];

    return $arr_img;
}

function getImgUrlById($arr_img, $id) { //Получение url картинки по id

    if ( array_key_exists( $id, $arr_img) ) {
        return $arr_img[ $id ];
    } else {
        return false;
    }

}

?>