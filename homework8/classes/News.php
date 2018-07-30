<?php

require __DIR__ . '/DB.php';
require __DIR__ . '/Article.php';

class News
{
    protected $dataBase; //хранилище новостей

    protected $articles;


    public function __construct()
    {
        $this->dataBase = new DB();
    }


    public function getArticles()
    {
        if ( !isset($this->articles) ) {

            $sql = 'SELECT * FROM news ORDER BY id DESC';
            $data = $this->dataBase->query($sql);

            $this->articles = [];

            if ( is_array($data) ) {

                foreach ($data as $row) {

                    $this->articles[ $row['id'] ] = new Article($row['header'], $row['text'], $row['author']);

                }
            }
        }

        return $this->articles;
    }


    public function addArticle(Article $article)
    {
        $sql = 'INSERT INTO news (header, text, author) VALUE (:h,:t,:a)';
        $params = [
            ':h' => $article->getHeader(),
            ':t' => $article->getText(),
            ':a' => $article->getAuthor()
        ];

        $data = $this->dataBase->query($sql, $params);
        if ( false === $data ) { //если запись не добавлена
            return false;
        }

        if ( isset( $this->articles ) ) { //список новостей устарел
            unset( $this->articles );
        }

        return true;
    }


    public function getArticleById(string $id)
    {

        $sql = 'SELECT * FROM news WHERE id=:id LIMIT 1';
        $data = $this->dataBase->query( $sql, [ ':id'=>$id ] );

        if ( is_array($data) ) { //записи есть
            if ( isset($data[0]) ) {

                $row = $data[0];

                return new Article($row['header'], $row['text'], $row['author']);
            }
        }

    }

}