<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page admin oval XV</title>
    <link rel="stylesheet" href="../CSS/admin.css?v=<?php echo time(); ?>">
</head>
<body>
<?php
require('admin-header.php');
?>
<div id="section-videos">
    <h1> Postez vos nouvelles vidéos sur le site ! </h1>
    <div class="form">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="text" placeholder="Titre" name="Titre" required>
            <div class="select">
                <select class="select-effectif" name="tagFamille" required>
                    <option value="" disabled selected>Tags effectifs </option>
                    <option value="complet"> Complet </option>
                    <option value="réduit"> Réduit </option>
                    <option value="1vs1"> 1 vs 1 </option>
                    <option value="Spé avants"> Spé avants </option>
                    <option value="Spé trois-quarts"> Spé Trois-quarts </option>
                </select>
            </div>

            <!-- Tags complémentaires -->
            <div class="select">
                <select class="select-complémentaire" name="tagVidéo" required>
                    <option value="" disabled selected>Tags complémentaires </option>
                    <option value="attaque"> Attaque </option>
                    <option value="contre-attaque"> Contre-Attaque </option>
                    <option value="défense"> Défense </option>
                    <option value="passe"> Passes </option>
                    <option value="jeu au pied"> Jeu au pied </option>
                    <option value="ruck"> Ruck </option>
                    <option value="plaquage"> Plaquage </option>
                    <option value="duel offensif"> Duel Offensif </option>
                    <option value="physique avec ballon"> Physique avec ballon </option>
                    <option value="physique sans ballon"> Physique sans ballon </option>
                </select>
            </div>
            <div class="video-selection">
            <label for="nomvideos">Chosissez votre video :</label>
            <input type="file"
                name="file"
                accept="video/mp4,video/x-m4v,video/*" required>
            </div>

            <div class="boutton-pack">
                <input type="radio" name="Statut" value="hidden" required>
                <label for="hidden"> Starter Pack </label><br>
                <input type="radio" name="Statut" value="visible">
                <label for="visible"> Pack Premium</label><br>
            </div>

            <input type="submit" name="Submit" class="boutton-post-video" required>
            <div class="message">
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "uploadcomplete"){
                    echo "<span style='color: green;'> Vidéo ajouté ! </span>";
                }

                elseif ($_GET["error"] == "filetoobig"){
                    echo "<span style='color: red;'> Fichier est trop volumineux ! </span>";
                }

                elseif ($_GET["error"] == "uploaderror"){
                    echo "<span style='color: red;'> Une erreur est survenue lors du téléchargement ! </span>";
                }

                elseif ($_GET["error"] == "wrongtype"){
                    echo "<span style='color: red;'> Ce type de fichier n'est pas accepté ! </span>";
                }
            }
            ?>
            </div>
            
        </form>
    </div>
</div>
</body>
</html>