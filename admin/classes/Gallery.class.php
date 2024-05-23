<?php
    require_once("Connection.class.php");

    class Gallery extends Connection{
        public function addNewImage($title, $imagepath){
            $sqlquery = "insert into gallery (title, imagepath) values ('$title', '$imagepath')";
            $this->conn->query($sqlquery);
        }

        public function getAllGalleryImages(){
            $sqlquery = "select * from gallery";
            return $this->conn->query($sqlquery);
        }

        public function changeGalleryStatus($galleryid, $status){
            $sqlquery = "update gallery set status = $status where galleryid = $galleryid";
            $this->conn->query($sqlquery);
        }

        public function getSingleImage($galelryid){
            $sqlquery = "select * from gallery where galleryid = $galelryid";
            return $this->conn->query($sqlquery);
        }

        public function updateGallery($galleryid, $title, $imagepath){
            $sqlquery = "update gallery set title = '$title', imagepath = '$imagepath' where galleryid = $galleryid";
            $this->conn->query($sqlquery);
        }
    }

    $gallery = new Gallery();
?>