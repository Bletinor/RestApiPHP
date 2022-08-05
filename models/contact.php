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

    //get contacts
    public function get()
    {
        $query = 'SELECT id, name, lastName, email, phoneNum1, phoneNum2 FROM ' . $this->table . '  ORDER BY id DESC';

        $statement = $this->conn->prepare($query);

        $statement->execute();

        return $statement;
    }

    //get single contact
    public function getSingle()
    {
        $query = 'SELECT id, name, lastName, email, phoneNum1, phoneNum2 FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1';

        $statement = $this->conn->prepare($query);

        $statement->bindParam(1, $this->id);

        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);

        //set properties
        $this->name = $row['name'];
        $this->lastName = $row['lastName'];
        $this->email = $row['email'];
        $this->phoneNum1 = $row['phoneNum1'];
        $this->phoneNum2 = $row['phoneNum2'];
    }
}
 ?>