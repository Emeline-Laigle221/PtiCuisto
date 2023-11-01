<?php
    function trouver_recette($nom){
        include_once("template/connexion.php"); //Ligne à modifier avec le .env

        $reponse = $bdd->query("SELECT titre, rec_resume, rec_image, cat_intitule, contenu from RECETTE join CATEGORIE using(categorie_id) where titre = '" . $nom . "';");

        $retour = array();

        while ($donnees = $reponse->fetch()){ 
            $retour['titre'] = $donnees['titre'];
            $retour['rec_resume'] = $donnees['rec_resume'];
            $retour['rec_image'] = $donnees['rec_image'];
            $retour['categorie'] = $donnees['cat_intitule'];
            $retour['contenu'] = $donnees['contenu'];
        }

        return $retour;

    }
?>