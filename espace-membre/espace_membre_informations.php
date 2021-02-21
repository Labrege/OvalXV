<?php

require_once '../espace-membre/espace_membre_header.php';
require_once '../includes/dbh.inc.php';
$user = $_SESSION["useruid"];

$sql = $conn->query("SELECT * FROM users WHERE userUid = '$user");

?>


<h2> Mes informations </h2>
</br>

<?php echo $_SESSION["useruid"]; ?> </br></br>
<?php echo $_SESSION["username"]; ?> </br></br>
<?php echo $_SESSION["usersurname"]; ?> </br></br>
<?php echo $_SESSION["useremail"]; ?> </br></br>

<h2> Modifier mon mot de passe </h2>

<form action="../espace-membre/compte/compteProcess.php" method="POST">
    <input type="password" placeholder="Nouveau mot de Passe" name="pwd">
    <input type="password" placeholder="Confirmation" name="pwdrepeat">
    <button type="submit" name="submit"> Changer mon mot de passe </button>
</form>

<form>
    <div class="user-form">
        <div class="ligne ">
            <label class="material-input__label" for="firstname">Prénom</label>
            <input name="firstname" class="material-input__input" type="text" id="firstname" placeholder="John" value=<?php echo $_SESSION["username"]; ?>>
        </div>

        <div class="ligne ">
            <label class="material-input__label" for="lastname">Nom</label>
            <input name="lastname" class="material-input__input" type="text" id="lastname" placeholder="Dupont" value=<?php echo $_SESSION["usersurname"]; ?>>
        </div>
        <div class="ligne ">
            <label class="material-input__label" for="useruid">Nom d'utilisateur</label>
            <input name="useruid" class="material-input__input" type="text" id="useruid" placeholder="John Dupont" value=<?php echo $_SESSION["useruid"]; ?>>
        </div>

        <div class="ligne ">
            <label class="material-input__label" for="email">Email</label>
            <input name="email" class="material-input__input" type="text" id="email" placeholder="John" value=<?php echo $_SESSION["useremail"]; ?>>
        </div>

        <div class="ligne ">
            <label class="material-input__label" for="firstname">Date de naissance</label>
            <input name="birthdate" class="material-input__input" type="date" id="birthdate" placeholder="2000-01-01" value=>
        </div>

        <div class="ligne ">
            <label class="material-input__label" for="Club">Club </label>
            <input name="Club" class="material-input__input" type="text" id="Club" placeholder="OvalXV" value=>
        </div>

    </div>
</div>




