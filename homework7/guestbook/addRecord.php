<?php

require __DIR__ . '/../classes/GuestBook.php';

const GUESTBOOK_PATH = __DIR__ . '/guestbook.txt';

if ( isset( $_GET['r'] ) ) {

    ( new GuestBook(GUESTBOOK_PATH) )->append( $_GET['r'] )->save();

}

header('Location: /homework7/guestbook/index.php');
