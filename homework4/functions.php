<?php

const FNGUESTBOOK = __DIR__ . '/guestbook.txt';

function getGuestbook() { //читает файл гостевой книги и возвращает массив записей

    return file( FNGUESTBOOK, FILE_IGNORE_NEW_LINES );

}

assert(true === is_array( getGuestbook() ) ); //ф-я должна возвратить массив


function getImages() { //возвращает список изображений

    $images = scandir(__DIR__ . '/images');
    $images = array_diff( $images, ['.', '..'] );

    return $images;

}

assert( true === is_array( getImages() ) ); //ф-я должна возвратить массив


function putUploadImage($uf) { //Перемещает загруженное клиентом изображение в соотв. папку с именем, полученным от клиента

    if ( isset( $_FILES[$uf] ) ) { //если файл загружен
        if (0 == $_FILES[$uf]['error']) { //и если нет ошибок

            $t = mime_content_type( $_FILES[$uf]['tmp_name']); //MIME-тип содержимого файла

            $ts = ['image/png', 'image/jpeg']; //список разрешенных для загрузки MIME-типов

            if ( in_array($t, $ts) ) { //и если удовлетворяет списку разрешенных типов

                $n = pathinfo($_FILES[$uf]['name'] , PATHINFO_BASENAME); //имя файла, переданное клиентом

                if ( $n != '') {// и если имя не пустое

                    // то переносим файл в папку с соотв. именем файла
                    $res = move_uploaded_file(
                        $_FILES['image']['tmp_name'],
                        __DIR__ . '/images/' . $n
                    );

                }
            }
        }
    }

    if ( isset( $res ) && $res == true) { // если загруженный файл без ошибок и его перенос успешен
        return $n; //имя файла
    } else {
        return false;
    }

}

assert( false === putUploadImage('test') ); //при ошибке добавления загруженного файла ф-я должна возвратить false


