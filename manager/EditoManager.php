<?php
    function ajouter_edito($contenu){
        require("connexion.php");
        $req = $bdd->prepare("INSERT INTO EDITO (article) VALUES('" . strip_tags($contenu) . "');");
        $req->execute();
    }

    function chercher_edito(){
        require("connexion.php");
        $reponse = $bdd->query("SELECT date_redaction, article from EDITO where date_redaction >= all (
            select date_redaction from EDITO
            );");

        $retour;

        while ($donnees = $reponse->fetch()){ 
            $retour = $donnees['article'];
        }

        return $retour;
    }

?>