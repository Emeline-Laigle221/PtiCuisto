<header>
    <img src="../img/Logo.png" alt="Logo">
    <nav>
        <div><a href="../index.php">Accueil</a></div>
        <div><a href="recettes.php">Nos Recettes</a></div>
        <div><a href="Filtre.php">Filtres</a></div>
        <?php
        if($_SESSION["type"] === 0){
            echo"<div><a href=\"page-connexion.php\">Connexion</a></div>";
        }else{
            echo "<div><a href=\"../controller/traitement_deconnexion.php\">Déconnexion</a></div>";
        }
        ?>

    </nav>
</header>