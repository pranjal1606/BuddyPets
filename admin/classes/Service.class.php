<?php
    require_once("Connection.class.php");

    class Services extends Connection{
        public function getAllServices(){
            $sqlquery = "select * from services";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function addNewService($servicename, $serviceicon, $servicedesc){
            $sqlquery = "insert into services (servicename, serviceicon, servicedesc) values ('$servicename', '$serviceicon', '$servicedesc')";
            $this->conn->query($sqlquery);
        }

        public function getSingleServices($serviceid){
            $sqlquery = "select * from services where serviceid = $serviceid";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function changeServiceStatus($serviceid, $status){
            $sqlquery = "update services set status = $status where serviceid = $serviceid";
            $this->conn->query($sqlquery);
        }

        public function updateService($serviceid, $servicename, $serviceicon, $servicedesc){
            $sqlquery = "update services set servicename = '$servicename', serviceicon = '$serviceicon', servicedesc = '$servicedesc' where serviceid = $serviceid";
            $this->conn->query($sqlquery);
        }
        
    }

    $services = new Services();
?>