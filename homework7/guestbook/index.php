<?php

require __DIR__ . '/../classes/View.php';

require __DIR__ . '/../classes/GuestBook.php';

const GUESTBOOK_PATH = __DIR__ . '/guestbook.txt';

$view = new View;
$view->assign( 'records', ( new GuestBook(GUESTBOOK_PATH) )->getData() );
$view->display(__DIR__ . '/../templates/guestbook/index.php');

