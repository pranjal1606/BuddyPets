<?php
    require_once("commons/session.php");
    require_once("classes/Social.class.php");

    $result = $social->getSocialLinks();

    while($row = $result->fetch_assoc()){
        $facebook = $row["facebook"];
        $twitter = $row["twitter"];
        $instagram = $row["instagram"];
        $youtube = $row["youtube"];
        $whatsapp = $row["whatsapp"];
        $snapchat = $row["snapchat"];
        $telegram = $row["telegram"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <?php
        require_once("commons/title.php");
    ?>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
            require_once("commons/sidebar.php");
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?php
                    require_once("commons/topbar.php");
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Social Media Links</h1>
                    </div>
                    <?php
                        //require_once("commons/data.php");
                    ?>
                    
                    <!-- Always Add Custom code here -->
                    <div>
                    <?php
                            if(isset($_SESSION["msg"])){
                                echo $_SESSION["msg"];
                                unset($_SESSION["msg"]);
                            }
                        ?>
                        <form action="#" method="post" class="was-validated">
                            <div class="my-2">
                            <label for="facebook" class="form-label">Enter Facebook URL </label>
                                <input type="url" id="facebook" name="facebook" placeholder="Enter Facebook Link" class="form-control" autofocus value="<?php echo $facebook;?>">
                            </div>

                            <div class="my-2">
                            <label for="twitter" class="form-label">Enter Twitter URL </label>
                                <input type="url" id="twitter" name="twitter" placeholder="Enter Twitter Link" class="form-control" value="<?php echo $twitter;?>">
                            </div>

                            <div class="my-2">
                            <label for="instagram" class="form-label">Enter Instagram URL </label>
                                <input type="url" id="instagram" name="instagram" placeholder="Enter Instagram Link" class="form-control" value="<?php echo $instagram;?>">
                            </div>

                            <div class="my-2">
                            <label for="youtube" class="form-label">Enter Youtube URL </label>
                                <input type="url" id="youtube" name="youtube" placeholder="Enter Youtube Link" class="form-control" value="<?php echo $youtube;?>">
                            </div>

                            <div class="my-2">
                            <label for="whatsapp" class="form-label">Enter Whatsapp URL </label>
                                <input type="url" id="whatsapp" name="whatsapp" placeholder="Enter Whatsapp Link" class="form-control" value="<?php echo $whatsapp;?>">
                            </div>

                            <div class="my-2">
                            <label for="snapchat" class="form-label">Enter Snapchat URL </label>
                                <input type="url" id="snapchat" name="snapchat" placeholder="Enter Snapchat Link" class="form-control" value="<?php echo $snapchat;?>">
                            </div>

                            <div class="my-2">
                            <label for="telegram" class="form-label">Enter Telegram URL </label>
                                <input type="url" id="telegram" name="telegram" placeholder="Enter telegram Link" class="form-control" value="<?php echo $telegram;?>">
                            </div>

                            <div class="my-2">
                                <input type="submit" value="Update Social Media Links" name="changeProcess" class="btn btn-primary">
                                <input type="reset" value="Reset" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
                require_once("commons/footer.php");
            ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>
</html>

<?php
    if(isset($_POST["changeProcess"])){
        $facebook = $_POST["facebook"];
        $twitter = $_POST["twitter"];
        $instagram = $_POST["instagram"];
        $youtube = $_POST["youtube"];
        $whatsapp = $_POST["whatsapp"];
        $snapchat = $_POST["snapchat"];
        $telegram = $_POST["telegram"];      

        $social->updateSocialMedia($facebook, $twitter, $instagram, $youtube, $whatsapp, $snapchat, $telegram);

        $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Success ! </strong> Social Media Links Updated
        </div>";
        header("location:social.php");
    }
?>