<HTML xmlns="http://www.w3.org/1999/xhtml">
<head>
   
    <title>Modifier un livraison</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="../css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">

    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/ionicons.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/icomoon.css">
    <link rel="stylesheet" href="../css/style.css">

</head>
<body class="hero-wrap js-fullheight" style="background-image: url('..images/Head-Ceramique.jpg');">
    
<?PHP
include "../entities/compte.php";
include "../core/compteC.php";
if (isset($_GET['id'])){
    $compteC=new compteC();
    $id=$_GET['id'];


    $result=$compteC->recuperercompte($id);
	foreach($result as $row){
        $id=$row['id'];
        $username=$row['username'];
        $nom=$row['nom'];
        $prenom=$row['prenom'];
        $pasword=$row['pasword'];
        $numero=$row['numero'];
		$email=$row['email'];
?>
<form method="POST">
<div class="col-md-6">
    <div class="panel panel-default">
    
    <div class="panel-body">
        <form role="form">
        <div class="form-group has-success">
                        <label class="control-label" for="success">Saisir le idclient</label>
                        <input type="text" class="form-control" id="success" name="id" value= "<?php echo$id ?>" />
                    </div>
                    <div class="form-group has-warning">
                        <label class="control-label" for="warning">username</label>
                        <input type="text" class="form-control" id="warning" name="username" value ="<?php echo $username?>"/>
                    </div>
                    <div class="form-group has-error">
                        <label class="control-label" for="error">saisir le nom</label>
                        <input type="text" class="form-control" id="error" name="nom" value ="<?php echo $nom?>"/>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="success">Saisir le prenom</label>
                        <input type="text" class="form-control" id="success" name="prenom" value ="<?php echo $prenom?>"/>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="success">Saisir le pasword</label>
                        <input type="text" class="form-control" id="success" name="pasword" value ="<?php echo $pasword?>"/>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="success">Saisir le numero du telephone</label>
                        <input type="number" class="form-control" id="success" name="numero" value ="<?php echo $numero?>"/>
                    </div>
					<div class="form-group has-success">
                        <label class="control-label" for="success">Saisir l'email </label>
                        <input type="text" class="form-control" id="success" name="email" value ="<?php echo $email?>"/>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="success">votre image </label>
                        <input type="file" class="form-control" id="success" name="img" />
                    </div>
					
                </form>

<input type="submit" name="modifier" value="modifier">

<input type="hidden" name="id_ini" value="<?PHP echo $id;?>">


</form>
<?PHP
    }   
}
if (isset($_POST['modifier'])){
	$compte=new compte($_POST['username'],$_POST['nom'],$_POST['prenom'],$_POST['pasword'],$_POST['numero'],$_POST['email'],$_POST['img']);
    $compteC->modifiercompte($compte,$_POST['id_ini']);
    echo 'hhah';
	header('Location: dashbord.php');
}
?>
</body>
</HTMl>