<?PHP

include "../core/CreditCardC.php";
$cc1C=new CreditCardC();

$listeCC=$cc1C->afficherListCC($idd);

?>
<table border="1">
<tr>
<td>Id</td>
<td>Nom</td>
<td>Prenom</td>
<td>Numéro de la carte crédit</td>
<td>Date d'expiration</td>
<td>supprimer</td>
<td>modifier</td>
</tr>

<?PHP
foreach($listeCC as $row){
	//if($_GET["id"] == $row['id']){
	?>
	<tr>

	<td><?PHP echo $row['id']; ?></td>
	<td><?PHP echo $row['nom']; ?></td>
	<td><?PHP echo $row['prenom']; ?></td>
	<td><?PHP echo $row['numCc']; ?></td>
	<td><?PHP echo $row['date']; ?></td>
	<td><form method="POST" action="supprimerCC.php">
	<input type="submit" name="supprimer" value="supprimer">
	<input type="hidden" value="<?PHP echo $row['numCc']; ?>" name="numcc">
	</form>
	</td>
	<td><a href="modifierCC.php?id=<?PHP echo $row['id'].'&numcc='.$row['numCc']; ?>">
	Modifier</a></td>
	</tr>
	<?PHP
//}
}
?>
</table>


