<?php
session_start();

$products = array(
  "pids" => ["1", "2"],
  "1" => "price_1ICrduFgXh2KdvEKOdFICqOh",
  "2"=> "price_1ICrfIFgXh2KdvEKeYa8E1ul"
);

if(!isset($_GET["pid"]) || !in_array($_GET["pid"], $products["pids"]) || !isset($_POST["stripeToken"]) || !isset($_POST["stripeEmail"])){
  header('Location: ../espace-membre/espace_membre_abonnement.php'); 
  exit();
}

require_once('C:\xampp\htdocs\OVAL XV\vendor\autoload.php');

$stripe = [
"secret_key"      => "sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh",
"publishable_key" => "pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT",
];

\Stripe\Stripe::setApiKey($stripe['secret_key']);

$pid = $_GET['pid']; 
$token  = $_POST['stripeToken'];
$email  = $_POST['stripeEmail'];



//Creation du client Stripe
$customer = \Stripe\Customer::create([
    'email' => $email,
    'source'  => $token,
]);


$stripe = new \Stripe\StripeClient(
    'sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh'
  );

$sub = $stripe->subscriptions->create([
  'customer' => $customer->id,
  'items' => [
    ['price' => $products[$pid],
    ],
  ]
]);

$planId = $sub['id'];

//Creation du client dans la base de donnée localhost
$stripeId = $customer['id'];
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "DB";

$conn = new mysqli("localhost", "root", "", "DB");
$email = $conn->real_escape_string($email);

$sql = $conn->query("SELECT usersId FROM users WHERE userEmail='$email'");

if ($sub){
  if ($sql->num_rows >0){
    if ($conn->query("UPDATE users SET plan = '$pid', stripeId = '$stripeId', planId = '$planId' WHERE userEmail='$email'")){
      $_SESSION["plan"] = $pid;
      header('Location: ../espace_membre.php?error="none"');
      exit();
    }
  }
}
else{
  echo "une erreur est survenue";
}

