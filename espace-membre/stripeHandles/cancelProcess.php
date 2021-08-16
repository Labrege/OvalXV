<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'/OvaleXV/vendor/autoload.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/OvaleXV/includes/dbh.inc.php');

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email = $_SESSION["useremail"];
$planId = $_SESSION["planid"];

$stripe = [
"secret_key"      => "sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh",
"publishable_key" => "pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT",
];

 
\Stripe\Stripe::setApiKey($stripe['secret_key']);

$stripeCancel = \Stripe\Subscription::update(
$planId,
[
'cancel_at_period_end' => true,
]);

echo $endsubdateunix = $stripeCancel["cancel_at"];
echo $endSubDate = date('Y-m-d', $endsubdateunix);
 
if($stripeCancel){      
    if($conn->query("UPDATE users SET endSub = '$endSubDate' WHERE userEmail='$email'")){
        $dateMail = date('d/m/Y' , strtotime($endSubDate));
        $_SESSION["endsub"] = $endSubDate;
        // Load Composer's autoloader
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
    
            $body = "Bonjour! <br> <br> Votre demande de résiliation a bien été prise en compte!
            <br><br>
            Vous pourrez continuer à profiter de votre compte payant jusqu'au $dateMail.
            
            Passé cette date, votre compte sera de nouveau un compte gratuit.
            <br><br>
            A bientôt sur la plateforme OvalXV!
            ";
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'OvalXV | Annulation abonnement!';
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);
    
            if ($mail->send()){
                echo"<script language='javascript'>
                    var newLocation = '../espace_membre_abonnement.php?error=mailsent';
                    window.location = newLocation;
                </script>
                ";
            }
            else{
                echo"<script language='javascript'>
                var newLocation = '../espace_membre_abonnement.php?error=mailnotsent';
                    window.location = newLocation;
                </script>
                ";
            }
        } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {
            $mail->ErrorInfo
        }";
        }
        header("Location: ../espace_membre_abonnement.php?error=subscriptioncanceled&endsub=$endSubDate");
        }
}
else{
  header('Location: ../espace_membre.php?error=problemeannulation');
}
?>
*/