<?php

include '../espace-membre/espace_membre_header.php';

//verifie la bonne connexion au compte
if (isset($_SESSION["useruid"])){

// On récupère tout le contenu de la table jeux_video
$reponse = $conn->query('SELECT * FROM video ORDER BY StatutVideo DESC');
?>

<script>
        $(document).ready(function(){
            //Check une seule checkbox pour les checkbox complement
            $('.check').click(function() {
                    $('.check').not(this).prop('checked', false);
                });

            $(".form-filtre").submit(function(event){
                event.preventDefault();

                //renvoyer plusieurs checkbox à la recherche
                var filtreEffectif = [];
                $('input.checkBox:checkbox:checked').each(function () {
                    filtreEffectif.push($(this).val());
                });

                var filtreComplement = $(".check:checked").val();

                var submit = $("#btnRechercher").val();
                $(".product").load("../espace-membre/filtreRechercheProcess.php", {
                    filtreComplement: filtreComplement,
                    filtreEffectif: filtreEffectif,
                    submit: submit
                });
            });
        });
    
</script>

<h2> Vidéos </h2>
<br>

<div class="formCheckbox-container">
    <form class="form-filtre" action="#" method="post">
        <div class="filtres-container">
            <!-- Checkbox effectif multiple -->
            <div class="checkbox-effectif">
                <h3> Effectif </h3>
                <div class="tag">
                    <input type="checkbox" id="complet" name="filtre-Effectif[]" value="complet" class="checkBox">
                    <h2 class="tag-titre"> Complet </h2>
                </div>
                
                <div class="tag">
                    <input type="checkbox" id="reduit" name="filtre-Effectif[]" value="reduit" class="checkBox">
                    <h2 class="tag-titre"> Réduit </h2>
                </div>
                
                <div class="tag">
                    <input type="checkbox" id="1vs1" name="filtre-Effectif[]" value="1vs1" class="checkBox">
                    <h2 class="tag-titre"> 1 vs 1 </h2>
                </div>
            </div>

            <!-- Checkbox effectif simple -->
            <div class="checkbox-complement">
                <h3> Complément </h3>
                <div class="tag">
                    <input type="checkbox" name="passe" class="check" value="passe">
                    <h2 class="tag-titre"> Passe </h2>
                </div>

                <div class="tag">
                    <input type="checkbox" name="ruck" class="check" value="ruck">
                    <h2 class="tag-titre"> Ruck </h2>
                </div>

                <div class="tag">
                    <input type="checkbox" name="plaquage" class="check" value="plaquage">
                    <h2 class="tag-titre"> Plaquage </h2>
                </div>
            </div>
            <div class="checkbox-complement">
                <h3 style="visibility: hidden;"> Complément </h3>
                <div class="tag">
                    <input type="checkbox" name="passe" class="check" value="passe">
                    <h2 class="tag-titre"> Passe </h2>
                </div>

                <div class="tag">
                    <input type="checkbox" name="ruck" class="check" value="ruck">
                    <h2 class="tag-titre"> Ruck </h2>
                </div>

                <div class="tag">
                    <input type="checkbox" name="plaquage" class="check" value="plaquage">
                    <h2 class="tag-titre"> Plaquage </h2>
                </div>
            </div>
            <div class="checkbox-complement">
                <h3 style="visibility: hidden;"> Complément </h3>
                <div class="tag">
                    <input type="checkbox" name="passe" class="check" value="passe">
                    <h2 class="tag-titre"> Passe </h2>
                </div>

                <div class="tag">
                    <input type="checkbox" name="ruck" class="check" value="ruck">
                    <h2 class="tag-titre"> Ruck </h2>
                </div>

                <div class="tag">
                    <input type="checkbox" name="plaquage" class="check" value="plaquage">
                    <h2 class="tag-titre"> Plaquage </h2>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="btnContainer">
            <input type="submit" value="Submit" id="btnRechercher">
        </div>
    </form>
</div>

<div class="product">
</div>

</body>
</html>

<?php 
}

//Si mauvaise connexion - Retour à la page login
else{
    header("location: ../login.php");
}
?>
