<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="Text/css" href="../CSS/membre/espacemembre-entrainement.css?v=<?php echo time();?>">
    <title>Ajout page </title>
</head>
<body>
    <form action="#" method="POST">
        <div id="entrainementPage">
            <div class="entrainementInputs">
                <div class="entrainementTitre">
                    <label for="titreEntrainement" class="labelTitreEntrainement"> Entrainement : </label>
                    <input type="text"  class="titreEntrainement" placeholder="Titre de l'entrainement" name="titreEntrainement">
                </div>
                <div class="specification">
                    <label for="dateEntrainement"> Date : </label>
                    <input type="date" name="dateEntrainement" class="dateEntrainement">

                    <label for="heureEntrainement"> Heure : </label>
                    <input type="time" name="heureEntrainement">

                    <label for="themeEntrainement"> Thème : </label>
                    <input type="text" placeholder="thème principal" name="themeEntrainement">
                </div>
            </div>

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
        </div>
    </form>
    
</body>
</html>