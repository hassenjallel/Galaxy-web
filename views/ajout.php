<?php
session_start();
include_once "includes/header1.php";
include_once "../core/CommandeC.php";
include_once "../core/CreditCardC.php";
include_once "../entities/Commande.php";
include_once "../entities/CreditCard.php";
$cc1C=new CreditCardC();
$idd=$_SESSION['idUser'];
$listeCC=$cc1C->afficherListCC($idd);
?>
<HTML>
<head>
	<link rel="stylesheet" href="styles/style1.css">
	
</head>
<body>
<div class="container content-ajout">
  <div class="col-md-8">
<form method="POST" action="ajoutCC.php?id=<?php echo $idd;?>">
	<div id="card-success" class="hidden">
  <i class="fa fa-check"></i>
  <p>Payment Successful!</p>
</div> 
<div id="form-errors" class="hidden">
  <i class="fa fa-exclamation-triangle"></i>
  <p id="card-error">Card error</p>
</div>
<div id="form-container">
   
  <div id="card-front">
    

    <div id="image-container">
	   
	  
      <span id="amount">Ajout d'une  <strong>Carte credit</strong></span>
      <span id="card-image">
      
        </span>
    
    </div>

    <!--- end card image container --->
    <script src="js/script.js"> </script>
    <label for="card-number">
    	Numero de la carte
      </label>
      <script type="text/javascript">
       function space(champ)
       {

          if ((champ.value.length+1) % 5 == 0)
          {
            champ.value=champ.value+' ';
          }
       }
      </script>
    <input type="text" id="card-number" name="numcc" placeholder="1234 5678 9101 1112"  minlength="14" maxlength="16" onblur="verifNumCarte(this)" required>

   
    
    
    <div id="cardholder-container">
      <label for="card-holder">Nom
      </label>
      <input type="text" name="nom" id="card-nom" onblur="verifNom(this);" minlength="3" required />
      <label for="card-holder">Prenom
      </label>
      <input type="text" name="prenom" id="card-prenom" onblur="verifNom(this);" minlength="3" required />

    </div>
    <!--- end card holder container --->
    <div id="exp-container">
      <label for="card-exp">
          Date d'expiration
        </label>
        <?php
        $date = date('Y-m');
        ?>
      <input id="card-date" name="date" type="month" width="30%" min="<?php echo $date ?>" value="<?php echo $date ?>" length="6" required />
      
    </div>
	
        <div id="cvc-container">
      <label for="card-cvc"> CVC/CVV</label>
      <input id="card-cvc" name="cvv" placeholder="XXX-X" type="text" minlength="3" maxlength="4" onblur="verifCvc(this);" required />
      <p>Dernier 3 or 4 chiffres</p>
    </div>
    <!--- end CVC container --->
    <!--- end exp container ---> 
  </div>
  <!--- end card front --->
  <div id="card-back">
    <div id="card-stripe">
    </div>

  </div>
  <!--- end card back --->
  <!--<input type="text" id="card-token" /> -->
  <button class="order" type="submit" value="ajouter" name="ajouter" id="card-btn">Ajouter</button>

</div>
<!--- end form container --->
</form>
</div>
<br>
<div class="col-md-4">
  <div class="methode container credit-card-info">
    <h3> Liste Des Cartes Credit : </h3>
        <?PHP
        $x=0;
         foreach($listeCC as $row){
      //if($_GET["id"] == $row['id']){
          $x=1;
      ?>

        <hr>
      Carte n°: <?PHP echo $row['numCc'] ?> <br> <span class="date_ex"> (Expire le <?PHP echo $row['date'] ?> )</span>
      <br>
    
      
      
      

      <a href="supprimerCC.php?numCc=<?PHP echo $row['numCc'] ?>"> Supprimer</a> |
      <a href="modifierCC.php?id=<?PHP echo $row['id'].'&numcc='.$row['numCc']; ?>">
    Modifier</a> <br>

    
       <?PHP } if ($x==0) { echo "Pas de Cartes";} ?>
      </div>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://use.fontawesome.com/f1e0bf0cbc.js"></script>
<script src="functions.js"></script> 
</body>
</HTMl>