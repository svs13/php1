<?php

require __DIR__ . '/DB.php';
require __DIR__ . '/Article.php';

class News
{
    protected $dataBase; //хранилище новостей

    protected $articles;


    public function __construct($path)
    {
        $this->dataBase = new DB($path);
    }


    public function getArticles()
    {
        if ( !isset($this->articles) ) {

            $sql = 'SELECT * FROM news ORDER BY id DESC';
            $d = $this->dataBase->query($sql,[]);

            $this->articles = [];

            if ( is_array($d) ) { //записи есть. Проверяем элементы массива и создаём массив новостей

                foreach ($d as $ar) {
                    if ( isset( $ar['id'], $ar['header'], $ar['text'], $ar['author'] ) ) {

                        $this->articles[ $ar['id'] ] = new Article($ar['header'], $ar['text'], $ar['author']);
                    }
                }
            }
        }

        return $this->articles;
    }


    public function addArticle(Article $article)
    {
        $n = strlen( $article->getHeader() );
        if ( $n < 3 || $n > 100 ) { //ограничение базы данных по длине байт

            return false;
        }

        $n = strlen( $article->getAuthor() );
        if ( $n < 3 || $n > 100 ) { //ограничение базы данных по длине байт

            return false;
        }

        $n = strlen( $article->getText() );
        if ( $n < 3 || $n > 100000 ) { //ограничение

            return false;
        }

        $sql = 'INSERT INTO news (header, text, author) VALUE (:h,:t,:a)';
        $ar = [
            ':h' => $article->getHeader(),
            ':t' => $article->getText(),
            ':a' => $article->getAuthor()
        ];

        $d = $this->dataBase->query($sql, $ar);
        if ( false === $d ) { //если запись не добавлена
            return false;
        }

        if ( isset( $this->articles ) ) { //то список новостей устарел
            unset( $this->articles );
        }

        return true;
    }


    public function getArticleById(string $id)
    {

        $sql = 'SELECT * FROM news WHERE id=:id LIMIT 1';
        $d = $this->dataBase->query( $sql, [ ':id'=>$id ] );

        if ( is_array($d) ) { //записи есть. Проверяем элементы массива
            if ( isset($d[0]) ) {
                $ar = $d[0];
                if ( isset( $ar['id'], $ar['header'], $ar['text'], $ar['author'] ) ) {
                    if ( $ar['id'] == $id ) {// кастинг при сравнении

                        return new Article($ar['header'], $ar['text'], $ar['author']);
                    }
                }
            }
        }


        return NULL;
    }

}