<?php
    require_once("Connection.class.php");

    class Messages extends Connection{
        public function getUnreadMessages(){
            $sqlquery = "select * from messages where status = 0";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function getAllMessages(){
            $sqlquery = "select * from messages";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function getMessages($messageid){
            $sqlquery = "select * from messages where messageid = $messageid";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function markAsRead($messageid){
            $sqlquery = "update messages set status = 1 where messageid = $messageid";
            $this->conn->query($sqlquery);            
        }

        
    }

    $messages = new Messages();
?>