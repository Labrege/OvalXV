<?php

session_start();
if (isset($_POST["erase"])){
    $idVideo = $_POST["erase"];
    $idCreateur = $_SESSION["useruid"];
    require_once 'C:\xampp\htdocs\OVAL XV\includes\dbh.inc.php';
    
    $sql = $conn->query("DELETE FROM favoris WHERE id='$idVideo'");
    

    if ($sql){
        echo "yay";
        header('Location: ../espace_membre_favoris.php?error=favoriseffacé');
    }

    else{
        header('Location: ../espace_membre_favoris.php?error=problemedesupression');
    }
} 