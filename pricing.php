<?php
	session_start();
	ob_start();
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
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Pricing <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Pricing</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2>Affordable Packages</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-4 ftco-animate">
	          <div class="block-7">
	          	<div class="img" style="background-image: url(images/pricing-1.jpg);"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">Spa Bath</span>
	            	<span class="price"><sup>₹</sup> <span class="number">1500</span> <sub> / Visit</sub></span>
	            
		            <ul class="pricing-text mb-5">
						<li><span class="fa fa-check mr-2"></span>Bath With Shampoo & Conditioner</li>
						<li><span class="fa fa-check mr-2"></span>Blow Dry</li>
						<li><span class="fa fa-check mr-2"></span>Nail Clipping</li>
						<li><span class="fa fa-check mr-2"></span>Ear Cleaning</li>
						<li><span class="fa fa-check mr-2"></span>Eyes Cleaning</li>
						<li><span class="fa fa-check mr-2"></span>Paw Cleaning</li>
						<li><span class="fa fa-check mr-2"></span>Combing/Brushing</li>
		            </ul>

	            	<a href="bookpackage.php?package=package1" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	          	<div class="img" style="background-image: url(images/pricing-2.jpg);"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">full service</span>
		            <span class="price"><sup>₹</sup> <span class="number">3000</span> <sub> / Visit</sub></span>
		            
		            <ul class="pricing-text mb-5">
						<li><span class="fa fa-check mr-2"></span>Bath With Shampoo & Conditioner</li>
						<li><span class="fa fa-check mr-2"></span>Blow Dry</li>
						<li><span class="fa fa-check mr-2"></span>Full body Trimming/Zero Haircut</li>
						<li><span class="fa fa-check mr-2"></span>Eye Cleaning</li>
						<li><span class="fa fa-check mr-2"></span>Ear Cleaning</li>
						<li><span class="fa fa-check mr-2"></span>Body Massage</li>
						<li><span class="fa fa-check mr-2"></span>Sanitary Trim</li>
						<li><span class="fa fa-check mr-2"></span>Nail Clipping</li>
						<li><span class="fa fa-check mr-2"></span>Teeth Cleaning/Mouth Spray</li> 
						<li><span class="fa fa-check mr-2"></span>Paw Massage</li>
						<li><span class="fa fa-check mr-2"></span>Combing/Brushing</li>
		            </ul>

		            <a href="bookpackage.php?package=package2" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate">
	          <div class="block-7">
	          	<div class="img" style="background-image: url(images/pricing-3.jpg);"></div>
	            <div class="text-center p-4">
	            	<span class="excerpt d-block">Trans-fur-mation</span>
		            <span class="price"><sup>₹</sup> <span class="number">2000</span> <sub> / Visit</sub></span>
		            
		            <ul class="pricing-text mb-5">
						<li><span class="fa fa-check mr-2"></span>Full body Trimming</li>
						<li><span class="fa fa-check mr-2"></span>Eye Cleaning</li>
						<li><span class="fa fa-check mr-2"></span>Ear Cleaning</li>
						<li><span class="fa fa-check mr-2"></span>Nail Clipping</li>
		            </ul>

		            <a href="bookpackage.php?package=package3" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
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