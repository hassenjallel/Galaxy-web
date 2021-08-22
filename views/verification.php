<!DOCTYPE html>

<?PHP
session_start();

include "../core/compteC.php";

if (isset($_POST['submit'])){
    $user=$_POST['username'];
   
    $mdp=$_POST['pasword'];
    if($_POST['username'] ==""){
		
		
		location ('location : login.php');
    
        echo "vĂ©rifier les champs";

    }else{
        $compteC=new compteC();
        $result=$compteC->recuperercompte2($user,$mdp);
        $resultadmin=$compteC->recuperercompteadmin($user,$mdp);
        if ($resultadmin->fetch() == false)
        {
            if ($result->fetch() == false)
               {
            echo 'Pas de résultat';
               }else{
            $_SESSION["username"] = $user;
            
            echo$_SESSION["username"];
           // echo "<a href="dashbord.php?username=$user\"></a>"; 

            header('Location: dashbord.php');
        }
    
        }else{
          
            $_SESSION["username"] = $user;
            echo$_SESSION["username"];
            header('Location: index3.php');
        }
       
    
}
}
if(isset($_POST['submit_forget_password'])){
    $_SESSION["user"]=    $_POST['username'];
   $sql="select * from compte where username='".$_POST['username']."'";
   $db = config::getConnexion();
   $liste=$db->query($sql);
   foreach($liste as $row){
   $plan="forgetpassword.php";
   $nom="change your password";

   $pass=$row['pasword'];
   $email=$row['email'];
   $headers="gsdhhgsd";
   $num=$row['numero'];
   mail("$email","mot  de passe oblier  ", "http://localhost/projetweb/views/forgetpassword1.php","");
   
	// Authorisation details.
	$username = "hassen.jalleli@esprit.tn";
	$hash = "89bdf30bd350b0244afd40d55caf12dc142ec043251af0f87123be9d3b0ab89f";

	// Config variables. Consult http://api.txtlocal.com/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "API Test"; // This is who the message appears to be from.
	$numbers = "+216.$num"; // A single number or a comma-seperated list of numbers
    $message = "please check your mail you forgot your password  .";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.txtlocal.com/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
   header('Location: login.php');


   }
  }

?>

<?php
$result1=$compteC->recuperercompte2($user,$mdp);

foreach ($result1 as $row1) {
 $_SESSION['idUser']=$row1['id'];
}

?>