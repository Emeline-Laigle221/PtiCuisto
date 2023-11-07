<?php
    require_once('modele/RecetteManager.php'); //Récupération du modèle

    /**
     * Fonction pour la page "Nos recettes"
     * le paramère $depart indique où on en est de la liste (utilisation du bouton "Plus" pour avancer de 10 en 10)
     */
    function afficher_liste($depart, $nb){
        $recettes = liste();
        echo '<table>';
        for($i = $depart; $i < $depart + $nb && $i < count($recettes); $i++){ 
            echo '<tr> <td>' . $recettes[$i]['titre'] . '<td/><td>' . $recettes[$i]['categorie'] . '<td/><td>' . $recettes[$i]['rec_resume']  . '<td/>' . '<td>' . '<img src=' . $recettes[$i]['rec_image'] . 'alt="image de la recette">' . '<td/><tr/>';
            echo '<br>';
        }
        echo '<table/>';
        echo '<a href="index.php?page=liste&depart=' . ($depart + 10) . '">Plus</a>';
        if($depart !=0){
            echo '<a href="index.php?page=liste&depart=' . ($depart - 10) . '">Moins</a>';
        }
    }

    function afficher_recettes_validation(){

        if(isset($_GET['valider'])){
            valider($_GET['valider']);
        }

        if(isset($_GET['interdire'])){
            interdire($_GET['interdire']);
        }

        $recettes = liste_validation();
        echo '<table>';
        foreach($recettes as $recette){ 
            echo '<tr> <td>' . $recette['titre'] . '<td/><td>' . $recette['categorie'] . '<td/><td>' . $recette['rec_resume']  . '<td/>' . '<td>' . '<img src=' .$recette['rec_image'] . 'alt="image de la recette"> <td/><td> <a href="index.php?page=listeAdmin&valider=' . $recette['rec_id'] . '">Valider</a> <a href="index.php?page=listeAdmin&interdire=' . $recette['rec_id'] . '">Interdire</a> <td/><tr/>';
            echo '<br>';
        }
        echo '<table/>';
    }
?>