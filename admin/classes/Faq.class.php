<?php
    require_once("Connection.class.php");

    class Faq extends Connection{
        public function getAllFaq(){
            $sqlquery = "select * from faq";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function addNewFaq($question, $description){
            $sqlquery = "insert into faq (question, description) values('$question', '$description')";
            echo $sqlquery;
            $this->conn->query($sqlquery);
        }

        public function getSingleFaq($faqid){
            $sqlquery = "select * from faq where faqid = $faqid";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function changeFaqStatus($faqid, $status){
            $sqlquery = "update faq set status = $status where faqid = $faqid";
            $this->conn->query($sqlquery);
        }

        public function updateFaq($faqid, $question, $description){
            $sqlquery = "update faq set question = '$question', description = '$description' where faqid = $faqid";
            $this->conn->query($sqlquery);
        }
        
    }

    $Faq = new Faq();
?>