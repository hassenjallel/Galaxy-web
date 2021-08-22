<?PHP
include "../entities/reclamation.php";
include "../core/ReclamationC.php";
if (isset($_GET['id_Rec']) and isset($_GET['etat'])){
$id_Rec=$_GET['id_Rec'];
$exEtat=$_GET['etat'];
	$s=new ReclamationC();
    $s->changerEtat($id_Rec,$exEtat);
	header('location: afficherRecAdmin.php');
}
?>