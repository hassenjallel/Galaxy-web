<?PHP
include "../core/SolutionC.php";
$sol=new SolutionC();
if (isset($_POST["id_sol"])){
	$sol->supprimerSolution($_POST["id_sol"]);
	header('Location: afficherSolutionAdmin.php');
}

?>