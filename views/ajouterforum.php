<?PHP


session_start();
include "../entities/forum.php";
include "../core/forumC.php";
if (isset($_POST['message'])  ){
    //Partie2
    
    $message=$_POST['message'];
    $username=$_SESSION["username"];
$topic=$_POST['topic'];
$date = date('d/m/Y ');
$ymd = DateTime::createFromFormat('m-d-Y', $date);
echo $ymd;
    

    $forum1=new forum($username,$topic,$message,$date);
    var_dump($forum1);
    //////email////////
    
       
    //$compte1C=new compteC();
    $c=new forumC();
    $c->ajouterforum($forum1);
    
  header('Location: forum.php');
    }else 
        {
        echo "vĂ©rifier les champs";
    }
    //*/
?>