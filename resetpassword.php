<?php
  session_start();
  ob_start();
  $email = base64_decode($_GET["token"]);
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
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Account <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Change Password</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center pb-5 mb-3">
				<div class="col-md-7 heading-section text-center ftco-animate">
					<h2>Reste Password</h2>
				</div>
			</div>
			<div class="row">
                <div class="col-12">
                    <?php
                        if(isset($_SESSION["msg"])){
                            echo $_SESSION["msg"];
                            unset($_SESSION["msg"]);
                        }
                    ?>
				<form action="#" method="post">
                    <input type="email" required name="email" id="email" placeholder="Enter Email Address" class="form-control my-2" autofocus readonly value="<?php echo $email; ?>">
                    <input type="password" name="npass" id="npass" class="form-control my-2" required placeholder="Enter New Password">
                    <input type="password" name="cpass" id="cpass" class="form-control my-2" required placeholder="Re Enter New Password">
                    <input type="submit" name="resetprocess" value="Change Password" class="btn btn-primary mt-2">
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
    if(isset($_POST["resetprocess"])){
        $email = $_POST["email"];
        $cpass = $_POST["cpass"];
        $npass = $_POST["npass"];

        if($cpass === $npass){
            $npass = sha1($npass);
            require_once("classes/Users.class.php");
            $users->updatePassword($email, $npass);
            $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>Success ! </strong> Password updated Successfully please login.
		    </div>";
		    header("location:login.php");
        }else{
            $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>Error ! </strong> Confirm password does not match
		    </div>";
		    header("location:resetpassword.php");
        }
    }
?>