<?PHP
include_once "../config.php";

class compteC {

	function ajoutercompte($compte){
		$db = config::getConnexion();

		$sql='insert into compte (username,nom,prenom,pasword,numero,email,type,img) values (:username,:nom,:prenom,:pasword,:numero,:email,:type,:img)';
		try{
        $req=$db->prepare($sql);
		
     
		$username=$compte->getusername();
		$nom=$compte->getnom();
		$prenom=$compte->getprenom();
		$pasword=$compte->getpasword();
		$numero=$compte->getnumero();
		$email=$compte->getemail();
		$img=$compte->getimg();

		$type="simple";
	
		$req->bindValue(':username',$username);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':pasword',$pasword);
		$req->bindValue(':numero',$numero);
		$req->bindValue(':email',$email);		
		$req->bindValue(':type',$type);		
		$req->bindValue(':img',$img);		


            $req->execute();
		
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichercompte(){
		$sql="SElECT * From compte where  type = 'simple'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}	
	}
	function supprimercompte($id){
		$sql="DELETE FROM compte where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
function modifiercompte($compte,$id){
		$sql="UPDATE compte SET username=:username,nom=:nom,prenom=:prenom,pasword=:pasword,numero=:numero,email=:email , img=:img WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$username=$compte->getusername();
		$nom=$compte->getnom();
		$prenom=$compte->getprenom();
        $pasword=$compte->getpasword();
        $numero=$compte->getnumero();
		$email=$compte->getemail();
		$img=$compte->getimg();

		$datas = array( ':username'=>$username, ':nom'=>$nom,':prenom'=>$prenom,':pasword'=>$pasword,':numero'=>$numero,':email'=>$email);
		
		$req->bindValue(':id',$id);
		$req->bindValue(':username',$username);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':pasword',$pasword);
		$req->bindValue(':numero',$numero);	
		$req->bindValue(':email',$email);			
		$req->bindValue(':img',$img);			

		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recuperercompte($id){
		$sql="select * from compte where id='".$id."'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
			die('Erreur: '.$e->getMessage());
        }
	}
	function recuperercompte2($username,$pasword){
		$sql="select * from compte where username='".$username."' and pasword='".$pasword."'";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
			die('Erreur: '.$e->getMessage());
        }
	}
	function recuperercompteadmin($username,$pasword){
		$admin = "admin%";
		$sql="select * from compte where username='".$username."' and pasword='".$pasword."' and (type = 'admin' or type = 'admin sav' or type = 'admin panier')";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
			die('Erreur: '.$e->getMessage());
        }
	}
	function rechercherListecompte($username){
		$sql="select * from compte where username=$username";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function email($email){
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'hassen.jalleli@esprit.tn';                 // SMTP username
		$mail->Password = 'esprit2016';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		
		$mail->setFrom('hassen.jalleli@esprit.tn', 'hassen jalleli');
		$mail->addAddress( $email, 'Joe User');     // Add a recipient
		$mail->isHTML(true);                                  // Set email format to HTML
		
		$mail->Subject = 'galaxy design';
		$mail->Body    = 'welcome in galaxy design </b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		if(!$mail->send()) {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message has been sent';
		}
	}
	

}

?>