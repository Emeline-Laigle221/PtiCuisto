<?php
    

    /**
     * Fonction retournant toutes les recettes avec les propriétés : titre, résumé, image et intitulé de la catégorie
     * Le retour se fait sous la forme d'un tableau à deux dimensions : la première pour choisir la recette, et la deuxième pourchoisir la propriété (titre, rec_resume, 
     * rec_image et categorie)
     * Les recettes sont organisées par date de modifications 
     */
    function liste(){
        include_once("connexion.php");
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