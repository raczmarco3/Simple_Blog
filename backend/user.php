<?php
    include "database.php";

    class User {
        private $connection;

        function __construct() {
            $this->connection = new Database();
        }

        function register($username, $password) {
            $this-> connection -> createUser($username, $password);
        }
    }
?>