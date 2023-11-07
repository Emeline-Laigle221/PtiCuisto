<?php

    function trouver_recette($nom){
        require("connexion.php");

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
        require("connexion.php");
        $reponse = $bdd->query("SELECT quantite, ING_INTITULE as intitule, ING_DESCRIPTION as descritpion FROM CONTENIR join INGREDIENT using(INGREDIENT_ID) where REC_ID = ". $id ."; ");

        $i = 0;
        $retour = array();

        while ($donnees = $reponse->fetch()){ 
            $retour[$i]['quantite'] = $donnees['quantite'];
            $retour[$i]['intitule'] = $donnees['intitule'];
            $retour[$i]['description'] = $donnees['descritpion'];
        }
        return $retour;
    }

    /**
     * Fonction retournant toutes les recettes avec les propriétés : titre, résumé, image et intitulé de la catégorie
     * Le retour se fait sous la forme d'un tableau à deux dimensions : la première pour choisir la recette, et la deuxième pourchoisir la propriété (titre, rec_resume, 
     * rec_image et categorie)
     * Les recettes sont organisées par date de modifications 
     */
    function liste(){
        require("connexion.php");
        $reponse = $bdd->query('SELECT titre, rec_resume, rec_image, cat_intitule as categorie from RECETTE join CATEGORIE using(categorie_id) where rec_validation = 1 ORDER BY date_modification;');

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

    /**
     * Fonction retournant toutes les recettes qui n'ont pas encore été validé par un administrateur
     * Avec les propriétés : titre, résumé, image et intitulé de la catégorie
     * Le retour se fait sous la forme d'un tableau à deux dimensions : la première pour choisir la recette, et la deuxième pourchoisir la propriété (titre, rec_resume, 
     * rec_image et categorie)
     * Les recettes sont organisées par date de modifications 
     */
    function liste_validation() {
        require("connexion.php");
        $reponse = $bdd->query('SELECT titre, rec_resume, rec_image, cat_intitule as categorie, rec_id from RECETTE join CATEGORIE using(categorie_id) where rec_validation = 0 ORDER BY date_modification;');

        $retour = array();
        $i = 0;

        while ($donnees = $reponse->fetch()){ 
            $retour[$i]['titre'] = $donnees['titre'];
            $retour[$i]['rec_resume'] = $donnees['rec_resume'];
            $retour[$i]['rec_image'] = $donnees['rec_image'];
            $retour[$i]['categorie'] = $donnees['categorie'];
            $retour[$i]['rec_id'] = $donnees['rec_id'];
            $i++;
        }

        return $retour;
    }

    function valider($num){
        require("connexion.php");
        $req = $bdd->prepare('UPDATE RECETTE set rec_validation = 1 where rec_id='. $num .';');
        $req->execute();
    }

    function interdire($num){
        require("connexion.php");
        $req = $bdd->prepare('UPDATE RECETTE set rec_validation = -1 where rec_id='. $num .';');
        $req->execute();
    }
?>