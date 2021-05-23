<?php
require ('../includes/dbh.inc.php');

if (isset($_POST['Submit'])) {
    if (!empty($_POST['Titre']) && !empty($_POST['tagVidéo']) && !empty($_POST['tagFamille']) && !empty($_POST['Statut'])) {
        $titreVideo = $_POST['Titre'];
        $tagVideo = $_POST['tagVidéo'];
        $tagFamille = $_POST['tagFamille'];
        $statutVideo = $_POST['Statut'];
        $idVideo = $_POST['idVideo'];
        $sql = "UPDATE video SET TitreVideo = '$titreVideo' , TagFamille = '$tagFamille' , TagVideo = '$tagVideo' , StatutVideo = '$statutVideo' WHERE id = '$idVideo'";
        if ($conn->query($sql)) {
            header("Location: fiches-videos.php?id=$idVideo");
        }
        else{
            echo "error 2";
        }
    }
    else{
        echo "error";
    }
}