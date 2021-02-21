<?php
session_start();
include 'C:\xampp\htdocs\OvaleXV\includes\dbh.inc.php';

if(isset($_POST['submit'])){
    $titreEntrainement = $_POST['titreEntrainement'];
    $dateEntrainement = $_POST['dateEntrainement'];
    $heureEntrainement = $_POST['heureEntrainement'];
    $themeEntrainement = $_POST['themeEntrainement'];
    $errorEmpty = false;
    
    if (empty($titreEntrainement) || empty($dateEntrainement) || empty($heureEntrainement) || empty($themeEntrainement)) {
        $message = "<span class='form-error'> Fill in all fields !</span>";
        $errorEmpty = true;
    }

    else {
        $sql = $conn->query("INSERT INTO entrainements 
        (titreEntrainement, dateEntrainement, heureEntrainement, themeEntrainement) 
        VALUES ('$titreEntrainement', '$dateEntrainement','$heureEntrainement','$themeEntrainement')");
        $message = "<span class='form-success'> Votre entrainement a bien été enregistré! </span>";
        ?>
        <div id="container-ligne">
            <tr>
                <td> <?php echo $dateEntrainement; ?></td>
                <td><?php echo $titreEntrainement; ?></td>
                <td><?php echo $themeEntrainement; ?></td>
                <td></td>
                <td></td>
            </tr>
        </div>
        <?php

    }
}
else{
    $message = "there was an error! Please try again later";
    $ligne = " ";
}
?>

<div id="container-message">
    <?php echo $message; ?>
</div>


<script>
    $("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").removeClass("input-error");
    var errorEmpty = "<?php echo $errorEmpty; ?>";

    if (errorEmpty == true) {
        $("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").addClass("input-error");
    }

    if (errorEmpty ==false) {
        $("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").val("");
        $("#titreEntrainement, #dateEntrainement, #heureEntrainement, #themeEntrainement").removeClass("input-error");

    }

</script>