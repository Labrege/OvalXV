<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="CSS/Connexion/connexion.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="">
    <title> OvalXV | Connexion </title>
</head>
<body>
    <div class="container">
        <div class="formulaire">
            <h1> ESPACE CONNEXION </h1>
            <form action="includes/login.inc.php" method=POST>
                <input type="text" name="name" placeholder="Email ou Username" required>
                <input class="input-password" type="password" id="pwd" name="pwd" placeholder="Mot de Passe" required>
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
            <?php
            if (isset($_GET["error"])){
                if ($_GET["error"] == "emptyinput"){
                    echo "<span class='error-message'> Veuillez remplir tous les champs ! </span>";
                }

                else if ($_GET["error"] == "wronglogin"){
                    echo "<span class='error-message'> Mot de passe ou identifiant non valide ! Veuillez réessayer ! </span>";
                }
            }
            ?>
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







    
