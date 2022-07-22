<?php

Class Database {
    
    public $connection;
    private $username;
    private $password;
    private $database;
    private $host;

    function __construct() {
        $this->db_connect();
    }

    // Set connection to db
    private function db_connect() {
        $this->username = "root2";
        $this->password = "";
        $this->database = "simpleBlog";
        $this->host = "localhost";
        
        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database); 
        } catch (Exception $exc) {
            echo "Caught Exception: ", $exc -> getMessage(), "<br>";
        }     

        return $this->connection;
    }

    // Create a new user 
    function createUser() {

    }


}


?>