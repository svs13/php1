<?php

class Article
{
    protected $header;
    protected $shotContent;
    protected $content;

    public function __construct(string $header, string $shotContent, string $content)
    {
        $this->header = $header;
        $this->shotContent = $shotContent;
        $this->content = $content;
    }

    public function getHeader()
    {
        return $this->header;
    }

    public function getShotContent()
    {
        return $this->shotContent;
    }

    public function getContent()
    {
        return $this->content;
    }

}