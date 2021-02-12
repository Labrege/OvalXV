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
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidUid($username) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if (invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $pwdrepeat) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if (uidExists($conn, $username, $email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name, $surname, $email, $username, $pwd);
}
    else{
        header("location: ../signup.php");
        exit();
    }


