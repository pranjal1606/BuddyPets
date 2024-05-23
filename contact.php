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
					<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contact <i class="ion-ios-arrow-forward"></i></span></p>
					<h1 class="mb-0 bread">Contact</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Contact Us</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper">
						<div class="row mb-5">
							<div class="col-md-4">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-map-marker"></span>
									</div>
									<div class="text">
										<p><span>Address:</span> 
									<?php echo $address;?></p>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-phone"></span>
									</div>
									<div class="text">
										<p><span>Phone:</span> <a href="tel:<?php echo $phone1; ?>"><?php echo $phone1; ?></a></p>
										<?php
											if($phone2 != ""){
												echo "<p><span>Phone:</span> <a href='tel:$phone2'>$phone2</a></p>";
											}
										?>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="dbox w-100 text-center">
									<div class="icon d-flex align-items-center justify-content-center">
										<span class="fa fa-paper-plane"></span>
									</div>
									<div class="text">
										<p><span>Email:</span> <a href="mailto:<?php echo $email1;?>"><?php echo $email1; ?></a></p>
										<?php
											if($email2 != ""){
												echo "<p><span>Email:</span> <a href='mailto:$email2'>$email2</a></p>";
											}
										?>
									</div>
								</div>
							</div>
							
						</div>
						<div class="row no-gutters">
							<div class="col-md-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Contact Us</h3>
									<?php
									if (isset($_SESSION["msg"])) {
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
													<input type="text" class="form-control" placeholder="Subject" name="subject" required>
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
							<div class="col-md-5 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5 img" style="background-image: url(images/img.jpg);">
								</div>
							</div>
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
		$sendername = $_POST["sendername"];
		$senderemail = $_POST["senderemail"];
		$senderphone = $_POST["senderphone"];
		$subject = $_POST["subject"];
		$message = $_POST["message"];

		$client->saveMessage($sendername, $senderemail, $senderphone, $subject, $message);
		$_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
		<button type='button' class='close' data-dismiss='alert'>&times;</button>
		<strong>Success ! </strong>  Message Send Successfully.
		</div>";
		header("location:contact.php");
	}
?>