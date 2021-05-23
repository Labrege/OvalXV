<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="Text/css" href="CSS/Inscription/inscription.css?v=<?php echo time(); ?>">
    <title> OvalXV | Inscription</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){ 
            $("#form-signup").submit(function(event){
                event.preventDefault();
                var name = $(".name").val();
                var surname = $(".surname").val();
                var email = $(".email").val();
                var username = $(".username").val();
                var pwd = $(".pwd").val();
                var pwdrepeat = $(".pwdrepeat").val();
                var submit = $("#bouton-inscription").val();
                
                $(".message").load("includes/signup.inc.php", {
                     name: name,
                     surname: surname,
                     email: email,
                     username: username,
                     pwd: pwd,
                     pwdrepeat: pwdrepeat,
                     submit: submit
                });
            });
            $(".message").click(function(){
                $(".message").empty();
            });
        });
   </script>
</head>
<body>
    <div class="container">
        <div class="formulaire">
            <h1> ESPACE INSCRIPTION </h1>
            <div class="message">
                    <?php
                        if (isset($_GET["error"])){
                            if ($_GET["error"] == "startnow"){
                                echo "<span class='success_message'> Créez un compte pour commencer à utiliser la plateforme OvalXV ! <div class='exit-message'>&times;</div> </span>";
                            }
                        }
                    ?>
            </div>
            <form action="#" method=POST id="form-signup">
                <input type="text" name="name" class="name" placeholder="Prenom" >
                <input type="text" name="surname" class="surname" placeholder="Nom">
                <input type="text" name="username" class="username" placeholder="Nom d'utilisateur">
                <input type="email" name="email" class="email" placeholder="email@exemple.com">
                <input type="password" name="pwd" class="pwd" placeholder="Mot de Passe" >
                <input type="password" name="pwdrepeat" class="pwdrepeat" placeholder="Verification mot de Passe" >
                <div class="options">
                   <button id="bouton-inscription" type="submit" name="submit"> Inscrivez-vous </button>
                </div>
                <div class="options">
                    <a href="login.php"> Déja inscrit? Connectez-vous ici ! </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
    