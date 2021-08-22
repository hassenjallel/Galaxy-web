<?php
        session_start();
        ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>galaxy design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>

    
    <!-- END nav -->
		<div class="hero-wrap js-fullheight" style="background-image: url('../images/Head-Ceramique.jpg');">
		<h3>	<a  href="login.html" style="color:black;padding-left:25%">galaxy - design</a> </h3>

      <div class="overlay"></div>
      <div class="container">
        <div class="no-gutters slider-text js-fullheight align-items-center justify-content-center">
        	<h3 class="v">galaxy design - Time to build your home </h3>
        	<h3 class="vr">Since - 1985</h3>
					<form method="POST" >
						<div class="col-md-6" style="margin-left:20%; padding-top:10%">
								<div class="panel panel-default">
								<div class="panel-heading">
								<h3>	change your password </h3>
								</div>
								<div class="panel-body">
													
																<div class="form-group has-warning">
                                    <label for="inp" class="inp">
                                        <input type="password" name="pasword1" id="inp" placeholder="password">
                                        <span class="border"></span>
                                      </label>  
																	
																</div>
																
															 
																<div class="form-group has-success">
                                    <label for="inp" class="inp">
                                        <input type="password" name="pasword2" id="inp" placeholder="password">
                                        <span class="border"></span>
                                      </label>  
																	
																</div>
															 
											
						
                                <input type="submit" name="changepassword" value="change password">
                               


                                
																</div>
																</div>
																</div>
                            </form>

                           
        </div>
			</div>
			
    </div>

    <?php 
    include "../config.php";

    $user=$_SESSION["user"];
    if(isset($_POST['changepassword'])){
        if($_POST['pasword1'] == $_POST['pasword2'])
        {
        $sql="UPDATE compte SET pasword=:pasword WHERE username=:username";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':username',$user);
		$req->bindValue(':pasword',$_POST['pasword1']);
        $s=$req->execute();
        header('Location: login.php');

        }
        else {
            echo "<script>alert(\"le deux password dois etre identique \")</script>";

        }
    }

  ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.easing.1.3.js"></script>
  <script src="../js/jquery.waypoints.min.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>
  <script src="../js/jquery.animateNumber.min.js"></script>
  <script src="../js/bootstrap-datepicker.js"></script>
  <script src="../js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="../js/google-map.js"></script>
  <script src="../js/main.js"></script>
    
  </body>
</html>