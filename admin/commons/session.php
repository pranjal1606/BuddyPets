<?php
    session_start();
    ob_start();

    if(isset($_SESSION["validuser"])){
        $currentuser = $_SESSION["validuser"];
    }else{
        $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Error !</strong> Please Login First
        </div>";
        header("location:index.php");

    }
?>  