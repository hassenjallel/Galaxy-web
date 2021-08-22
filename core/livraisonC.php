<?PHP
include_once "C:\wamp64\www\galaxy\config.php";
class livraisonC {
function afficherlivraison ($livraison){
		echo "idclient: ".$livraison->getidclient()."<br>";
		echo "nom: ".$livraison->getNom()."<br>";
		echo "adresse: ".$livraison->getadresse()."<br>";
		echo "numtel: ".$livraison->getnumtel()."<br>";
		echo "numcommande: ".$livraison->getnumcommande()."<br>";
		echo "date_livraison: ".$livraison->getdate_livraison()."<br>";
		echo "total: ".$livraison->gettotal()."<br>";
	}
	function ajouterlivraison($livraison){
		$sql="insert into livraison (idclient,nom,adresse,numtel,numcommande,liv,total) values ( :idclient,:nom,:adresse,:numtel,:numcommande,:liv,:total)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $nom=$livraison->getNom();
        $adresse=$livraison->getadresse();
        $numtel=$livraison->getnumtel();
		$numcommande=$livraison->getnumcommande();
		$liv=$livraison->getliv();
		$total=$livraison->gettotal();
		$idclient=$livraison->getidclient();
	

		$req->bindValue(':nom',$nom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':numtel',$numtel);
        $req->bindValue(':numcommande',$numcommande);
		$req->bindValue(':liv',$liv);
		$req->bindValue(':total',$total);
		$req->bindValue(':idclient',$idclient);

	
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherlivraisons(){
		
		$sql="SElECT * From livraison";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function afficherlivraisonsT(){
		$sql="SElECT * From livraison ORDER BY nom ";
		//$sql="SElECT * From panier";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}
	}

	function supprimerlivraison($numcommande){
		$sql="DELETE FROM livraison where numcommande= :numcommande";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':numcommande',$numcommande);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierlivraison($livraison,$numcommande){
		$sql="UPDATE livraison SET idclient=:idclient, nom=:nom,adresse=:adresse,numtel=:numtel,numcommande=:numcommanden,liv=:liv,date_livraison=:date_livraison,total=:total WHERE numcommande=:numcommande";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idclient=$livraison->getidclient();
        $nom=$livraison->getnom();
        $adresse=$livraison->getadresse();
        $numtel=$livraison->getnumtel();
		$numcommanden=$livraison->getnumcommande();
		$liv=$livraison->getliv();
		$date_livraison=$livraison->getdate_livraison();
		$total=$livraison->gettotal();
		$datas = array(':idclient'=>$idclient,':nom'=>$nom,':adresse'=>$adresse,':numtel'=>$numtel,':numcommanden'=>$numcommanden,':numcommande'=>$numcommande,':liv'=>$liv,':date_livraison'=>$date_livraison,':total'=>$total);
		$req->bindValue(':idclient',$idclient);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':adresse',$adresse);
		$req->bindValue(':numtel',$numtel);	
		$req->bindValue(':numcommanden',$numcommanden);
        $req->bindValue(':numcommande',$numcommande);	
		$req->bindValue(':liv',$liv);
		$req->bindValue(':date_livraison',$date_livraison);		
		$req->bindValue(':total',$total);	
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererlivraison($numcommande){
		$sql="SELECT * from livraison where numcommande=$numcommande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListelivraisons($numtel){
		$sql="SELECT * from livraison where numtel=$numtel";
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