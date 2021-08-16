<?php
session_start();

if (isset($_SESSION['useruid']) && $_SESSION['plan']==4){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/admin.css?v=<?php echo time(); ?>">
    <title> OvalXV | Page Admin </title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="side-bar">
    <ul>
        <li> <a href="admin-post.php"> Poster des vidéos </a> </li>
        <li> <a href="admin-videos.php"> Voir les vidéos </a> </li>
        <li> <a href=""> Voir les membres </a> </li>
        <li> <a href=""> Statistiques </a> </li>
    </ul>
</div>
    
</body>
</html>

<?php
}else{
    header("location: ../login.php");
}
?>