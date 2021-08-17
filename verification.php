<?php

require_once 'includes/dbh.inc.php';

if(isset($_GET['code']) || isset($_GET['username'])){
    echo $verifcode = $_GET["code"];
    echo "<br>";
    echo $username = $_GET["username"];
    $data = $conn->query("SELECT * FROM users WHERE userUid = '$username'");

    while ($donnees = $data->fetch_assoc()){
        echo "<br>";
        echo $donnees["codeVerif"];
        $checkCode = password_verify($donnees["codeVerif"],$verifcode);
        if($checkCode === true){
            $dbUpdate = $conn->query("UPDATE users SET compteVerif = 1 WHERE userUid = '$username'");
            header("Location: ../login.php?error=accountverified");
        }
        elseif($checkCode === false){
            header("Location: ../login.php?error=accountnotverified");
        }
    }
}

?>