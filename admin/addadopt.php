<?php
    require_once("commons/session.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Add New Pet For Adoption :</h1>
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
                        <form action="#" method="post" class="was-validated" enctype="multipart/form-data">
                            <div class="my-2">
                            <label for="petname" class="form-label">Enter Pet Name </label>
                                <input type="text" id="petname" name="petname" placeholder="Enter Petname" class="form-control" required autofocus>
                            </div>

                            <div class="my-2">
                            <label for="petprice" class="form-label">Enter Price </label>
                                <input type="text" id="petprice" name="petprice" placeholder="Enter Price of Pet" class="form-control" required>
                            </div>

                            <div class="my-2">
                            <label for="petbreed" class="form-label">Enter Breed</label>
                                <input type="text" id="petbreed" name="petbreed" placeholder="Enter Breed of Pet" class="form-control" required>
                            </div>

                            <div class="my-2">
                            <label for="petweight" class="form-label">Weight </label>
                                <input type="text" id="petweight" name="petweight" placeholder="Enter Weight of Pet" class="form-control" required>
                            </div>

                            <div class="my-2">
                            <label for="petheight" class="form-label">Height </label>
                                <input type="text" id="petheight" name="petheight" placeholder="Enter Height of Pet" required class="form-control">
                            </div>

                            <div class="my-2">
                            <label for="petcolor" class="form-label">Color </label>
                                <input type="text" id="petcolor" name="petcolor" placeholder="Enter Color of Pet" class="form-control" required>
                            </div>

                            <div class="my-2">
                            <label for="lifespan" class="form-label">Life Span </label>
                                <input type="text" id="lifespan" name="lifespan" placeholder="Enter Life Span of Pet" class="form-control" required>
                            </div>

                            <div class="my-2">
                            <label for="petage" class="form-label">Age </label>
                                <input type="text" id="petage" name="petage" placeholder="Enter Age of Pet" class="form-control" required>
                            </div>

                          
                            <div class="my-2">
                                <label for="image1" class="form-label">Select Any Images of Pet</label>
                                <input type="file" id="petimage" name="petimage" placeholder="Select any Image of Pet" class="form-control" required accept=".jpg">
                            </div>
                            <div class="my-2">
                                <input type="submit" value="Add New Pet" name="uploadProcess" class="btn btn-primary">
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
    if(isset($_POST["uploadProcess"])){
        $petname = $_POST["petname"];      
        $petprice = $_POST["petprice"];
        $petbreed = $_POST["petbreed"];
        $petweight = $_POST["petweight"];
        $petheight = $_POST["petheight"];
        $petcolor = $_POST["petcolor"];
        $lifespan = $_POST["lifespan"];
        $petage = $_POST["petage"];
        $petimage = $_FILES["petimage"];

        $type = $petimage["type"];

        if($type == "image/jpg" || $type == "image/jpeg"){
            $source = $petimage["tmp_name"];
            $name = $petimage["name"];
            $rand = rand(1000, 9999);
            $destination = "img/petimages/$rand $petname $name";

            require_once("classes/Adoption.class.php");

            $adoption->addNewPet($petname, $petprice, $petbreed, $petweight, $petheight, $petcolor, $lifespan, $petage, $destination);

            move_uploaded_file($source, $destination);
            $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Success ! </strong> $petname Pet Added for Adoption.
            </div>";

        }else{
            $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Error ! </strong>  must select *.JPG files Only.
            </div>";
        }

        header("location:addadopt.php");
    }
?>