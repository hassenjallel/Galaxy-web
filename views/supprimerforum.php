<?PHP
include "../core/forumC.php";
$forumC=new forumC();
if (isset($_POST["reference"])){
	$forumC->supprimerforum($_POST["reference"]);
	header('Location: forum.php');

}

?>