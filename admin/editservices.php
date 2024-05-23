<?php
    require_once("commons/session.php");
    require_once("classes/Service.class.php");
    $serviceid = $_GET["serviceid"];
    $result = $services->getSingleServices($serviceid);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $servicename = $row["servicename"];
            $serviceicon = $row["serviceicon"];
            $servicedesc = $row["servicedesc"];
        }

        $serviceicon = str_replace('"', "'", $serviceicon);
    }
    else{
        $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Error ! </strong> Invalid Service id.
        </div>";
        header("location:services.php");
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                        <h1 class="h3 mb-0 text-gray-800">Edit Services</h1>
                        
                    </div>
                    <?php
                    //require_once("commons/data.php");
                    ?>

                    <!-- Always Add Custom code here -->
                    <?php
                    if (isset($_SESSION["msg"])) {
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
                    ?>
                    <div>
                            <form action="#" method="post" class="was-validated">
                                <div class="my-2">
                                    <label for="servicename" class="form-label">Enter Service Name</label>
                                    <input type="text" id="servicename" name="servicename" placeholder="Enter Service Name" class="form-control" required autofocus value="<?php echo $servicename; ?>">
                                </div>
                                <div class="my-2">
                                    <label for="serviceicon" class="form-label">Enter Service Icon <?php echo $serviceicon;?></label>
                                    <input type="text" id="serviceicon" name="serviceicon" placeholder="Enter Service Icon" class="form-control" required value="<?php echo $serviceicon; ?>">
                                    <a href="https://fontawesome.com/v4/icons/" target="_blank">Find Icons</a>
                                </div>
                                <div class="my-2">
                                    <label for="servicedesc" class="form-label">Enter Service Descriotion</label>
                                    <input type="text" id="servicedesc" name="servicedesc" placeholder="Enter Service Description" class="form-control" required value="<?php echo $servicedesc; ?>">
                                </div>
                                <div class="my-2">
                                    <input type="submit" value="Update Service" name="updateProcess" class="btn btn-primary">
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
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>

<?php
    if(isset($_POST["updateProcess"])){
        $servicename = $_POST["servicename"];
        $serviceicon = $_POST["serviceicon"];
        $serviceicon = str_replace("'", '"', $serviceicon);
        $servicedesc = $_POST["servicedesc"];

        $services->updateService($serviceid, $servicename, $serviceicon, $servicedesc);
        $services->logWriter($currentuser, "$servicename Service Updated in Database");
        $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Success ! </strong> $servicename Updated Successfully.
        </div>";
        header("location:services.php");
    }
?>