<?PHP
include "C:/wamp64/www/galaxy/core/livreurC.php";
$livreurC=new livreurC();
if (isset($_POST["cin"])){
	$livreurC->supprimerlivreur($_POST["cin"]);
	header('Location: livreur.php');
}

?>