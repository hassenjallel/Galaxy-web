<?PHP
class livraison{
	private $idclient;
	private $nom;
	private $adresse;
	private $numtel;
	private $numcommande;
	private $liv;
	private $date_livraison;
	private $total;
	function __construct($idclient,$nom,$adresse,$numtel,$numcommande,$liv,$date_livraison,$total){
		$this->idclient=$idclient;
  		$this->nom=$nom;
		$this->adresse=$adresse;
		$this->numtel=$numtel;
		$this->numcommande=$numcommande;
		$this->liv=$liv;
		$this->date_livraison=$date_livraison;

		$this->total=$total;
		
	}
	
	function getidclient(){
		return $this->idclient;
	}
	function getnom(){
		return $this->nom;
	}
	function getadresse(){
		return $this->adresse;
	}
	function getnumtel(){
		return $this->numtel;
	}
	function getnumcommande(){
		return $this->numcommande;
	}
	function getliv(){
		return $this->liv;
	}
	function getdate_livraison(){
		return $this->date_livraison;
	}
	function gettotal(){
		return $this->total;
	}

	function setnom($nom){
		$this->nom=$nom;
	}
	function setadresse($adresse){
		$this->adresse;
	}
	function setnumtel($numtel){
		$this->numtel;
	}
	function setnumcommande($numcommande){
		$this->numcommande;
	}
	function setdate_livraison($date_livraison){
		$this->date_livraison;
	}
	function settotal($total){
		$this->total;
	}
	
}

?>