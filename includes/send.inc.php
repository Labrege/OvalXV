<?php
$email = $_POST["forgot_email"];

if (isset($email)){
    $password = "azertyuiopqsdfghjklmwxcvbnABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $password = str_shuffle($password);
    $password = strtoupper(substr($password, 0, 8));
    $ePassword = password_hash($password, PASSWORD_BCRYPT);

    require_once 'dbh.inc.php';
    require_once 'fonctions.inc.php';

    if (sendMail($conn, $email, $password, $ePassword) === false){
        header("location: ../mot_de_passe.php?error=mailnonenvoyé");
        exit();
    }

    else {
        header("location: ../login.php?error=motdepasseenvoyé");
        exit();
    }

}
else{
    header("location: ../mot_de_passe.php");
    exit();
}