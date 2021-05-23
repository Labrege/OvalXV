<?php
require_once '../espace-membre/espace_membre_header.php';
require_once '../includes/dbh.inc.php';

//Variables
$numTrans = 1;
if(!empty($_SESSION["stripeid"])){
    $custId = $_SESSION["stripeid"];

    //initiation de STRIPE
    require_once($_SERVER['DOCUMENT_ROOT'].'/OvaleXV/vendor/autoload.php');
        //Clés STRIPE
    $stripeKeys = [
        "secret_key"      => "sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh",
        "publishable_key" => "pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT",
        ];
        
    \Stripe\Stripe::setApiKey($stripeKeys['secret_key']);

    //Début de recherche du client
    $stripe = new \Stripe\StripeClient(
        'sk_test_51HqQHPFgXh2KdvEKH1wqZ2YHmkGDnrvIBYsjXPFOx5XgtijlDm0hcDLLUqntSa7OzOC0raZIL8Z2krNk130VUKFL00vqlN7izh'
    );

    $clientInfo = $stripe->customers->retrieve(
        $custId,
        []
    );


    //echo $nextPayement;
    if($_SESSION["endsub"] == "0000-00-00"){
        $nextPayement = $stripe->invoices->upcoming([
            'customer' => $custId,
        ]);
        $nextPaymentAmount = $nextPayement['next_payment_attempt'];
        $NextAmountDue = $nextPayement['amount_due'];
        //Date du prochain paiement
        $nextPaymentDateUnix = $nextPayement['next_payment_attempt'];
        $nextPayementDate = date('d-M-Y', $nextPaymentDateUnix);
        $title = "Prochain paiement ";
    }
    elseif($_SESSION['endsub'] !== "0000-00-00"){
        $nextPayementDate = $_SESSION['endsub'];
        $NextAmountDue = 0000;
        $title = "Annulation de l'abonnement";
    }

    ?>
    <!-- Tableau Recap paiements -->
    <table>
            <tr>
                <th> N° </th>
                <th> Date </th>
                <th> Description </th>
                <th> Montant </th>
                <th> Statut </th>
                <th> Reçu </th>
            </tr>

            <tr>
                <th> <?php echo $numTrans;?></th>
                <th> <?php echo date('d/m/Y', strtotime($_SESSION['regdate']));?> </th>
                <th> Ouverture du compte OvalXV </th>
                <th> 0,00€ </th>
                <th> Payé </th>
                <th>  </th>
            </tr>
    <?php
    //Charges
    $charges = $stripe->charges->all(['customer' => $custId]);
    $totalCharges = count($charges['data']);
    foreach (range($totalCharges-1, 0) as $chargesLen){
        $numTrans+=1;
        ?>
            <tr>
                <th> <?php echo $numTrans;?></th>
                <th> <?php echo date('d/m/Y',$charges['data'][$chargesLen]['created']);?></th>
                <th> <?php echo $charges['data'][$chargesLen]['description'];?> </th>
                <th> <?php echo number_format($charges['data'][$chargesLen]['amount_captured']/100,2, '.', '');?> €</th>
                <th> <?php if($charges['data'][$chargesLen]['captured'] == 1){
                    echo "Payé";
                }
                elseif ($charges['data'][$chargesLen]['captured'] == 0) {
                    echo "Non payé";
                }?> </th>
                <th> <i class="fa fa-envelope" aria-hidden="true"></i> </th>
            </tr>
            <?php
    }
    ?>
        <tr>
            <th> <?php echo $numTrans+1;?></th>
            <th> <?php echo date('d/m/Y', strtotime($nextPayementDate));?> </th>
            <th>  <?php echo $title;?></th>
            <th> <?php echo number_format($NextAmountDue/100,2, '.', '');?> €</p></th>
            <th> En attente </p></th>
            <th title="Reçu pas encore disponible pour cette échéance"> <i class="fa fa-envelope" aria-hidden="true"></i> </p></th>

        </tr>
    </table>

    <p> Votre Abonnement actuel : 
    <?php 
    if ($_SESSION["plan"]==0) {
        echo 'Abonnement Gratuit';
    }
    if($_SESSION['plan']==1){
        echo 'Abonnement mensuel';
    }
    if($_SESSION['plan']==2){
        echo 'Abonnement annuel';
    }
    ?></p>

    <p>Début de votre abonnement premium: <?php echo date('d/m/Y', strtotime($_SESSION['startsub']));?></p>
    <p>Fin de votre abonnement : <?php 
    if($_SESSION['endsub'] !== "0000-00-00"){
        echo  date('d/m/Y', strtotime($_SESSION['endsub']));
    }else{
        echo "Pas d'annulation prévue";
    } ?></p>
    <?php
}else{
    echo "Vous n'avez pas de paiements";
}
?>

