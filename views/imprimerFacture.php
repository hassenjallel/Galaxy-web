<?PHP
session_start();
include_once "../core/panierC.php";
include_once "../core/produitpanierC.php";
include_once "../entities/panier.php";
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

<html> 
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
<link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="css/monstyle.css">
<body onload="window.print();"> 

 <div class="container">
 	 		  	 <h1 align="center" style="color: red;">Facture de commande</h1>
 	 		  	 <?PHP $d = date('Y-m-d H:i:s'); ?>
 		  	 <h6 align="center">Imprimé le <?PHP echo $d;?></h6>
 		  	  <hr>
    <div class="cart-content col-md-6 cart-items ">
    	 	<br>
    	 	<br>
    	 	<br>
    		<h3>Les Produits :</h3>

<?PHP
foreach($produits as $row){
		$idProduit=$row['idProduit'];
		$infoProduit=$panier1C->fetchProductDetails($idProduit);
	?>

    	<div class="cart-header">
    		
    		
    			<input type="hidden" name="idProduitPanier" value="<?php echo $row['idProduitPanier'] ?>">
			
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="images/<?PHP echo $infoProduit['fichier']; ?>" class="img-responsive" alt="<?PHP echo $infoProduit['nom']; ?>">
						</div>
					   <div class="cart-item-info">
						<h3><a href="#"><?PHP echo $infoProduit['nom']; ?></a><span>Model No: <?PHP echo $infoProduit['id']; ?></span></h3>
						<ul class="qty">
							<li><p>price : <?PHP echo $infoProduit['prix']; ?> Dt</p></li>
						</ul>					
				  </div>
				  <div class="clearfix"></div>
			 </div>
			 <hr>
			
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
			<div class="col-sm-9" >

    		 
			
			 <div class="price-details">
				 <h3>Prix</h3>
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
			
		
 		  </div>

 		  		  <div class="col">
  		  	 <br>
  		  	 <br>
  		  	 <br>
  		  	 <br>
  		  	 <h3> Détails: </h3>
  		  	 <br>
  		  	 <br>
  		  	 <ul>
  		  	 	<li>
 		  	 <h5> Réference : <?PHP echo $_POST['id_com'];?></h5>
 		  	</li>
 		  	<li>
 		  	<h5> Etat commande : <?PHP if ($_POST['etat']==0) {echo "Non Traitée";} elseif($_POST['etat']==1){echo "Confirmée";} else {echo "Annulée";} ?></h5>

 		  	</li>
 		  	<li>
 		  	<h5> Date Commande : <?PHP echo $_POST['date_com'];?></h5>

 		  	</li>
 		  	<li>
		  	<h5> Mode de payment : <?PHP if ($_POST['methode']=="livraison") {echo "Payment à la livraison"; } else {?> </h5><h6><?PHP echo " Carte Credit N°: "; echo $_POST['methode'];} ?></h6>

 		  	</li>
 		  	</ul>
 		  </div>
</div>
</body> 
</html> 