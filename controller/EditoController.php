<?php
    require_once('modele/EditoManager.php'); //Récupération du modèle
    
    function traiter_formulaire_edito(){
        if($_POST['contenu'].length == 0){
            echo 'La zone de texte est vide.';
        }else{
            ajouter_edito(strip_tags($_POST['contenu']));
        }
    }
?>