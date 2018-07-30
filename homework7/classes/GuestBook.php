<?php

require __DIR__ . '/TextFile.php';

class GuestBook extends TextFile
{

    public function append($text)
    {
        if ( '' !== $text ) {

            $this->data[] = $text;

        }

        return $this;
    }

}