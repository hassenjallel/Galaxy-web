<?PHP
include "../core/ProblemeC.php";
$probC=new ProblemeC();
$liste=$probC->afficherProblemes();

?>


<form method="POST" action="ajoutSolution.php">
<table>
<caption>Ajouter Solution</caption>
<tr>
<td>Probleme</td>
<td>

<select name="id_prob">
		<?PHP
foreach($liste as $row)
{
	?>
          <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>

          <?PHP
}
?>
     </select>






</td>
</tr>
<tr>
<td>Solution</td>
<td><input type="text" name="solution"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="ajouter" value="ajouter"></td>
</tr>
</table>
</form>



</style>
    
    
     
    
    
