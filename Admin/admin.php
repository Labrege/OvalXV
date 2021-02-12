<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
    <div class="form">
        <form action="#" method="POST">
            <input type="text" placeholder="Titre" name="Titre">
            <input type="text" placeholder="Tag" name="Tag">
            <label for="nomvideos">Video:</label>
            <input type="file"
                name="Nomvideos"
                accept="video/mp4,video/x-m4v,video/*">

            <div>
                <input type="radio" name="Statut" value="hidden">
                <label for="hidden"> Starter Pack </label><br>
                <input type="radio" name="Statut" value="visible">
                <label for="visible"> Pack Premium</label><br>
                <input type="submit" name="Submit" class="boutton" required>
            </div>
            
        </form>
    </div>
<?php

//Connection à MySQL avec PDO//

$servername = "localhost";
$dbusername = "u519972031_solal";
$dbpassword = "OvalXV75016";
$dbname = "u519972031_DB";


try
{
    if (isset($_POST['Submit'])){
        // Donne des noms aux variables input dans le formulaire//
        $titre=$_POST['Titre'];
        $tag=$_POST['Tag'];
        $nomvideo=$_POST['Nomvideos'];
        $statut=$_POST['Statut'];
            
        //Connection à la base de données: NOM DE LA BD = $connect//
        $connect = new PDO("mysql:host=$servername;dbname=$dbname",$dbusername, $dbpassword);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Database Connection Done';//

        //Fetch DATA from DB//
        $stmt = $connect->prepare("SELECT COUNT(*) FROM video WHERE nomVideo=?");
        $stmt->execute(array($nomvideo));
        

        if ($stmt->fetchColumn()==0){ //Verification video n'existe pas - Si video n'existe pas//                
            //SI INSCRIPTION //
            //insertion des données dans BD//
            $req = $connect->prepare('INSERT INTO video (nomVideo, TitreVideo, TagVideo, StatutVideo) VALUES (:nomvideo, :titre, :tag, :statut)');
            $req->execute(array(
            'nomvideo'=>$nomvideo,
            'titre'=>$titre,
            'tag'=>$tag,
            'statut'=>$statut,

            ));

        }else{//Si mail existe déjà//
            echo '<span class="inscription"> Cette video existe déjà! </span> ';

        }

    }else{
        echo 'ERROR: form not submitted!'; //Si submit ne fonctionne pas//
    }
}
catch(PDOException $error)
{
    $error->getMessage();
}
?>
