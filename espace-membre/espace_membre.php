<?php

require_once '../espace-membre/espace_membre_header.php';
require_once 'C:\xampp\htdocs\OVAL XV\includes\dbh.inc.php';


//verifie la bonne connexion au compte
if (isset($_SESSION["useruid"])){

$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "DB";

//Connection à la base de données: NOM DE LA BD = $connect//
$connect = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername, $dbpassword);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// On récupère tout le contenu de la table jeux_video
$reponse = $connect->query('SELECT * FROM video ORDER BY StatutVideo DESC');

?>

<div id="filtres">
    <ul>
        <li class="list" data-filter="all"> All </li>

        <div class="dropdown">
            <button class="dropbtn"> Skills ▼ </button>
            <div class="dropdown-content">
                <li class="list" data-filter="passe"> Passe </li>
                <li class="list" data-filter="jeu_au_pied"> Jeu au pied </li>
                <li class="list" data-filter="ruck"> Ruck </li>
                <li class="list" data-filter="plaquage"> Plaquage </li>
                <li class="list" data-filter="duel_offensif"> Duel Offensif </li>
                <li class="list" data-filter="skills"> Tous les skills </li>
            </div>
        </div>

        <div class="dropdown">
            <button class="dropbtn"> Effectifs ▼ </button>
            <div class="dropdown-content">
                <li class="list" data-filter="attaque"> Attaque </li>
                <li class="list" data-filter="contre_attaque"> Contre-Attaque</li>
                <li class="list" data-filter="defense"> Défense </li>
                <li class="list" data-filter="effectif"> Tous les Effectifs </li>
            </div>
        </div>
    </ul>
</div>
    
<div class="product">
<?php 
    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch()){
?>
    <div class="itemBox <?php echo $donnees["TagVideo"]; ?> <?php echo $donnees["TagFamille"]; ?>">
    
    
    <?php 
    // Si le statut le statut membre est + que prémium

    if ($_SESSION["plan"]!=0){
        $idVideo = $donnees["id"];
        $sqlCheck = "SELECT * FROM favoris WHERE idVideo = '$idVideo'";

        //verification dans la BD
        $rs = mysqli_query($conn,$sqlCheck);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    
        //Si video existe deja dans favoris
        if($data[0] > 1){
        ?>
        <!-- Boutton favoris // ../espace-membre/favoris/effacerFavorisDepuisVideosProcess.php -->
        <form action="../espace-membre/favoris/effacerFavorisDepuisVideosProcess.php" method="POST">
            <button type="submit" name="erase" value="<?php echo $donnees["id"]; ?>"> - </button>
        </form>

        <?php
        }else{
        ?> 

        <!-- Boutton favoris // ../espace-membre/favorisProcess.php -->
        <form action="../espace-membre/favoris/ajoutFavorisProcess.php" method="POST">
            <button type="submit" name="save" value="<?php echo $donnees["id"]; ?>"> + </button>
        </form>

    <?php 
        }
    } 
    ?>
        
        <!-- Videos -->
        <video width="100%" height="auto" controlsList="nodownload" oncontextmenu="return false;"
            <?php 
            if ($_SESSION["plan"]== 0){
                if ($donnees["StatutVideo"] == "visible"){
                    echo "controls";
                }
                else{
                    echo "poster='../Images/TN/tn premium.PNG'";
                }
            }
            else{
                echo "controls";
            }
            ?>
        >
        <source src="../Vidéos/<?php echo $donnees["nomVideo"]; ?>" type="video/mp4"></video>
    </div>
    <?php
}
?>
</div>

<!-- JS pour les filtres -->
    
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.list').click(function(){
                const value =$(this).attr('data-filter');
                if (value == 'all'){
                    $('.itemBox').show('1000');
                }
                else{
                    $('.itemBox').not('.'+value).hide('1000');
                    $('.itemBox').filter('.'+value).show('1000');
                }
            })

            $('.list').click(function(){
                $(this).addClass('active').siblings().removeClass('active');
            })
        })
    </script>
</body>
</html>

<?php 
}

else{
    header("location: ../login.php");
}
?>
