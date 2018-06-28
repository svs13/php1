<?php

function getArrImg() { //Получение массива картинок, к примеру из баз данных
    $arr_img = [
        11=>'1.jpg',
        22=>'2.jpg',
        33=>'3.jpg',
        44=>'4.jpg'
    ];

    return $arr_img;
}

function getImgNameById($arr_img, $id) { //Получение имени файла картинки по id

    if ( isset( $arr_img[$id] ) ) {
        return $arr_img[ $id ];
    } else {
        return false;
    }

}

?>