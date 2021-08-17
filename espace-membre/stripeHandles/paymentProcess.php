<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . $_SESSION['includes']);

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//tableau de produits possible sous forme de prix STRIPE
$products = array(
  "pids" => ["1", "2"],
  "1" => "price_1ICrduFgXh2KdvEKOdFICqOh",
  "2"=> "price_1Im0CmFgXh2KdvEK360x7fSo"
);

//Si le numéro de produit renvoyé n'est pas dans le tableau 'PRODUCTS'
if(!isset($_GET["pid"]) || !in_array($_GET["pid"], $products["pids"]) || !isset($_POST["stripeToken"]) || !isset($_POST["stripeEmail"])){
  header('Location: ../espace_membre_abonnement.php?error=notset'); 
  exit();
}

require_once($_SERVER['DOCUMENT_ROOT'] . $_SESSION['vendor']);


//Clés STRIPE
$stripeKeys = [
"secret_key"      => "sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh",
"publishable_key" => "pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT",
];

\Stripe\Stripe::setApiKey($stripeKeys['secret_key']);

//Importation de la clé STRIPE
$stripe = new \Stripe\StripeClient(
  'sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh'
);

//Valeurs utilisés par la suite
$pid = $_GET['pid']; //Numéro du produit STRIPE (1 ou 2)
$token  = $_POST['stripeToken']; //Token STRIPE renvoyé automatiquement par le formulaire de CB
$email  = $_SESSION['useremail']; //email du compte qui prend l'abonnement
$name = $_SESSION['username'];

//mensuel ou annuel
if($pid == 1){
  $abonnement = 'mensuel';
}
elseif($pid ==2){
  $abonnement = 'annuel';
}
//si le client n'a pas d'abonnement stripe
if($_SESSION["plan"]==0){
  //Creation d'un nouveau client Stripe // 'shipping' => ['address' => ['line1' =>'28 rue jacques Baudry', 'country'=>'France'],'name'=>'test']
  $customer = \Stripe\Customer::create([
    'email' => $email,
    'source'  => $token,
    'name' => $name
  ]);

  //Création d'un abonnement STRIPE
  $sub = $stripe->subscriptions->create([
  'customer' => $customer->id, //Numéro unique du client
  'items' => [
    ['price' => $products[$pid], //Produit souhaité par le client
    ],
  ]
  ]);

  //Creation du client dans la base de donnée 
  $planId = $sub['id']; //Valeur du numéro de série de l'abonnement pour mettre de la table PHPmyAdmin
  $stripeId = $customer['id']; //Valeur du numéro de série du client pour mettre de la table PHPmyAdmin
  $email = $conn->real_escape_string($email); //Transformation du format de l'email pour faciliter l'insertion

  $sql = $conn->query("SELECT usersId FROM users WHERE userEmail='$email'");

  if ($sub){ //Si la création du compte est réussie
    if ($sql->num_rows >0){ //Si l'email est rattaché à un compte OVALXV
      if ($conn->query("UPDATE users SET plan = '$pid', stripeId = '$stripeId', planId = '$planId', startSub = NOW() WHERE userEmail='$email'")){
        $_SESSION["plan"] = $pid; //Nouveau statut membre
        $_SESSION["startsub"] = date('m/d/Y h:i:s a', time()); //Date de début de l'abonnement
        $_SESSION["planid"] = $planId; // Numéro de série unique de l'abonnement
        $_SESSION["stripeid"] = $stripeId; // Numéro de série unique de l'abonnement
          //Load Composer's autoloader
          $mail = new PHPMailer(true);
          try {
              //Server settings
              $mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;                   // Enable verbose debug output
              $mail->isSMTP();                                            // Send using SMTP
              $mail->Host       = 'smtp.hostinger.fr';                    // Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
              $mail->Username   = 'contact@ovalxv.com';                     // SMTP username
              $mail->Password   = 'OvalXV75016';                               // SMTP password
              $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
              $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      
              //Recipients
              $mail->setFrom('contact@ovalxv.com', 'OvalXV');
              $mail->addAddress($email);     // Add a recipient
      
              $body = "Bonjour! <br> Merci d'avoir souscrit à l'abonnement $abonnement de la plateforme OvalXV!
              <br><br>
              Vous pourrez retrouver l'intégralité de vos paiements ainsi que vos prochaines échéances dans votre espace en ligne.

              Cette offre est sans engagement et peut être annulée à tout moment.
              <br><br>
              A bientôt sur la plateforme OvalXV!
              ";
      
              // Content
              $mail->isHTML(true);                                  // Set email format to HTML
              $mail->Subject = 'OvalXV | Abonnement '.$abonnement.' OvalXV !';
              $mail->Body    = $body;
              $mail->AltBody = strip_tags($body);
      
              if ($mail->send()){
                  echo"<script language='javascript'>
                      var newLocation = '../espace_membre_abonnement.php?subcreated=$abonnement&mail=sent';
                      window.location = newLocation;
                  </script>
                  ";
              }
              else{
                  echo"<script language='javascript'>
                  var newLocation = '../espace_membre_abonnement.php?subcreated=$abonnement&mail=notsent';
                      window.location = newLocation;
                  </script>
                  ";
              }
          } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {
              $mail->ErrorInfo
          }";
          }
      }
    }
  }
  else{
  echo "une erreur est survenue";
  }

}elseif($_SESSION["plan"] >0){
  $planId = $_SESSION["planid"];
  $priceId = $products[$pid];

  $subscription = \Stripe\Subscription::retrieve($planId);
  $subUpdate = \Stripe\Subscription::update($planId, [
  'cancel_at_period_end' => false,
  'proration_behavior' => 'none',
  'items' => [
    [
      'id' => $subscription->items->data[0]->id,
      'price' => $priceId,
    ],
  ],
]);

  if($subUpdate){
    if($conn->query("UPDATE users SET plan='$pid', endSub = '0000-00-00' WHERE userEmail='$email'"));
    $_SESSION["plan"]=$pid;
    $_SESSION["endsub"] = '0000-00-00';
    //Load Composer's autoloader
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;              // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.hostinger.fr';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'contact@ovalxv.com';                   // SMTP username
        $mail->Password   = 'OvalXV75016';                          // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('contact@ovalxv.com', 'OvalXV');
        $mail->addAddress($email);     // Add a recipient

        $body = "Bonjour! <br> Votre modification dans votre abonnement a bien été pris en compte!
        <br><br>
        Vous pourrez retrouver l'intégralité de vos paiements ainsi que vos prochaines échéances dans votre espace en ligne.

        Cette offre est sans engagement et peut être annulée à tout moment.
        <br><br>
        A bientôt sur la plateforme OvalXV!
        ";

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'OvalXV | Modification abonnement OvalXV !';
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        if ($mail->send()){
            echo"<script language='javascript'>
                var newLocation = '../espace_membre_abonnement.php?subupdated=$abonnement&mail=sent';
                window.location = newLocation;
            </script>
            ";
        }
        else{
            echo"<script language='javascript'>
            var newLocation = '../espace_membre_abonnement.php?subupdated=$abonnement&mail=notsent';
                window.location = newLocation;
            </script>
            ";
        }
    } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {
        $mail->ErrorInfo
    }";
    }
  }
}


