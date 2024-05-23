<?php
?>
<!-- Start nav-->
<div class="wrap">
	<div class="container">
		<div class="row">
			<div class="col-md-6 d-flex align-items-center">
				<p class="mb-0 phone pl-md-2">
					<a href="#" class="mr-2"><span class="fa mr-1"></span>Contact for rescue: </a>
					<a href="tel:<?php echo $phone1; ?>" class="mr-2"><span class="fa fa-phone mr-1"></span><?php echo $phone1; ?></a>
					<a href="mailto:<?php echo $email1; ?>"><span class="fa fa-paper-plane mr-1"></span> <?php echo $email1; ?></a>
				</p>
			</div>
			<div class="col-md-6 d-flex justify-content-md-end">
				<div class="social-media">
					<p class="mb-0 d-flex">
						<?php
						if ($facebook != "") {
							echo "<a href='$facebook' class='d-flex align-items-center justify-content-center'><span class='fa fa-facebook'><i class='sr-only'>Facebook</i></span>
									</a>";
						}

						if ($twitter != "") {
							echo "<a href='$twitter' class='d-flex align-items-center justify-content-center'><span class='fa fa-twitter'><i class='sr-only'>Twitter</i></span>
									</a>";
						}
						if ($instagram != "") {
							echo "<a href='$instagram' class='d-flex align-items-center justify-content-center'><span class='fa fa-instagram'><i class='sr-only'>Instagram</i></span>
									</a>";
						}
						if ($youtube != "") {
							echo "<a href='$youtube' class='d-flex align-items-center justify-content-center'><span class='fa fa-youtube'><i class='sr-only'>Youtube</i></span>
									</a>";
						}
						if ($whatsapp != "") {
							echo "<a href='$whatsapp' class='d-flex align-items-center justify-content-center'><span class='fa fa-whatsapp'><i class='sr-only'>Whatsapp</i></span>
									</a>";
						}
						if ($snapchat != "") {
							echo "<a href='$snapchat' class='d-flex align-items-center justify-content-center'><span class='fa fa-snapchat'><i class='sr-only'>Snapchat</i></span>
									</a>";
						}
						if ($telegram != "") {
							echo "<a href='$telegram' class='d-flex align-items-center justify-content-center'><span class='fa fa-telegram'><i class='sr-only'>Telegram</i></span>
									</a>";
						}

						?>


					</p>
				</div>
			</div>
		</div>
	</div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	<div class="container">
		<a class="navbar-brand" href="index.html"><span class="flaticon-pawprint-1 mr-1"></span>BuddyPets</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="fa fa-bars"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav">
				<li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
				<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
				<li class="nav-item"><a href="adopt.php" class="nav-link">Adopt</a></li>
				<li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
				<li class="nav-item"><a href="pricing.php" class="nav-link">Pricing</a></li>
				<li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

				
				<?php
				if (isset($_SESSION["user1"])) {
					echo "<li class='nav-item dropdown'>
					<a class='nav-link dropdown-toggle' href='#' id='navbardrop' data-toggle='dropdown'>
						Request
					</a>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='servicerequest.php'>Service</a>
						<a class='dropdown-item' href='adoptrequest.php'>Adoption</a>
						<a class='dropdown-item' href='changepassword.php'>Change Password</a>
					</div>
				</li>
						<li class='nav-item'><a href='login.php' class='nav-link'>Logout</a></li>";
				} else {
					echo "<li class='nav-item'><a href='login.php' class='nav-link'>Login</a></li>";
				}
				?>

			</ul>
		</div>
	</div>
</nav>
<!-- END nav -->