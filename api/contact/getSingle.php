<?php
//header info
header('Acces-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/config.php';
include_once '../../models/contact.php';

//initiates database object and connects to the server
$database = new Database();
$databaseConn = $database->connect();

//Initiates new contact object
$contact = new Contact($databaseConn);

//checkes if id isnt null, if it isnt gets the id from the URL
$contact->id = isset($_GET['id']) ? $_GET['id'] : die();

//get single contact query
$contact->getSingle();

//puts all info of the single contact into an array
$contactArray = array(
    'id' => $contact->id,
    'name' => $contact->name,
    'lastName' => $contact->lastName,
    'email' => $contact->email,
    'phoneNum1' => $contact->phoneNum1,
    'phoneNum2' => $contact->phoneNum2,
);

//encodes the array into a json and send to output
echo json_encode($contactArray);
?>