<?php
        require_once('../modele/RecetteManager.php');

        function afficher_liste(){
            $recettes = liste();

            echo '<table>';
            for($i = 0; $i < 10 && $i < count($recettes); $i++){ 
                echo '<tr> <td>' . $recettes[$i]['titre'] . '<td/><td>' . $recettes[$i]['rec_resume']  . '<td/><tr/>';
                echo '<br>';
            }
            echo '<table/>';
        }

        afficher_liste();


?>