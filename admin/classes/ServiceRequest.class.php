<?php
    require_once("Connection.class.php");

    class ServiceRequest extends Connection{
        public function addNewPet($petname, $petprice, $petbreed, $petweight, $petheight, $petcolor, $lifespan, $petage, $petimage){
            $sqlquery = "insert into adopt (petname, petprice, petbreed, petweight, petheight, petcolor, lifespan, petage, petimage) values ('$petname', '$petprice', '$petbreed', '$petweight', '$petheight', '$petcolor', '$lifespan', '$petage', '$petimage')";
            //echo $sqlquery;
            $this->conn->query($sqlquery);
        }

        public function getAllAdoption(){
            $sqlquery = "select * from adopt";
            return $this->conn->query($sqlquery);
        }

        public function changeServiceStatus($requestid, $status){
            $sqlquery = "update servicerequest set status = $status where requestid = $requestid";
            $this->conn->query($sqlquery);
        }

        public function getSingleAdopt($adoptid){
            $sqlquery = "select * from adopt where adoptid = $adoptid";
            return $this->conn->query($sqlquery);
        }

        public function updateAdopt($petname, $petprice, $petbreed, $petweight, $petheight, $petcolor, $lifespan, $petage, $petimage, $adoptid){
            $sqlquery = "update adopt set petname = '$petname', petprice = '$petprice', petbreed = '$petbreed', petweight = '$petweight', petheight = '$petheight', petcolor = '$petcolor', lifespan = '$lifespan', petage = '$petage', petimage = '$petimage' where adoptid = $adoptid";
            //echo $sqlquery;
            $this->conn->query($sqlquery);
        }

        public function getServiceRequests(){
            $sqlquery = "select servicerequest.requestid, servicerequest.email, servicerequest.fordate, servicerequest.fortime, servicerequest.package, servicerequest.remarks, servicerequest.timestamp, servicerequest.status from servicerequest ";

            return $this->conn->query($sqlquery);
        }

        public function getServiceRequest($requestid){
            $sqlquery = "select servicerequest.requestid, servicerequest.email, servicerequest.fordate, servicerequest.fortime, servicerequest.package, servicerequest.remarks, servicerequest.timestamp, servicerequest.status, users.username, users.email, users.phone, users.address from servicerequest join users on servicerequest.email = users.email where requestid = $requestid";

            //$sqlquery = "select adoptrequest.requestid, adoptrequest.datetime, adoptrequest.adoptid, adoptrequest.email, adoptrequest.status, users.username, users.email, users.phone, users.address,adopt.petname, adopt.petbreed, adopt.petcolor, adopt.petprice, adopt.petweight, adopt.petheight, adopt.lifespan, adopt.petage, adopt.petimage from adoptrequest join users on adoptrequest.email = users.email join adopt on adopt.adoptid = adoptrequest.adoptid where adoptrequest.requestid = $requestid";

            return $this->conn->query($sqlquery);
        }

        public function setAction($requestid, $action){
           
            if($action == 1){

                /// for disable pet from adoption
                $this->changeServiceStatus($requestid, 1);

            }else if($action == 2){
                    /// for disable pet from adoption
                    $this->changeServiceStatus($requestid, 2);
            }
            
            //$sqlquery = "update adoptrequest set status = $action where requestid = $requestid";
            //$this->conn->query($sqlquery);
        }
    }

    $serviceRequest = new ServiceRequest();
?>