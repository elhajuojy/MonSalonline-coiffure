<?php 

use core\App;
use core\Database;
use core\Response;


$db = App::resolve(Database::class);





if(isset($_GET['CustomerID'])){

    $Appoiment = $db->query("SELECT * FROM Appointment
        inner join Customer on Appointment.CustomerID = Customer.CustomerID
         WHERE Appointment.CustomerID = :CustomerID", ['CustomerID' => $_GET['CustomerID']])->statement->fetch();

    if($Appoiment){

        http_response_code(Response::OK);
        echo json_encode($Appoiment);
        die();
    }

    else{
        http_response_code(Response::NOT_FOUND);
        echo json_encode(['message' => 'Not Found !! ']);
        die();
    }
}





if(isset($_GET['date'])){

    $AppointmentHoursDate = $db->query("SELECT AppointmentTime FROM Appointment WHERE AppointmentDate = :date", ['date' => $_GET['date']])->statement->fetchAll();


    if($AppointmentHoursDate){

        http_response_code(Response::OK);
        echo json_encode($AppointmentHoursDate);
        die();
    }

    else{
        http_response_code(Response::BAD_REQUEST);
        echo json_encode(['message' => 'Not Found hours in this date !! ']);
        die();
    }
}




$Appoiments = $db->query("SELECT * FROM Appointment")->statement->fetchAll();


if($Appoiments){

    http_response_code(Response::OK);
    echo json_encode($Appoiments);
}

else{
    http_response_code(Response::NOT_FOUND);
    echo json_encode(['message' => 'Not Found !! ']);
}

