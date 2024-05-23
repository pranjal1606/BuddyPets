<?php
    require_once("Connection.class.php");

    class Slider extends Connection{
        public function addNewSlider($title, $imagepath){
            $sqlquery = "insert into slider (title, imagepath) values ('$title', '$imagepath')";
            $this->conn->query($sqlquery);
        }

        public function getAllSliderImages(){
            $sqlquery = "select * from slider";
            return $this->conn->query($sqlquery);
        }

        public function changeSliderStatus($sliderid, $status){
            $sqlquery = "update slider set status = $status where sliderid = $sliderid";
            $this->conn->query($sqlquery);
        }

        public function getSingleSlider($sliderid){
            $sqlquery = "select * from slider where sliderid = $sliderid";
            return $this->conn->query($sqlquery);
        }

        public function updateSlider($sliderid, $title, $imagepath){
            $sqlquery = "update slider set title = '$title', imagepath = '$imagepath' where sliderid = $sliderid";
            $this->conn->query($sqlquery);
        }
    }

    $slider = new Slider();
?>