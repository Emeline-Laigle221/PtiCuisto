<?php
    function liste(){
        include_once("../template/connexion.php");
        $reponse = $bdd->query('SELECT titre, rec_resume, rec_image, cat_intitule as categorie from RECETTE join CATEGORIE using(categorie_id) ORDER BY date_modification;');

        $retour = array();
        $i = 0;

        while ($donnees = $reponse->fetch()){ 
            $retour[$i]['titre'] = $donnees['titre'];
            $retour[$i]['rec_resume'] = $donnees['rec_resume'];
            $retour[$i]['rec_image'] = $donnees['rec_image'];
            $retour[$i]['categorie'] = $donnees['categorie'];
            $i++;
        }

        return $retour;
    }
?>