<?php

include __DIR__ . '/functions.php';

if ( isset($_GET['r']) && $_GET['r'] != '' ) {
    $guestbook = getGuestbook();
    $guestbook[] = $_GET['r'];
    file_put_contents( FNGUESTBOOK, implode("\n", $guestbook) );
}

header('Location: /homework4/guestbook.php');

?>