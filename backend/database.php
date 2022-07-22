<?php

Class Database {
    
    public $connection;
    private $user;
    private $pw;
    private $database;
    private $host;

    function __construct() {
        $this->db_connect();
    }

    // Set connection to db
    private function db_connect() {
        $this->user = "root";
        $this->pw = "";
        $this->database = "simpleBlog";
        $this->host = "localhost";
        
        try {
            $this->connection = new mysqli($this->host, $this->user, $this->pw, $this->database); 
        } catch (Exception $exc) {
            echo "Caught Exception: ", $exc -> getMessage(), "<br>";
        }     

        return $this -> connection;
    }

    // Create a new user 
    function createUser($username, $password, $admin=0) {
        $query = "INSERT INTO users SET username='$username', password='$password', admin=$admin;";
        try {
            $result = $this->connection->query($query);
        } catch (Exception $exc) {
            echo "Caught Exception: ", $exc -> getMessage(), "<br>";
        }
    }

    function checkPassword($username, $password) {
        $query = "SELECT password FROM users WHERE username='$username' AND password='$password';";
        try {
            if($this -> connection -> query($query) -> num_rows == 1) {
                return true;
            }
            return false;
        } catch (Exception $exc) {
            echo "Caught Exception: ", $exc -> getMessage(), "<br>";
        }
    }    
}


?>