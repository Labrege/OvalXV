<?php
session_start();

if (isset($_SESSION['useruid']) && $_SESSION['plan']==4){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/admin.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title> OvalXV | Fiche n° <?php echo $_GET['id'];?></title>
</head>

<?php
require('../includes/dbh.inc.php');

$videoId = $_GET['id'];

$sql = "SELECT * FROM video WHERE id=".$videoId;
$searchSql = $conn->query($sql);
?>

<div id="fiche-video">
    <h1> Fiche Video N° <?php echo $videoId;?></h1>
    <div id="message"></div>
    <?php
    while ($donnees = $searchSql->fetch_assoc()) {
    
    ?>

    <div class="video-container">
        <video width="100%" height="auto" controls>
        <source src="../Vidéos/<?php echo $donnees["nomVideo"]; ?>" type="video/mp4">
    </div>

    <div class="form">
        <form method="POST" action="../Admin/update.php" enctype="multipart/form-data">
            <input type="text" style='visibility: hidden;' name="idVideo" value="<?php echo $videoId; ?>">
            <input type="text" class="titre" placeholder="Titre" name="Titre" required value="<?php echo $donnees["TitreVideo"]; ?>">
            <div class="select">
                <select class="select-effectif" name="tagFamille" required>
                    <option value="" disabled>Tags effectifs </option>
                    <option value="complet" <?php if($donnees['TagFamille']=="complet"){ echo "selected"; }?>> Complet </option>
                    <option value="réduit" <?php if($donnees['TagFamille']=="réduit"){ echo "selected"; }?>> Réduit </option>
                    <option value="1vs1" <?php if($donnees['TagFamille']=="1vs1"){ echo "selected"; }?>> 1 vs 1 </option>
                    <option value="Spé avants" <?php if($donnees['TagFamille']=="Spé avants"){ echo "selected"; }?>> Spé avants </option>
                    <option value="Spé trois-quarts" <?php if($donnees['TagFamille']=="Spé trois-quarts"){ echo "selected"; }?>> Spé Trois-quarts </option>
                </select>
            </div>

            <!-- Tags complémentaires -->
            <div class="select">
                <select class="select-complémentaire" name="tagVidéo" required>
                    <option value="" disabled>Tags complémentaires </option>
                    <option value="attaque" <?php if($donnees['TagVideo']=="attaque"){ echo "selected"; }?>> Attaque </option>
                    <option value="contre-attaque" <?php if($donnees['TagVideo']=="contre-attaque"){ echo "selected"; }?>> Contre-Attaque </option>
                    <option value="défense" <?php if($donnees['TagVideo']=="défense"){ echo "selected"; }?>> Défense </option>
                    <option value="passe" <?php if($donnees['TagVideo']=="passe"){ echo "selected"; }?>> Passes </option>
                    <option value="jeu au pied" <?php if($donnees['TagVideo']=="jeu au pied"){ echo "selected"; }?>> Jeu au pied </option>
                    <option value="ruck" <?php if($donnees['TagVideo']=="ruck"){ echo "selected"; }?>> Ruck </option>
                    <option value="plaquage" <?php if($donnees['TagVideo']=="plaquage"){ echo "selected"; }?>> Plaquage </option>
                    <option value="duel offensif" <?php if($donnees['TagVideo']=="duel offensif"){ echo "selected"; }?>> Duel Offensif </option>
                    <option value="physique avec ballon" <?php if($donnees['TagVideo']=="physique avec ballon"){ echo "selected"; }?>> Physique avec ballon </option>
                    <option value="physique sans ballon" <?php if($donnees['TagVideo']=="physique sans ballon"){ echo "selected"; }?>> Physique sans ballon </option>
                </select>
            </div>
            <div class="boutton-pack">
                <input type="radio" name="Statut" value="hidden" required <?php if($donnees['StatutVideo']=="hidden"){ echo "checked"; }?>>
                <label for="hidden"> Starter Pack </label><br>
                <input type="radio" name="Statut" value="visible" <?php if($donnees['StatutVideo']=="visible"){ echo "checked"; }?>>
                <label for="visible"> Pack Premium</label><br>
            </div>
            <?php
                }
            ?>
            <input type="submit" name="Submit" id="boutton-edit-video" required>

        </form>
    </div>


</div>
</html>
<?php
}else{
    header("location: ../login.php");
}
?>