<?php
include "../entities/probleme.php";
include "../core/ProblemeC.php";
$s=new ProblemeC();
if (isset($_POST['modifier'])){
	$ss=new probleme($_POST['id_prob'],$_POST['probleme']);
	$s->modifierProbleme($ss,$_POST['id_prob_ini']);
	echo $_POST['id_prob_ini'];
	header('Location: afficherProblemeAdmin.php');
}
?>