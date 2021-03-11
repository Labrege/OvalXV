<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/OvaleXV/includes/dbh.inc.php');


if(isset($_POST['submit'])){
    //Prend la plus grande valeur id entrainement
    $sql_max_entrainement = $conn->query('SELECT MAX(idEntrainement) AS max FROM entrainements');
    while ($max_entrainement = $sql_max_entrainement->fetch_assoc()){
        $idEntrainementParent = $max_entrainement['max'] + 1;
    }

    //Ajout des section à la BD
    if(empty($_POST['arraySection'])){
        $message = "Please fill in all sections";
    }
    else{
        foreach($_POST['arraySection'] as $titreSection){
            //Ajout à la base section
            $sql_section = $conn->query("INSERT INTO sections 
            (idEntrainementParent, titreSection) 
            VALUES ('$idEntrainementParent','$titreSection')");
            if ($sql_section) {
                $message = "Section bien enregistrée";
            }
            else{
                $message = "Problème lors de l'enregistrement de la section";
            }
        };
    }
}
    /*

    //Prend la plus grande valeur id entrainement
    $sql_max_section = $conn->query('SELECT MAX(idSection) AS max FROM sections');
    while ($max_section = $sql_max_section->fetch_assoc()){
        $nextIdSection = $max_section['max'] + 1;
    }

    //variables entrainement
    $titreEntrainement = $_POST['titreEntrainement'];
    $dateEntrainement = $_POST['dateEntrainement'];
    $heureEntrainement = $_POST['heureEntrainement'];
    $themeEntrainement = $_POST['themeEntrainement'];

    //variables section
    $titreSection = $_POST['titreSection'];
    $effectifSection = $_POST['effectifSection'];
    

    //Si les champs entrainement sont vides
    if (empty($titreEntrainement) || empty($dateEntrainement) || empty($heureEntrainement) 
    || empty($themeEntrainement) || empty($titreSection) || empty($effectifSection)) {
        $message = "<span class='form-error'> Veuillez remplir tous les champs !</span>";
        $errorEmptyEntrainement = true;
    }

    //Si les champs entrainement ne sont pas vides
    else {
        //Ajout à la base section
        $sql_section = $conn->query("INSERT INTO sections 
        (idSection, idEntrainementParent, titreSection, effectifSection) 
        VALUES ('$nextIdSection','$nextIdEntrainement','$titreSection','$effectifSection')");

        //Ajout à la base entrainement
        $sql_entrainement = $conn->query("INSERT INTO entrainements 
        (idEntrainement, titreEntrainement, dateEntrainement, heureEntrainement, themeEntrainement) 
        VALUES ('$nextIdEntrainement','$titreEntrainement', '$dateEntrainement','$heureEntrainement','$themeEntrainement')");

        if(!$sql_entrainement || !$sql_section){
            $message = "<span class='form-success'> Un problème a eu lieu. Veuillez réessayer plus tard. </span>";
        }
        else{
            $message = "<span class='form-success'> Votre entrainement a bien été enregistré! </span>";
            $errorEmptyEntrainement = false;
        }
    }
}
else{
    $message = "Il y a eu une erreur. Veuillez réesayer ultérieurement";
}
*/
?>

<div id="container-message">
    <?php echo $message; ?>
</div>
<!--
<script>
    var errorEmpty = "<?php echo $errorEmptyEntrainement; ?>";

    if (errorEmpty == true) {
        document.querySelector('#titre-entrainement').classList.add('input-error');
        document.querySelector('#date-entrainement').classList.add('input-error');
        document.querySelector('#heure-entrainement').classList.add('input-error');
        document.querySelector('#theme-entrainement').classList.add('input-error');
        //("#titre-entrainement, #date-entrainement, #heure-entrainement, #theme-entrainement").addClass("input-error");
    }
    
    else if (errorEmpty == false) {
        document.getElementById('titre-entrainement').value = "";
        document.getElementById('date-entrainement').value = "";
        document.getElementById('heure-entrainement').value = "";
        document.getElementById('theme-entrainement').value = "";
        //$("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").val("");
        //$("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").removeClass("input-error");

    }
</script>
-->