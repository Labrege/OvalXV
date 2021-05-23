<?php
require_once '../espace-membre/espace_membre_header.php';
?>
<div class="entrainement-page-container">

  <div class="entrainement-titre-container">
    <h1> Saison 2020/2021 </h1>
  </div>

  <div class="liste-entrainement-container">
    <table class="tableau-entrainement">
      <tr class="tableau-entrainement-colones">
        <td> Date </td>
        <td> Titre </td>
        <td> Thème </td>
        <td></td>
        <td></td>
      </tr>

      <?php
      $reponse = $conn->query('SELECT * FROM entrainements ORDER BY dateEntrainement DESC');

      while ($donnees = $reponse->fetch_assoc()){
      ?>
      <tr>
        <td> <?php echo $donnees['titreEntrainement'] ; ?> </td>
        <td> <?php echo $donnees['dateEntrainement'] ; ?> </td>
        <td> <?php echo $donnees['themeEntrainement'] ; ?> </td>
        <td> <i class="fa fa-trash" aria-hidden="true"></i></td>
        <td> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>

  <div class="button-entrainement-container">
    <!-- Modal Button -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg"> Rajouter un entrainement </button>
  </div>

  <!-- Modal fond -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <?php
            require '../espace-membre/entrainement/ajoutEntrainementPage.php';
          ?>
      </div>
    </div>
  </div>
</div>