<?PHP
session_start();
include_once "../core/panierC.php";
include_once "../core/produitpanierC.php";
include_once "../entities/panier.php";
include_once "../core/CommandeC.php";
include_once "../core/CreditCardC.php";
include_once "../entities/Commande.php";
include_once "../entities/CreditCard.php";
$cc1C=new CreditCardC();
$idd=$_SESSION['idUser'];
$listeCC=$cc1C->afficherListCC($idd);

$panier1C= new  PanierC();
$Discount=0;
$dilevery=0;
$idPanier1=1;
$idUser=$_SESSION['idUser'];
$total=$panier1C->totalProductInCart($idUser);
$totalPrix=$panier1C->totalPriceInCart($idUser);
$produit1C=new ProduitpanierC();
$panier1C=new PanierC();
$idPanier=$panier1C->dernierPanierDeUser($idUser);
foreach($idPanier as $row)
	{
		$idPanier1=$row['idPanier'];
	}
	$produits=$produit1C->fetchProductsByIdPanier($idPanier1);

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
    <br>
    <br>
    <br>
    <br>
    <div class="container">
    <form method="post" action="ajoutCommande.php">
    <div class="cart-content col-md-9 cart-items ">
    	<h3>Mode De Payment : </h3>
    	<div class="methode container">
    		<?PHP
    		 foreach($listeCC as $row){
			//if($_GET["id"] == $row['id']){
			?>
		<div class="col-md-8">
    	<input type="radio" name="methode" value="<?PHP echo $row['numCc'] ?>" required >Carte n°: <?PHP echo $row['numCc'] ?> <br> <span class="date_ex"> (Expire le <?PHP echo $row['date'] ?> )</span>
    	<br>
    	
    	</div>
    	<div class="col-md-4">
    	

		<a href="supprimerCC.php?numCc=<?PHP echo $row['numCc'] ?>"> Supprimer</a> |
    	<a href="modifierCC.php?id=<?PHP echo $row['id'].'&numcc='.$row['numCc']; ?>">
		Modifier</a>

   		 </div>
   		 <?PHP } ?>
    	</div>

    	<div class ="methode">
    	<input style="margin-left: 30px;" type="radio" name="methode" value="livraison">Payer à la livraison
    	    	<br>
    	</div>

    	
    	<a name="ajout_carte"  href="ajout.php"> Ajouter une autre carte </a>
    	

	</div>

    		 <div class="col-md-3 cart-total">
			
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
			 <div class="radio">
					  <label><input type="radio" type="float" name="mode" value="mode1" > pour vous ?</label>
                      <br>
                      <label><input type="radio" type="float" name="mode" value="mode2" > pour quelqu'un d autre?</label>
                      
    </div>
			 
			 <div class="clearfix"></div>
			 <input class="order" type="submit" name="confirmer" value="Confirm Order">
			</div>
			<?PHP $d = date('Y-m-d H:i:s'); ?>
    	<input type="hidden" value="<?PHP echo $d ?>" name="date_com" >
    	<input type="hidden" value="<?PHP echo $_GET['id'] ?>" name="id_panier" >
    	<input type="hidden" value="0" name="etat" >
    	<input type="hidden" value="<?PHP echo $_SESSION['idUser']; ?>" name="id_client" >
			 		</form>

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
