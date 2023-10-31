<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>PtiCuisto</title>
</head>
<body>
    <?php include "header.php"?>
    <main>
    <div class="recette">
    <div class="image-recette">
        <img src="../img/accueil.jpg" alt="plats">
    </div>
    <div class="tags">
        <div class="tag"><p>Tarte</p></div>
        <div class="tag"><p>Tarte</p></div>
        <div class="tag"><p>Tarte</p></div>
        <div class="tag"><p>Tarte</p></div>
    </div>
    <div class="info-recette">
        <h2 class="titre-recette">Titre</h2>
        <h3>Catégorie</h3>
        <br>
        <h3>Résumé</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores praesentium eligendi vitae mollitia consequuntur, pariatur maiores nisi. Maiores, soluta eaque!</p>
    </div>
</div>
    </main>
    <?php include "footer.php"?>

</body>
</html>