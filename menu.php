<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="ScreenOrientation" content="autoRotate:disabled">
	
    <title> OvalXV | Menu </title>
	<link rel="stylesheet" href="CSS/Menu/Menu-Header.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="CSS/Menu/Menu-Showcase.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="CSS/Menu/Menu-A Propos.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="CSS/Menu/Menu-Offres.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="CSS/Menu/Menu-Impressions.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="CSS/Menu/Menu-Reseaux.css?v=<?php echo time(); ?>">
	<link rel="stylesheet" href="CSS/aos.css?v=<?php echo time(); ?>">

<!-- JavaScript file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<a href="https://icons8.com/icon/RpicGn8llwF8/menu"></a>
    
</head>
<body>
	<header>
		<div id="sommaire">
			<ul class="menu_menu_ordinateur">    <!--version ordinateur-->
				<li> <a href="#apropos">  A Propos </a></li>
				<li> <a href="#offres"> Nos Offres </a></li>
				<li> <img id="logo_ovalXV" src="Images/logoheader.png" alt="ovalxv logo"></li>
				<li> <a href="#reseaux-fond"> Contactez-nous </a></li>
                <li> <a href="login.php" target="_blank"><i class="fa fa-lock" aria-hidden="true"></i><span style="visibility: hidden; font-size: 4px;">a</span> Connexion </a></li>
			</ul>
            
            <div class="header_mobile">
                <div class="hamburger-menu">
                        <div class="ligne ligne-1"></div>
                        <div class="ligne ligne-2"></div>
                        <div class="ligne ligne-3"></div>
                </div>
                <img id="logo_ovalXV" src="Images/logoheader.png" alt="ovalxv logo">
            </div>
            
            <nav class="navbar">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="#apropos" class="nav-link" onclick="onClick()">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a href="#offres" class="nav-link" onclick="onClick()">Nos offres</a>
                    </li>
                    <li class="nav-item">
                        <a href="#reseaux-fond" class="nav-link" onclick="onClick()">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" target="_blank" class="nav-link" onclick="onClick()">Connexion</a>
                    </li>
                </ul>
            </nav>

		</div>
	</header>

	<div class="body">
        <div class="showcase">
            <div class="slider-wrapper">
                <div class="slider">
                    <div class="slider-text1"> OvalXV</div>
                    <div class="slider-text2"> Le meilleur du rugby</div>
                </div>
            </div> 
            <img src="Images/OvalXV_fond.jpg" alt="" class="showcase_Image">
        </div>
        
        <div id="apropos">
            
            <div class="titre-fblanc">
                <h1> A Propos </h1>
            </div>
            <div class="container-boite">
                <div class="apropos-boite">
                    <h2 class="apropos-titre"> OvalXV, c'est quoi? </h2>
                    <br>
                    <br>
                    <p class="apropos-texte"> Oval XV est une plateforme qui s’adresse principalement aux entraîneurs de rugby. 
                        Nous avons pour but de les accompagner en leur mettant à disposition des outils nécessaires à la construction de leurs séances d’entraînement. 
                        
                        <br><br>
                        Dans chacune de nos vidéos, vous pourrez trouver une modélisation 2D de l’exercice avec les différentes lois nécessaire à la bonne exécution de la situation : 
                        nombre de joueurs concernés, délimitation de l’espace, matériel nécessaire, consignes…
                    </p>
                </div>

                <div class="apropos-boite">
                    <video width="100%" height="auto" autoplay loop muted>
                        <source src="Vidéos/606af3f4c11223.39974831.mp4" type="video/mp4">
                </div>
            </div>
        </div>

        <div id="offres">
            <div class="titre-offres">
                <h1> Nos offres </h1>
            </div>
            <div class="offre-container">
                <div class="offre-boite">
                    <h2> Pack Starter </h2>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <div class="offres-prix">
                        <h3> Gratuit </h3>
                    </div>
                </div>

                <div class="offre-boite">
                    <h2> Pack Paiement </h2>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>
                    <br>
                    <li> Lorem ipsum dolor sit amet.</li>

                    <br>
                    <div class="offres-prix">
                        <h3>10€</h3>
                    </div>
                </div>
            </div>
            <div class="lien-offres">
            <h1><a href="signup.php?error=startnow" target="_blank"> Commencez maintenant ➤ </a></h1>
            </div>
        </div>
        

        <!--SECTION: fonctionnement Sociaux -->
        <div id="reseaux-fond">
            <div class="titre-reseaux">
            <h1> Contactez-nous</h1>
            </div>
            <div class="reseaux-container">
                <div class="reseaux-boite1">
                    <a href="https://www.facebook.com/OvalXVrugby" target="_blank">
                        <div class="reseaux-info">
                            <img src="Images/facebook.png" alt="">
                            <h2> @OvalXV</h2>
                        </div>
                    </a>
                    <a href="https://www.instagram.com/ovalxv/?hl=fr" target="_blank">
                        <div class="reseaux-info">
                            <img src="Images/instagram.png" alt="">
                            <h2> OvalXV </h2>
                        </div>
                    </a>
                    <a href="#">
                        <div class="reseaux-info">
                            <img src="Images/mail.png" alt="">
                            <a href="mailto:contact@ovalxv.com"><h2> contact@ovalxv.com </h2></a>
                        </div>
                    </a>
                </div>
                <div class="reseaux-boite2">
                <h1> Inscription Newsletter </h1>
                <form action="#">
                    <input type="text" name="Nom" placeholder="Nom">
                    <input type="text" name="Prenom" placeholder="Prenom">
                    <input type="email" name="Email" placeholder="email@exemple.com">
                    <button class="bouton-valider"> Valider </button>
                </form>	
            </div>
        </div>    
    </div>

	<footer style="text-align: center;">
		OVALXV | ALL RIGHTS RESERVED &#169 2021
	</footer>

	<!-- Animations -->
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src=aos.js></script>
    <script type="text/javascript"> 
    AOS.init({
        duration: 1000,
    }); 
	</script>



<script type="text/javascript" src="Js/test3.js?v=<?php echo time(); ?>"></script>
</body>
</html>