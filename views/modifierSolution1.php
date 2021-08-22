<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/solution.php";
include "../core/SolutionC.php";
if (isset($_GET['id_sol'])){
	$s=new SolutionC();
    $result=$s->recupererSolution($_GET['id_sol']);
	foreach($result as $row){
		$id_sol=$row['id_sol'];
		$id_prob=$row['id_prob'];
		$solution=$row['solution'];
		
?>
<form method="POST">
<table>
<caption>Modifier Solution</caption>
<tr>
<td>Id_Sol</td>
<td><input type="number" name="id_sol" value="<?PHP echo $id_sol ?>"></td>
</tr>
<tr>
<td>Id_Prob</td>
<td><input type="text" name="id_prob" value="<?PHP echo $id_prob ?>"></td>
</tr>
<tr>
<td>Solution</td>
<td><input type="text" name="solution" value="<?PHP echo $solution ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_sol_ini" value="<?PHP echo $_GET['id_sol'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$ss=new solution($_POST['id_sol'],$_POST['id_prob'],$_POST['solution']);
	$s->modifierSolution($ss,$_POST['id_sol_ini']);
	echo $_POST['id_sol_ini'];
	header('Location: afficherSolutionAdmin.php');
}
?>
</body>
</HTMl>