<?php

require __DIR__ . '/autoload.php';

$auth = new \App\Models\Authorization();

$auth->logout();

header('Location: /homework9/login.php');

