<?PHP
include "../../entities/catalogue.php";
include "../../core/catalogueC.php";

if (isset($_POST['nom']) and isset($_POST['fichier'])  and isset($_POST['descrip'])){
$catalogue1=new catalogue($_POST['nom'],$_POST['fichier'],$_POST['descrip']);

$catalogue1C=new catalogueC();
$catalogue1C->ajoutercatalogue($catalogue1);
header('Location: index2.php');

//else {
//	echo"<script> alert(\"3ib\") </script>";
//	header('Location: index-2.php');

//}	
}else{
	echo "vĂ©rifier les champs";
}
//*/

?>