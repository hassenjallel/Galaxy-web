<?PHP
include_once "includes/header1.php";
include "../core/ProblemeC.php";
$probC=new ProblemeC();
$liste=$probC->afficherProblemes();
session_start();
$_SESSION['id_solution']="autre";

?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#myDIV {
  width: 100%;

    display: none;
}
#myDIV1 {
    width: 100%;

    display: none;
}
    
    .choix{
        border: none;
        background: rgba(49, 194, 219, 0.66);
        width: 90%;
        border-bottom: 1px dotted #ccc;
        height: 50px;
        text-align: left;
        border-radius: 20px;
        
        margin: 5px 0%;
        color: white;

    }
    .cart-total{
        text-align: center;
    }
</style>
<?php include "includes/navbar.php";  ?>
<div class="container">
    <div class="col-md-9">
        <?PHP
foreach($liste as $row)
{
    ?>
    
    
     <a href="afficherSolution.php?id_prob=<?php echo $row['id_prob'];?>">
    <button  class="choix"><?php echo $row[1]; ?></button></a>
                        <br>
    
    
<?PHP
}
?>
    </div>
    <div class="col-md-3 cart-total" >
        <div class="price-details">
                 <h3></h3>
        </div>
                     <a class="continue" href="passerrec.php">Autre Probleme</a>
                     <p>vous ne trouvez pas votre probleme?</p>
             
             
             <div class="clearfix"></div>
             

    </div>

</div>



<?php
include_once "includes/footer.php";
?>