<?php
require_once '../espace-membre/espace_membre_header.php';
require_once '../includes/dbh.inc.php';
$uid = $_SESSION["useruid"];

//Requete SQL
$sqlFavoris = $conn->query("SELECT * FROM favoris WHERE idCreateur = '$uid'");


//Affichage des données
while ($donneesFavoris = $sqlFavoris->fetch_assoc()){
    $videoId = $donneesFavoris["idVideo"];
    $sqlVideo = $conn->query("SELECT * FROM video WHERE id='$videoId'");
    ?>
    <div class="favoris-container">
        <div class="favoris">
            <?php
            while ($donnees = $sqlVideo->fetch_assoc()){
            ?>
            <div class="favoris-card">   
                    <!-- Button pour effacer des favoris -->
                    <form action="../espace-membre/favoris/effacerFavorisProcess.php" method="POST">
                        <button type="submit" name="erase" value="<?php echo $donneesFavoris["id"]; ?>"> - </button>
                    </form>     
                    
                    <!-- Videos -->
                    <video width="100%" height="auto" controlsList="nodownload" oncontextmenu="return false;" controls>
                    <source src="../Vidéos/<?php echo $donnees["nomVideo"]; ?>" type="video/mp4"></video>
                </div>
            <?php
            }
            ?>
        </div>
    </div>  
<?php
}
?>