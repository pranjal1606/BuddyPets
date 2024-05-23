<?php
    require_once("Connection.class.php");

    class Contact extends Connection{
        public function getContactDetails(){
            $sqlquery = "select * from contactus where contactid = 1";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function updateContact($contactperson, $phone1, $phone2, $email1, $email2, $address, $googlemap){
            $sqlquery = "update contactus set contactperson = '$contactperson', phone1 = '$phone1', phone2 = '$phone2', email1 = '$email1', email2 = '$email2', address = '$address', googlemap = '$googlemap' where contactid = 1";
            $this->conn->query($sqlquery);
        }
    }

    $contact = new Contact();
?>