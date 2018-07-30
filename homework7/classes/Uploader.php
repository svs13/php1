<?php

class Uploader
{
    protected $fieldName;


    public function __construct($fieldName)
    {
        $this->fieldName = $fieldName;
    }


    public function isUploaded() //проверка наличия файла в загрузке (во временном месте)
    {
        if ( isset( $_FILES[ $this->fieldName ] ) ) { //если элемент есть
            if ( UPLOAD_ERR_OK == $_FILES[ $this->fieldName ]['error'] ) { //и если нет ошибок, т.е. файл загружен и имя файла есть.
                if ( file_exists( $_FILES[ $this->fieldName ]['tmp_name'] ) ) { // и если файл ещё не перемещён
                    if ( is_uploaded_file( $_FILES[ $this->fieldName ]['tmp_name'] ) ) { //и если файл загружен действительно через HTTP POST

                        return true;
                    }
                }
            }
        }

        return false;
    }


    public function upload($path) // перенос файла из временного места в постоянное
    {
        if ( $this->isUploaded() ) { //если файл загружен
            if ( '' !== pathinfo($path , PATHINFO_BASENAME) ) { //если имя указано
                if ( '' !== pathinfo($path , PATHINFO_DIRNAME) ) { //если путь директории указан
                    if ( !file_exists($path) ) { //если файла по указанному пути НЕТ
                        if ( move_uploaded_file( $_FILES[ $this->fieldName ]['tmp_name'], $path ) ) { //если перемещение успешно

                            return true;
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

            $res = mime_content_type($_FILES[ $this->fieldName ]['tmp_name']);

            if ( false !== $res ) { // если ошибок при чтении/определении типа файла по содержимому не было

                return $res;
            }
        }

    }


    public function getFileName() //имя файла, переданное клиентом
    {
        if ( $this->isUploaded() ) {

            return pathinfo($_FILES[ $this->fieldName ]['name'] , PATHINFO_BASENAME);
        }

        return '';
    }


}