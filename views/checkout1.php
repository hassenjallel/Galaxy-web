<?PHP
session_start();
include_once "../core/panierC.php";
include_once "../core/produitpanierC.php";
include_once "../entites/panier.php";
$panier1C= new  PanierC();
$Discount=0;
$dilevery=0;
$idUser=$_SESSION['id'];
$total=$panier1C->totalProductInCart($idUser);
$totalPrix=$panier1C->totalPriceInCart($idUser);
$produit1C=new ProduitpanierC();
$panier1C=new PanierC();
$idPanier=$panier1C->dernierPanierDeUser($idUser);
foreach($idPanier as $row)
	{
		$idPanier=$row['idPanier'];
	}
	$produits=$produit1C->fetchProductsByIdPanier($idPanier);

?>

<!DOCTYPE HTML>
<html>
<head>
<title>GalaxyDesign</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="GalaxyDesign Galaxy Design e-com bensamir" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style22.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
<!--//webfont-->
<script src="js/jquery.easydropdown.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/monstyle.css">
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
		
</head>
<body onload='mySnack()'>
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
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="afficherProbleme.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="checkout.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
   <div class="header">
	<div class="container">
		<div class="header-top">
      		<div class="logo">
				<a href="index.html"><h6>Online Furnish</h6><h2>Luxury</h2></a>
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
		 <div class="about_box">
			<ul class="login">
				<li class="login_text"><a href="login.html">Login</a></li>
				<li class="wish"><a href="checkout.php">Wish List</a></li>
				<div class='clearfix'></div>
		    </ul>
		    <ul class="quick_access">
				<li class="view_cart"><a href="checkout.php">View Cart</a></li>
				<li class="check"><a href="checkout.php">Checkout</a></li>
				<div class='clearfix'></div>
		     </ul>
			<div class="search">
			   <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
			   <input type="submit" value="">
			</div>
		  </div>
		</div>
    </div>
    <div class="container">
    <div class="cart-content col-md-9 cart-items ">
    	


<?PHP
foreach($produits as $row){
		$idProduit=$row['idProduit'];
		$infoProduit=$panier1C->fetchProductDetails($idProduit);
	?>

    	<div class="cart-header">
    		
    		<form method="post" action="editItem.php">
    			<input type="hidden" name="idProduitPanier" value="<?php echo $row['idProduitPanier'] ?>">
				 <div class="close1" onclick="mySnack()"> <input type="submit" name="delete-item" style=" width:28px; color: transparent; background-color: transparent; border-color: transparent; cursor: pointer;"></div>
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="images/<?PHP echo $infoProduit['image']; ?>" class="img-responsive" alt="<?PHP echo $infoProduit['name']; ?>">
						</div>
					   <div class="cart-item-info">
						<h3><a href="#"><?PHP echo $infoProduit['name']; ?></a><span>Model No: <?PHP echo $infoProduit['id']; ?></span></h3>
						<ul class="qty">
							<li><p>price : <?PHP echo $infoProduit['price']; ?> Dt</p></li>
							<li><span>Qty : </span><input class="input-qte" type="number" min="1" name="quantite" value="<?PHP echo $row['quantite']; ?>"><input type="submit" name="edit-quantite" value="confirmer"></li>
						</ul>					
				  </div>
				  <div class="clearfix"></div>
			 </div>
			</form>
    	</div>   	


	<?PHP
}
?>
<?php 
    	if ($total == 0) 
    	{
    			echo "Votre Panier est Vide!";
  		}

?>


</div>

    		 <div class="col-md-3 cart-total">
			 <a class="continue" href="#">Continue to basket</a>
			 <div class="price-details">
				 <h3>Price Details</h3>
				 <span>Total</span>
				 <span class="total1"><?php echo $totalPrix; ?></span>
				 <span>Discount</span>
				 <span class="total1"> <?php echo $Discount; ?> </span>
				 <span>Delivery Charges</span>
				 <span class="total1"><?php echo $dilevery; ?></span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span><?php $totalPrix=$totalPrix-$Discount+$dilevery; echo $totalPrix; ?></span></li>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="placeOrder.php?id=<?php echo $idPanier ?>">Place Order</a>
			 
			</div>
   </div>


   <?php   
   if (isset($_GET['message'])) {
   	
	 echo '<div id="snackbar">Item ';
	 echo $_GET['message'];
	 echo " Successfully ! </div>";
	 
   }
   ?>
  

   <script type="text/javascript">
   	function mySnack() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
   </script>
</body>
</html>		
