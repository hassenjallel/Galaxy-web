<form action="" method="POST">
            Probleme: <input type="text" name="probleme">
            
            <br/>
            
            <input type="submit" name="submit" value="Register"> 
</form>

<?PHP
include "../entities/probleme.php";
include "../core/ProblemeC.php";

if (isset($_POST['probleme']) ){
    $id_prob=0;
$s=new probleme($id_prob,$_POST['probleme']);

$sol=new ProblemeC();
$sol->ajouterProbleme($s);
header('Location: afficherProblemeAdmin.php');
	
}
else{
	echo "vérifier les champs";
}
//*/

?>