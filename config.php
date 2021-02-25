<?php

return [
    'connection' => 'mysql:host=localhost',
    'db'         => 'zenith_estates',
    'user'       => 'root',
    'password'   => '',
    'options'    => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ],
];