<?php
	session_start();
    ob_start();

    if(isset($_SESSION["user"])){
        unset($_SESSION["user"]);
    }
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
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Adopt a Pet <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Adopt a Pet</h1>
          </div>
        </div>
      </div>
    </section>


    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Available Pets</h2>
          </div>
        </div>
    		<div class="row">
				<?php
					$adoptResult = $client->getAdopt();

					while($adoptRow = $adoptResult->fetch_assoc()){
						echo "<div class='col-md-4 ftco-animate'>
						<div class='block-7'>
							<div class='img'>
								<img src='admin/$adoptRow[petimage]' class='w-100'>
							</div>
						  <div class='text-center p-4 mt-4'>
							  <span class='excerpt d-block'>$adoptRow[petname]</span>
							  <span class='price'><sup>₹</sup> <span class='number'>$adoptRow[petprice]</span> </span>
						  
							  <ul class='pricing-text mb-5'>
								  <li><span class='fa fa-check mr-2'></span>$adoptRow[petbreed]</li>
								  <li><span class='fa fa-check mr-2'></span> <b> Weight:</b> $adoptRow[petweight]</li>
								  <li><span class='fa fa-check mr-2'></span> <b> Height:</b> $adoptRow[petheight]</li>
								  <li><span class='fa fa-check mr-2'></span> <b>Color:</b> $adoptRow[petcolor]</li>
								  <li><span class='fa fa-check mr-2'></span> <b> Life span:</b> $adoptRow[lifespan]</li>
								  <li><span class='fa fa-check mr-2'></span> <b> Age:</b> $adoptRow[petage]</li>
								  
							  </ul>
		  
							  <a href='adoptprocess.php?adoptid=$adoptRow[adoptid]' class='btn btn-primary d-block px-2 py-3'>Adopt Now</a>
						  </div>
						</div>
					  </div>";
					}
				?>
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