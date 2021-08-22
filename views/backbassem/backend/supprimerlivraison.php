<?PHP
include "C:/wamp64/www/galaxy/core/livraisonC.php";
$livraisonC=new livraisonC();
if (isset($_POST["numcommande"])){
	$livraisonC->supprimerlivraison($_POST["numcommande"]);
	header('Location: livraison.php');
}

?>