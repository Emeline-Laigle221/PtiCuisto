<?php

    /**
     * Fonction permettant d'insérer un nouvel édito dans la base de données.
     * MySQL rentre automatique la date d'aujourd'hui dans la colonne "date_redaction".
     * $contenu : Le contenu de l'édito, inséré dans la colonne "article".
     */
    function ajouter_edito($contenu){
        require("connexion.php");
        $req = $bdd->prepare("INSERT INTO EDITO (article) VALUES('" . strip_tags($contenu) . "');");
        $req->execute();
    }

    /**
     * Permet de récuppérer l'édito le plus récent.
     * Utilisée sur la page d'accueil.
     * Retourne le contenu de l'édito le plus récent.
     */
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