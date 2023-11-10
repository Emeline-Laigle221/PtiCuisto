<?php
    require_once('manager/RecetteManager.php'); //Récupération du modèle

    function detailRecette($num){
        $recette = trouver_recette($num);
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
    
    /**
     * Fonction pour la page "Nos recettes"
     * le paramère $depart indique où on en est de la liste (utilisation du bouton "Plus" pour avancer de 10 en 10)
     */
    function afficher_liste($depart, $nb){
        $recettes = liste();
        echo '<table>';
        for($i = $depart; $i < $depart + $nb && $i < count($recettes); $i++){ 
            echo '<tr> <td> <a href="index.php?page=detailsRecette&recette=' . $recettes[$i]['rec_id'] . '">' . $recettes[$i]['titre'] . '</a><td/><td>' . $recettes[$i]['categorie'] . '<td/><td>' . $recettes[$i]['rec_resume']  . '<td/>' . '<td>' . '<a href="index.php?page=detailsRecette&recette=' . $recettes[$i]['rec_id'] . '"><img src=' . $recettes[$i]['rec_image'] . 'alt="image de la recette">' . '</img></a><td/><tr/>';
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

    function afficher_recettes_accueil(){
        $recettes = liste();
        echo 
        '<div>
        <img src="' . $recettes[1]['rec_image'] . '" alt="recette1">
        <p class="recette-acceuil">' . $recettes[1]['rec_resume']  . '</p>
        </div>
        <div>
            <img src="' . $recettes[2]['rec_image'] . '" alt="recette1">
            <p class="recette-acceuil">' . $recettes[2]['rec_resume']  . '</p>
        </div>
        <div>
            <img src="' . $recettes[3]['rec_image'] . '" alt="recette1">
            <p class="recette-acceuil">' . $recettes[3]['rec_resume']  . '</p>
        </div>';
    }
?>