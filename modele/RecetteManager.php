<?php
    function liste(){
        include_once("../template/connexion.php");
        $reponse = $bdd->query('SELECT titre, rec_resume from RECETTE ORDER BY date_modification;');

        $retour = array();
        $i = 0;

        while ($donnees = $reponse->fetch()){ 
            $retour[$i]['titre'] = $donnees['titre'];
            $retour[$i]['rec_resume'] = $donnees['rec_resume'];
        }

        return $retour;
    }
?>