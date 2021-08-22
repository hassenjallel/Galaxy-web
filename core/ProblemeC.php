<?PHP
include "../config.php";
class ProblemeC {
function afficherProbleme ($s){
		echo "probleme: ".$s->getProb()."<br>";
		echo "id_prob: ".$s->getIdProb()."<br>";
		
		
	}
	
	function ajouterProbleme($s){
		$sql="INSERT INTO probleme (probleme) values (:probleme)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        
        $probleme=$s->getProb();
		

		$req->bindValue(':probleme',$probleme);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherProblemes(){
		
		$sql="SElECT * From probleme";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerProbleme($id_prob){
		$sql="DELETE FROM probleme where id_prob= :id_prob ; DELETE FROM solutions where id_prob= :id_prob";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_prob',$id_prob);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierProbleme($p,$id_prob){
		$sql="UPDATE probleme SET id_prob=:id_probb,probleme=:probleme WHERE id_prob=:id_prob";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		
        $id_probb=$p->getIdProb();
        $probleme=$p->getProb();
        
		$datas = array( ':id_probb'=>$id_probb, ':id_prob'=>$id_prob, ':probleme'=>$probleme);
		
		$req->bindValue(':id_probb',$id_probb);
		$req->bindValue(':id_prob',$id_prob);
		$req->bindValue(':probleme',$probleme);
		
		
		
            $p=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererProbleme($id_prob){
		$sql="SELECT * from probleme where id_prob=$id_prob";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	
}

?>