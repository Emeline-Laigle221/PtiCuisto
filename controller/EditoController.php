<?php
    require_once('manager/EditoManager.php'); //Récupération du modèle
    
    function traiter_formulaire_edito(){
        if(strlen($_POST['contenu']) == 0){
            echo 'La zone de texte est vide.';
        }else{
            ajouter_edito(strip_tags($_POST['contenu']));
        }
    }

    function afficher_edito(){
        $article = chercher_edito();
        echo '<p class="texte-edito">' . $article . '</p>';
    }

?>