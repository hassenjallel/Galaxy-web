<?PHP
include "../core/CreditCardC.php";
$cc=new CreditCardC();
	

if (isset($_GET["numCc"])){
	$cc->supprimerCC($_GET["numCc"]);
	header('Location: ajout.php');
}

?>