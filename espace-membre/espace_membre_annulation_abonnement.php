<?php
require_once '../espace-membre/espace_membre_header.php';

if($_SESSION['plan']==1){
    $abonnement = 'stagiaire';
}
elseif($_SESSION['plan']==2){
    $abonnement = 'titulaire';
}
?>

<div class="section-container">

    <div class="titre-offres">
        <h2> Annulation </h2>
    </div>

    <div class='div-texte-annulation'>
        <h2> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; ATTENTION ! &nbsp;<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> </h2>
        <br>
        <p>En procédent à cette anulation vous arretez votre abonnement <?php echo $abonnement; ?>. Celui-ci ne prendra pas fin avant que tous les jours de votre abonnement ne soient écoulés.</p>
        <p><em class='exemple'><i class="fa fa-info-circle" aria-hidden="true"></i> &nbsp;exemple : Un abonnement mensuel pris le 02/04/2021 et annulée le 15/04/2021, ne prendra fin qu'une fois que tous les jours de l'abonnement ne se soient écoulés soit le 02/05/2021.</em></p>

        <form action="abonnement/annulationAbonnementProcess.php" method="POST" class='form_annulation'>
            <button type="submit" name="annuler" value="annuler" class='bouton_valider_reverse'> Annuler mon abonnement </button>
            <button type="submit"  name="retour" value="retour" class='bouton_valider_reverse_sans_fond'> Retour à mes abonnements  </button>
        </form>

    </div>
</div>

<?php
include '../espace-membre/espace_membre_footer.php';
?>