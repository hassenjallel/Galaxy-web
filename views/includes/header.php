<?PHP
include_once "../entities/panier.php";
include_once "../core/panierC.php";
include_once "../core/wishlistC.php";
$wishList1C = new WishListC();

$panier1C= new  PanierC();
$idUser=1;
$total=$panier1C->totalProductInCart($idUser);
$totalPrix=$panier1C->totalPriceInCart($idUser);
$totalWish = $wishList1C->totalProductInWishList($idUser);
?>
<!DOCTYPE HTML>

<html>
<head>
	<title>Galaxy Design</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Luxury Furnish Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/simpleCart.min.js"> </script>
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!--//webfont-->
<script src="js/jquery.easydropdown.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
		<script>
			$(document).ready(function() {
				$('.popup-with-zoom-anim').magnificPopup({
					type: 'inline',
					fixedContentPos: false,
					fixedBgPos: true,
					overflowY: 'auto',
					closeBtnInside: true,
					preloader: false,
					midClick: true,
					removalDelay: 300,
					mainClass: 'my-mfp-zoom-in'
			});
		});
		</script>
		<link rel="stylesheet" type="text/css" href="css/monstyle.css">
		    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Galaxy</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
						

	          <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
              	<a class="dropdown-item" href="shop.html">Shop</a>
                <a class="dropdown-item" href="product-single.php">Catalogue</a>
                <a class="dropdown-item" href="cart.php">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div>
            </li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $total; ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
<div class="header">	
      <div class="container"> 
         <div class="header-top">
      		 <div class="logo">
				<a href="index.php"><h6>Online Furnish</h6><h2>Galaxy</h2></a>
			 </div>
		   <div class="header_right">
			 <ul class="social">
				<li><a href=""> <i class="fb"> </i> </a></li>
				<li><a href=""><i class="tw"> </i> </a></li>
				<li><a href=""><i class="utube"> </i> </a></li>
				<li><a href=""><i class="pin"> </i> </a></li>
				<li><a href=""><i class="instagram"> </i> </a></li>
			 </ul>
		    <div class="lang_list">
			  <select tabindex="4" class="dropdown">
				<option value="" class="label" value="">En</option>
				<option value="1">English</option>
				<option value="2">French</option>
				<option value="3">German</option>
			  </select>
   			</div>
			<div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>
		 </div>  
		 <div class="banner_wrap">
			<div class="bannertop_box">
   		 		<ul class="login">
   		 			<li class="login_text"><a href="login.html">Login</a></li>
   		 			<li class="wish"><a href="afficherwishList.php">Wish List (<?php echo $totalWish ?>)</a></li>
   		 			<div class='clearfix'></div>
   		 		</ul>
   		 		<div class="cart_bg">
	   		 	  <ul class="cart">
	   		 		 <a href="checkout.php">
					    <h4><i class="cart_icon"> </i>
					    	<p>Cart: <span class="cart_total_price"><?php echo $totalPrix; ?> Dt</span><span class="cart_total_item"> (<?php echo $total; ?> items)</span>

					    	</p>
					    	<div class="clearfix"> 
					    	</div>
					    </h4>
					 </a>
					 <?php
					 if ($total == 0) {
					 
					 ?>

				     <h5 class="empty"><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></h5>
				     <?php 
					 }
				     ?>
				     <div class="clearfix"> </div>
                  </ul>
	   		 	</div>
			  	<ul class="quick_access">
   		 			<li class="view_cart"><a href="checkout.php">View Cart</a></li>
   		 			<li class="check"><a href="checkout.php">Checkout</a></li>
   		 			<div class='clearfix'></div>
   		 		</ul>
   		 		<div class="search">
	  			   <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
				   <input type="submit" value="">
	  			</div>
	  			<div class="welcome_box">
	  				<h3>Bienvenue chez Galaxy Design</h3>
	  				<p>On travaille sans relâche afin de faciliter la vie de nos clients et de nos fournisseurs afin de vous offrir les meilleurs produits de céramique, mosaïque, plancher chauffant et produits de pose.</p>
	  			</div>
   		 	</div>
   		 	<div class="banner_right">
   		 		<h1>Le meileur choix  <br>et les meilleurs prix</h1>
   		 		<p>Nous importons directement et vendons sans intermédiaire afin de vous offrir les plus beaux produits aux meilleurs prix possibles.</p>
   		 		<a href="#" class="banner_btn">Buy Now</a>
   		 	</div>
   		 	<div class='clearfix'></div>
	    </div>
	   </div>
	</div>
	