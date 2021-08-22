<?PHP
include "../core/ProblemeC.php";
$prob=new ProblemeC();
if (isset($_POST["id_prob"])){
	$prob->supprimerProbleme($_POST["id_prob"]);
	header('Location: afficherProblemeAdmin.php');
}

?>