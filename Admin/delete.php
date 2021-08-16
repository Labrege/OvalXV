<?php
require('../includes/dbh.inc.php');

$idName = $_POST['idName'];
$videoName = $_POST['videoName'];

$sqlDelete = "DELETE FROM video WHERE id=".$idName;

if($conn->query($sqlDelete)){
    $path = "../Vidéos/".$videoName;
    if(!unlink($path)){
    echo "Un problème est survenu lors de la suppression de la vidéo";
    }
    else{   
        echo "Vidéo supprimé";
    }
}
else{
    echo "Un problème est survenu";
}

?>