<?php

session_start();
include '../includes/dbh.inc.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
    <meta http-equiv="refresh" content="900;url=../includes/logout.inc.php" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-header.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-filtre.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-favoris.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-entrainement.css?v=<?php echo time(); ?>">

    <!-- JavaScript file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" /> -->
    <!-- Bootstrap -->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function(){
            //Button ajouter aux favoris de la page: espace_membre.php
            $('.btnFavorites').click(function(){
                id = $(this).data('id');
                videoid = $('#video' + id).val();
                $(this).toggleClass("heart");
                $.ajax({
                    url: '../espace-membre/favoris/ajoutFavorisProcess.php',
                    method: 'post',
                    dataType: 'json',
                    data:{
                        videoid: videoid,
                        action: 'add'
                    },
                    success: function(data){
                            $('#message-container').html(data);
                        }
                }).fail(function(xhr, textStatus, errorThrown){
                    alert(xhr.responseText);
                });
            });

            //Button enlever des favoris de la page: espace_membre_favoris.php
            $('.btnDeleteFavorites').click(function(){
                id = $(this).data('id');
                favorisid = $('#favoris' + id).val();
                $.ajax({
                    url: '../espace-membre/favoris/ajoutFavorisProcess.php',
                    method: 'post',
                    dataType: 'json',
                    data:{
                        videoid: favorisid,
                        action: 'add'
                    },
                    success: function(data){
                            $('#favoris-container' + favorisid).fadeOut();
                        }
                }).fail(function(xhr, textStatus, errorThrown){
                    alert(xhr.responseText);
                });
            });
        });
    </script>

    <script>
    </script>
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
