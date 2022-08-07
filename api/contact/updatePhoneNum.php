<?php
//header info
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/config.php';
include_once '../../models/contact.php';

//initiates database object and connects to the server
$database = new Database();
$databaseConn = $database->connect();

//Initiates new contact object
$contact = new Contact($databaseConn);

//Get raw posted data from json
$data = json_decode(file_get_contents("php://input"));

//adds variable data from raw input to contact object
$contact->id = $data->id;

$contact->phoneNum1 = $data->phoneNum1;
$contact->phoneNum2 = $data->phoneNum2;

//checks if the post query was successful or not
if ($contact->updatePhoneNum())
{
    echo json_encode(array('message' => 'Phone Number Updated'));
}
else
{
    echo json_encode(array('message' => 'Phone Number Not Updated'));
}
?>