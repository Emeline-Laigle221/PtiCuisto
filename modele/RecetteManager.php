<?php
    
    function trouver_recette($nom){
        require("template/connexion.php"); //Ligne à modifier avec le .env

        $reponse = $bdd->query("SELECT rec_id, titre, rec_resume, rec_image, cat_intitule, contenu from RECETTE join CATEGORIE using(categorie_id) where titre = '" . $nom . "';");

        $retour = array();

        while ($donnees = $reponse->fetch()){ 
            $retour['titre'] = $donnees['titre'];
            $retour['rec_resume'] = $donnees['rec_resume'];
            $retour['rec_image'] = $donnees['rec_image'];
            $retour['categorie'] = $donnees['cat_intitule'];
            $retour['contenu'] = $donnees['contenu'];
            $retour['rec_id'] = $donnees['rec_id'];
        }

        return $retour;

    }

    function lister_ingredients($id){
        require("template/connexion.php"); //Ligne à modifier avec le .env
        $reponse = $bdd->query("SELECT quantite, ING_INTITULE as intitule, ING_DESCRIPTION as descritpion FROM CONTENIR join INGREDIENT using(INGREDIENT_ID) where REC_ID = ". $id ."; ");

        $i = 0;
        $retour = array();

        while ($donnees = $reponse->fetch()){ 
            $retour[$i]['quantite'] = $donnees['quantite'];
            $retour[$i]['intitule'] = $donnees['intitule'];
            $retour[$i]['description'] = $donnees['descritpion'];
            $i++;
        }

        return $retour;
    }
?>