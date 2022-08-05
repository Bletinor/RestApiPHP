<?php
class Contact 
{
    //DB properties
    private $conn;
    private $table = "contacts";

    //Post properties
    public $id;
    public $name;
    public $lastName;
    public $email;
    public $phoneNum1;
    public $phoneNum2;

    //constructor
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //get posts?
    public function get()
    {
        $query = 'SELECT id, name, lastName, email, phoneNum1, phoneNum2 FROM ' . $this->table . ' ';
    }
}
 ?>