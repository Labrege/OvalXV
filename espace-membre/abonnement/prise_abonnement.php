<?php
session_start();

if ($_SESSION["plan"] != 0){
    header('Location: ../espace_membre_abonnement.php?error="abonnementdejapris" ');
    exit();
}

else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pricing Page </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" type="Text/css" href="CSS/pricing.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                       <h2 class="price">$9,99/mois</h2> 
                    </div>
                    <div class="card-body text-center">
                        <h1> 1 mois </h1>
                        <ul class="list-group">
                            <li class="list-group-item"> Feature 1 </li>
                            <li class="list-group-item"> Feature 1 </li>
                            <li class="list-group-item"> Feature 1 </li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form action="../stripeHandles/paymentProcess.php?pid=1" method="POST">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT" data-amount="999" data-name="OvalXV" data-description="Test" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-zip-code="true" data-locale="auto" data-currency="eur" >
                            </script>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                       <h2 class="price">$99,99/an</h2> 
                    </div>
                    <div class="card-body text-center">
                        <h1> 1 an </h1>
                        <ul class="list-group">
                            <li class="list-group-item"> Feature 1 </li>
                            <li class="list-group-item"> Feature 1 </li>
                            <li class="list-group-item"> Feature 1 </li>
                        </ul>
                    </div>

                    <div class="card-footer text-center">
                        <form action="../stripeHandles/paymentProcess.php?pid=2" method="POST">
                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT" data-amount="9999" data-name="Demo Site" data-description="Widget" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="eur">
                            </script>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>   
</body>
</html>
<?php
}
?>