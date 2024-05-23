<?php
    class Connection{
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "buddypets";
        public $conn = null;

        public function __construct(){
            $this->conn = new mysqli($this->hostname, $this->username, $this->password, $this->database);

            if($this->conn->connect_error){
                die("Connection Failed ".$this->conn->connect_error);
            }
        }

        public function logWriter($email, $event){
            $sqlquery = "insert into logs (email, event) values ('$email', '$event')";
            $this->conn->query($sqlquery);
        }
    }
?>