<?php

namespace App\Models;


class Uploader
{
    protected $fn;
    protected $allowedTypes;


    public function __construct(string $fieldname, array $allowedTypes)
    {
        $this->fn = $fieldname;
        $this->allowedTypes = $allowedTypes;
    }


    public function isUploaded() //проверка наличия файла в загрузке (во временном месте)
    {
        if ( isset( $_FILES[ $this->fn ] ) ) { //если элемент есть
            if ( UPLOAD_ERR_OK == $_FILES[ $this->fn ]['error'] ) { //и если нет ошибок, т.е. файл загружен и имя файла есть.
                if ( file_exists( $_FILES[ $this->fn ]['tmp_name'] ) ) { // и если файл ещё не перемещён
                    if ( is_uploaded_file( $_FILES[ $this->fn ]['tmp_name'] ) ) { //и если файл загружен действительно через HTTP POST

                        return true;
                    }
                }
            }
        }

        return false;
    }


    public function upload(string $path) // перенос файла из временного места в постоянное
    {
        if ( $this->isUploaded() ) { //если файл загружен
            if ( in_array( $this->getMimeType(), $this->getAllowedTypes() ) ) { //если тип файла разрешен к загрузке
                if ( '' !== pathinfo($path , PATHINFO_BASENAME) ) { //если имя указано
                    if ( '' !== pathinfo($path , PATHINFO_DIRNAME) ) { //если путь директории указан
                        if ( !file_exists($path) ) { //если файла по указанному пути НЕТ
                            if ( move_uploaded_file( $_FILES[ $this->fn ]['tmp_name'], $path ) ) { //если перемещение успешно

                                return true;
                            }
                        }
                    }
                }
            }
        }

        return false;
    }


    public function getMimeType() //MIME тип содержимого файла
    {
        if ( $this->isUploaded() ) {

            $res = mime_content_type($_FILES[ $this->fn ]['tmp_name']);

            if ( false !== $res ) { // если ошибок при чтении/определении типа файла по содержимому не было

                return $res;
            }

        }

    }


    public function getFileName() //имя файла, переданное клиентом
    {
        if ( $this->isUploaded() ) {

            return pathinfo($_FILES[ $this->fn ]['name'] , PATHINFO_BASENAME);
        }

        return '';
    }

    public function getAllowedTypes()
    {
        return $this->allowedTypes;
    }


}