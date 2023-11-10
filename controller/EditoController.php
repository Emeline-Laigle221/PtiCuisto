<?php
    require_once('modele/EditoManager.php'); //Récupération du modèle
    
    function traiter_formulaire_edito(){
        ajouter_edito(strip_tags($_POST['contenu']));
    }
?>