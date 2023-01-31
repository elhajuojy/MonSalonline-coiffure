<?php

use core\App;
use core\Database;
use core\Response;

$db = App::resolve(Database::class);


// parse_str(file_get_contents('php://input'),$_delete);
// dd($_delete);


$Customer_reference = filterRequest($_POST['Customer_reference']);


$Customer = $db->query("SELECT * FROM Customer WHERE Customer_reference = :Customer_reference", ['Customer_reference' => $Customer_reference])->statement->fetch();


if($Customer){

    http_response_code(Response::OK);
    setcookie($Customer_reference, time() + (86400 * 30), "/");
    echo json_encode($Customer);
}

else{
    http_response_code(Response::NOT_FOUND);
    echo json_encode(['message' => 'Not Found']);
}

