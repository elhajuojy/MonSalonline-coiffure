<?php 


use core\App;
use core\Database;
use core\Response;


$db = App::resolve(Database::class);

$AppointmentID  = $_POST['AppointmentID'];



if(isset($_POST['AppointmentID'])){

    $db->query("DELETE FROM Appointment WHERE AppointmentID = :AppointmentID", ['AppointmentID' => $AppointmentID]);

    http_response_code(Response::OK);
    echo json_encode(['message' => 'Deleted Successfully']);
    die();
}

else{
    http_response_code(Response::NOT_FOUND);
    echo json_encode(['message' => 'Not Found !! ']);
    die();
}


