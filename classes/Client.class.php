<?php
    require_once("Connection.class.php");
    class Client extends Connection{
        public function getContactUS(){
            $sqlquery = "select * from contactus where contactid = 1";
            return $this->conn->query($sqlquery);
        }

        public function getSocialMedia(){
            $sqlquery = "select * from socialmedia where socialid = 1";
            return $this->conn->query($sqlquery);
        }

        public function getSlider(){
            $sqlquery = "select * from slider where status = 1";
            return $this->conn->query($sqlquery);
        }

        public function getFaq(){
            $sqlquery = "select * from faq where status = 1";
            return $this->conn->query($sqlquery);   
        }

        public function getGallery(){
            $sqlquery = "select * from gallery where status = 1";
            return $this->conn->query($sqlquery);   
        }

        public function getAdopt(){
            $sqlquery = "select * from adopt where status = 1";
            return $this->conn->query($sqlquery);   
        }

        public function saveMessage($sendername, $senderemail, $senderphone, $subject, $message){
            $sqlquery = "insert into messages (sendername, senderemail, senderphone, subject, messagetext) values ('$sendername', '$senderemail', '$senderphone', '$subject', '$message')";
            $this->conn->query($sqlquery);
        }
    }

    $client = new Client();
?>