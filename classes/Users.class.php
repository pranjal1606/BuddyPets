<?php
    require_once("Connection.class.php");

    class Users extends Connection{
        public function createNewUser($username, $email, $password, $phone, $address){
            $sqlquery = "select * from users where email = '$email'";
            $result = $this->conn->query($sqlquery);

            if($result->num_rows > 0){
                return 0;
            }else{
                $sqlquery = "insert into users (username, email, password, phone, address) values ('$username', '$email', '$password', '$phone', '$address')";

                $this->conn->query($sqlquery);
                return 1;
            }
        }

        public function userLogin($email, $upass){
            $sqlquery = "select * from users where email = '$email' and password = '$upass'";
            //echo $sqlquery;

            $result = $this->conn->query($sqlquery);

            if($result->num_rows > 0){
                return 1;
            }else{
                return 0;
            }
        }

        public function changePassword($email, $cpass, $npass){
            if($this->userLogin($email, $cpass)){
                $sqlquery = "update users set password = '$npass' where email = '$email'";
                echo $sqlquery;
                $this->conn->query($sqlquery);
                return 1;
            }else{
                return 0;
            }
        }

        public function getPet($adoptid){
            $sqlquery = "select * from adopt where adoptid = $adoptid";
            return $this->conn->query($sqlquery);
        }

        public function generateAdoptRequest($email, $adoptid){
            $sqlquery = "select * from adoptrequest where email = '$email' and adoptid = $adoptid";

            $result = $this->conn->query($sqlquery);

            if($result->num_rows > 0){
                return 0;
            }else{
                $sqlquery = "insert into adoptrequest (email, adoptid) values ('$email', $adoptid)";
                $this->conn->query($sqlquery);
                return 1;
            }
        }

        public function getPreviousRequests($email){
            $sqlquery = "select adoptrequest.*, adopt.*, adoptrequest.status from adoptrequest join adopt on adoptrequest.adoptid = adopt.adoptid and adoptrequest.email = '$email'";
            return $this->conn->query($sqlquery);
        }


        public function getPreviousRequestsforService($email){
            $sqlquery = "select * from servicerequest where email = '$email'";
            return $this->conn->query($sqlquery);
        }

        

        public function bookService($email, $package, $servicedate, $servicetime, $remarks){
            $sqlquery = "insert into servicerequest (email, fordate, fortime, package, remarks) values ('$email', '$servicedate', '$servicetime', '$package', '$remarks')";
            //echo $sqlquery;
            return $this->conn->query($sqlquery);
        }

        public function checkEmail($email){
            $sqlquery = "select * from users where email = '$email'";
            $result = $this->conn->query($sqlquery);
            if($result->num_rows > 0 ){
                return 1;
            }else{
                return 0;
            }
        }

        public function updatePassword($email, $npass){
            $sqlquery = "update users set password = '$npass' where email = '$email'";
            $this->conn->query($sqlquery);
        }
    }
    $users = new Users();
?>