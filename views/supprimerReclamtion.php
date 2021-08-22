<?PHP
include "../core/ReclamationC.php";
$prob=new ReclamationC();
if (isset($_POST["Id"])){
	$prob->supprimerReclamation($_POST["Id"]);
	header('Location: afficherReclamation.php?id='.$_POST['Id_c']);
}else{
    echo $_POST["Id"];
    
}

?>