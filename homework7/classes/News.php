<?php

require __DIR__ . '/File.php';
require __DIR__ . '/Article.php';

class News extends File
{
    protected $articles;

    public function __construct(string $path)
    {
        parent::__construct($path);

        $this->articles = unserialize($this->getData());

        if (false === $this->articles) { //ошибка

            $this->articles = [];
            //исключение с записью в лог

        }

    }

    public function save()
    {
        $this->setData( serialize( $this->articles ) );

        parent::save();
    }

    public function addArticle(Article $article)
    {
        $this->articles[] = $article;

        return $this;
    }

    public function getArticles()
    {
        return $this->articles;
    }

}