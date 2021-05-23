<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/Connexion/connexion.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="CSS/Inscription/inscription.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="">
    <title> OvalXV | Connexion </title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){ 
        $(".message").click(function(){
            $(".message").empty();
        });
    });
</script>
<body>
    <div class="container">
        <div class="formulaire">
            <h1> ESPACE CONNEXION </h1>
            <div class="message">
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo "<span class='error_message'> Veuillez remplir tous les champs ! <div class='exit-message'>&times;</div></span>";
                }

                elseif ($_GET["error"] == "wronglogin"){
                    echo "<span class='error_message'> Mot de passe ou identifiant non valide ! Veuillez réessayer ! <div class='exit-message'>&times;</div></span>";
                }

                elseif ($_GET["error"] == "motdepasseenvoyé"){
                    echo "<span class='success_message'> Votre nouveau mot de passe vous a été envoyé par mail ! <div class='exit-message'>&times;</div></span>";
                }

                elseif ($_GET["error"] == "accountverified"){
                    echo "<span class='success_message'> Votre compte a bien été vérifié !  Bienvenue dans la famille OvalXV ! Vous pouvez dès à présent vous conntecter à la plateforme. <div class='exit-message'>&times;</div></span>";
                }

                elseif ($_GET["error"] == "accountnotverified"){
                    echo "<span class='error_message'> Votre compte n'a pas pu être vérifié. Merci de contacter l'équipe OvalXV. <div class='exit-message'>&times;</div></span>";
                }

                elseif ($_GET["error"] == "tryaccountnotverified"){
                    echo "<span class='error_message'> Votre compte n'est pas vérifié ! Merci de vérifier votre compte ou de contacter l'équipe OvalXV. <div class='exit-message'>&times;</div></span>";
                }
            }
            if(isset($_GET['error']) || isset($_GET['mail'])){
                if ($_GET["error"] == "signupcomplete" && $_GET['mail']=='sent'){
                    echo "<span class='success_message'> Vous y êtes presque ! Cliquez sur le lien reçu par mail pour finaliser votre inscription ! <div class='exit-message'>&times;</div></span>";
                }

                elseif ($_GET["error"] == "signupcomplete" && $_GET['mail']=='notsent'){
                    echo "<span class='error_message'> Un problème relatif à votre adresse mail est survenu. Merci de contacter l'équipe OvalXV. <div class='exit-message'>&times;</div></span>";
                }
            }
            ?>
            </div>
            <form action="includes/login.inc.php" method=POST>
                <input type="text" name="name" placeholder="Email ou Username">
                <input class="input-password" type="password" id="pwd" name="pwd" placeholder="Mot de Passe">
                <!-- An element to toggle between password visibility -->
                <div class="show-password">
                    <input type="checkbox" class="checkbox" onclick="myFunction()"> 
                    <h2> Voir le mot de passe </h2>
                </div>

                <button type="submit" id="bouton-connexion"name="submit"> Connexion </button>    
                <div class="options">
                    <a href="signup.php"> Pas encore membre ? Inscrivez-vous ici ! </a>
                    <a href="mot_de_passe.php"> Mot de passe oublié </a>
                </div>
            </form>	
        </div>
    </div>
    <script type="text/javascript"> 
        function myFunction() {
            var x = document.getElementById("pwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>







    
