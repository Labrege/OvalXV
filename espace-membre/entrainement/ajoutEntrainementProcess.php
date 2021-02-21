<?php
session_start();
include 'C:\xampp\htdocs\OvaleXV\includes\dbh.inc.php';

if(isset($_POST['submit'])){
    $titreEntrainement = $_POST['titreEntrainement'];
    $dateEntrainement = $_POST['dateEntrainement'];
    $heureEntrainement = $_POST['heureEntrainement'];
    $themeEntrainement = $_POST['themeEntrainement'];
    
    
    if (empty($titreEntrainement) || empty($dateEntrainement) || empty($heureEntrainement) || empty($themeEntrainement)) {
        $message = "<span class='form-error'> Veuillez remplir tous les champs !</span>";
        $errorEmpty = true;
    }

    else {
        //Ajout à la base entrainement
        $sql = $conn->query("INSERT INTO entrainements 
        (titreEntrainement, dateEntrainement, heureEntrainement, themeEntrainement) 
        VALUES ('$titreEntrainement', '$dateEntrainement','$heureEntrainement','$themeEntrainement')");
        $message = "<span class='form-success'> Votre entrainement a bien été enregistré! </span>";
        $errorEmpty = false;
    }
}
else{
    $message = "Il y a eu une erreur. Veuillez réesayer ultérieurement";
}
?>

<div id="container-message">
    <?php echo $message; ?>
</div>

<script>
    var errorEmpty = "<?php echo $errorEmpty; ?>";

    if (errorEmpty == true) {
        $("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").addClass("input-error");
    }

    else if (errorEmpty == false) {
        $("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").val("");
        $("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").removeClass("input-error");

    }
</script>