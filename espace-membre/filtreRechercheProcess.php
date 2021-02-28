<?php
session_start();
include 'C:\xampp\htdocs\OvaleXV\includes\dbh.inc.php';
?>
<script>
        $(document).ready(function(){
            //Button ajouter aux favoris de la page: espace_membre.php
            $('.btnFavorites').click(function(){
                id = $(this).data('id');
                videoid = $('#video' + id).val();
                $(this).toggleClass("heart");
                $.ajax({
                    url: '../espace-membre/favoris/ajoutFavorisProcess.php',
                    method: 'post',
                    dataType: 'json',
                    data:{
                        videoid: videoid,
                        action: 'add'
                    },
                    success: function(data){
                            $('#message-container').html(data);
                        }
                }).fail(function(xhr, textStatus, errorThrown){
                    alert(xhr.responseText);
                });
            });

            //Button enlever des favoris de la page: espace_membre_favoris.php
            $('.btnDeleteFavorites').click(function(){
                id = $(this).data('id');
                favorisid = $('#favoris' + id).val();
                $.ajax({
                    url: '../espace-membre/favoris/ajoutFavorisProcess.php',
                    method: 'post',
                    dataType: 'json',
                    data:{
                        videoid: favorisid,
                        action: 'add'
                    },
                    success: function(data){
                            $('#favoris-container' + favorisid).fadeOut();
                        }
                }).fail(function(xhr, textStatus, errorThrown){
                    alert(xhr.responseText);
                });
            });
        });
    </script>
    
<?php
$search = '';
if (isset($_POST['submit'])){
    if (isset($_POST['filtreEffectif']) && !isset($_POST['filtreComplement'])){
        foreach ($_POST['filtreEffectif'] as $v){
            $search .= ' TagFamille LIKE "' .$v.'"';
            $search.= ' OR ';
        }

        $search = substr($search,0,-4);
    }

    elseif (isset($_POST['filtreComplement']) && !isset($_POST['filtreEffectif'])){
        $search = "TagVideo LIKE '".$_POST['filtreComplement']."'";
    }

    elseif (isset($_POST['filtreComplement']) && isset($_POST['filtreEffectif'])) {
        foreach ($_POST['filtreEffectif'] as $v){
            $search .= ' TagFamille LIKE "' .$v.'" ';
            $search.= 'AND ';
            $search.= "TagVideo LIKE '".$_POST['filtreComplement']."' ";
            $search.= 'OR';
        }

        $search = substr($search,0,-3);

    }

    if (!empty($search)){
        $sqlQuery = "SELECT * FROM video WHERE " . $search;
    }
    else{
        $sqlQuery = "SELECT * FROM video";
    }

    $searchSql = $conn->query($sqlQuery);

    if($searchSql->num_rows > 0){
        while ($donnees = $searchSql->fetch_assoc()){
            ?>
            <div class="itemBox <?php echo $donnees["TagVideo"]; ?> <?php echo $donnees["TagFamille"]; ?>">
            <?php
                if ($_SESSION["plan"]!=0){
                    $idVideo = $donnees["id"];
                    $idCreateur = $_SESSION["useruid"];
                    $idFavoris = $idVideo.$idCreateur;
        
                    $sqlCheck = "SELECT * FROM favoris WHERE idFavoris = '$idFavoris'";
        
                    //verification dans la BD
                    $rs = mysqli_query($conn,$sqlCheck);
                    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
        
                    //Si video existe deja dans favoris
                    if($data[0] > 1){
                        $heartClass="heart";
                    }else{
                        $heartClass=" ";
                    }
                }
            ?>   
                <!-- Affichage des Videos -->
                <video width="100%" height="auto" preload="auto" controlsList="nodownload" oncontextmenu="return false;"
        
                    <?php 
                    // Si le statut membre n'est pas premium
                    if ($_SESSION["plan"]== 0){
                        // Si le statut de la video est "visible" -> renvoyer les controles
                        if ($donnees["StatutVideo"] == "visible"){
                            echo "controls";
                        }
                        // Si le statut de la video n'est pas "visible" -> bloquer la video
                        else{
                            echo "poster='../Images/TN/tn premium.PNG'";
                        }
                    }
                    // Si le statut membre est premium -> Lecture de toutes les vidéos
                    else{
                        echo "controls";
                    }
                    ?>
                >
                <source src="../Vidéos/<?php echo $donnees["nomVideo"]; ?>" type="video/mp4"></video>
                <div class="btnFavorite-container">
                    <input type="hidden" id="video<?php echo $donnees["id"]; ?>" value="<?php echo $donnees["id"]; ?>">
                    <!-- Ajout du bouton favoris -->
                    <button class="btnFavorites <?php echo $heartClass ?>" data-id="<?php echo $donnees["id"]; ?>" name="btnFavorites"> <i class="fa fa-heart" ariria-hidden="true"></i> </button>
                </div>
        
                
            </div>
            <?php
            }
        
    }
    else{
         echo "Aucune vidéo ne répond aux critères recherchés";
         echo "<br>";
         echo "<br>";    
    }

   
}
?>