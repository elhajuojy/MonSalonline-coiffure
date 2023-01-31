<?php 


$clients = [
    [
        "name" => "John",
        "last_name" => "Doe",
    ],
    [
        "name" => "Jane",
        "last_name" => "Doe",
    ],
    [
        "name" => "John",
        "last_name" => "Smith",
    ],
    [
        "name" => "Jane",
        "last_name" => "Smith",
    ],

];


echo json_encode($clients);