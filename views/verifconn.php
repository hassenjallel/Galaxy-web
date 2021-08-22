<!DOCTYPE html>

<?PHP
session_start();

if($_SESSION["username"]==""){
    header('Location: login.php');

}else{
    $_SESSION["id_produit"]=$_GET['id'];

    header('Location:singlepage.php');
    

}