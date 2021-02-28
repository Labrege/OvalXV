<?php

include '../espace-membre/espace_membre_header.php';

//verifie la bonne connexion au compte
if (isset($_SESSION["useruid"])){
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

<div class="formCheckbox-container">
    <form class="form-filtre" action="#" method="post">
        <div class="filtres-container">
            <!-- Checkbox effectif multiple -->
            <div class="checkbox-effectif">
                <h3> Effectif </h3>
                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" id="complet" name="filtre-Effectif[]" value="complet" class="checkBox">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> Complet </h2>
                </div>
                
                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" id="reduit" name="filtre-Effectif[]" value="reduit" class="checkBox">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> Réduit </h2>
                </div>
                
                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" id="1vs1" name="filtre-Effectif[]" value="1vs1" class="checkBox">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> 1 vs 1 </h2>
                </div>
            </div>

            <!-- Checkbox effectif simple -->
            <div class="checkbox-complement">
                <h3> Complément </h3>
                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" name="passe" class="check" value="passe">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> Passe </h2>
                </div>

                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" name="ruck" class="check" value="ruck">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> Ruck </h2>
                </div>

                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" name="plaquage" class="check" value="plaquage">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> Plaquage </h2>
                </div>
            </div>
        </div>
        <br>
        <br>

        <div class="btnContainer">
            <button type="submit" value="Submit" id="btnRechercher"> Rechercher </button>
        </div>
    </form>
</div>

<div class="product">
 Veuillez effectuer une recherche...
 <br>
 <br>
</div>

</body>
</html>

<?php 

//Si mauvaise connexion - Retour à la page login
}
else{
    header("location: ../login.php");
}
?>
