<?php
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Acces-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/config.php';
include_once '../../models/contact.php';

//initiates db object and connects to the server
$database = new Database();
$databaseConn = $database->connect();

//Initiates new contact object
$contact = new Contact($databaseConn);

//Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$contact->id = $data->id;

if ($contact->delete())
{
    echo json_encode(array('message' => 'Contact Deleted'));
}
else
{
    echo json_encode(array('message' => "Couldn't Delete Contact"));
}
?>