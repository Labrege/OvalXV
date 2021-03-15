<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/Connexion/connexion.css?v=<?php echo time(); ?>">
    <title> OvalXV | Mot de passe oublié </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
</head>
<script>
        $(document).ready(function(){ 
            $("#form-forgotten-pwd").submit(function(event){
                event.preventDefault();
                var email = $(".forgot-email").val();
                var submit = $("#bouton-mdp-perdu").val();
            
                $(".message").load("includes/send.inc.php", {
                     email: email,
                     submit: submit
                });
            });
        });
   </script>
<body>
    <div class="container">
        <div class="formulaire">
            <h1> Mot de passe oublié </h1>
            <form action="#" method="POST" id="form-forgotten-pwd">
                <input type="email" class="forgot-email" placeholder="Votre email: exemple@mail.com" required>
                <button type="submit" id="bouton-mdp-perdu" name="submit"> Recevoir mot de passe </button>    
                <div class="options">
                    <a href="login.php"> Connectez-vous ici ! </a>
                    <a href="signup.php"> Pas encore membre ? Inscrivez-vous ici ! </a>
                </div>
                <div class="message">
                </div>
            </form>	
            <!--
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emailinvalide"){
                    echo "<span class='error-message'> L'addresse email saisie n'est rattachée à aucun compte ! </span>";
                }

                if ($_GET["error"] == "mailnonenvoyé"){
                    echo "<span class='error-message' style='color: rgb(255,0,0); text-align: center;'> Un problème est survenu. Veuillez contacter directement l'équipe ovalxv par mail à l'adresse suivante: <a href='mailto:contact@ovalxv.com' style='color: rgb(255,0,0); text-align: center;'> contact@ovalxv.com </a> </span>";
                }

                if ($_GET["error"] == "none"){
                    echo "<span class='error-message' style='color: rgb(50,205,50);'> Votre nouveau mot de passe vous a été envoyé par mail </span>";
                }
            }
            ?>
            -->
        </div>
    </div>
</body>
</html>



