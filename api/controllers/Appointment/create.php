<?php 

use core\App;
use core\Database;
use core\Response;



//appoiment/create.php information and add them to the database
$db = App::resolve(Database::class);

$CustomerID =  $db->query("SELECT CustomerID FROM Customer WHERE Customer_reference = :Customer_reference", ['Customer_reference' => $_POST['CustomerID']])->statement->fetch();

$newAppoiment = [
    
        'CustomerID' => $CustomerID['CustomerID'],
    
        'EmployeeID' => $_POST['EmployeeID'],
    
        'AppointmentDate' => $_POST['AppointmentDate'],
    
        'AppointmentTime' => $_POST['AppointmentTIme'],
    
        'AppointmentStatus' => $_POST['AppointmentStatus'],
    
        'AppointmentType' => $_POST['AppointmentType']
];

// dd($newAppoiment);



// dd($newAppoiment);


$query = $db->query("INSERT INTO Appointment (CustomerID, EmployeeID, AppointmentDate, AppointmentTime, AppointmentStatus, AppointmentType) VALUES (:CustomerID, :EmployeeID, :AppointmentDate, :AppointmentTime, :AppointmentStatus, :AppointmentType)", $newAppoiment);

if($query->statement->rowCount() > 0){

    http_response_code(Response::CREATED);

    echo json_encode(['message' => 'Appoiment created']);

}

else{

    http_response_code(Response::BAD_REQUEST);

    echo json_encode(['message' => 'Appoiment not created']);

}