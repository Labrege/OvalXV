<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . $_SESSION['includes']);

if (isset($_POST["submit"])){
    if ($_POST["pwd"] == $_POST["pwdrepeat"]){
        if (strlen($_POST["pwd"])>6){
            $pwd = $_POST["pwd"];
            $email = $_SESSION["useremail"];
            $sql = "UPDATE users SET userPwd =? WHERE userEmail='$email'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)){
                header("location: ../espace_membre_informations.php?error=stmtfailed");
                exit();
            }else{
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "s", $hashedPwd);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../espace_membre_informations.php?error=none");
            exit();
            }
        }else{
        header("location: ../espace_membre_informations.php?error=pwdnotlongenough");
        }

    }else{
    header("location: ../espace_membre_informations.php?error=pwddontmatch");
    }
}