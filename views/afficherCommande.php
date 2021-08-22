<?PHP
session_start();
include_once "includes/header1.php";
include "../core/CommandeC.php";
$cc1C=new CommandeC();
$idd=$_SESSION['idUser'];
$listeCC=$cc1C->afficherListCC($idd);

?>
	

<div class="lastback">	
	<h3>Liste des commandes :</h3>
	<br>
	<a script="color : red; " href="afficherCommandeTrie.php"><B><STRONG>Trier par Date</STRONG></B></a>
	<br>
	<form method="POST" action="afficherCommandeID.php">
	Rechercher par Réference : 
	<input type="text" name="id" id="id">
	<input type="submit" name="recherche" value="Rechercher">
    </form>
	<div class="container form-containers">

<table class="table">
<tr>
<th>Ref Commande</th>
<th>Etat</th>
<th>Date de commande</th>

</tr>

<?PHP
foreach($listeCC as $row){
	//if($_GET["id"] == $row['id']){
	?>
	<tr>

	<td><?PHP echo $row['id_com']; ?></td>
	<td><?PHP if ($row['etat']==0) {echo "Non Traitée";} elseif($row['etat']==1){echo "Confirmée";} else {echo "Annulée";} ?></td>
	<td><?PHP echo $row['date_com']; ?></td>
	<td>
<form method="POST" action="imprimerFacture.php">
	<input type="hidden" value="<?PHP echo $row['etat']; ?>" name="etat">
	<input type="hidden" value="<?PHP echo $row['id_panier']; ?>" name="id_panier">
	<input type="hidden" value="<?PHP echo $row['id_com']; ?>" name="id_com">
	<input type="hidden" value="<?PHP echo $row['methode']; ?>" name="methode">
	<input type="hidden" value="<?PHP echo $row['date_com']; ?>" name="date_com">

	<input type="submit" name="imprimer" value="Imprimer">
	</form>

		<form method="POST" action="AnnulerCommande.php">
	
	<input type="hidden" value="<?PHP echo $row['etat']; ?>" name="etat">
	<input type="hidden" value="<?PHP echo $row['id_panier']; ?>" name="id_panier">
	<input type="hidden" value="<?PHP echo $row['id_com']; ?>" name="id_com">
	<input type="submit" name="annuler" value="Annuler">
	</form>
	
	</td>
	</tr>
	<?PHP
//}
}
?>
</table>
</div>
</div>
<?php

if(isset($_GET["trait"]))
{
	if ($_GET["trait"] == 0) {
		echo '<script>alert("Commande deja traitée");</script>';
	}
}
?>
	<link rel="stylesheet" href="localhost/web/views/modist/css/style.css">
	<link rel="stylesheet" href="localhost/web/views/css/style.css">