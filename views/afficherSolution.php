<?PHP
include_once "includes/header1.php";
include "../core/SolutionC.php";
$id_prob=$_GET["id_prob"];
$solC=new SolutionC();
$liste=$solC->afficherSolutions($id_prob);

?>
<div class="container">
<h2>CONDITION GENERAL</h2>
    <P>Il est conseillé à l'Utilisateur de sauvegarder et/ou imprimer les présentes conditions générales sans, toutefois, les modifier.
        <br>
        Les présentes conditions régissent les relations entre GALAXY DESIGN et le Client. Ces relations concernent la vente, par le biais du site <a href="../views">GALAXY-DESIGN.tn</a>, des divers produits mis en ligne.
        <br>
        Les présentes conditions générales sont conclues entre la société GALAXY DESSIGN et le Client, ci-après dénommé l'Utilisateur.
        <br>
        L'Utilisateur qui effectue une commande via ce site accepte expressément et sans réserve l'intégralité des présentes conditions générales.
        <br>
        Les présentes conditions ne s'appliquent qu'aux personnes physiques majeures capables n'ayant pas la qualité de commerçant au sens du Code de Commerce et agissant pour leurs besoins personnels.
        <br>
        GALAXY DESSIGN se réserve le droit de modifier ou d'adapter les présentes conditions générales. 
        <br>
        En cas de modification, les conditions 
applicables sont celles qui étaient en vigueur au jour de la passation de la commande. La date de mise à jour figure en tête des présentes conditions générales.       
        
</P>
   
   
    
<h3>NOTRE POLITIQUE A PROPOS DES PRODUITS MANQUANTS </h3>
<p>Le réceptionnaire a pour obligation de vérifier la conformité de la marchandise livrée au moment de la livraison avant de signer le bon de livraison. Toute anomalie concernant la livraison (avarie, produit manquant par rapport au bon de livraison, colis endommagé.) doit être impérativement indiquée sur le bon de livraison, accompagné de la signature du contrôleur.
    <br>
    Le client peut demander soit le remboursement, soit l'échange du produit ou la relivraison du produits. 
    </p>

<?PHP

foreach($liste as $row)
{
?>
	<tr>
	
    
     <form action="passerrec.php" method="get"> 
<input type="radio" name="manquant" value="<?php echo $row['solution']; ?>">  
         <?php echo $row['solution']; ?> <br>
  


<?PHP
}
?>

  <input type="submit" value="continuer">    
        </form>
</div>


<?php
include_once "includes/footer.php";
?>

