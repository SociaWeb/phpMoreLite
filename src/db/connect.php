<?php
class connect
{
    private $mysqli;
    public function __construct()
    {

        // Define the database connection variables
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "test";

        // Create a new mysqli object
        $this->mysqli = new mysqli($servername, $username, $password, $database);

        // Check if the connection was successful
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        }
    }
    /**
     * Get the value of mysqli
     */
    public function getMysqli()
    {
        return $this->mysqli;
    }
    public function __destruct()
    {
        // Close the database connection
        $this->mysqli->close();
    }
}
