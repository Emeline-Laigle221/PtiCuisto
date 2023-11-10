<?php
    function ajouter_edito($contenu){
        require("connexion.php");
        $req = $bdd->prepare("INSERT INTO EDITO (article) VALUES('" . strip_tags($contenu) . "');");
        $req->execute();

    }

?>