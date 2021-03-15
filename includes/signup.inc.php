<?php

if (isset($_POST["submit"])){
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $pwdrepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'fonctions.inc.php';

    if (emptyInputSignup($name, $surname, $email, $username, $pwd, $pwdrepeat) !== false){
        echo "<span class='error_message'> Veuillez remplir tout les champs ! </span>";
        //header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false){
        echo "<span class='error_message'> Veuillez choisir un nom d'utilisateur valide ! </span>";
        //header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false){
        echo "<span class='error_message'> Veuillez choisir un email valide ! </span>";
        //header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdrepeat) !== false){
        echo "<span class='error_message'> Les mots de passes ne sont pas identiques ! </span>";
        //header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (pwdLength($pwd) !== false){
        echo "<span class='error_message'> Votre mot de passe doit contenir au moins 8 charactères ! </span>";
        //header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false){
        //header("location: ../signup.php?error=usernametaken");
        echo "<span class='error_message'> l'email ou le nom d'utilisateur sont déjà pris ! </span>";
        exit();
    }

    createUser($conn, $name, $surname, $email, $username, $pwd);
}
    else{
        exit();
    }


