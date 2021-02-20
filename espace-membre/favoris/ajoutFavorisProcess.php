<?php
session_start();
require_once 'C:\xampp\htdocs\OVAL XV\includes\dbh.inc.php';
 
if(isset($_POST['videoid'])){
    $idVideo = $_POST['videoid'];
    $idCreateur = $_SESSION['useruid'];

    //Requete SQL pour verifier si favoris existe
    $sqlCheck = "SELECT * FROM favoris WHERE idVideo = '$idVideo'";

    //verification dans la BD
    $rs = mysqli_query($conn,$sqlCheck);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);

    //Si video existe deja dans favoris
    if($data[0] > 1){
        $message = "video already in favorites";
    }
    //Si video n'existe pas dans BD
    else{
        //Si ajout de video dans BD fontionne
        if($sql =$conn->query("INSERT INTO favoris (idVideo, idCreateur) VALUES ('$idVideo', '$idCreateur')")){
            $message = "video inserted in favorites";
        }
        //Si problème lors de l'ajout
        else{
            $message = "a problem as occured";
        }
    }
}else {
    $message = "there was a problem! please try again later";
}

echo json_encode($message);
?>