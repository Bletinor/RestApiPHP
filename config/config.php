<?php
class Database{
    //Parameters for database connection
    private $host = 'localhost';
    private $dbname = 'apidb';
    private $username = 'root';
    private $password = 'Oq/E4GEb]LPLu4yQ';
    private $conn;

    //function for connection with a database (preset to connect to a mysql server) thorigh PDO
    public function connect()
    {
        $this->conn = null;

        try
        {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->username , $this->password , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn-> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch (\Throwable $th)
        {
            throw $th;
        }

        return $this->conn;
    }
}
?>