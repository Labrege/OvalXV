<?php
require_once '../espace-membre/espace_membre_header.php';
?>
<div id="espace_membre_abonnement">

<div class="titre-offres">
<h2> Mon abonnement </h2>
</div>
<div class="offre_abonement_global">
    <div class="level_plan">
        <div class="plan_abonnement" 
        <?php 
        if($_SESSION["plan"]==1){
            echo "style='border: 5px solid salmon;'";
        }
        ?>><!-- abonement gratuit-->
            <div class="titre">
                   <h3> Stagiaire </h3>
                   <img src="../Images/icons-abonement-bronze.png" alt="">
            </div>
            
            <div class="contenue_offre">
                <div class="prix_par_mois">9,99€/mois*</div>
                <div class="prix_par_an"> *sans engagement </div>
                <div class="contenue_propose">
                    <ul class="liste_contenu_plan">
                        <li class="contenu_plan"><img src="../Images/tick.png" alt=""> <p>Accès à l'ensemble des vidéos OvalXV </p></li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>Accès au module entraînement </p> </li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>Accessible sur toutes plateformes  </p></li>
                    </ul>
                </div>
                <div class="boite-bouton-valider">
                <?php
                if($_SESSION["plan"]==1){
                    ?>
                    <h4> Abonnement en cours </h4>
                <?php
                }elseif ($_SESSION["plan"] == 0){
                ?>
                    <form action="../espace-membre/stripeHandles/paymentProcess.php?pid=1" method="POST">
                        <button class='bouton_valider'> Prendre l'abonnement <h1 style="display: none;"><script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT" data-amount="999" data-name="Abonnement mensuel" data-description="9,99€/mois sans engagement" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="eur" data-name="auto">
                        </script></h1> </button>
                        
                    </form>
                <?php
                }elseif($_SESSION["plan"] == 2){
                    ?>
                    <h4> Abonnement non disponible <i class="fa fa-info-circle" aria-hidden="true"></i></h4>
                    <?php
                }
                ?>
                </div>
            </div>
            
        </div>

        <div class="plan_abonnement"
        <?php 
        if($_SESSION["plan"]==2){
            echo "style='border: 5px solid salmon;'";
        }
        
        ?>><!-- abonement prenium-->
            <div class="titre">
                   <h3> Titulaire </h3>
                   <img src="../Images/icons-abonement-argent.png" alt="">
            </div>
            
            <div class="contenue_offre">
                <div class="prix_par_mois">4,99€ /mois*</div>
                <div class="prix_par_an">*offre annuelle : 59,99€/an</div>
                <div class="contenue_propose">
                    <ul class="liste_contenu_plan">
                        <li class="contenu_plan"><img src="../Images/tick.png" alt=""> <p>Accès à l'ensemble des vidéos OvalXV </p></li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>Accès au module entraînement </p> </li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>Accessible sur toutes plateformes  </p></li>
                    </ul>
                </div>
                <div class="boite-bouton-valider">
                <?php
                if($_SESSION["plan"]==2){
                    ?>
                    <h4> Abonnement en cours </h4>
                <?php
                }else{
                ?>
                    <form action="/espace-membre/stripeHandles/paymentProcess.php?pid=2" method="POST" style="text-align: center;">
                        <button class='bouton_valider'> Prendre l'abonnement <h1 style="display: none;"><script src="https://checkout.stripe.com/checkout.js" class="stripe-button" data-key="pk_test_51HqQHPFgXh2KdvEK9BkU6l4OBittEpDQkWyOqnul0tP8OUAY8dAIyHJYGfKBMjU6x3l8UwwJvzdD2BLvtnRb7R4m00SHqgdKiT" data-amount="5999" data-name="Abonnement Annuel" data-description="4,99€/mois pendant un an" data-image="https://stripe.com/img/documentation/checkout/marketplace.png" data-locale="auto" data-currency="eur" >
                        </script></h1> </button>
                    </form>
                <?php
                }
                ?>
                </div>
            </div>
        </div>

        <div class="plan_abonnement"
        <?php 
        if($_SESSION["plan"]==3){
            echo "style='border: 5px solid salmon;'";
        }
        ?>>
            <div class="titre"><!-- abonement club-->
                   <h3>Club</h3>
                   <img src="../Images/icons-abonement-or.png" alt="">
            </div>
            
            <div class="contenue_offre">
                <div class="prix_par_mois">Prix fixé sur devis </div>
                <div class="prix_par_an hidden"> hide</div>
                <div class="contenue_propose">
                    <ul class="liste_contenu_plan">
                        <li class="contenu_plan"><img src="../Images/tick.png" alt=""><p> accès à 20 vidéos </p></li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>nombres d'entrainements disponibles : 5</p> </li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>2 appareils pour un seul compte</p> </li>
                    </ul>
                </div>
                <div class="boite-bouton-valider">
                    <button> Contactez l'équipe </button>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 100%; display: flex; align-items: center; justify-content: center; margin-bottom: 100px">
        <!-- Button pour annuler l'abonnement-->
        <a href="../espace-membre/espace_membre_annulation_abonnement.php" style= "font-size: 16px" title="Vous n'avez pas encore d'abonnement ! "
            <?php
            if($_SESSION["plan"]==0 || $_SESSION["endsub"]!== "0000-00-00"){
                echo "class='unclickable' onclick='return false'";
            }
            ?>> Annuler l'abonnement <i class="fa fa-info-circle" aria-hidden="true"></i>
        </a>
    </div>
