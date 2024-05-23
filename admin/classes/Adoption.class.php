<?php
    require_once("Connection.class.php");

    class Adoption extends Connection{
        public function addNewPet($petname, $petprice, $petbreed, $petweight, $petheight, $petcolor, $lifespan, $petage, $petimage){
            $sqlquery = "insert into adopt (petname, petprice, petbreed, petweight, petheight, petcolor, lifespan, petage, petimage) values ('$petname', '$petprice', '$petbreed', '$petweight', '$petheight', '$petcolor', '$lifespan', '$petage', '$petimage')";
            //echo $sqlquery;
            $this->conn->query($sqlquery);
        }

        public function getAllAdoption(){
            $sqlquery = "select * from adopt";
            return $this->conn->query($sqlquery);
        }

        public function changeAdoptStatus($adoptid, $status){
            $sqlquery = "update adopt set status = $status where adoptid = $adoptid";
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

        public function getAdoptionRequests(){
            $sqlquery = "select adoptrequest.requestid, adoptrequest.datetime, adoptrequest.adoptid, adoptrequest.email, adoptrequest.status, users.username, users.email, users.phone, users.address,adopt.petname, adopt.petbreed, adopt.petcolor, adopt.petimage from adoptrequest join users on adoptrequest.email = users.email join adopt on adopt.adoptid = adoptrequest.adoptid";

            return $this->conn->query($sqlquery);
        }

        public function getAdoptionRequest($requestid){
            $sqlquery = "select adoptrequest.requestid, adoptrequest.datetime, adoptrequest.adoptid, adoptrequest.email, adoptrequest.status, users.username, users.email, users.phone, users.address,adopt.petname, adopt.petbreed, adopt.petcolor, adopt.petprice, adopt.petweight, adopt.petheight, adopt.lifespan, adopt.petage, adopt.petimage from adoptrequest join users on adoptrequest.email = users.email join adopt on adopt.adoptid = adoptrequest.adoptid where adoptrequest.requestid = $requestid";

            return $this->conn->query($sqlquery);
        }

        public function setAction($requestid, $action){
            $sqlquery = "select adoptid from adoptrequest where requestid = $requestid";
            $result = $this->conn->query($sqlquery);

            while($row = $result->fetch_assoc()){
                $adoptid = $row["adoptid"];
            }

            if($action == 1){

                /// for disable pet from adoption
                $this->changeAdoptStatus($adoptid, 0);

                // for deny all other adoption request on selected pet
                $sqlquery = "update adoptrequest set status = 2 where adoptid = $adoptid and requestid != $requestid";
                $this->conn->query($sqlquery);

            }else if($action == 2){
                    /// for disable pet from adoption
                    $this->changeAdoptStatus($adoptid, 1);
    
                    // for deny all other adoption request on selected pet
                    //$sqlquery = "update adoptrequest set status = 2 where adoptid = $adoptid and requestid != $requestid";
                    //$this->conn->query($sqlquery);
    
                
            }
            
            $sqlquery = "update adoptrequest set status = $action where requestid = $requestid";
            $this->conn->query($sqlquery);
        }
    }

    $adoption = new Adoption();
?>