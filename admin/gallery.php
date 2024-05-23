<?php
require_once("commons/session.php");
require_once("classes/Gallery.class.php");
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
                        <h1 class="h3 mb-0 text-gray-800">Add Gallery Images</h1>
                    </div>
                    <?php
                    //require_once("commons/data.php");
                    ?>

                    <!-- Always Add Custom code here -->
                    <div>
                        <?php
                        if (isset($_SESSION["msg"])) {
                            echo $_SESSION["msg"];
                            unset($_SESSION["msg"]);
                        }
                        ?>
                        <form action="#" method="post" class="was-validated" enctype="multipart/form-data">
                            <div class="my-2">
                                <label for="title" class="form-label">Enter Title</label>
                                <input type="text" id="title" name="title" placeholder="Enter Title for Gallery" class="form-control" required autofocus maxlength="64">
                            </div>
                            <div class="my-2">
                                <label for="image1" class="form-label">Select Any Images for Gallery</label>
                                <input type="file" id="image1" name="image1" placeholder="Select any Image" class="form-control" required accept=".jpg">
                            </div>
                            <div class="my-2">
                                <input type="submit" value="Upload Image" name="uploadProcess" class="btn btn-primary">
                                <input type="reset" value="Reset" class="btn btn-danger">
                            </div>
                        </form>

                        <hr>

                        <!-- Begin Page Content -->
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $result = $gallery->getAllGalleryImages();

                                    while ($row = $result->fetch_assoc()) {
                                        if ($row["status"] == 0) {
                                            $statusbtn = "<a href='gallery.php?galleryid=$row[galleryid]&status=1' class='btn btn-success'>Enable</a>";
                                        } else {
                                            $statusbtn = "<a href='gallery.php?galleryid=$row[galleryid]&status=0' class='btn btn-danger'>Disable</a>";
                                        }
                                        $editbtn = "<a href='editgallery.php?galleryid=$row[galleryid]' class='btn btn-primary'>Edit</a>";
                                        echo "<tr>
                                                <td>$row[title]</td>
                                                <td><img src='$row[imagepath]' style='width:150px;'></td>
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
if (isset($_POST["uploadProcess"])) {
    $title = $_POST["title"];
    $image1 = $_FILES["image1"];

    $source = $image1["tmp_name"];
    $name = $image1["name"];
    $type = $image1["type"];
    $desination = "img/gallery/" . rand(999, 9999) . "_slider_" . $name;
    if ($type == "image/jpg" || $type == "image/jpeg") {

        $gallery->addNewImage($title, $desination);
        move_uploaded_file($source, $desination);

        $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Success ! </strong>  Gallery Image Uploaded Successfully.
            </div>";
    } else {

        $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <strong>Error ! </strong> Must Select *.JPG files Only.
            </div>";
    }
    header("location:gallery.php");
}

if (isset($_GET["status"])) {
    $galleryid = $_GET["galleryid"];
    $status = $_GET["status"];
    $gallery->changeGalleryStatus($galleryid, $status);
    header("location:gallery.php");
}
?>