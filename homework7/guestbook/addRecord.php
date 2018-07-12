<?php

require __DIR__ . '/../classes/GuestBook.php';

const GB_PATH = __DIR__ . '/guestbook.txt';

if ( isset($_GET['r']) && '' !== $_GET['r'] ) {

    ( new GuestBook(GB_PATH) )->append( $_GET['r'] )->save();

}

header('Location: /homework7/guestbook/index.php');
