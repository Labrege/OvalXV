<?php
require('admin-header.php');
require('../includes/dbh.inc.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page admin oval XV</title>
    <link rel="stylesheet" href="../CSS/admin.css?v=<?php echo time(); ?>">
</head>
<body>
<script>
    $(document).ready(function(){ 
        $(".edit").click(function(event){
            var idName = $(this).closest("tr").attr('id');
            var videoName = $(this).closest("tr").attr('class');
            console.log(idName);
           $(this).closest("tr").remove();

           $("#message").load("../Admin/delete.php",{
               idName: idName,
               videoName: videoName
            });
        });
    });
</script>
<div id="tableau-video">
    <div id="message" style="color: red;"></div>
    <h1> Retrouvez toutes vos vidéos ! </h1>
    <div class="tableau">
        <table>
            <tr>
                <th>Titre</th>
                <th>Tag Famille </th>
                <th>Tag Vidéo </th>
                <th>Statut </th>
                <th>Editer </th>
                <th>Supprimer </th>
            </tr>
            <?php
            $reponse = $conn->query('SELECT * FROM video');
      
            while ($donnees = $reponse->fetch_assoc()){
            ?>
            <tr id="<?php echo $donnees['id'] ; ?>" class="<?php echo $donnees['nomVideo'] ; ?>">
              <td> <?php echo $donnees['TitreVideo'] ; ?> </td>
              <td> <?php echo $donnees['TagFamille'] ; ?> </td>
              <td> <?php echo $donnees['TagVideo'] ; ?> </td>
              <td> <?php echo $donnees['StatutVideo'] ; ?> </td>
              <td> <a href="fiches-videos.php?id=<?php echo $donnees['id'];?>" target="_blank"><i class="fa fa-pencil-square-o delete" aria-hidden="true" style="color: #10222e;"></i></a></td>
              <td> <i class="fa fa-trash edit" aria-hidden="true" style="color: #10222e; cursor: pointer;"></i></td>
            </tr>
            <?php
            }
            ?>
        </table>
                
    </div>
</div>
</body>
</html>