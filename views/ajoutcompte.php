
<?PHP
include "../entities/compte.php";
include "../core/compteC.php";

if ( isset($_POST['username']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pasword'])&& isset($_POST['numero']) && isset($_POST['email'])&& isset($_POST['image']) ){
//Partie2


$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$username=$_POST['username'];
$pasword=$_POST['pasword'];
$numero=$_POST['numero'];
$email=$_POST['email'];
$img=$_POST['image'];

$arobase = "@";
$point =".";
$x=strpos($email,$arobase) ;
$p=strpos($email,$point) ;
$l=strlen($email);
$pas=strlen($pasword);


if($x!= 0 && $p>0  && $l-1 > $p && $pas > 5 ){
	$subj="welcome";
	$text="galaxy";
	$headers="from : hassen.jalleli@esprit.tn"."\r\n"."cc:somebodyelse@exemple.com";
$compte1=new compte($username,$nom,$prenom ,$pasword ,$numero ,$email,$img);
var_dump($compte1);
//////email////////

   
//$compte1C=new compteC();
$c=new compteC();
$c->ajoutercompte($compte1);
mail($email,$subj,$text,$headers);

header('Location: login.php');
}else {
	echo "<script>alert(\"mail incorrecte \")</script>";

}	
}else{
	echo "vĂ©rifier les champs";
}
//*/

?>