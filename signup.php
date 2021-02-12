<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="Text/css" href="CSS/Inscription/inscription.css?v=<?php echo time(); ?>">
    <title> OvalXV | Inscription</title>
</head>
<body>
    <div class="container">
        <div class="formulaire">
            <h1> ESPACE INSCRIPTION </h1>
            <form action="includes/signup.inc.php" method=POST>
                <input type="text" name="name" placeholder="Prenom" >
                <input type="text" name="surname" placeholder="Nom">
                <input type="text" name="username" placeholder="Username...">
                <input type="email" name="email" placeholder="email@exemple.com">
                <input type="password" name="pwd" placeholder="Mot de Passe" >
                <input type="password" name="pwdrepeat" placeholder="Verification mot de Passe" >
                <div class="options">
                   <button id="bouton-inscription" type="submit" name="submit"> Inscrivez-vous </button>
                </div>
                <div class="options">
                    <a href="login.php"> Déja inscrit? Connectez-vous ici ! </a>
                </div>
            </form>	
            <?php 
            if (isset($_GET["error"])){
                  if ($_GET["error"] == "emptyinput"){
                     echo "<span class='error_message'> Veuillez remplir tout les champs ! </span>";
                  }

                  else if ($_GET["error"] == "invaliduid"){
                     echo "<span class='error_message'> Veuillez choisir un nom d'utilisateur valide ! </span>";
                  }

                  else if ($_GET["error"] == "invalidemail"){
                     echo "<span class='error_message'> Veuillez choisir un email valide ! </span>";
                  }

                  else if ($_GET["error"] == "passwordsdontmatch"){
                     echo "<span class='error_message'> Les mots de passes ne sont pas identiques ! </span>";
                  }

                  else if ($_GET["error"] == "usernametaken"){
                     echo "<span class='error_message'> l'email ou le nom d'utilisateur sont déjà pris ! </span>";
                  }

                  else if ($_GET["error"] == "stmtfailed"){
                     echo "<span class='error_message'> Une erreur est survenue ! Veuillez réessayer. </span>";
                  }

                  else if ($_GET["error"] == "none"){
                     echo "<span class='error_message' style='color: rgb(50,205,50);'> Votre inscription a bien été validée ! Bienvenue dans la famille OvalXV ! </span>";
                  }
               }
            ?>
        </div>
    </div>
</body>
</html>


    