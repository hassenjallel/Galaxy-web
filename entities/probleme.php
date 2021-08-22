<?PHP
class Probleme{
	
	private $id_prob;
	private $probleme;
	
	function __construct($id_prob,$probleme){
		$this->id_prob=$id_prob;
		$this->probleme=$probleme;
		
	}
	
	
	function getIdProb(){
		return $this->id_prob;
	}
	function getProb(){
		return $this->probleme;
	}
	

	function setProb($probleme){
		$this->probleme=$probleme;
	}
	function setIdProb($id_prob){
		$this->id_prob;
	}
	
	
}

?>