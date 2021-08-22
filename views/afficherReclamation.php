<?php
include_once "includes/header1.php";
$disabled="";
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  border-bottom: 1px solid white;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}
.date{
    float: right;
    text-align: center;
    margin-right: 15px;
    margin-top: 0;
    padding:-9px; 
    }
.active, .accordion:hover {
  background-color: #ccc; 
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>
</head>
<body>

<h2>Mes Reclamations</h2>

    
<?PHP
include "../core/ReclamationC.php";
$probC=new ReclamationC();
$liste=$probC->afficherReclamations();
?>
    
    

<?php
  foreach($liste as $row)
{
       $id = $row['id_Rec'];
                $typeRec = $row['type'];
                $dateRec = $row['Date'];
                $message = $row['contenue'];
                $id_Clt = $row['id_Clt'];
      if($row['etat']=="traite")
      {
        $disabled='disabled  '; 

      }else{
        $disabled="";
      }
      if($_GET['id'] == $id_Clt)
      {
?>

          <?php      echo '<div class="accordion"><p>'.$typeRec.'</p> <p class="date">'.$dateRec.'</p></div>
<div class="panel">
  <p>'.$message.'</p>
  
  <form class="form-mod" action="modifierReclamation.php" method="get">
  <input type="hidden" name="Id" value="'.$id.'" />
  <input type="hidden" name="Id_c" value="'.$id_Clt.'" />
    <input '.$disabled.' class="modifier btn" type="submit" name="edit" value="modifier">
   
</form>
<form class="form-sup" action="supprimerReclamtion.php" method="post">
  <input type="hidden" name="Id" value="'.$id.'" />
  <input type="hidden" name="Id_c" value="'.$id_Clt.'" />
    
    <input '.$disabled.' class="supprimer btn" type="submit" name="edit" value="supprime">
</form>
</div>';
          ?>
    
    
    
<?php
}
}
include "includes/footer.php";
?>

    
    
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</body>
</html>
