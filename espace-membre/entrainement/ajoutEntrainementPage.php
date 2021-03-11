<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/OvaleXV//espace-membre/espace_membre_liens.php');

?>

<script>
    $(document).ready(function(){    
        $(".form-ajout-page").submit(function(event){
            event.preventDefault();
            //Variables concernant l'entrainement
            var titreEntrainement = $("#titre-entrainement").val();
            var dateEntrainement = $("#date-entrainement").val();
            var heureEntrainement = $("#heure-entrainement").val();
            var themeEntrainement = $("#theme-entrainement").val();

            //Variables concernant les sections
            //var titreSection = $("#titre-section").val();
            //var effectifSection = $("#effectif-section").val();
            
            var arraySection = [];
            $('.titre-section').each(function(){
                if($(this).val()){
                    arraySection.push($(this).val())
                };
            });

            var arrayEffectif = [];
            $('.effectif-section').each(function(){
                if($(this).val()){
                    arrayEffectif.push($(this).val())
                };
            });

            var submit = $("#entrainement-submit").val();
            
            $(".test-entrainement").load("../espace-membre/entrainement/ajoutEntrainementProcess2.php", {
                titreEntrainement: titreEntrainement,
                dateEntrainement: dateEntrainement,
                heureEntrainement: heureEntrainement,
                themeEntrainement: themeEntrainement,
                //titreSection: titreSection,
                //effectifSection: effectifSection,
                arraySection: arraySection,
                arrayEffectif: arrayEffectif,
                submit: submit
            });
        });
    });
</script>


<div class="ajout-page-container">
    <div class="titre-ajout-page">
        <h2> Créer votre entrainement </h2>
    </div>
    <form action="#" method='post' class="form-ajout-page">

        <div class="inputs-entrainement">
            <input type="text" placeholder="Titre Entrainement" id='titre-entrainement' class='info-entrainement' value="test-titre">
            <input type="date" placeholder="Durée entrainement" id='date-entrainement' class='info-entrainement' value="<?php echo date('Y-m-d'); ?>">
            <input type="time" placeholder="heure" id='heure-entrainement' class='info-entrainement' value="<?php echo date("h:i"); ?>">
            <input type="text" placeholder="Thème"  id='theme-entrainement' class='info-entrainement' value="test-theme">
            <input id="btn-sections" type="button" value=" + ajouter section">
        </div>

        <div class="sections-container">
            <div class="sections-header">
                <h2> Vos sections </h2>
            </div>

            <div id="section-1" class='section section-1'>
                <div id='section-1-header' class="section-header">
                    <input type='text' placeholder='Nom de la Section' class='titre-section' value="titre-section-1"> 
                    <input type="text" placeholder='Effectif' class="effectif-section" value="effectif-section-1">
                    <button id='1' class="addExo" onClick="append_section(this.id)"> + </button>
                    <button id='1' class="supprSection" onClick="remove_section(this.id)"> <i class="fa fa-trash" ariria-hidden="true"></i></button> 
                </div>
                <div id="section-exo-1" class="section-exo section-exo-1">
            
                </div>
            </div>
        </div>
        <button type='submit' id="entrainement-submit" name='entrainement-submit' value='entrainement-submit'> Submit </button>
    </form>
    <div class="test-entrainement">

    </div>
</div>


<script src="../JS/sections.js?v=<?php echo time(); ?>"></script>


