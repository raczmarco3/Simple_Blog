<?php
    require_once("database.php");

    class User {
        private $connection;

        function __construct() {
            $this -> connection = new Database();
        }

        function register($username, $password) {
            $this -> connection -> createUser($username, $password);
        }

        function logIn($username, $password) {
            if($this -> connection -> checkPassword($username, $password)) {
                $_SESSION["username"] = $username;
                return true;
            }
            return false;
        }
    } 
?>