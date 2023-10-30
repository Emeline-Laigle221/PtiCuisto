<?php
        require_once('../modele/RecetteManager.php');

        function afficher_liste($depart){
            $recettes = liste();
            echo '<table>';
            for($i = $depart; $i < $depart + 10 && $i < count($recettes); $i++){ 
                echo '<tr> <td>' . $recettes[$i]['titre'] . '<td/><td>' . $recettes[$i]['categorie'] . '<td/><td>' . $recettes[$i]['rec_resume']  . '<td/>' . '<td>' . '<img src=' . $recettes[$i]['rec_image'] . 'alt="image de la recette">' . '<td/><tr/>';
                echo '<br>';
            }
            echo '<table/>';
        }

?>