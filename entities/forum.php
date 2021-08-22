<?PHP
class forum{
	private $username;
	private $topic;
	private $message;
	private $date;

	function __construct($username,$topic,$message,$date){
		$this->username=$username;
		$this->topic=$topic;
		$this->message=$message;
		$this->date=$date;
	}
	
	function getusername(){
		return $this->username;
	}
	function gettopic(){
		return $this->topic;
	}
	function getmessage(){
		return $this->message;
	}
	function getdate(){
		return $this->date;
	}
	
	function setusername($username){
		$this->username=$username;
	}
	function settopic($topic){
		$this->topic=$topic;
	}
	function setmessage($message){
		$this->message=$message;
	}
	function setdate($date){
		$this->date=$date;
	}
	
}

?>