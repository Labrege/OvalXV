
<?php
require_once '../espace-membre/espace_membre_header.php';
require_once($_SERVER['DOCUMENT_ROOT'] . $_SESSION['includes']);

?>
<div class="container-paiements">
    <div class="titre-offres">
        <h2> Vos Paiements</h2>
    </div>
<?php

//Variables
$numTrans = 1;
//Si utilisateur a un compte stripe
if(!empty($_SESSION["stripeid"])){
    $custId = $_SESSION["stripeid"];

    //initiation de STRIPE
    require_once($_SERVER['DOCUMENT_ROOT'] . $_SESSION['vendor']);
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
}
?>
<!-- Tableau Recap paiements -->
<table class="table-paiements">
        <tr>
            <th> N° </th>
            <th> Date </th>
            <th> Description </th>
            <th> Montant </th>
            <th> Statut </th>
            <th> Reçu </th>
        </tr>

        <tr>
            <td> <?php echo $numTrans;?></td>
            <td> <?php echo date('d/m/Y', strtotime($_SESSION['regdate']));?> </td>
            <td> Ouverture du compte OvalXV </td>
            <td> 0,00€ </td>
            <td> Payé </td>
            <td>  </td>
        </tr>
<?php
if(!empty($_SESSION["stripeid"])){
        //Charges
    $charges = $stripe->charges->all(['customer' => $custId]);
    $totalCharges = count($charges['data']);
    foreach (range($totalCharges-1, 0) as $chargesLen){
        $numTrans+=1;
        ?>
            <tr>
                <td> <?php echo $numTrans;?></td>
                <td> <?php echo date('d/m/Y',$charges['data'][$chargesLen]['created']);?></td>
                <td> <?php echo $charges['data'][$chargesLen]['description'];?> </td>
                <td> <?php echo number_format($charges['data'][$chargesLen]['amount_captured']/100,2, '.', '');?> €</td>
                <td> <?php if($charges['data'][$chargesLen]['captured'] == 1){
                    echo "Payé";
                }
                elseif ($charges['data'][$chargesLen]['captured'] == 0) {
                    echo "Non payé";
                }?> </td>
                <td> <i class="fa fa-envelope" aria-hidden="true"></i> </td>
            </tr>
            <?php
        }
    ?>
        <tr>
            <td> <?php echo $numTrans+1;?></td>
            <td> <?php echo date('d/m/Y', strtotime($nextPayementDate));?> </td>
            <td>  <?php echo $title;?></td>
            <td> <?php echo number_format($NextAmountDue/100,2, '.', '');?> €</td>
            <td> En attente</td>
            <td title="Reçu pas encore disponible pour cette échéance"> <i class="fa fa-envelope" aria-hidden="true"></i> </p></td>

        </tr>
<?php
}
?>
</table>
<div class="recap-abonnement">
    <p> <b>Votre Abonnement actuel : </b>
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

    <p> <b> Début de votre abonnement premium: </b><?php 
    if($_SESSION['startsub'] !== "0000-00-00"){
        echo  date('d/m/Y', strtotime($_SESSION['startsub']));
    }else{
        echo "Vous n'avez pas d'abonnement premium";
    } ?></p>
    <p> <b> Fin de votre abonnement : </b><?php 
    if($_SESSION['endsub'] !== "0000-00-00"){
        echo  date('d/m/Y', strtotime($_SESSION['endsub']));
    }else{
        echo "Pas d'annulation prévue";
    } ?></p>
</div>

</div>
<?php
require('espace_membre_footer.php');
?>