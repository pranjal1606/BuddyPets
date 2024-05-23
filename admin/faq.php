<?php
    require_once("commons/session.php");
    require_once("classes/Faq.class.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Add / Manage FAQ</h1>
                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#addform">Add</button>
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
                        <div id="addform" class="collapse">

                            <form action="#" method="post" class="was-validated">
                                <div class="my-2">
                                    <label for="question" class="form-label">Enter Question</label>
                                    <input type="text" id="question" name="question" placeholder="Enter Question" class="form-control" required autofocus>
                                </div>
                                <div class="my-2">
                                    <label for="description" class="form-label">Enter Descriotion</label>
                                    <textarea  id="description" name="description" placeholder="Enter Descriotion" class="form-control" required rows="10" style="resize: none;"></textarea>
                                </div>
                                
                                <div class="my-2">
                                    <input type="submit" value="Add New Service" name="addProcess" class="btn btn-primary">
                                    <input type="reset" value="Reset" class="btn btn-danger">
                                </div>
                            </form>
                            <hr>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Question</th>                        <th>Descriotion</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Question</th>
                                        <th>Descriotion</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                   <?php
                                        $result = $Faq->getAllFaq();
                                        while($row = $result->fetch_assoc()){
                                            if($row["status"] == 0){
                                                $statusbtn = "<a href='faq.php?faqid=$row[faqid]&status=1' class='btn btn-success'>Enable</a>";
                                            }else{
                                                $statusbtn = "<a href='faq.php?faqid=$row[faqid]&status=0' class='btn btn-danger'>Disable</a>";
                                            }
                                            $editbtn = "<a href='editfaq.php?faqid=$row[faqid]' class='btn btn-primary'>Edit</a>";
                                            echo "<tr>
                                                <td>$row[question]</td>
                                                <td>$row[description]</td>
                                                <td>$statusbtn</td>
                                                <td>$editbtn</td>
                                            </tr>";
                                        }
                                   ?>
                                </tbody>
                            </table>
                        </div>
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
    if(isset($_POST["addProcess"])){
        $question = $_POST["question"];
        $description = $_POST["description"];
        
        $Faq->addNewFaq($question, $description);
        $Faq->logWriter($currentuser, "$question FAQ Added in Database");
        $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
        <strong>Success ! </strong> $question Added Successfully.
        </div>";
        header("location:faq.php");
    }

    if(isset($_GET["status"])){
        $faqid = $_GET["faqid"];
        $status = $_GET["status"];
        $Faq->changeFaqStatus($faqid, $status);
        header("location:faq.php");
    }
?>