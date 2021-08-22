<?PHP
include "../config.php";
class SolutionC {
function afficherSolution ($s){
		echo "id_sol: ".$s->getIdSol()."<br>";
		echo "id_prob: ".$s->getIdProb()."<br>";
		echo "solution: ".$s->getSol()."<br>";
		
	}
	
	function ajouterSolution($s){
		$sql="insert into solutions (id_sol,id_prob,solution) values (:id_sol, :id_prob,:solution)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id_sol=$s->getIdSol();
        $id_prob=$s->getIdProb();
        $solution=$s->getSol();
		$req->bindValue(':id_sol',$id_sol);
		$req->bindValue(':id_prob',$id_prob);
		$req->bindValue(':solution',$solution);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherSolutions($prob){
		
		$sql="SElECT * From solutions where id_prob = $prob";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
		function afficherSolutionss(){
		
		$sql="SElECT * From solutions";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerSolution($id_sol){
		$sql="DELETE FROM solutions where id_sol= :id_sol";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id_sol',$id_sol);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierSolution($s,$id_sol){
		$sql="UPDATE solutions SET id_sol=:id_soll, id_prob=:id_prob,solution=:solution WHERE id_sol=:id_sol";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);


		$id_soll=$s->getIdSol();
        $id_prob=$s->getIdProb();
        $solution=$s->getSol();
        
		$datas = array(':id_soll'=>$id_soll, ':id_sol'=>$id_sol, ':id_prob'=>$id_prob, ':solution'=>$solution);

		$req->bindValue(':id_soll',$id_soll);
		$req->bindValue(':id_sol',$id_sol);
		$req->bindValue(':id_prob',$id_prob);
		$req->bindValue(':solution',$solution);
		
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererSolution($id_sol){
		$sql="SELECT * from solutions where id_sol=$id_sol";
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