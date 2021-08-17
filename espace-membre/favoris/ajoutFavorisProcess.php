<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . $_SESSION['includes']);
 
if(isset($_POST['videoid'])){
    $idVideo = $_POST['videoid'];
    $idCreateur = $_SESSION['useruid'];
    $idFavoris = $idVideo.$idCreateur;

    //Requete SQL pour verifier si favoris existe
    $sqlCheck = "SELECT * FROM favoris WHERE idFavoris = '$idFavoris'";

    //verification dans la BD
    $rs = mysqli_query($conn,$sqlCheck);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);

    //Si video existe deja dans favoris
    if($data[0] > 1){
        if($sqlDelete = $conn->query("DELETE FROM favoris WHERE idFavoris='$idFavoris'")){
            //$message = "video deleted from favorites";
        }
        else{
            //$message = "there was a problem! please try again later";
        }
    }
    //Si video n'existe pas dans BD
    else{
        //Si ajout de video dans BD fontionne
        if($sql =$conn->query("INSERT INTO favoris (idVideo, idCreateur, idFavoris) VALUES ('$idVideo', '$idCreateur','$idFavoris')")){
            //$message = "video inserted in favorites";
        }
        //Si problème lors de l'ajout
        else{
            //$message = "there was a problem! please try again later";
        }
    }
}else {
    //$message = "there was a problem! please try again later";
}

$message="";

echo json_encode($message);
?>