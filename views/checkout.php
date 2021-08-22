<?PHP
session_start();
include "../core/panierC.php";
include "../core/produitpanierC.php";
include "../entities/panier.php";
include "includes/header1.php";
$panier1C= new  PanierC();
$Discount=0;
$dilevery=0;
$idPanier1=1;
$idUser=$_SESSION['idUser'];
$total=$panier1C->totalProductInCart($idUser);
$totalPrix=$panier1C->totalPriceInCart($idUser);
$produit1C=new ProduitpanierC();
$panier1C=new PanierC();
$idPanier=$panier1C->dernierPanierDeUser($idUser);;


foreach($idPanier as $row)
	{
		$idPanier1=$row['idPanier'];
	}
	$produits=$produit1C->fetchProductsByIdPanier($idPanier1);

//include "includes/navbar.php";
?>

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
							 <img src="../img/<?PHP echo $infoProduit['fichier']; ?>" class="img-responsive" alt="<?PHP echo $infoProduit['nom']; ?>">
						</div>
					   <div class="cart-item-info">
						<h3><a href="#"><?PHP echo $infoProduit['nom']; ?></a><span>Model No: <?PHP echo $infoProduit['id']; ?></span></h3>
						<ul class="qty">
							<li><p>price : <?PHP echo $infoProduit['prix']; ?> Dt</p></li>
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
			   <?php
								$somme=$totalPrix;
								//echo $somme."dt";
								$_SESSION["somme"]=$somme;
								?>
			   <div class="clearfix"> </div>
			 </ul>
			
			 
			 <div class="clearfix"></div>
			 <a class="order" href="placeOrder.php?id=<?php echo "1";?>">Place Order</a>
			 
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
