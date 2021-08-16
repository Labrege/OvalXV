<?php

include '../espace-membre/espace_membre_liens.php';
if (isset($_SESSION['useruid'])){
$email = $_SESSION["useremail"];

// Verification de la fin de l'abonnement
$date = date("Y-m-d");
if($_SESSION["endsub"]!== "0000-00-00"){
    if($date>=$_SESSION["endsub"]){
        $pid=0;
        $conn->query("UPDATE users SET plan = '$pid', endSub = '0000-00-00' WHERE userEmail='$email'");
        $_SESSION["plan"] ==0;
    }
}
?>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <a href="../espace-membre/espace_membre.php"><img src="../Images/logoheader.png" alt=""></a>
            </div>
            <div class="pages-container">
                <div class="page">
                    <a href="../espace-membre/espace_membre.php" class="
                    <?php 
                    if(strpos($_SERVER['REQUEST_URI'], 'espace_membre.php') !== false){
                        echo 'active';
                    }else{
                        echo "";
                    }?>"> <i class="fa fa-film" aria-hidden="true"></i> <h2 class="h2"> Vidéos </h2></a>
                </div>
                <div class="page">
                    <a href="../espace-membre/espace_membre_favoris.php" class="
                    <?php 
                    if(strpos($_SERVER['REQUEST_URI'], 'espace_membre_favoris.php') !== false){
                        echo 'active';
                    }else{
                        echo "";
                    }?>
                    "> <i class="fa fa-heart-o" aria-hidden="true"></i><h2 class="h2"> Favoris </h2> </a>
                </div>
                <div class="page">
                    <a href="../espace-membre/espace_membre_entrainement.php" class="
                    <?php 
                    if(strpos($_SERVER['REQUEST_URI'], 'espace_membre_entrainement.php') !== false){
                        echo 'active';
                    }else{
                        echo "";
                    }?>
                    ">  <i class="fa fa-clipboard" aria-hidden="true"></i> <h2 class="h2"> Entrainements </h2> </a>
                </div>              
            </div>

        </div>        
        <div class="user-container">
            <!-- <img src="../Images/user.png" alt="">
            <span class="statut-membre"> </span>
            -->
            <div class="dropdown">
                <button class="dropbtn"> <i class="fa fa-user" aria-hidden="true"></i></button>
                <div class="dropdown-content">
                    <a href="../espace-membre/espace_membre_abonnement.php"> <i class="fa fa-diamond" aria-hidden="true"></i>Abonnement </a>
                    <a href="#"> <i class="fa fa-file" aria-hidden="true"></i>Documents </a>
                    <a href="espace_membre_informations.php"><i class="fa fa-cog" aria-hidden="true"></i> Mon compte </a>
                    <?php
                    if ($_SESSION["plan"] == 4) {
                        ?>
                        <a href="../Admin/admin-post.php" target="_blank"> <i class="fa fa-user" aria-hidden="true"></i> Page Admin </a>
                    <?php
                    }
                    ?>
                    <a href="espace_membre_paiements.php"> <i class="fa fa-eur" aria-hidden="true"></i> Paiements </a>
                    <a href="../includes/logout.inc.php"> <i class="fa fa-sign-out" aria-hidden="true"></i>Déconnexion </a>

                </div>
            </div>
            <h2 class="h2"> 
            <?php 
            if ($_SESSION["plan"]==0) {
                echo "Gratuit";
            }
            elseif ($_SESSION["plan"]==1){
                echo "Stagiaire";
            }

            elseif ($_SESSION["plan"]==2){
                echo "Titulaire";
            }

            elseif ($_SESSION["plan"]== 3){
                echo "Club";
            }

            elseif ($_SESSION["plan"]== 4){
                echo "Admin";
            }
            ?> 
            </h2>
        </div>
    </header>

<?php 
//Si mauvaise connexion - Retour à la page login
}else{
    header("location: ../login.php");
}
?>
