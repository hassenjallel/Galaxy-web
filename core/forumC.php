<?PHP

include_once "../config.php";

class forumC {


	function ajouterforum($forum){
		$db = config::getConnexion();

		$sql='insert into forum (username,topic,message,date) values (:username,:topic,:message,:date)';
		try{
        $req=$db->prepare($sql);
		
		$username=$forum->getusername();
		$topic=$forum->gettopic();
		$message=$forum->getmessage();
		$date=$forum->getdate();
		

	
		$req->bindValue(':username',$username);
		$req->bindValue(':topic',$topic);
		$req->bindValue(':message',$message);
		$req->bindValue(':date',$date);


            $req->execute();
		
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
function afficherforum(){
		//$sql="SElECT * From histo e inner join formationphp.livreur a on e.cin= a.cin";
		$sql="SElECT * From forum";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function afficherforumtopic($topic){
		//$sql="SElECT * From histo e inner join formationphp.livreur a on e.cin= a.cin";
		$sql="SElECT * From forum where topic='".$topic."' ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerforum($reference){
		$sql="DELETE FROM forum where reference= :reference";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':reference',$reference);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}
?>
	