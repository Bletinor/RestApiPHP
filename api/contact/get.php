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

//get all contacts query query
$result = $contact->get();

//get row count
$rows = $result->rowCount();

//checks if there are contacts if not prints no contacts found
if ($rows > 0)
{
    //creates an array of contacts
    $contactsArray = array();

    //while there are rows to fetch, extract data from row and adds it to contactItem array
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

        //push data from contactItem to contactsArray
        array_push($contactsArray, $contactItem);
    }

    //turns get data to json and sends to output
    echo json_encode($contactsArray);
}
else
{
    echo "No contacts found...";
}

?>