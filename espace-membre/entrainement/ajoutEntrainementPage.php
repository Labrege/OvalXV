<script>
        $(document).ready(function(){
            $(".form-entrainement").submit(function(event){
                event.preventDefault();
                var titre = $("#titreEntrainement").val();
                var date = $("#dateEntrainement").val();
                var heure = $("#heureEntrainement").val();
                var theme = $("#themeEntrainement").val();
                var submit = $("#btnAjouterEntrainement").val();
                $(".form-message").load("../espace-membre/entrainement/ajoutEntrainementProcess.php", {
                    titreEntrainement: titre,
                    dateEntrainement: date,
                    heureEntrainement: heure,
                    themeEntrainement: theme,
                    submit: submit
                });
            });
        });
    
    </script>

<form class="form-entrainement" action="#" method="POST">
    <div id="entrainementPage">
        <div class="entrainementInputs">
            <div class="entrainementTitre">
                <label for="titreEntrainement" class="labelTitreEntrainement"> Entrainement : </label>
                <input type="text"  id="titreEntrainement" placeholder="Titre de l'entrainement" name="titreEntrainement">
            </div>
            <div class="specification">
                <label for="dateEntrainement"> Date : </label>
                <input type="date" name="dateEntrainement" id="dateEntrainement">

                <label for="heureEntrainement"> Heure : </label>
                <input type="time" name="heureEntrainement" id="heureEntrainement">

                <label for="themeEntrainement"> Thème : </label>
                <input type="text" placeholder="thème principal" name="themeEntrainement" id="themeEntrainement">
            </div>
        </div>
        <!--
        <div class="sections">
            <div class="titreSections">
                <h2> Sections</h2>
                <button name="addsection"> + Ajouter une section </button>
            </div>
            <div class="section-container">
                <div class="section-header">
                    <h3> Section N° </h3>
                    <h3> effectif </h3>
                    <h3> temps </h3>
                    <h3> observation </h3>
                    <button name="addsection"> + Ajouter un exercice </button>
                </div>
                <div class="section"></div>
            </div>
        </div>
        -->
        <button id="btnAjouterEntrainement" name="submit" value="test"> Ajouter aux entrainements </button>
        <div class="form-message">

        </div>
    </div>
</form>

