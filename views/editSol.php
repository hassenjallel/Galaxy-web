<?php
include "../entities/solution.php";
include "../core/SolutionC.php";
	$s=new SolutionC();
if (isset($_POST['modifier'])){
	$ss=new solution($_POST['id_sol'],$_POST['id_prob'],$_POST['solution']);
	$s->modifierSolution($ss,$_POST['id_sol_ini']);
	echo $_POST['id_sol_ini'];
	header('Location: afficherSolutionAdmin.php');
}else{
	echo "hi";
}
?>
