<?php

include '../espace-membre/espace_membre_header.php';

//verifie la bonne connexion au compte
if (isset($_SESSION["useruid"])){

// On récupère tout le contenu de la table jeux_video
$reponse = $conn->query('SELECT * FROM video ORDER BY StatutVideo DESC');
?>

<div id="message-container" style="color: red; text-align: center;">
</div>


<!-- Filtres -->
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
    if ($_SESSION["plan"]!=0){

    $idVideo = $donnees["id"];
    $idCreateur = $_SESSION["useruid"];
    $idFavoris = $idVideo.$idCreateur;

    $sqlCheck = "SELECT * FROM favoris WHERE idFavoris = '$idFavoris'";

    //verification dans la BD
    $rs = mysqli_query($conn,$sqlCheck);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);

    //Si video existe deja dans favoris
    if($data[0] > 1){
        $heartClass="heart";
    }else{
        $heartClass=" ";
    }
}
    ?>   
        <!-- Affichage des Videos -->
        <video width="100%" height="auto" preload="auto" controlsList="nodownload" oncontextmenu="return false;"

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
        <div class="btnFavorite-container">
            <input type="hidden" id="video<?php echo $donnees["id"]; ?>" value="<?php echo $donnees["id"]; ?>">
            <!-- Ajout du bouton favoris -->
            <button class="btnFavorites <?php echo $heartClass ?>" data-id="<?php echo $donnees["id"]; ?>" name="btnFavorites"> <i class="fa fa-heart" ariria-hidden="true"></i> </button>
        </div>

        
    </div>
    <?php
}
?>
</div>


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
