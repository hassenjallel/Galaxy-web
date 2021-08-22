<?php

include_once "../core/panierC.php";
$panier1C=new PanierC();

if (isset($_GET["idProduit"])){
	$idProduit=$_GET['idProduit'];
	$panier1C->deleteFrompanierById($idProduit);
header('Location: adminpanier.php');
}

?>