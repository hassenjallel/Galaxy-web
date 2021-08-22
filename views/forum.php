<?php
session_start();
if($_SESSION["username"]==""){
	header('Location: login.php');

}else{
?>
<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from www.spruko.com/demo/splite/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Feb 2019 18:32:58 GMT -->
<head>

		
		
		<title> forum </title>



		<!--Icons css-->
		<link rel="stylesheet" href="../assets/css/icons.css">

		<!--Style css-->
		<link rel="stylesheet" href="../assets/css/style.css">

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

	<body class="app ">
	
	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Galaxy-Design</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown active"><a class="nav-link dropdown avtive" style="color:black;" href="dashbord.php"  aria-haspopup="true" aria-expanded="false">profil</a></li>
            <li class="nav-item"><a class="nav-link " style="color:black;" href="forum.php"  aria-haspopup="true" aria-expanded="false">forum</a></li>


	          <li class="nav-item ">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>

              <div class="dropdown-menu" aria-labelledby="dropdown04">

              	<a class="dropdown-item" href="shop.php">Shop</a>
                <a class="dropdown-item" href="product-single.php">Catalogue</a>
                <a class="dropdown-item" href="afficherCommande.php">Commandes</a>
                <a class="dropdown-item" href="ajout.php">Cartes Credits</a>
                <a class="dropdown-item" href="checkout.php">Cart</a>
                <a class="dropdown-item" href="checkout1.php">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="afficherProbleme.php" class="nav-link">Contact</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
		
		<div class="hero-wrap hero-bread" style="background-image: url('../images/Head-Ceramique.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Checkout</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
          </div>
        </div>
      </div>
    </div>
<!-- END nav -->
<center>

<form method="POST">
<select name="topic" style="width: 300px; height: 40px;font-size: 20px;  border-radius: 50px;background:rgba(230, 230, 230, 0.3);">
<option   value="Tous">Tous les sujets</option> 
<option   value="Lavabou">Lavabo</option>
<option   value="Faience">Faience </option>
<option   value="Bainoire">Bainoire </option> 
<input type="submit" name="submit" value="Filter" style="width: 100px; height: 40px; background-color: #D10024;
border-radius: 30px; box-shadow: 1px 1px 3px;" />
</select> 
<br><br>

</form>
</center>
	
<?PHP

include "../core/forumC.php";


echo "<br> <br> <br> <br>";
 
$username=$_SESSION["username"];

$forum1C=new forumC();
if (isset($_POST['submit'])){
$forum=$forum1C->afficherforumtopic($_POST['topic']);
}else{
		$forum=$forum1C->afficherforum();
}

$db = config::getConnexion();
foreach($forum as $row){



	?>
	
	<section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-8 ">
						<form action="#" class="billing-form bg-light p-3 p-md-5">
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">username</label>
                    <h5><?php echo $row['username'];?> </h5>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">topic</label>
                    <h5><?php echo $row['topic'];?> </h5>
	                </div>
                </div>
                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
                    <label for="country">message</label>
                    <h5><?php echo $row['message'];?> </h5>
		                 
		                
		            	</div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">date</label>
                    <h5><?php echo $row['date'];?> </h5>	                </div>
		            </div>
		          
		           
		          
		            
	              
               
	            </div>
			  </form><!-- END -->
			</div>


        <tbody>
            <tr>
				
			<?php if($_SESSION["username"]==$row['username']){?>
                <td  ><form method="POST" action="supprimerforum.php">
	<input class="btn btn-danger" type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['reference']; ?>" name="reference">
	</td>
	</form>
			
			</div>
			</div>
	<?php
			}
			?>
	

</div>
            </tr>
			
           
        </tbody>
         <?PHP
    }
    ?>
           <!-- taskiret el row !-->            

                    

                    
				<!--app-content closed-->



				<!-- Popupchat open-->
				<form method="POST" action="ajouterforum.php">

				<div class="popup-box chat-popup" id="qnimate">
					<div class="popup-head">
						<div class="popup-head-left pull-left"><img src="../assets/img/avatar/avatar-3.jpg" alt="iamgurdeeposahan" class="mr-2"> <?php echo $row['username'];?> </div>
						<div class="popup-head-right pull-right">

							<button data-widget="remove" id="removeClass" class="chat-header-button pull-right" type="button"><i class="glyphicon glyphicon-off"></i></button>
						</div>
					</div>
					<select name="topic">

  <option value="lavabou">lavabou</option>

  <option value="faience">Faience </option>

  <option value="bainoir">bainoir</option>

</select>

					<div class="popup-messages">
						
					<div class="popup-messages-footer">
					
						<textarea id="status_message" name="message" placeholder="Type a message..." rows="10" cols="40" name="message"></textarea>
						<div class="btn-footer">
						
							<button class="bg_none pull-right" type="submit" ><i class="glyphicon glyphicon-send"> </i> </button>

						</div>
					</div>
				</div>
           </form>
				<!-- Popupchat closed -->

			</div>
		</div>
		<!--app closed-->

		<!-- Back to top -->
		<a href="#top" id="back-to-top" ><i class="fa fa-angle-up"></i></a>

		<!-- Popup-chat -->
		<a href="#" id="addClass"><i class="ti-comment"></i></a>

		<!--Jquery.min js-->
		<script src="../assets/js/jquery.min.js"></script>

		<!--popper js-->
		<script src="../assets/js/popper.js"></script>

		<!--Tooltip js-->
		<script src="../assets/js/tooltip.js"></script>

		<!--Bootstrap.min js-->
		<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Jquery star rating-->
		<script src="../assets/plugins/rating/jquery.rating-stars.js"></script>

		<!--Jquery.nicescroll.min js-->
		<script src="../assets/plugins/nicescroll/jquery.nicescroll.min.js"></script>

		<!--Scroll-up-bar.min js-->
		<script src="../assets/plugins/scroll-up-bar/dist/scroll-up-bar.min.js"></script>

		<!--Sidemenu js-->
		<script src="../assets/plugins/toggle-menu/sidemenu.js"></script>

		<!--mCustomScrollbar js-->
		<script src="../assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- jQuery Sparklines -->
		<script src="../assets/plugins/jquery-sparkline/dist/jquery.sparkline.js"></script>

		<!-- ECharts -->
		<script src="../assets/plugins/echarts/dist/echarts.js"></script>

        <!--Jquery.knob js-->
		<script src="../assets/plugins/othercharts/jquery.knob.js"></script>

		<!--Othercharts js-->
		<script src="../assets/plugins/othercharts/jquery.knob.js"></script>
		<script src="../assets/plugins/othercharts/jquery.sparkline.min.js"></script>

		<!--Morris js-->
		<script src="../assets/plugins/morris/morris.min.js"></script>
		<script src="../assets/plugins/morris/raphael.min.js"></script>

		<!-- ECharts -->
		<script src="../assets/plugins/echarts/echarts.js"></script>

		<!-- Chart.js -->
		<script src="../assets/plugins/Chart.js/dist/Chart.bundle.js"></script>

		<!--Scripts js-->
		<script src="../assets/js/scripts.js"></script>

		<!-- ECharts -->
		<script src="../assets/plugins/echarts/echarts.js"></script>

		<!--Dashboard js-->
		<script src="../assets/js/dashboard5.js"></script>
		<script src="../assets/js/sparkline.js"></script>

		<!--OtherCharts js-->
		<script src="../assets/js/othercharts.js"></script>
		<script src="../assets/js/jquery.showmore.js"></script>

	</body>

<!-- Mirrored from www.spruko.com/demo/splite/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 10 Feb 2019 18:33:03 GMT -->
</html>
<?php
}
?>