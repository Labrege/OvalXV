<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/Connexion/connexion.css?v=<?php echo time(); ?>">
    <title> OvalXV | Mot de passe oublié </title>
</head>
<body>
    <div class="container">
        <div class="formulaire">
            <h1> Mot de passe oublié </h1>
            <form action="includes/send.inc.php" method=POST>
                <input type="email" name="forgot_email" placeholder="Votre email: exemple@mail.com" required>
                <button type="submit" id="bouton-connexion" name="submit"> Recevoir mot de passe </button>    
                <div class="options">
                    <a href="login.php"> Connectez-vous ici ! </a>
                    <a href="signup.php"> Pas encore membre ? Inscrivez-vous ici ! </a>
                </div>
            </form>	
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
        </div>
    </div>
</body>
</html>



