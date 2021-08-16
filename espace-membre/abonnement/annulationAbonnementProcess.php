<?php

if (isset($_POST["annuler"])){
    echo 'hello';
    header('Location: ../stripeHandles/cancelProcess.php');
    exit();
}

if (isset($_POST["retour"])){
    header('Location: ../espace_membre_abonnement.php');
    exit();
}