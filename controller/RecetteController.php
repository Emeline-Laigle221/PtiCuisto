<?php
    require_once('modele/RecetteManager.php'); //Récupération du modèle

    function detailRecette($nom){
        $recette = trouver_recette($nom);
        echo '<h1>' . $recette['titre'] . '</h1>';
        echo '<img src=' . $recette['rec_image'] . 'alt="image de la recette">';
        echo '<p>' . $recette['categorie'] . '</p>';
        echo '<p>' . $recette['rec_resume'] . '</p>';
        echo '<p>' . $recette['contenu'] . '</p>';
    }
    
?>