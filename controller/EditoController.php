<?php
    require_once('manager/EditoManager.php'); //Récupération du modèle
    
    /**
     * Fonction vérifiant que la zone de texte est bien rempli puis insérant le nouvel édito
     */
    function traiter_formulaire_edito(){
        if(strlen($_POST['contenu']) == 0){
            echo 'La zone de texte est vide.';
        }else{
            ajouter_edito(str_replace("'","''",(strip_tags($_POST['contenu']))));
        }
    }

    /**
     * Fonction pour afficher l'édito. Utilisée sur la page d'accueil.
     */
    function afficher_edito(){
        $article = chercher_edito();
        echo '<p class="texte-edito">' . $article . '</p>';
    }

?>