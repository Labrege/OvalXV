<?php

require_once '../espace-membre/espace_membre_liens.php';

?>


<div class="ajout-page-container">
    <div class="titre-ajout-page">
        <h2> Créer votre entrainement </h2>
    </div>
    <div class="form-ajout-page">
        <form action="#">
            <input type="text" placeholder="Titre">
            <input type="text" placeholder="Titre">
            <input type="text" placeholder="Titre">
            <input type="text" placeholder="Titre">
            <input id="btn-sections" type="button" value=" + ajouter section">
        </form>

        <div class="sections-container">
            <div class="sections-header">
                <h2> Vos sections </h2>
            </div>
            <div id="section-titre-1" class='section-titre section-titre-1'>
                <div class="section-titre-header">
                    <input type='text' placeholder='Nom de la Section'> 
                    <button id='1' class="supprSection" onClick="remove_section(this.id)"> - </button> 
                    <button id='1' class="addExo" onClick="append_section(this.id)"> + </button>
                </div>
                <div id="section-exo-1" class="section-exo section-exo-1">
            
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="../JS/sections.js"></script>
