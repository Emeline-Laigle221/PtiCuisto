<?php
    require_once('modele/RecetteManager.php'); //Récupération du modèle

    function detailRecette($nom){
        $recette = trouver_recette($nom);
        echo '<h1>' . $recette['titre'] . '</h1>';
        echo '<img src=' . $recette['rec_image'] . 'alt="image de la recette">';
        echo '<p>' . $recette['categorie'] . '</p>';
        echo '<p>' . $recette['rec_resume'] . '</p>';

        $ingredients = lister_ingredients(10);

        echo '<table>';
        for($i = 0; $i < count($ingredients); $i++){ 
            echo '<tr> <td>' . $ingredients[$i]['quantite'] . ' g <td/><td>' . $ingredients[$i]['intitule'] . '<td/><td>' . $ingredients[$i]['description']  . '<td/><tr/>';
            echo '<br>';
        }
        echo '<table/>';

        echo '<p>' . $recette['contenu'] . '</p>';

    }
    
?>