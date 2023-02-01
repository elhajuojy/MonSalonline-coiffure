<?php 

use core\App;
use core\Database;
use core\Response;


$db = App::resolve(Database::class);


// dd($_POST);

$appointment = $db->query("UPDATE Appointment SET AppointmentDate = :AppointmentDate, AppointmentTime = :AppointmentTime, AppointmentStatus = :AppointmentStatus, CustomerID = :CustomerID, EmployeeID = :EmployeeID , 
AppointmentType = :AppointmentType
WHERE AppointmentID = :AppointmentID", 

[
    'AppointmentDate' => $_POST['AppointmentDate'],
    'AppointmentTime' => $_POST['AppointmentTime'],
    'AppointmentStatus' => $_POST['AppointmentStatus'],
    'AppointmentType' => $_POST['AppointmentType'],    
    'CustomerID' => $_POST['CustomerID'],
    'EmployeeID' => $_POST['EmployeeID'],
    'AppointmentID' => $_POST['AppointmentID'],

])->statement->fetch();


if($appointment){

    http_response_code(Response::OK);
    echo json_encode($appointment);
    die();
}

else{
    http_response_code(Response::NOT_FOUND);
    echo json_encode(['message' => 'Not Found !! ']);
    die();
}