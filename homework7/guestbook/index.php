<?php

require __DIR__ . '/../classes/View.php';

require __DIR__ . '/../classes/GuestBook.php';

const GB_PATH = __DIR__ . '/guestbook.txt';

$v = new View;

$v->assign( 'guestbookData', ( new GuestBook(GB_PATH) )->getData() );

$v->display(__DIR__ . '/../templates/guestbook/index.php');

