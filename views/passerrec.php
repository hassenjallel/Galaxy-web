<?php
include_once "includes/header1.php";
session_start();
$iduser=$_SESSION['idUser'];
?>
<?php include "includes/navbar.php";  ?>
<div class="container">
    <div class="col-md-9">
    <div class="form-walid">
        <table>
          <form class="formulaire" action="" method="POST">
            
            Username: <input type="text" required name="username" value="<?php echo $iduser; ?>" readonly>
            <br/>
            code cammande: <input type="text" required name="idcmd">
            <br/>
            message: <textarea required name="message"></textarea>
            <br/>
            <input type="submit" name="submit" value="Register"> 
        </form>
        </table>
    </div>
    </div>




<?PHP

include "../entities/reclamation.php";
include "../core/ReclamationC.php";
$date = date("Y/m/d");
$etat = 'non traite';
if(isset($_GET['manquant']))
{
$type=$_GET['manquant'];
}else{
    $type=$_SESSION['id_solution'];
}
if( isset($_POST["username"]) and isset($_POST["idcmd"]) and  isset($_POST["message"])){
$r=new Reclamation($_POST['username'],$_POST['idcmd'],$_POST['message'],$date,$etat,$type);
$rec=new ReclamationC();
$rec->ajouterReclamation($r);
//echo '<br> <a href="afficherReclamation.php?id='.$_POST['username'].'">mes reclamations</a>';

?>
    <div class="col-md-3 cart-total" >
        <div class="price-details">
                 <h3></h3>
        </div>
                     <a class="continue" href="#">Autre Probleme</a>
                     <p>gvqsj hbkjcs iusqiuchw</p>
             
             
             <div class="clearfix"></div>
             <a class="order" href="afficherReclamation.php?id=<?php echo $_POST['username']; ?>">Mes reclamations</a><p>gvqsj hbkjcs iusqiuchw</p>

    </div>

<?php
}
?>
</div>
   <?php   
   if (isset($_POST['submit'])) {
    
     echo '<div id="snackbar"> ';
     echo "reclamations ajouté !";
     echo "</div>";
     
   }
   ?>
<?php
include "includes/footer.php";
?>
<script type="text/javascript">
    function mySnack() {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
   </script>