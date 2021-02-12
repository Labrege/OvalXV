<?php
session_start();

require_once('C:\xampp\htdocs\OVAL XV\vendor\autoload.php');

$email = $_SESSION["useremail"];
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "DB";

//Connection à la base de données: NOM DE LA BD = $connect//
$connect = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername, $dbpassword);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// On récupère tout le contenu de la table jeux_video
$reponse = $connect->query("SELECT * FROM users WHERE userEmail = '$email'");

while ($donnees = $reponse->fetch()){
    $planId = $donnees['planId'];
}

$stripe = [
"secret_key"      => "sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh",
"publishable_key" => "pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT",
];

 
\Stripe\Stripe::setApiKey($stripe['secret_key']);

if (
  \Stripe\Subscription::update(
  $planId,
  [
   'cancel_at_period_end' => true,
  ])){

    header('Location: ../espace_membre.php?error=none');
}
else{
  header('Location: ../espace_membre.php?error=problemeannulation');
}



?>