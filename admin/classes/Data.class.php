<?php
    require_once("Connection.class.php");

    class Data extends Connection{
        public function petsForAdoptionCount(){
            $sqlquery = "select count(*) from adopt where status = 1";
            $result = $this->conn->query($sqlquery);
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count = $row["count(*)"];
            }

            return $count;
        }

        public function unreadMessagesCount(){
            $sqlquery = "select count(*) from messages where status = 0";
            $result = $this->conn->query($sqlquery);
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count = $row["count(*)"];
            }

            return $count;
        }

        public function adoptRequestCount(){
            $sqlquery = "select count(*) from adoptrequest where status = 0";
            $result = $this->conn->query($sqlquery);
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count = $row["count(*)"];
            }

            return $count;
        }

        public function usersCount(){
            $sqlquery = "select count(*) from users";
            $result = $this->conn->query($sqlquery);
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count = $row["count(*)"];
            }

            return $count;
        }

        public function serviceRequestCount(){
            $sqlquery = "select count(*) from servicerequest where status = 1";
            $result = $this->conn->query($sqlquery);
            $count = 0;
            while($row = $result->fetch_assoc()){
                $count = $row["count(*)"];
            }

            return $count;
        }

        
    }

    $data = new Data();
?>