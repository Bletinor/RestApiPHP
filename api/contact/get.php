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

//test query
$result = $contact->get();

$rows = $result->rowCount();

if ($rows > 0)
{
    $contactsArray = array();
    $contactsArray['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC))
    {
        extract($row);

        $contactItem = array(
            'id' => $id,
            'name' => $name,
            'lastName' => $lastName,
            'email' => $email,
            'phoneNum1' => $phoneNum1,
            'phoneNum2' => $phoneNum2,
        );

        //push to data
        array_push($contactsArray['data'], $contactItem);
    }

    echo json_encode($contactsArray);
}
else
{
    echo "No contacts found...";
}

?>