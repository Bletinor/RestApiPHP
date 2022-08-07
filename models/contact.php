<?php
class Contact 
{
    //Database properties (database connection)
    private $conn;

    //Contact properties
    public $id;
    public $name;
    public $lastName;
    public $email;
    public $phoneNum1;
    public $phoneNum2;

    //constructs contact objetc with the database connection as parameter
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //get full list ofcontacts
    public function get()
    {
        //prepare statement with the query
        $statement = $this->conn->prepare('SELECT id, name, lastName, email, phoneNum1, phoneNum2 FROM contacts  ORDER BY id DESC');

        //executes the query
        $statement->execute();

        return $statement;
    }

    //gets a single contact
    public function getSingle()
    {
        //prepare statement with the query
        $statement = $this->conn->prepare('SELECT * FROM contacts WHERE id = :id LIMIT 0,1');

        $this->id = htmlspecialchars(strip_tags($this->id));

        //binds a value to the positional id parameter in the statement
        $statement->bindParam(':id', $this->id);

        //executes the query
        $statement->execute();

        //fetches a row as an array indexed by id
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        //set of the fetched row
        $this->name = $row['name'];
        $this->lastName = $row['lastName'];
        $this->email = $row['email'];
        $this->phoneNum1 = $row['phoneNum1'];
        $this->phoneNum2 = $row['phoneNum2'];
    }

    //post a contact
    public function post()
    {
        //prepare statement with the query
        $statement = $this->conn->prepare('INSERT INTO contacts SET name = :name, lastName = :lastName, email = :email, phoneNum1 = :phoneNum1, phoneNum2 = :phoneNum2');

        //clears all data from php and html tags and turns it to html special chars before binding. This is for security
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->lastName = htmlspecialchars(strip_tags($this->lastName));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phoneNum1 = htmlspecialchars(strip_tags($this->phoneNum1));
        $this->phoneNum2 = htmlspecialchars(strip_tags($this->phoneNum2));
        
        //bind each parameter to a variable of the contact
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':lastName', $this->lastName);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phoneNum1', $this->phoneNum1);
        $statement->bindParam(':phoneNum2', $this->phoneNum2);

        //executes query, returns error if something goes wrong
        if ($statement->execute())
        {
            return true;
        }
        else
        {
            printf($statement->error);
            return false;
        }
    }

    public function update()
    {
        //prepare statement with the query
        $statement = $this->conn->prepare('UPDATE contacts SET name = :name, lastName = :lastName, email = :email, phoneNum1 = :phoneNum1, phoneNum2 = :phoneNum2 WHERE id = :id');

        //clears all data before binding
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->lastName = htmlspecialchars(strip_tags($this->lastName));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->phoneNum1 = htmlspecialchars(strip_tags($this->phoneNum1));
        $this->phoneNum2 = htmlspecialchars(strip_tags($this->phoneNum2));
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind each parameter to a variable of the contact
        $statement->bindParam(':name', $this->name);
        $statement->bindParam(':lastName', $this->lastName);
        $statement->bindParam(':email', $this->email);
        $statement->bindParam(':phoneNum1', $this->phoneNum1);
        $statement->bindParam(':phoneNum2', $this->phoneNum2);
        $statement->bindParam(':id', $this->id);

        //executes query, returns error if something goes wrong
        if ($statement->execute())
        {
            return true;
        }
        else
        {
            printf($statement->eror);
            return false;
        }
    }

    public function delete()
    {
        //prepare statement with the query
        $statement = $this->conn->prepare('DELETE FROM contacts WHERE id = :id');

        //clears id data before binding
        $this->id = htmlspecialchars(strip_tags($this->id));

        //bind each parameter to a variable of the contact
        $statement->bindParam(':id', $this->id);

        //executes query, returns error if something goes wrong
        if ($statement->execute())
        {
            return true;
        }
        else
        {
            printf($statement->eror);
            return false;
        }
    }

    //Bonus 2: add one or several phone numbers to eachj contact
    public function updatePhoneNum()
    {
        $statement = $this->conn->prepare('UPDATE contacts SET phoneNum1 = :phoneNum1, phoneNum2 = :phoneNum2 WHERE id = :id');

        $this->phoneNum1 = htmlspecialchars(strip_tags($this->phoneNum1));
        $this->phoneNum2 = htmlspecialchars(strip_tags($this->phoneNum2));
        $this->id = htmlspecialchars(strip_tags($this->id));

        $statement->bindParam(':phoneNum1', $this->phoneNum1);
        $statement->bindParam(':phoneNum2', $this->phoneNum2);
        $statement->bindParam(':id', $this->id);

        if ($statement->execute())
        {
            return true;
        }
        else
        {
            printf($statement->error);
            return false;
        }
    }
}
 ?>