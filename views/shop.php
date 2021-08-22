
<?PHP

        require_once "../core/stockC.php";
        $stock1C=new stockC();
        $listestocks=$stock1C->afficherprods();
        
        //var_dump($listestocks->fetchAll());
        ?>
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
  <head>
    <title>Modist - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

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
  </head>

<body>

		  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Galaxy-Design</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
            <li class="nav-item dropdown active"><a class="nav-link dropdown avtive" style="color:black;" href="#"  aria-haspopup="true" aria-expanded="false">profil</a></li>
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
            <li class="nav-item"><a href="afficherwishlist.php" class="nav-link">wishlist</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="afficherProbleme.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="checkout.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php echo $total; ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
		<div class="hero-wrap hero-bread" style="background-image: url('../img/manchester1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Collection</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Product</span></p>
            <p><a href="invoice-db.php" class="btn btn-primary py-3 px-5">Download Catalogue</a></p>
          </div>
        </div>
      </div>
    </div>
    <center>

<form method="POST">
<select name="categorie" style="width: 300px; height: 40px;font-size: 20px;  border-radius: 50px;background:rgba(230, 230, 230, 0.3);">
<option   value="Tous">Tous les produits</option> 
<option   value="Lavabo">Lavabo</option>
<option   value="Faience">Faience </option>
<option   value="Bainoire">Bainoire </option> 
<input type="submit" name="submit" value="Filter" style="width: 100px; height: 40px; background-color: #D10024;
border-radius: 30px; box-shadow: 1px 1px 3px;" />
</select> 
<br><br>

</form>
</center>
  
<?PHP
	 $listestocks=$stock1C->afficherprods();

if(isset($_POST['submit']))
{
	if($_POST['categorie']=='Lavabo')
	{
		$listestocks=$stock1C->tribytype($_POST['categorie']);

	}
	else if($_POST['categorie']=='Faience')
	{
		$listestocks=$stock1C->tribytype($_POST['categorie']);

  }
  else if($_POST['categorie']=='Bainoire')
	{
		$listestocks=$stock1C->tribytype($_POST['categorie']);

  }  
	else
	{

    $listestocks=$stock1C->afficherprods();

	}

}  
?>	

		<section class="ftco-section bg-light">
    <div class="custom-select" style="margin-left:85%;margin-top:50px;">
  <select onchange="la(this.value)"  style="width: 300px; height: 40px;font-size: 20px;  border-radius: 50px;background:rgba(230, 230, 230, 0.3);">
    <option value="shop.php" selected>All</option>
    <option value="shop_croissant.php">Prix Croissant</option>
    <option value="shop_decroissant.php">Prix Decroissant</option>
  </select>
</div>
    	<div class="container-fluid">
    		<div class="row">
				<?PHP
						
						foreach($listestocks as $row){
							?>
					<div class="col-sm col-md-6 col-lg-3 ftco-animate">
            <form action="addtocart.php?idUser=1" method="post">
              <input type="hidden" name="idProduit" value="<?PHP echo $row['id'] ?>">
              <input type="hidden" name="quantite" value="1">
              <input type="hidden" name="prod" value="produit2">
              <input type="hidden" name="price" value="<?PHP echo $row['prix'] ?>">
    				<div class="product">
    					<a href="verifconn.php?id=<?PHP echo $row['id']; ?>" class="img-prod"><img class="img-fluid" src="../img/<?PHP echo $row['fichier']; ?>" alt="Colorlib Template">
    					</a>
    					<div class="text py-3 px-3">
    						<h3><a href="#"><?PHP echo $row['nom'] ?></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><?PHP echo $row['prix'] ?><span> DT</span></p>
		    					</div>
		    					<div class="rating">
	    						
	    						</div>
	    					</div>
	    					<hr>
    						<p class="bottom-area d-flex">
    							 <input class="add-to-cart" type="submit" name="submit" value="add to cart +">
                    <button class="ml-auto" type="submit" name="add-to-wishlist" value="♥"><span><i class="ion-ios-heart-empty"></i></span></button>
    						</p>
    					</div>
    				</div>
          </form>
					</div>
					<?PHP
    }
    ?>
    	</div>
    </section>

		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center py-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
            	<h1 class="big">Subscribe</h1>
              <h2>Subcribe to our Newsletter</h2>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer bg-light ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Modist</h2>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Menu</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Shop</a></li>
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Journal</a></li>
                <li><a href="afficherProbleme.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Help</h2>
              <div class="d-flex">
	              <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
	                <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
	                <li><a href="afficherProbleme.php" class="py-2 d-block">Returns &amp; Exchange</a></li>
	                <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
	                <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
	              </ul>
	              <ul class="list-unstyled">
	                <li><a href="#" class="py-2 d-block">FAQs</a></li>
	                <li><a href="afficherProbleme.php" class="py-2 d-block">Contact</a></li>
	              </ul>
	            </div>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
						  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
  <script>
  function la(src){
    window.location=src;
  }
  </script>  
  </body>
</html>
