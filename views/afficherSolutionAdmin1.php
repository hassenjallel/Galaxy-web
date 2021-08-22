<?PHP
include "../core/SolutionC.php";
$solC=new SolutionC();
$liste=$solC->afficherSolutions();

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
        background: white;
        width: 45%;
        border-bottom: 1px dotted #ccc;
        height: 50px;
        text-align: left;
    }
</style>
    <table border="1">
<?PHP
foreach($liste as $row)
{
    ?>
    
    

        <tr>
<td ><?php echo $row[2]; ?></td>
<td>
    <form method="POST" action="supprimerSolution.php">
    <input type="submit" name="supprimer" value="supprimer">
    <input type="hidden" value="<?PHP echo $row['0']; ?>" name="id_sol">
    </form>
</td>
<td><a href="modifierSolution.php?id_sol=<?PHP echo $row['0']; ?>">
    Modifier</a>
</td>


</tr>

    
                        <br>
    
    
<?PHP
}
?>
</table>

