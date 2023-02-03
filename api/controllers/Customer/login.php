<?php

use core\App;
use core\Database;
use core\Response;


// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
$db = App::resolve(Database::class);




$Customer_reference = $_POST['Customer_reference'];


$Customer = $db->query("SELECT * FROM Customer WHERE Customer_reference = :Customer_reference", ['Customer_reference' => $Customer_reference])->statement->fetch();


if($Customer){

    http_response_code(Response::OK);
    // setcookie($Customer_reference, time() + (86400 * 30), "/");
    echo json_encode($Customer);
}

else{
    http_response_code(Response::NOT_FOUND);
    echo json_encode(['message' => 'User not found']);
}

