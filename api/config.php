<?php

return [
    'database' => [
        'host' => $_ENV['DB_HOST'],
        'port' =>  $_ENV['DB_PORT'],
        'dbname' => $_ENV['DB_NAME'],
        // 'username' => $_ENV['DB_USER'],
        // 'password' => $_ENV['DB_PASSWORD'],
        'charset' => $_ENV['DB_CHARSET'],

    ],
];