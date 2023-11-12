<?php
    /**
     * Fonction modifiant une recette selon le formulaire.
     * $post : le formulaire rempli.
     * $num_recette : l'identifiant de la recette.
     */
    function modifier_recette($post, $num_recette) {
        include("connexion.php");
        $siteUnsplash = "unsplash.com"; // URL d'Unsplash

        $reqMaxIDIngredient = $bdd->prepare('SELECT MAX(INGREDIENT_ID)+1 FROM INGREDIENT;');
        $reqMaxIDIngredient->execute();
        $MaxIDIngredient=$reqMaxIDIngredient->fetch();
        $reqMaxIDRecette = $bdd->prepare('SELECT MAX(REC_ID)+1 FROM RECETTE;');
        $reqMaxIDRecette->execute();
        $MaxIDRecette=$reqMaxIDRecette->fetch();

        //modification table recette
        if (strpos($post['lien_image'], $siteUnsplash) !== false) {
            echo "L'URL de l'image provient d'Unsplash.";
            $req = $bdd->prepare('UPDATE `RECETTE` SET `TITRE`= ?,`REC_RESUME`=?,`REC_IMAGE`=?,`DATE_MODIFICATION`=NOW(),`CONTENU`=?,`REC_VALIDATION`=0,`CATEGORIE_ID`=? WHERE REC_ID=?');
            //Mets à jour la table recette
            if ($req->execute(array(strip_tags($post['titre_recette']),strip_tags($post['resume_de_la_recette']),strip_tags($post['lien_image']),strip_tags($post['contenu_de_la_recette']),$post['categorie'],$num_recette))) {
                $rowCount = $req->rowCount();
                if ($rowCount > 0) {
                    echo "Update dans la table RECETTE s'est bien déroulée. Nombre de lignes affectées : " . $rowCount;
                } else {
                    echo "Update dans la table RECETTE n'a pas affecté de lignes.";
                }
            } else {
                echo "Erreur lors de l'exécution de la requête.";
            }
            
        } else {
            echo "L'URL de l'image ne provient pas d'Unsplash.";
        }



        //insertion table ingrédient
        $ingredientCount = 0;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Compteur pour les champs d'ingrédients
            $ingredientCount = 0;
        
            // Parcourez les données postées pour compter les champs d'ingrédients
            foreach ($post as $key => $value) {
                if (strpos($key, "ingredient") === 0) {
                    // Le nom du champ commence par "ingredient"
                    $ingredientCount++;
                }
            }

            for ($i = 1; $i <= $ingredientCount; $i++) {
                // Accédez aux données de chaque champ d'ingrédient en utilisant l'index de la boucle
                $ingredientName = $post["ingredient" . $i];
                $req= $bdd->prepare('SELECT COUNT(INGREDIENT_ID) FROM INGREDIENT JOIN CONTENIR USING(INGREDIENT_ID) WHERE ING_INTITULE=? and REC_ID=?;');
                $req->execute(array($ingredientName,$num_recette));
                //verifie si l'ingrédient est déjà dans la recette
                $reponse = $req->fetch();
                if($reponse['COUNT(INGREDIENT_ID)']>1){
                    echo "Erreur cette ingrédient est deux fois dans la recette";
                }
                elseif ($reponse['COUNT(INGREDIENT_ID)']==0) { //ingrédient pas dans la recette
                    $req= $bdd->prepare('SELECT COUNT(INGREDIENT_ID) FROM INGREDIENT WHERE ING_INTITULE=?;');
                    //regarde si l'ingrédient existe déjà
                    $req->execute([$ingredientName]);
                    $reponse = $req->fetch();
                    if($reponse['COUNT(INGREDIENT_ID)']>1){
                        echo "Erreur plus de une ligne de cette ingrédient dans la table";
                    }
                    elseif ($reponse['COUNT(INGREDIENT_ID)']==0) { //si ingrédient n'existe pas encore
                        $req = $bdd->prepare('INSERT INTO INGREDIENT(INGREDIENT_ID,ING_INTITULE) VALUES(?,?)');
                        $req->execute(array($MaxIDIngredient['MAX(INGREDIENT_ID)+1'],$ingredientName));
                    }
                    $req2 = $bdd->prepare('SELECT INGREDIENT_ID from INGREDIENT where ING_INTITULE=? ;');
                    $req2->execute([$ingredientName]);
                    $reponse2 = $req2->fetch();
                    if($reponse2['INGREDIENT_ID']){
                        $req3 = $bdd->prepare('INSERT INTO CONTENIR (REC_ID,INGREDIENT_ID) VALUES(?,?)');
                        $req3->execute(array($num_recette,$reponse2['INGREDIENT_ID'])); 
                        //ajoute l'ingrédient à la recette
                    }
                }
            }

            

        } else {
            echo "Ce script ne doit être accessible que via une requête POST.";
        }

        // Récupérer les ingrédients actuels de la recette
        $reqIngredientsActuels = $bdd->prepare('SELECT INGREDIENT_ID, ING_INTITULE FROM INGREDIENT JOIN CONTENIR USING(INGREDIENT_ID) WHERE REC_ID = ?');
        $reqIngredientsActuels->execute([$num_recette]);
        $ingredientsActuels = $reqIngredientsActuels->fetchAll();

        // Tableau pour stocker les ingrédients postés
        $ingredientsPostes = [];

        // Parcourir les données postées pour récupérer les ingrédients
        foreach ($post as $key => $value) {
            if (strpos($key, "ingredient") === 0) {
                $ingredientsPostes[] = $value;
            }
        }

        // Parcourir les ingrédients actuels
        foreach ($ingredientsActuels as $ingredientActuel) {
            $ingredientIDActuel = $ingredientActuel['INGREDIENT_ID'];
            $ingredientIntituleActuel = $ingredientActuel['ING_INTITULE'];

            // Vérifie si l'ingrédient actuel n'est pas dans les ingrédients postés
            if (!in_array($ingredientIntituleActuel, $ingredientsPostes)) {
                // Supprimer l'ingrédient de la recette
                $reqSupprimerIngredient = $bdd->prepare('DELETE FROM CONTENIR WHERE REC_ID = ? AND INGREDIENT_ID = ?');
                $reqSupprimerIngredient->execute([$num_recette, $ingredientIDActuel]);
            }
        }
    }


    //teste cote client avant appel de la function 
    if(!isset($_POST['titre_recette'])){
        echo "le titre de la recette est vide";
    }
    if(!isset($_POST['resume_de_la_recette'])){
        echo "le resume de la recette est vide";
    }
    if(!isset($_POST['lien_image'])){
        echo "le lien de l'image est vide";
    }

    if(!isset($_POST['contenu_de_la_recette'])){
        echo "le contenu de la recette est vide";
    }


    else{
        modifier_recette($_POST, $_GET['recette']);
    }


    
    //header('Location : ajout_recette.php');
?>