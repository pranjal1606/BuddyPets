<?php
    require_once("commons/session.php");
    require_once("classes/Contact.class.php");

    $result = $contact->getContactDetails();

    while($row = $result->fetch_assoc()){
        $contactperson = $row["contactperson"];
        $phone1 = $row["phone1"];
        $phone2 = $row["phone2"];
        $email1 = $row["email1"];
        $email2 = $row["email2"];
        $address = $row["address"];
        $googlemap = $row["googlemap"];
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
                        <h1 class="h3 mb-0 text-gray-800">Contact US Details</h1>
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
                            <label for="contactperson" class="form-label">Enter Name of Person </label>
                                <input type="text" id="contactperson" name="contactperson" placeholder="Enter Name of Person" class="form-control" required autofocus value="<?php echo $contactperson;?>">
                            </div>
                            <div class="my-2">
                            <label for="phone1" class="form-label">Enter Phone 1 </label>
                                <input type="text" id="phone1" name="phone1" placeholder="Enter First Phone NUmber" class="form-control" value="<?php echo $phone1;?>">
                            </div>

                            <div class="my-2">
                            <label for="phone1" class="form-label">Enter Phone 2 </label>
                                <input type="text" id="phone2" name="phone2" placeholder="Enter Second Phone NUmber" class="form-control"  value="<?php echo $phone2;?>">
                            </div>

                            <div class="my-2">
                            <label for="email1" class="form-label">Enter Email 1 </label>
                                <input type="email" id="email1" name="email1" placeholder="Enter First Email Address" class="form-control"  value="<?php echo $email1;?>">
                            </div>

                            <div class="my-2">
                            <label for="email2" class="form-label">Enter Email 2 </label>
                                <input type="email" id="email2" name="email2" placeholder="Enter Second Email Address" class="form-control"  value="<?php echo $email2;?>">
                            </div>

                            <div class="my-2">
                            <label for="address" class="form-label">Enter Address</label>
                                <textarea id="address" name="address" placeholder="Enter Address" class="form-control"><?php echo $address;?></textarea>
                            </div>

                            <div class="my-2">
                            <label for="googlemap" class="form-label">Enter Email 2 </label>
                                <textarea id="googlemap" name="googlemap" placeholder="Enter Google Map Link" class="form-control" rows="10"><?php echo $googlemap;?>
                                </textarea>
                            </div>

                            <div class="my-2">
                                <input type="submit" value="Update Contact Details" name="changeProcess" class="btn btn-primary">
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
        $contactperson = $_POST["contactperson"];
        $phone1 = $_POST["phone1"];
        $phone2 = $_POST["phone2"];
        $email1 = $_POST["email1"];
        $email2 = $_POST["email2"];
        $address = $_POST["address"];
        $googlemap = $_POST["googlemap"];      

        $contact->updateContact($contactperson, $phone1, $phone2, $email1, $email2, $address, $googlemap);

        
        $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Success ! </strong>  Contact Details Updated Successfully
        </div>";
        header("location:contact.php");
    }
?>