</div>
<?php
include '../espace-membre/espace_membre_footer.php';
?>
</div>
<div class="message">
<?php
if(isset($_GET["subcreated"]) && isset($_GET["mail"])){
    if ($_GET["subcreated"] == "annuel" && $_GET["mail"] == "sent"){
        $abonnement = $_GET["subcreated"];
        echo "<span class='success_message'> Souscription à l'abonnement $abonnement réussie ! Un mail de confirmation vous a été envoyé. <div class='exit-message'>&times;</div></span>";
    }
    if ($_GET["subcreated"] == "annuel" && $_GET["mail"] == "notsent"){
        $abonnement = $_GET["subcreated"];
        echo "<span class='success_message'> Souscription à l'abonnement $abonnement réussie ! <div class='exit-message'>&times;</div></span>";
    }
    if ($_GET["subcreated"] == "mensuel" && $_GET["mail"] == "sent"){
        $abonnement = $_GET["subcreated"];
        echo "<span class='success_message'> Souscription à l'abonnement $abonnement réussie ! Un mail de confirmation vous a été envoyé. <div class='exit-message'>&times;</div></span>";
    }
    if ($_GET["subcreated"] == "mensuel" && $_GET["mail"] == "notsent"){
        $abonnement = $_GET["subcreated"];
        echo "<span class='success_message'> Souscription à l'abonnement $abonnement réussie ! <div class='exit-message'>&times;</div></span>";
    }
}
if(isset($_GET["subupdated"]) && isset($_GET["mail"])){
    if ($_GET["subupdated"] == "annuel" && $_GET["mail"] == "sent"){
        $abonnement = $_GET["subupdated"];
        echo "<span class='success_message'> Modification à l'abonnement $abonnement réussie ! Un mail de confirmation vous a été envoyé. <div class='exit-message'>&times;</div></span>";
    }
    if ($_GET["subupdated"] == "annuel" && $_GET["mail"] == "notsent"){
        $abonnement = $_GET["subupdated"];
        echo "<span class='success_message'> Modification à l'abonnement $abonnement réussie ! <div class='exit-message'>&times;</div></span>";
    }
    if ($_GET["subupdated"] == "mensuel" && $_GET["mail"] == "sent"){
        $abonnement = $_GET["subupdated"];
        echo "<span class='success_message'> Modification à l'abonnement $abonnement réussie ! Un mail de confirmation vous a été envoyé. <div class='exit-message'>&times;</div></span>";
    }
    if ($_GET["subupdated"] == "mensuel" && $_GET["mail"] == "notsent"){
        $abonnement = $_GET["subupdated"];
        echo "<span class='success_message'> Modification à l'abonnement $abonnement réussie ! <div class='exit-message'>&times;</div></span>";
    }
}
if(isset($_GET["error"]) && isset($_GET["endsub"])){
    if ($_GET["error"] == "subscriptioncanceled"){
        $dateEndSub = $_GET["endsub"];
        echo "<span class='success_message'> Votre demande de résiliation d'abonnement OvalXV a été prise en compte. Vous pourrez profiter de votre compte jusqu'au  $dateEndSub ! <div class='exit-message'>&times;</div></span>";
    }
}
?>
</div>
<script type="text/javascript" src="../JS/vanilla-tilt.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".plan_abonnement"),{
        max:25,
        speed:400,
        glare: true,
        "max-glare":0.4,
    });
</script>
