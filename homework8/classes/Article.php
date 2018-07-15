<?php

class Article
{
    protected $header;
    protected $text;
    protected $author;

    public function __construct(string $header, string $text, string $author)
    {
        $this->header = $header;
        $this->text = $text;
        $this->author = $author;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getAuthor()
    {
        return $this->author;
    }

}