<?php
require_once '../espace-membre/espace_membre_header.php';

$uid = $_SESSION["useruid"];

//Requete SQL
$sqlFavoris = $conn->query("SELECT * FROM favoris WHERE idCreateur = '$uid'");
    //Affichage des données
?>

<div class="titre-offres">
    <h2> Favoris </h2>
</div>

<br>
<br>

<div class="favoris">

<?php
if($_SESSION['plan']==0){
?>
    <div class="texte-favoris" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
        <h3> Cette fonctionnalitée est reservée aux membres premiums </h3>
        <h3><a href="../espace-membre/espace_membre_abonnement.php" style="font-size: 1.3em;"> Devenir premium! </a></h3>
    </div>
    
<?php

}else{
    while ($donneesFavoris = $sqlFavoris->fetch_assoc()){

        $videoId = $donneesFavoris["idVideo"];
        $sqlVideo = $conn->query("SELECT * FROM video WHERE id='$videoId'");
            while ($donnees = $sqlVideo->fetch_assoc()){
            ?>
            <div class="favoris-card" id="favoris-container<?php echo $donnees["id"]; ?>">               
                    <!-- Videos -->
                    <video width="100%" height="auto" preload="auto" controlsList="nodownload" controls oncontextmenu="return false;">
                    <source src="../Vidéos/<?php echo $donnees["nomVideo"]; ?>" type="video/mp4"></video>
                    
                    <div class="btnFavorite-container">
                        <input type="hidden" id="favoris<?php echo $donnees["id"]; ?>" value="<?php echo $donnees["id"]; ?>">
                    <!-- Ajout du bouton favoris -->
                        <button style="width: 25px; height: 25px;" class="btnDeleteFavorites" data-id="<?php echo $donnees["id"]; ?>" name="btnFavorites">  <i class="fa fa-trash" ariria-hidden="true"></i> </button>
                    </div>
            </div>
            <?php
            }
            ?> 
<?php
    }
}
?>
</div>