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









