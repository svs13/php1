<?php

var_dump($_FILES);

if (isset($_FILES['myimage'])) {
    if (0 == $_FILES['myimage']['error']) {

        move_uploaded_file(
            $_FILES['myimage']['tmp_name'],
            __DIR__ . '/images/uploaded.jpg'
        );

    }
}

?>