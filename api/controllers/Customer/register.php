<?php 

use core\App;
use core\Database;
use core\Response;
use core\Validator;

$db = App::resolve(Database::class);


// echo json_encode($_POST);
// die();



$newCustomer = $_POST;


$firstname = $newCustomer['FirstName'];
$lastname = $newCustomer['LastName'];
$email = $newCustomer['Email'];
$phone = $newCustomer['PhoneNumber'];
$address = $newCustomer['Address'];
$city = $newCustomer['City'];
$state = $newCustomer['State'];
$randomReference = randomString(10);

if(Validator::string($firstname, 2, 50) && Validator::string($lastname, 2, 50) && Validator::email($email) && Validator::string($phone, 10, 10) && Validator::string($address, 2, 50) && Validator::string($city, 2, 50) && Validator::string($state, 2, 50)){
   
    $db->query("insert into Customer (FirstName, LastName, Email, PhoneNumber, Address, City, State, Customer_reference) values (:FirstName, :LastName, :Email, :PhoneNumber, :Address, :City, :State, :Customer_reference)", 
    [   
        'FirstName' => $firstname,
        'LastName' => $lastname,
        'Email' => $email,
        'PhoneNumber' => $phone,
        'Address' => $address,
        'City' => $city,
        'State' => $state,
        'Customer_reference' => $randomReference
    ]);

    http_response_code(Response::CREATED);
    echo json_encode(['message' => 'Created', 'Customer_reference' => $randomReference]);

}

else{
    http_response_code(Response::BAD_REQUEST);
    echo json_encode(['message' => 'Bad Request some inpus are not valid']);
}

//after validating the data, we can insert it into the database





// echo json_encode($randomReference);