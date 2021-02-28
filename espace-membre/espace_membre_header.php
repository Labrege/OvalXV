<?php
include '../espace-membre/espace_membre_liens.php'

?>
    <header>
    
        <div class="header-container">
            
            <div class="logo-container">
                <img src="../Images/logoheader.png" alt="">
            </div>
            <div class="pages-container">
                <div class="page">
                    <a href="../espace-membre/espace_membre.php"> <img src="../Images/icone-video.png" class="icone-video"> <h2 class="h2"> Vidéos </h2></a>
                </div>
                <div class="page">
                    <a href="../espace-membre/espace_membre_favoris.php"> <img src="../Images/icone-favoris.png" class="icone-favoris"> <h2 class="h2"> Favoris </h2> </a>
                </div>
                <div class="page">
                    <a href="../espace-membre/espace_membre_entrainement.php"> <img src="../Images/icone-entrainement.png" class="icone-entrainement"> <h2 class="h2"> Entrainements </h2> </a>
                </div>              
            </div>

        </div>        
        <div class="user-container">
            <!-- <img src="../Images/user.png" alt="">
            <span class="statut-membre"> </span>
            -->

            <div class="dropdown">
                <button class="dropbtn"> <?php echo $_SESSION["useruid"]; ?> ▼ </button>
                <div class="dropdown-content">
                    <a href="../espace-membre/espace_membre_abonnement.php"> Abonnement </a>
                    <a href="#"> Documents </a>
                    <a href="espace_membre_informations.php"> Mon compte </a>
                    <a href="../includes/logout.inc.php"> Déconnexion </a>
                </div>
            </div>
            <h2 class="h2"> <?php echo $_SESSION["plan"]; ?> </h2>
        </div>
    </header>
