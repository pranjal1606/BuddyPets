<?php
    require_once("Connection.class.php");
    
    class Users extends Connection{
        public function adminLogin($email, $upass){
            $sqlquery = "select * from adminlogin where email = '$email' and adminpassword = '$upass'";
            //echo $sqlquery;

            $result = $this->conn->query($sqlquery);

            if($result->num_rows > 0){
                return 1;
            }else{
                return 0;
            }
        }

        public function getLogData(){
            $sqlquery = "select * from logs order by (logid)";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function changePassword($email, $cpass, $npass){
            if($this->adminLogin($email, $cpass)){
                $sqlquery = "update adminlogin set adminpassword = '$npass' where email = '$email'";
                echo $sqlquery;
                $this->conn->query($sqlquery);
                return 1;
            }else{
                return 0;
            }
        }

        public function getUsername($email){
            $sqlquery = "select name from adminlogin where email = '$email'";
            $result = $this->conn->query($sqlquery);
            while($row = $result->fetch_assoc()){
                $name = $row["name"];
            }

            return $name;
        }

        public function updateName($email, $name){
            $sqlquery = "update adminlogin set name = '$name' where email = '$email'";
            $this->conn->query($sqlquery);
        }

        public function getAllUsers(){
            $sqlquery = "select * from users";
            return $this->conn->query($sqlquery);
        }
    }

    $users = new Users();
?>
