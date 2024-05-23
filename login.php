<?php 
    session_start();
    ob_start();

    if(isset($_SESSION["user1"])){
        unset($_SESSION["user1"]);
    }

    require_once("classes/Users.class.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BuddyPets</title>
    <?php
        require_once("links.php");
		require_once("header.php");
	?>
    <link rel="stylesheet" href="login.css">

</head>
<body>
        <?php 
                    if(isset($_SESSION["msg"])){
                        echo $_SESSION["msg"];
                        unset($_SESSION["msg"]);
                    }
        ?>
          <div class="cont" style="height:950px;">
              <div class="form sign-in">
                  <h2>Welcome</h2>
                  <form action="#" method="post">
                  <label>
                      <span>Email</span>
                      <input type="email" name="email"  required/>
                  </label>
                  <label>
                      <span>Password</span>
                      <input type="password" name="password" required/>
                  </label>
                  <button type="submit" class="submit" name="loginProcess">Sign In</button>
                
                <div class="text-center">
                    <a href="forgotpassword.php">Forgot Password</a>
                </div>
                  </form>
              </div>
              <div class="sub-cont">
                  <div class="img">
                      <div class="img__text m--up">
                       
                          <h3>Don't have an account? Please Sign up!<h3>
                      </div>
                      <div class="img__text m--in">
                          <h3>If you already has an account, just sign in.<h3>
                      </div>
                      <div class="img__btn">
                          <span class="m--up">Sign Up</span>
                          <span class="m--in">Sign In</span>
                      </div>
                  </div>
                  <div class="form" >
                      <h2>Create your Account</h2>
                      <form action="#" method="post">
                      <label>
                          <span>Name</span>
                          <input type="text" name="username" required />
                      </label>
                      <label>
                          <span>Email</span>
                          <input type="email" name="email" required/>
                      </label>
                      <label>
                          <span>Password</span>
                          <input type="password" name="password" required/>
                      </label>

                      <label>
                          <span>Confirm Password</span>
                          <input type="password" name="cpassword" required/>
                      </label>

                      <label>
                          <span>Phone Number</span>
                          <input type="text" name="phone" required/>
                      </label>

                      <label>
                          <span>Address</span><br>
                          <textarea name="address" required style="resize: none;" rows="5"></textarea>
                      </label>
                      <button type="submit" class="submit" value="Create Account" name="registerProcess">Sign Up</button>
                      </form>
                  </div>
              </div>
          </div>
      
          <script>
              document.querySelector('.img__btn').addEventListener('click', function() {
                  document.querySelector('.cont').classList.toggle('s--signup');
              });
          </script>
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
    if(isset($_POST["registerProcess"])){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

        if($password == $cpassword){
            $password = sha1($password);
            if($users->createNewUser($username, $email, $password, $phone, $address)){
                $_SESSION["msg"] = "<div class='alert alert-success alert-dismissible'>
		        <button type='button' class='close' data-dismiss='alert'>&times;</button>
		        <strong>Success ! </strong> $email Account Created.
		        </div>";
		        header("location:login.php");
            }else{
                $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
		        <button type='button' class='close' data-dismiss='alert'>&times;</button>
		        <strong>Error ! </strong>  $email already Registed with us please try to Login.
		        </div>";
		        header("location:login.php");    
            }
        }else{
            $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>Error ! </strong>  Confirm Password does not Match.
		    </div>";
		    header("location:login.php");
        }
    }

    if(isset($_POST["loginProcess"])){
        $email = $_POST["email"];
        $password = sha1($_POST["password"]);      

        if($users->userLogin($email, $password)){
            $_SESSION["user1"] = $email;
            header("location:adopt.php");
        }else{
            $_SESSION["msg"] = "<div class='alert alert-danger alert-dismissible'>
		    <button type='button' class='close' data-dismiss='alert'>&times;</button>
		    <strong>Error ! </strong>  Email Password does not Match.
		    </div>";
		    header("location:login.php");
        }
    }
?>