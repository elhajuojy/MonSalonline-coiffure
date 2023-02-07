<?php 

use core\App;
use core\Database;
use core\Response;


$db = App::resolve(Database::class);





if(isset($_GET['Customer_reference'])){

    $Appoiment = $db->query("SELECT * FROM Appointment
        inner join Customer on Appointment.CustomerID = Customer.CustomerID
         WHERE Customer.Customer_reference = :Customer_reference ", ['Customer_reference' => $_GET['Customer_reference']])->statement->fetchAll();

    if($Appoiment){

        http_response_code(Response::OK);
        echo json_encode([
            'message' => 'Appointments for this Customer !! ',
            'status' => true,
            'data' => $Appoiment
        ]);
        die();
    }

    else{
        http_response_code(Response::BAD_REQUEST);
        echo json_encode(['message' => 'No Appointments for this Customer !! ','status' => false]);
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

