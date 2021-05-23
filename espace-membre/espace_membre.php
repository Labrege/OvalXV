<?php
include '../espace-membre/espace_membre_header.php';
//verifie la bonne connexion au compte
?>
<script>
        $(document).ready(function(){
            //Check une seule checkbox pour les checkbox complement
            $('.check').click(function() {
                $('.check').not(this).prop('checked', false);
            });

            window.onload = function(){
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
            }

            $("input[type='checkbox']").change(function() {
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

            //Cacher ou diffuser les filtres
            $(".filtres-toggle-btn").click(function(){
                $(".filtres-container").toggle(250, "linear");
                $(".filtres-toggle-btn").toggleClass("filtres-toggle-btn-active");
                $(".fa-sliders").toggleClass("fa-sliders-active");
            });
        });
    
</script>
<div class="rest-container">

<div class="titre-offres">
    <h2>Vidéos </h2>
</div>



<div class="formCheckbox-container">
    <form class="form-filtre" action="#" method="post">
        <div class="filtres-toggle-btn filtres-toggle-btn-active">
            <i class="fa fa-sliders fa-sliders-active" aria-hidden="true"></i>
        </div>
        <div class="filtres-container">
            <!-- Checkbox effectif multiple -->
                <h3> Effectif </h3>
                <div class="checkbox-effectif">
                <h1> Effectif </h1>
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

                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" id="1vs1" name="filtre-Effectif[]" value="spé avants" class="checkBox">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> Spé avants </h2>
                </div>

                <div class="tag">
                    <label class="switch">
                        <input type="checkbox" id="1vs1" name="filtre-Effectif[]" value="spé trois-quarts" class="checkBox">
                        <span class="slider round"></span>
                    </label>
                    <h2 class="tag-titre"> Spé Trois-quarts </h2>
                </div>
            </div>

            <!-- Checkbox effectif simple -->
            <div class="checkbox-complement">
                <h3> Caractéristiques </h3>
                <div class="checkbox-tag-container-container">
                    <div class="checkbox-tag-container">
                        <h1> Skills </h1>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="passe" class="check" value="passe">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Passes </h2>
                        </div>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="passe" class="check" value="jeu au pied">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Jeu au pied </h2>
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
                                <input type="checkbox" name="ruck" class="check" value="plaquage">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Plaquage </h2>
                        </div>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="plaquage" class="check" value="duel offensif">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Duel Offensif </h2>
                        </div>
                    </div>

                    <div class="checkbox-tag-container">
                        <h1> Orientation </h1>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="plaquage" class="check" value="défense">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Défense </h2>
                        </div>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="plaquage" class="check" value="attaque">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Attaque </h2>
                        </div>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="plaquage" class="check" value="contre-attaque">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Contre-Attaque </h2>
                        </div>
                    </div>

                    <div class="checkbox-tag-container">
                        <h1> Physique </h1>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="plaquage" class="check" value="physique avec ballon">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Physique avec ballon </h2>
                        </div>
                        <div class="tag">
                            <label class="switch">
                                <input type="checkbox" name="plaquage" class="check" value="physique sans ballon">
                                <span class="slider round"></span>
                            </label>
                            <h2 class="tag-titre"> Physique sans ballon </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="btnContainer" style="display: none;">
            <button type="submit" value="Submit" id="btnRechercher" class="button-valide"> Rechercher </button>
        </div>
    </form>
</div>

<div class="product">
    Veuillez effectuer une recherche...
    <br>
    <br>
</div>
</div>

</body>
</html>

<?php
include '../espace-membre/espace_membre_footer.php';
?>

