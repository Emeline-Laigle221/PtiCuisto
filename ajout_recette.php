<?php

session_start();
include("connexion.php");

$_SESSION['pseudo'] = 'session_pseudo';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniChat</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="titre recette">
        <label for="titre recette"> Titre de la recette</label>
        <input type="text" name="resume de la recette">
        <label for="resume de la recette"> Resume de la recette</label>
        <input type="text" name="lien_image">
        <label for="lien_image"> lien de l'image</label>
        <input type="text" name="contenu_de_la_recette">
        <label for="contenu_de_la_recette"> Contenu de la recette</label>
        <label for="categorie">Choisissez la catégorie de votre recette : </label>
            <select name="categorie" id="categorie">
                <option value="apero">Apéritif</option>
                <option value="entree">Entrée</option>
                <option value="plats">Plats</option>
                <option value="dessert">Dessert</option>
            </select>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>


