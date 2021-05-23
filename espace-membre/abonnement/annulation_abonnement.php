<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OvalXV | Annuler abonnement </title>
</head>
<body>

<h1> Annulation de votre abonnement </h1>

<p> En procédent à cette anulation vous arretez votre abonnement prendra fin lors de la fin de votre période.</p>

<form action="?" method="POST">
    <button type="submit" name="annuler" value="annuler"> Annuler mon abonnement </button>
    <button type="submit"  name="retour" value="retour"> Retour </button>
</form>

</body>
</html>

<?php

if (isset($_POST["annuler"])){
    header('Location: ../stripeHandles/cancelProcess.php');
    exit();
}

if (isset($_POST["retour"])){
    header('Location: ../espace_membre_abonnement.php');
    exit();
}

