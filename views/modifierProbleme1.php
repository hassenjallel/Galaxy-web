<HTML>
<head>
</head>
<body>
<?PHP
include "../entities/probleme.php";
include "../core/ProblemeC.php";
if (isset($_GET['id_prob'])){
	$s=new ProblemeC();
    $result=$s->recupererProbleme($_GET['id_prob']);
	foreach($result as $row){
		
		$id_prob=$row['id_prob'];
		$probleme=$row['probleme'];
		
?>
<form method="POST">
<table>
<caption>Modifier Probleme</caption>

<tr>
<td>Id_Prob</td>
<td><input type="text" name="id_prob" value="<?PHP echo $id_prob ?>"></td>
</tr>
<tr>
<td>Probleme</td>
<td><input type="text" name="probleme" value="<?PHP echo $probleme ?>"></td>
</tr>

<tr>
<td></td>
<td><input type="submit" name="modifier" value="modifier"></td>
</tr>
<tr>
<td></td>
<td><input type="hidden" name="id_prob_ini" value="<?PHP echo $_GET['id_prob'];?>"></td>
</tr>
</table>
</form>
<?PHP
	}
}
if (isset($_POST['modifier'])){
	$ss=new probleme($_POST['id_prob'],$_POST['probleme']);
	$s->modifierProbleme($ss,$_POST['id_prob_ini']);
	echo $_POST['id_prob_ini'];
	header('Location: afficherProbleme.php');
}
?>
</body>
</HTMl>