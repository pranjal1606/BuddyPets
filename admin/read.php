<?php
    require_once("commons/session.php");
    $messagesid = $_GET["messageid"];
    require_once("classes/Messages.class.php");

    $result = $messages->getMessages($messagesid);
    $messages->markAsRead($messagesid);

    while($row = $result->fetch_assoc()){
        $sendername = $row["sendername"];
        $timestamp = $row["timestamp"];
        $senderemail = $row["senderemail"];
        $senderphone = $row["senderphone"];
        $subject = $row["subject"];
        $messagetext = $row["messagetext"];
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
                        <h1 class="h3 mb-0 text-gray-800">Read Messages</h1>
                    </div>
                    <?php
                        //require_once("commons/data.php");
                    ?>
                    
                    <!-- Always Add Custom code here -->
                    <div>
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>Sender Name </th>
                                <td><?php echo $sendername;?></td>
                            </tr>
                            <tr>
                                <th>Time Stamp</th>
                                <td><?php echo $timestamp;?></td>
                            </tr>

                            <tr>
                                <th>Sender Email</th>
                                <td><?php echo $senderemail;?></td>
                            </tr>

                            <tr>
                                <th>Sender Phone</th>
                                <td><?php echo $senderphone;?></td>
                            </tr>

                            <tr>
                                <th>Subject</th>
                                <td><?php echo $subject;?></td>
                            </tr>

                            <tr>
                                <th>Message</th>
                                <td><?php echo $messagetext;?></td>
                            </tr>
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