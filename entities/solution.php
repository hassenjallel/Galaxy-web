<?PHP
class Solution{
	private $id_sol;
	private $id_prob;
	private $solution;
	
	function __construct($id_sol,$id_prob,$solution){
		$this->id_sol=$id_sol;
		$this->id_prob=$id_prob;
		$this->solution=$solution;
		
	}
	
	function getIdSol(){
		return $this->id_sol;
	}
	function getIdProb(){
		return $this->id_prob;
	}
	function getSol(){
		return $this->solution;
	}
	

	function setIdSol($id_sol){
		$this->id_sol=$id_sol;
	}
	function setIdProb($id_prob){
		$this->id_prob;
	}
	
	
}

?>