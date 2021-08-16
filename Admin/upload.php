<?php
require ('../includes/dbh.inc.php');

if (isset($_POST['Submit'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('mp4', 'mov', 'x-m4v');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestination = '../Vidéos/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                
                $titre=$_POST['Titre'];
                $tagVideo=$_POST['tagVidéo'];
                $tagFamille=$_POST['tagFamille'];
                $statut=$_POST['Statut'];
                $nomvideo = $fileNameNew;
                    
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
                    $req = $connect->prepare('INSERT INTO video (nomVideo, TitreVideo, TagVideo, TagFamille, StatutVideo) VALUES (:nomvideo, :titre, :tagVideo, :tagFamille, :statut)');
                    $req->execute(array(
                    'nomvideo'=>$nomvideo,
                    'titre'=>$titre,
                    'tagVideo'=>$tagVideo,
                    'tagFamille'=>$tagFamille,
                    'statut'=>$statut,

                    ));

                }else{//Si mail existe déjà//
                    echo '<span> Cette video existe déjà! </span> ';
                }

                header('Location: admin-post.php?error=uploadcomplete');
            }else{
                header('Location: admin-post.php?error=filetoobig');
            }
        }
        else{
            header('Location: admin-post.php?error=uploaderror');
        }
    }
    else{
        header('Location: admin-post.php?error=wrongtype');
    }

}