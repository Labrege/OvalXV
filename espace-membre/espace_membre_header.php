<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta http-equiv="refresh" content="900;url=../includes/logout.inc.php" />
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-filtre.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-favoris.css?v=<?php echo time(); ?>">


    <title> OvalXV | Espace Membre</title>

</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo-container">
                <img src="../Images/logoheader.png" alt="">
            </div>
            <div class="pages-container">
                <div class="page">
                    <a href="../espace-membre/espace_membre.php"> <img src="../Images/icone-video.png" class="icone-video"> <h2> Vidéos </h2></a>
                    
                </div>
                <div class="page">
                    <a href="../espace-membre/espace_membre_favoris.php"> <img src="../Images/icone-favoris.png" class="icone-favoris"> <h2> Favoris </h2> </a>
                </div>
                <div class="page">
                    <a href="../espace-membre/espace_membre_entrainement.php"> <img src="../Images/icone-entrainement.png" class="icone-entrainement"> <h2> Entrainements </h2> </a>
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
                    <a href="#"> Mon compte </a>
                    <a href="../includes/logout.inc.php"> Déconnexion </a>
                </div>
            </div>
            <h2> <?php echo $_SESSION["plan"]; ?> </h2>
        </div>
    </header>
