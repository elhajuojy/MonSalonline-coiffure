<?php

use core\App;
use core\Database;
use core\Response;

$db = App::resolve(Database::class);



$Customer_reference = $_POST['Customer_reference'];

$Customer = $db->query("SELECT * FROM Customer WHERE Customer_reference = :Customer_reference", ['Customer_reference' => $Customer_reference])->statement->fetch();


if($Customer){
    http_response_code(Response::OK);
    echo json_encode($Customer);
    
}

else{
    http_response_code(Response::NOT_FOUND);
    echo json_encode(['message' => 'Not Found']);
}

