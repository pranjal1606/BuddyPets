<?php
    require_once("commons/session.php");
    $requestid = $_GET["requestid"];
    require_once("classes/Adoption.class.php");
    $result = $adoption->getAdoptionRequest($requestid);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $petname = $row["petname"];
            $petprice = $row["petprice"];
            $petbreed = $row["petbreed"];
            $petweight = $row["petweight"];
            $petheight = $row["petheight"];
            $petcolor = $row["petcolor"];
            $lifespan = $row["lifespan"];
            $petage = $row["petage"];
            $petimage = $row["petimage"];
            $username = $row["username"];
            $email = $row["email"];
            $phone = $row["phone"];
            $address = $row["address"];
            $datetime = $row["datetime"];
        }
    }else{
        header("location:adoptrequest.php");
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
                        <h1 class="h3 mb-0 text-gray-800">View Adopt Request</h1>
                    </div>
                    <?php
                        //require_once("commons/data.php");
                    ?>
                    
                    <!-- Always Add Custom code here -->
                    <div>
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th colspan="2">Pet Information</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <th>Pet Name</th>
                                    <td><?php echo $petname; ?></td>
                                </tr>
                                <tr>
                                    <th>Pet Price</th>
                                    <td><?php echo $petprice; ?></td>
                                </tr>

                                <tr>
                                    <th>Pet Height</th>
                                    <td><?php echo $petheight; ?></td>
                                </tr>

                                <tr>
                                    <th>Pet Wight</th>
                                    <td><?php echo $petweight; ?></td>
                                </tr>

                                <tr>
                                    <th>Pet Breed</th>
                                    <td><?php echo $petbreed; ?></td>
                                </tr>

                                <tr>
                                    <th>Pet Color</th>
                                    <td><?php echo $petcolor; ?></td>
                                </tr>

                                <tr>
                                    <th>Pet Age</th>
                                    <td><?php echo $petage; ?></td>
                                </tr>

                                <tr>
                                    <th>Pet Lifespan</th>
                                    <td><?php echo $lifespan; ?></td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <img src="<?php echo $petimage; ?>" class="w-100">
                                    </td>
                                </tr>

                                <thead class="table-dark">
                                    <tr>
                                        <th colspan="2">User Information</th>
                                    </tr>
                                </thead>

                                <tr>
                                    <th>Username</th>
                                    <td><?php echo $username; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?php echo $email; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td><?php echo $phone; ?></td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td><?php echo $address; ?></td>
                                </tr>

                                <thead class="table-dark">
                                    <tr>
                                        <th colspan="2">
                                            Adopt Request Details
                                        </th>
                                    </tr>
                                </thead>
                                    <tr>
                                        <th>Request Date</th>
                                        <td><?php echo $datetime; ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>Action</th>
                                        <td>
                                            <form action="#" method="post">
                                                <select name="action" class="form-control">
                                                    <option value="1">Approve</option>
                                                    <option value="2">Deny</option>
                                                </select>
                                                <input type="submit" value="Set Now" name="setAction" class="btn btn-primary mt-3">
                                            </form>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>
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
    if(isset($_POST["setAction"])){
        $action = $_POST["action"];      
        $adoption->setAction($requestid, $action);
        header("location:adoptrequest.php");
    }
?>