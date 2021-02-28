<?php

require_once '../espace-membre/espace_membre_header.php';

?>
<div id="espace_membre_abonnement">
<h2> Mon abonnement </h2>

<!-- 
<h4> Gestion de mon abonnement </h4>
<ul>
    <li><a href="../espace-membre/abonnement/prise_abonnement.php"> Prendre un abonnement </a></li>
    <li><a href="../espace-membre/abonnement/.php"> Modifier mon moyen de paiement</a></li>
    <li><a href="../espace-membre/abonnement/.php"> Modifier mon abonnement</a></li>
    <li><a href="../espace-membre/abonnement/annulation_abonnement.php"> Annuler mon abonnement </a></li>
    <li><a href="../espace-membre/abonnement/.php"> Suprimer mon compte </a></li>
</ul> 
-->

<div class="offre_abonement_global">
    <div class="level_plan" >
        <div class="plan_abonnement"><!-- abonement gratuit-->
            <div class="titre">
                   <h3>Essaie</h3>
                   <img src="../Images/icons-abonement-bronze.png" alt="">
            </div>
            
            <div class="contenue_offre">
                <div class="prix_par_mois">Gratuit</div>
                <div class="prix_par_an hidden">gratuit</div>
                <div class="contenue_propose">
                    <ul class="liste_contenu_plan">
                        <li class="contenu_plan"><img src="../Images/tick.png" alt=""> <p>acces a 20 videos </p></li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>nombre d'entrainement disponible 5</p> </li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>2 appareils pour un seul compte </p></li>
                    </ul>
                </div>
            </div>
            <div class="boite-bouton-valider">
                <button type="button_gratuit" class="bouton_valider" name="button_gratuit">Choisir ce plan</a>
            </div>
        </div>


        <div class="plan_abonnement"><!-- abonement prenium-->
            <div class="titre">
                   <h3>Prenium</h3>
                   <img src="../Images/icons-abonement-argent.png" alt="">
            </div>
            
            <div class="contenue_offre">
                <div class="prix_par_mois">10€ /mois*</div>
                <div class="prix_par_an">*offre annuel: 100€/ans</div>
                <div class="contenue_propose">
                    <ul class="liste_contenu_plan">
                        <li class="contenu_plan"><img src="../Images/tick.png" alt=""> <p>acces a 20 videos </p></li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>nombre d'entrainement disponible 5 </p></li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>2 appareils pour un seul compte </p></li>
                    </ul>
                </div>
            </div>
            <div class="boite-bouton-valider">
                <button type="button_prenium" class="bouton_valider" name="button_prenium">Choisir ce plan</a>
            </div>
        </div>

        <div class="plan_abonnement">
            <div class="titre"><!-- abonement club-->
                   <h3>Club</h3>
                   <img src="../Images/icons-abonement-or.png" alt="">
            </div>
            
            <div class="contenue_offre">
                <div class="prix_par_mois">25€ /mois*</div>
                <div class="prix_par_an">*offre annuel: 250€/ans</div>
                <div class="contenue_propose">
                    <ul class="liste_contenu_plan">
                        <li class="contenu_plan"><img src="../Images/tick.png" alt=""><p> acces a 20 videos </p></li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>nombre d'entrainement disponible 5</p> </li>
                        <li class="contenu_plan"> <img src="../Images/tick.png" alt=""><p>2 appareils pour un seul compte</p> </li>
                    </ul>
                </div>
            </div>
            <div class="boite-bouton-valider">
                <button type="button_club" class="bouton_valider" name="button_club">Choisir ce plan</a>
            </div>
        </div>

    </div>
</div>

</div>
