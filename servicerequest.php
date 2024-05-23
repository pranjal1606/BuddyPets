<?php
	require_once("session.php");
    require_once("classes/Users.class.php");
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
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Requests<i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Requests</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2>Previously Generated Requested for Get Service for Pet.</h2>
          </div>
        </div>
        
        <div class="row">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Booking for Date</th>
                        <th>Time</th>
                        <th>Booking Time</th>
                        <th>Status</th>
                    </tr>
                </thead>    

                <tbody>
                <?php
                    $result = $users->getPreviousRequestsforService($user);
                    while($row = $result->fetch_assoc()){
                        //print_r($row);
                        //$status = $row["addoptrequest.status"];
                        if($row["status"] == 0){
                          $status = "<span class='text-info'>Pending</span>";
                      }else if($row["status"] == 1){
                          $status = "<span class='text-success'>Approved</span>";
                      }else if($row["status"] == 2){
                          $status = "<span class='text-danger'>Rejected</span>";
                      }
                        echo "<tr>
                            <td>$row[package]</td>
                            <td>$row[fordate]</td>
                            <td>$row[fortime]</td>
                            <td>$row[timestamp]</td>
                            
                            <td>$status</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
            
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
  if(isset($_POST["adoptProcess"])){
    $adoptid = $_POST["adoptid"];
    //echo $adoptid;

    if($users->generateAdoptRequest($user, $adoptid)){
      $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>Success ! </strong>  Thanks for generating request for adopt this Pet, now waiting for approvel or rejection from of request from admin side. 
      </div>";
      header("location:adoptprocess.php?adoptid=$adoptid");    
    }else{
      $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>Error ! </strong>  You already generated request for adopt this Pet, now waiting for approvel or rejection from of request from admin side. 
      </div>";
      header("location:adoptprocess.php?adoptid=$adoptid");    
    }
  }
?>