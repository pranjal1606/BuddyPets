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
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Account <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Forgot Password</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center pb-5 mb-3">
				<div class="heading-section text-center ftco-animate">
					<h2>Forgot Password</h2>
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
                    <input type="email" required name="email" id="email" placeholder="Enter Email Address" class="form-control" autofocus>
                    <input type="submit" name="resetprocess" value="Reset Password" class="btn btn-primary mt-2">
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

        require_once("classes/Users.class.php");

        if($users->checkEmail($email)){
            require_once("sendmail.php");
            $token = base64_encode($email);
            $subject = "Password Reset Link";
            $title = "<h3>Reset Password</h3>";
            $rand = rand(999, 9999);
            $content = "<p>Password Reset Link for Your Account Associated with Our Website <b>Buddy Pets </b> <hr>
                <a href='localhost/buddypets/resetpassword.php?token=$token&id=$rand' style='display:inline-block; width:120px; color:white; background-color:green; text-align:center; padding:10px; text-decoration:none;'>Reset Password</a>
            <hr></p>";

            sendTransactionalEmail($email, $subject, $title, $content);
            $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>Success ! </strong> Password reset link send on yourRegistered Email <b>$email</b> please follow the steps for reset account password.
		    </div>";
		    header("location:forgotpassword.php");
        }else{
            $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>Error ! </strong> $email Email not Registered with us.
		    </div>";
		    header("location:forgotpassword.php");
        }
    }
?>