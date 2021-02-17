<?php
session_start();
require_once 'C:\xampp\htdocs\OVAL XV\includes\dbh.inc.php';
 
$idVideo = $_POST['save'];
$idCreateur = $_SESSION['useruid'];

//Requete SQL pour verifier si favoris existe
$sqlCheck = "SELECT * FROM favoris WHERE idVideo = '$idVideo'";

//verification dans la BD
$rs = mysqli_query($conn,$sqlCheck);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);

//Si video existe deja dans favoris
if($data[0] > 1){
    header('Location: ../espace_membre.php?error=favorisexists');
}
//Si video n'existe pas dans BD
else{
    //Si ajout de video dans BD fontionne
    if($sql =$conn->query("INSERT INTO favoris (idVideo, idCreateur) VALUES ('$idVideo', '$idCreateur')")){
        header('Location: ../espace_membre.php?error=ajoutfavorissuccess');
    }
    //Si problème lors de l'ajout
    else{
        header('Location: ../espace_membre.php?error=ajoutfavorisfail');
    }
}
?>