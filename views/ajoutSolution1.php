<?PHP
include "../entities/solution.php";
include "../core/SolutionC.php";

if (isset($_POST['id_prob']) and isset($_POST['solution']) ){

	$id_sol=0;


$s=new solution($id_sol,$_POST['id_prob'],$_POST['solution']);

$sol=new SolutionC();
$sol->ajouterSolution($s);
header('Location: ajoutSolution.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>