<?php

if (isset($_POST["submit"])){

    $username = $_POST["name"];
    $pwd = trim($_POST["pwd"]);

    require_once 'dbh.inc.php';
    require_once 'fonctions.inc.php';

    if (emptyInputLogin ($username, $pwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else{
    header("location: ../espace-membre/espace_membre.php");
    exit();
}