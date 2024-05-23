<?php
	require_once("session.php");
    $package = $_GET["package"];
    require_once("classes/Users.class.php");
    $today = date("Y-m-d");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BuddyPets</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
	<?php
		require_once("links.php");
		require_once("header.php");
	?>
  </head>
  <body>
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Plans <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Select a Plan for Pet</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Confirmation for Selected Package</h2>
          </div>
        </div><?php
            if(isset($_SESSION["msg"])){
              echo $_SESSION["msg"];
              unset($_SESSION["msg"]);
            }
        ?>
    		<div class="row">
        
          <div class="col-md-12">
          <table class="table table-hover table-striped">
            <form action="bookpackage.php?package=<?php echo $package; ?>" method="post">
            <?php
                if($package == "package1"){
                    echo "<tr class='text-center'>
                        <th colspan='2'>Selected Package Contains Following Services </th>
                        </tr>
                        <tr class='text-center'>
                        <td colspan='2'>Bath With Shampoo & Conditioner, Blow Dry, Nail Clipping, Ear Cleaning, Eyes Cleaning, Paw Cleaning, Combing/Brushing</td>
                    </tr>";
                }else if($package == "package2"){
                    echo "<tr class='text-center'>
                    <th>Selected Package Contains Following Services </th>
                    </tr>
                    <tr class='text-center'>
                    <td colspan='2'>Bath With Shampoo & Conditioner, Blow Dry, Full body Trimming/Zero Haircut,  Nail Clipping, Ear Cleaning, Eyes Cleaning, Body Massage, Sanitary Trim, Teeth Cleaning/Mouth Spray, Paw Massage, Combing/Brushing</td>
                </tr>";
                }else if($package == "package2"){
                    echo "<tr class='text-center'>
                    <th>Selected Package Contains Following Services </th>
                    </tr>
                    <tr class='text-center'>
                    <td colspan='2'>Full body Trimming, Eye Cleaning, Ear Cleaning, Nail Clipping</td>
                </tr>";
                }
            ?>
            <tr>
                <th>Select Date for Visit :</th>
                <td>
                    <input type="date" id="visitdate" name="visitdate" class="form-control" required min="<?php echo $today; ?>">
                </td>
            </tr>
            <tr>
                <th>Select Time Slot for Visit :</th>
                <td>
                    <input type="time" id="visittime" name="visittime" class="form-control" required min="08:00" max="18:00" step="1">
                </td>
            </tr>
            <tr>
                <th>Remarks :</th>
                <td>
                    <input type="text" id="remarks" name="remarks" class="form-control" required>
                </td>
            </tr>
              
              <tr>
                <th colspan="2">
                    <input type="submit" value="Book Now" class="btn btn-primary" name="bookProcess">
                </th>
              </tr>
            </table>
            </form>
          </div>
	      </div>
    	</div>
    </section>
	<?php
		require_once("footer.php");
	?>
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  </body>
</html>

<?php 
  if(isset($_POST["bookProcess"])){
    $package = $_GET["package"];
    $visitdate = $_POST["visitdate"];  
    $visittime = $_POST["visittime"];
    $remark = $_POST["remarks"];

    //echo $adoptid;

    if($users->bookService($user, $package, $visitdate, $visittime, $remark)){
      $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>Success ! </strong>  Thanks for generating request for Pet Service, now waiting for approvel or rejection from of request from admin side. 
      </div>";
      header("location:bookpackage.php?package=$package");    
    }
  }
?>