<?php
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/config.php';
include_once '../../models/contact.php';

//initiates db object and connects to the server
$database = new Database();
$databaseConn = $database->connect();

//Initiates new contact object
$contact = new Contact($databaseConn);

$contact->id = isset($_GET['id']) ? $_GET['id'] : die();

$contact->getSingle();


$contactArray = array(
    'id' => $contact->id,
    'name' => $contact->name,
    'lastName' => $contact->lastName,
    'email' => $contact->email,
    'phoneNum1' => $contact->phoneNum1,
    'phoneNum2' => $contact->phoneNum2,
);

echo json_encode($contactArray);
?>