<?php

require __DIR__ . '/autoload.php';

$persons = new App\Models\Persons();
$data = $persons->findAll();

include __DIR__ . '/templates/index.php';