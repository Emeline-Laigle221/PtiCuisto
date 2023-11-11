<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>PtiCuisto</title>
    <script src="js/burger.js" defer></script>
</head>
<body>
    <header>
        <img src="img/Logo.png" alt="Logo">
        <nav>
            <div id="menuPC">
                <div><a href="index.php">Accueil</a></div>
                <div><a href="template/nosRecettes.php">Nos Recettes</a></div>
                <div><a href="template/Filtre.php">Filtres</a></div>
                <?php
                if($_SESSION["type"] === 0){
                    echo"<div><a href=\"template/page-connexion.php\">Connexion</a></div>";
                }else{
                    echo "<div><a href=\"controller/traitement_deconnexion.php\">Déconnexion</a></div>";
                }
                ?>
            </div>
            <div id="burger">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </nav>
    </header>
    <div id="menuPortable">
        <div><a href="index.php">Accueil</a></div>
        <div><a href="template/nosRecettes.php">Nos Recettes</a></div>
        <div><a href="template/Filtre.php">Filtres</a></div>
        <?php
        if($_SESSION["type"] === 0){
            echo"<div><a href=\"template/page-connexion.php\">Connexion</a></div>";
        }else{
            echo "<div><a href=\"controller/traitement_deconnexion.php\">Déconnexion</a></div>";
        }
        ?>
    </div>

    <main>
        <div class="accueil">
            <div class="div-image">
                <div class="image-accueil">
                    <img src="img/accueil.jpg" alt="plat">
                </div>
            </div>
            
            <div class="edito">
                <div class="image-edito">
                    <img src="img/Pticuisto.png" alt="Pticuisto">
                </div> 
                <p class="texte-edito">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente mollitia id incidunt ratione neque laborum optio, eaque debitis. Atque eum ratione, dolores similique earum asperiores in necessitatibus rem illum cum.</p>
                <?php
                if($_SESSION["type"] == 2){
                    echo "<button class=\"btn-edito\"><a>Modifier l'édito</a></button>";
                }
                ?>
            </div>
            
            <div class="edito dernieres-recettes">
                <h1>LES DERNIÈRE RECETTES</h1>
                <div>
                    <img src="img/accueil.jpg" alt="recette1">
                    <p class="recette-acceuil">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Illum vel harum odit?</p>
                </div>
                <div>
                    <img src="img/accueil.jpg" alt="recette2">
                    <p class="recette-acceuil">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Et porro ratione adipisci?</p>
                </div>
                <div>
                    <img src="img/accueil.jpg" alt="recette3">
                    <p class="recette-acceuil">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Labore dolorem nostrum nisi.</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
    <div class="reseaux">
        <a target="_blank_" href="https://www.facebook.com" >
            <img src="img/facebook.jpg" alt="Facebook">
        </a>
        <a target="_blank_" href="https://X.com">
            <img src="img/X.png" alt="X">
        </a>
        <a target="_blank_" href="https://fr.linkedin.com">
            <img src="img/linkedin.png" alt="LinkedIn">
        </a>
    </div>
</footer>
</body>