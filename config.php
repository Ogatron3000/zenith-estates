<?php

return [
    'connection' => 'mysql:host=localhost',
    'db'         => 'real_estate_agency',
    'user'       => 'root',
    'password'   => '',
    'options'    => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ],
];