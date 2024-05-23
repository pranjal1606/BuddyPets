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

	<style>
		.carousel-inner img {
			width: 100%;
			height: 100%;
		}

		.carousel-caption {
			position: absolute;
			top: 50%;
			color: white;
			font-size: 45px;
		}
	</style>
</head>

<body>

	<?php
	$sliderResult = $client->getSlider();
	
	if ($sliderResult->num_rows > 0) {
		echo "<div id='demo' class='carousel slide' data-ride='carousel'>
			<div class='carousel-inner'>";
		$count = 0;
		//str_replace("lovers","lover\'s",$sliderrow[title])
		while ($sliderrow = $sliderResult->fetch_assoc()) {
			//print_r($sliderrow);
			if ($count == 0) {
				echo "<div class='carousel-item active'>
      				<img src='admin/$sliderrow[imagepath]' alt='$sliderrow[title]' width='1100' height='500'>
      				<div class='carousel-caption'>
        				<h3 class='mb-4 font-weight-bold display-3 col-md-11 ftco-animate text-center' style='color:#ffffff'>$sliderrow[title]</h3>
      				</div>   
    			</div>";
				$count++;
			} else {
				echo "<div class='carousel-item'>
      				<img src='admin/$sliderrow[imagepath]' alt='$sliderrow[title]' width='1100' height='500'>
      				<div class='carousel-caption'>
        				<h3>$sliderrow[title]</h3>
      				</div>   
    			</div>";
			}
		}
		echo "</div><a class='carousel-control-prev' href='#demo' data-slide='prev'>
		  <span class='carousel-control-prev-icon'></span>
		</a>
		<a class='carousel-control-next' href='#demo' data-slide='next'>
		  <span class='carousel-control-next-icon'></span>
		</a></div>";
	} else {
		echo "<div class='hero-wrap js-fullheight' style='background-image: url(\"images/bg_1.jpg\");' data-stellar-background-ratio='0.5'>
			<div class='overlay'></div>
			<div class='container'>
			  <div class='row no-gutters slider-text js-fullheight align-items-center justify-content-center' data-scrollax-parent='true'>
				<div class='col-md-11 ftco-animate text-center'>
					<h1 class='mb-4'>A pet lover's paradise</h1>
				</div>
			  </div>
			</div>
		  </div>";
	}
	?>

	<section class="ftco-section bg-light ftco-no-pt ftco-intro">
		<div class="container">
			<div class="row">
				<div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
					<div class="d-block services active text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-blind"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Dog Walking</h3>
							<p>Your dog’s daily walk is likely one of the highlights of their day. Going for a walk can provide your dog with more than just a bathroom break. It can give them physical exercise, mental stimulation, and a chance to keep tabs on the neighborhood.</p>
							
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
					<div class="d-block services text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-dog-eating"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Pet Daycare</h3>
							<p>Caring for your pet means more than just grooming them, feeding them, and giving them belly rubs. Pets are intelligent creatures that require a great deal of socialization and stimulation to be happy and healthy.</p>
							
						</div>
					</div>
				</div>
				<div class="col-md-4 d-flex align-self-stretch px-4 ftco-animate">
					<div class="d-block services text-center">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="flaticon-grooming"></span>
						</div>
						<div class="media-body">
							<h3 class="heading">Pet Grooming</h3>
							<p>Grooming your pets as often as possible is extremely important, and if you are still wondering why you should start right away, here are 4 big reasons why: <br>1.Hygiene and Sanitation <br>2.Regular Check-ups for Early Prevention <br> 3.Prevents Matting</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container">
    		<div class="row d-flex no-gutters">
    			<div class="col-md-5 d-flex">
    				<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about-1.jpg);">
    				</div>
    			</div>
    			<div class="col-md-7 pl-md-5 py-md-5">
    				<div class="heading-section pt-md-5">
	            <h2 class="mb-4">Why Choose Us?</h2>
    				</div>
    				<div class="row">
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-stethoscope"></span></div>
	    					<div class="text pl-3">
	    						<h4>Care Advices</h4>
	    						
	    					</div>
	    				</div>
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-customer-service"></span></div>
	    					<div class="text pl-3">
	    						<h4>Easy Adoption Process</h4>
	    						
	    					</div>
	    				</div>
	    				
	    				<div class="col-md-6 services-2 w-100 d-flex">
	    					<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-veterinarian"></span></div>
	    					<div class="text pl-3">
	    						<h4>Veterinary Help</h4>
	    						
	    					</div>
	    				</div>
	    			</div>
	        </div>
        </div>
    	</div>
    </section> -->



	<section class="ftco-section bg-light ftco-faqs">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 order-md-last">
					<div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url(images/about.jpg);">

					</div>

				</div>

				<div class="col-lg-6">
					<div class="heading-section mb-5 mt-5 mt-lg-0">
						<h2 class="mb-3">Frequently Asks Questions</h2>

					</div>
					<div id="accordion" class="myaccordion w-100" aria-multiselectable="true">
						<?php
						$faqResult = $client->getFaq();
						$count = 0;
						while ($faqRow = $faqResult->fetch_assoc()) {
							if ($count == 0) {
								echo "<div class='card'>
								<div class='card-header p-0' id='headingOne'>
								  <h2 class='mb-0'>
									<button href='#collapse$count' class='d-flex py-3 px-4 align-items-center justify-content-between btn btn-link' data-parent='#accordion' data-toggle='collapse' aria-expanded='true' aria-controls='collapseOne'>
										<p class='mb-0'>$faqRow[question]</p>
									  <i class='fa' aria-hidden='true'></i>
									</button>
								  </h2>
								</div>
								<div class='collapse show' id='collapse$count' role='tabpanel' aria-labelledby='headingOne'>
								  <div class='card-body py-3 px-0'>
									  <ol>
										  <li>$faqRow[description]</li>
									  </ol>
								  </div>
								</div>
							  </div>";
								$count++;
							} else {
								echo "<div class='card'>
								<div class='card-header p-0' id='heading$count'>
								  <h2 class='mb-0'>
									<button href='#collapse$count' class='d-flex py-3 px-4 align-items-center justify-content-between btn btn-link' data-parent='#accordion' data-toggle='collapse'  aria-controls='collapse$count'>
										<p class='mb-0'>$faqRow[question]</p>
									  <i class='fa' aria-hidden='true'></i>
									</button>
								  </h2>
								</div>
								<div class='collapse' id='collapse$count' role='tabpanel' aria-labelledby='heading$count'>
								  <div class='card-body py-3 px-0'>
									  <ol>
										  <li>$faqRow[description]</li>
									  </ol>
								  </div>
								</div>
							  </div>";
							}
						}
						?>
					</div>
				</div>
			</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center pb-5 mb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>Pets Gallery</h2>
				</div>
			</div>
			<div class="row">
				<?php
					$galleryResult = $client->getGallery();

					while($galleryrow = $galleryResult->fetch_assoc()){
						echo "<div class='col-md-4 ftco-animate'>
						<div class='work mb-4 img d-flex align-items-end' style='background-image: url(admin/$galleryrow[imagepath]);'>
							<a href='admin/$galleryrow[imagepath]' class='icon image-popup d-flex justify-content-center align-items-center'>
								<span class='fa fa-expand'></span>
							</a>
							<div class='desc w-100 px-4'>
								<div class='text w-100 mb-3'>
									<span>$galleryrow[title]</span>
								</div>
							</div>
						</div>
					</div>";		
					}
				?>
			</div>
		</div>
	</section>


	<section class="ftco-appointment ftco-section ftco-no-pt ftco-no-pb img" style="background-image: url(images/bg_3.jpg);" id="consultation">
		<div class="overlay"></div>
		<div class="container">
			<div class="row d-md-flex justify-content-end">
				<div class="col-md-12 col-lg-6 half p-3 py-5 pl-lg-5 ftco-animate">
					<h2 class="mb-4">Free Consultation</h2>
					<?php
								if(isset($_SESSION["msg"])){
									echo $_SESSION["msg"];
									unset($_SESSION["msg"]);
								}
							?>
					<form action="#" method="post">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Name" name="sendername" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="email" class="form-control" placeholder="Your Email Address" name="senderemail" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Phone Number" name="senderphone" required>
								</div>
							</div>
							
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<select name="subject" id="subject" class="form-control" required>
												<option value="">Select Services</option>
												<option value="Cat Sitting">Cat Sitting</option>
												<option value="Dog Walk">Dog Walk</option>
												<option value="Pet Spa">Pet Spa</option>
												<option value="Pet Grooming">Pet Grooming</option>
												<option value="Pet Daycare">Pet Daycare</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" value="Send message" class="btn btn-primary py-3 px-4" name="sendMessage">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
	require_once("footer.php");
	?>
	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
		</svg></div>
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
	if(isset($_POST["sendMessage"])){
		$sendername = $_POST["send  ername"];
		$senderemail = $_POST["senderemail"];
		$senderphone = $_POST["senderphone"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];

		$client->saveMessage($sendername, $senderemail, $senderphone, $subject, $message);
		$_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Success ! </strong>  Message Send Successfully.
		</div>";
		header("location:index.php#consultation");
	}
?>