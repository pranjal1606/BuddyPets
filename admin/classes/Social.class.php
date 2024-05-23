<?php
    require_once("Connection.class.php");

    class Social extends Connection{
        public function getSocialLinks(){
            $sqlquery = "select * from socialmedia where socialid = 1";
            $result = $this->conn->query($sqlquery);
            return $result;
        }

        public function updateSocialMedia($facebook, $twitter, $instagram, $youtube, $whatsapp, $snapchat, $telegram){
            $sqlquery = "update socialmedia set facebook = '$facebook', twitter = '$twitter', instagram = '$instagram', youtube = '$youtube', whatsapp = '$whatsapp', snapchat = '$snapchat', telegram = '$telegram' where socialid = 1";
            $this->conn->query($sqlquery);
        }
    }

    $social = new Social();
?>