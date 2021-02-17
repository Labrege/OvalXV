<?php

require_once '../espace-membre/espace_membre_header.php';
require_once 'C:\xampp\htdocs\OVAL XV\includes\dbh.inc.php';

//verifie la bonne connexion au compte
if (isset($_SESSION["useruid"])){

// On récupère tout le contenu de la table jeux_video
$reponse = $conn->query('SELECT * FROM video ORDER BY StatutVideo DESC');
?>

<div id="filtres">
    <ul>
        <li class="list" data-filter="all"> All </li>

        <div class="dropdown">
            <button class="dropbtn"> Skills ▼ </button>
            <div class="dropdown-content">
                <li class="list" data-filter="passe"> Passe </li>
                <li class="list" data-filter="jeu_au_pied"> Jeu au pied </li>
                <li class="list" data-filter="ruck"> Ruck </li>
                <li class="list" data-filter="plaquage"> Plaquage </li>
                <li class="list" data-filter="duel_offensif"> Duel Offensif </li>
                <li class="list" data-filter="skills"> Tous les skills </li>
            </div>
    </ul>
</div>
    
<div class="product">
<?php 
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch_assoc()){
?>
    <div class="itemBox <?php echo $donnees["TagVideo"]; ?> <?php echo $donnees["TagFamille"]; ?>">
    
    
    <?php 
    // Si le statut le statut membre est + que prémium
    if ($_SESSION["plan"]!=0){
        $idVideo = $donnees["id"];
        $sqlCheck = "SELECT * FROM favoris WHERE idVideo = '$idVideo'";

        //verification dans la BD
        $rs = mysqli_query($conn,$sqlCheck);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    
        //Si video existe deja dans favoris
        if($data[0] > 1){
        ?>
        <!-- Boutton favoris // ../espace-membre/favoris/effacerFavorisDepuisVideosProcess.php -->
        <form action="../espace-membre/favoris/effacerFavorisDepuisVideosProcess.php" method="POST">
            <button type="submit" name="erase" value="<?php echo $donnees["id"]; ?>"> - </button>
        </form>

        <?php
        }else{
        ?> 

        <!-- Boutton favoris // ../espace-membre/favoris/ajoutFavorisProcess.php -->
        <form action="../espace-membre/favoris/ajoutFavorisProcess.php" method="POST">
            <button type="submit" name="save" value="<?php echo $donnees["id"]; ?>">+</button>
        </form>

    <?php 
        }
    } 
    ?>
        <!-- Affichage des Videos -->
        <video width="100%" height="auto" controlsList="nodownload" oncontextmenu="return false;"
            <?php 
            // Si le statut membre n'est pas premium
            if ($_SESSION["plan"]== 0){
                // Si le statut de la video est "visible" -> renvoyer les controles
                if ($donnees["StatutVideo"] == "visible"){
                    echo "controls";
                }
                // Si le statut de la video n'est pas "visible" -> bloquer la video
                else{
                    echo "poster='../Images/TN/tn premium.PNG'";
                }
            }
            // Si le statut membre est premium -> Lecture de toutes les vidéos
            else{
                echo "controls";
            }
            ?>
        >
        <source src="../Vidéos/<?php echo $donnees["nomVideo"]; ?>" type="video/mp4"></video>
    </div>
    <?php
}
?>
</div>

<!-- Bootstrap -->    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- JS pour les filtres -->    
<script type="text/javascript" src="../JS/filtres.js"></script>

</body>
</html>

<?php 
}

//Si mauvaise connexion - Retour à la page login
else{
    header("location: ../login.php");
}
?>
