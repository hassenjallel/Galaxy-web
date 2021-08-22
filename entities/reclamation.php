<?PHP
class Reclamation{
	private $id_rec;
	private $id_clt;
	private $id_cmd;
    private $contenue;
    private $date;
    private $etat;
    private $type;
	
	function __construct($id_clt,$id_cmd,$contenue,$date,$etat,$type){
		$this->id_clt=$id_clt;
		$this->id_cmd=$id_cmd;
        $this->contenue=$contenue;
        $this->date=$date;
        $this->etat=$etat;
        $this->type=$type;
		
	}
	
	
	function getIdClt(){
		return $this->id_clt;
	}
	function getIdCmd(){
		return $this->id_cmd;
	}
    function getContenue(){
		return $this->contenue;
	}
    function getDate(){
		return $this->date;
	}
    function getEtat(){
		return $this->etat;
	}
      function getType(){
		return $this->type;
	}
	
	function setIdClt($id_clt){
		$this->id_clt=$id_clt;
	}
    function setIdCmd($id_cmd){
        $this->id_cmd=$id_cmd;
    }
    function setContenue($contenue){
		$this->contenue=$contenue;
	}
    function setDate($date){
		$this->date=$date;
	}
    function setEtat($etat){
		$this->etat=$etat;
	}
      function setType($type){
          $this->type=$type;
	}
	
	
}

?>