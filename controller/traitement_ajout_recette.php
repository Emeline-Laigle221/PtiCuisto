<?php 
    /**
     * Fonction pour ajouter une recette à partir du formulaire.
     * $post : le formulaire remplis.
     * $id : l'identifiant de l'utilisateur.
     */
    function ajout_recette($post, $id) {
        include("connexion.php");
        $siteUnsplash = "unsplash.com"; // URL d'Unsplash

        $reqMaxIDIngredient = $bdd->prepare('SELECT MAX(INGREDIENT_ID)+1 FROM INGREDIENT;');
        $reqMaxIDIngredient->execute();
        $MaxIDIngredient=$reqMaxIDIngredient->fetch();
        $reqMaxIDRecette = $bdd->prepare('SELECT MAX(REC_ID)+1 FROM RECETTE;');
        $reqMaxIDRecette->execute();
        $MaxIDRecette=$reqMaxIDRecette->fetch();

        //incertion table recette
        if (strpos($post['lien_image'], $siteUnsplash) !== false) {
            echo "L'URL de l'image provient d'Unsplash.";
            $req = $bdd->prepare('INSERT INTO `RECETTE`(`REC_ID`, `TITRE`, `REC_RESUME`, `REC_IMAGE`, `DATE_CREATION`, `DATE_MODIFICATION`, `CONTENU`, `REC_VALIDATION`, `CATEGORIE_ID`, `UTI_ID`) VALUES(?,?,?,?,NOW(),NOW(),?,0,?,?);');
            if ($req->execute(array($MaxIDRecette['MAX(REC_ID)+1'], strip_tags($post['titre_recette']),strip_tags($post['resume_de_la_recette']),strip_tags($post['lien_image']),strip_tags($post['contenu_de_la_recette']),$post['categorie'],$id))) {
                $rowCount = $req->rowCount();
                if ($rowCount > 0) {
                    echo "L'insertion dans la table RECETTE s'est bien déroulée. Nombre de lignes affectées : " . $rowCount;
                    echo '<a href="index.php?page=mesrecettes">Retourner à mes recettes</a>';
                } else {
                    echo "L'insertion dans la table RECETTE n'a pas affecté de lignes.";
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
                $req= $bdd->prepare('SELECT COUNT(INGREDIENT_ID) FROM INGREDIENT WHERE ING_INTITULE=?;');
                $req->execute([$ingredientName]);
                $reponse = $req->fetch();
                if($reponse['COUNT(INGREDIENT_ID)']>1){
                    echo "Erreur plus de une ligne de cette ingrédient dans la table";
                }
                elseif ($reponse['COUNT(INGREDIENT_ID)']==0) {
                    $req = $bdd->prepare('INSERT INTO INGREDIENT(INGREDIENT_ID,ING_INTITULE) VALUES(?,?)');
                    $req->execute(array($MaxIDIngredient['MAX(INGREDIENT_ID)+1'],$ingredientName));
                }
                $req2 = $bdd->prepare('SELECT INGREDIENT_ID from INGREDIENT where ING_INTITULE=? ;');
                $req2->execute([$ingredientName]);
                $reponse2 = $req2->fetch();
                if($reponse2['INGREDIENT_ID']){
                    $req3 = $bdd->prepare('INSERT INTO CONTENIR (REC_ID,INGREDIENT_ID) VALUES(?,?)');
                    $req3->execute(array($MaxIDRecette['MAX(REC_ID)+1'],$reponse2['INGREDIENT_ID'])); 
                }
            }

        } else {
            echo "Ce script ne doit être accessible que via une requête POST.";
        }
    }


    //teste coté client avant l'appel de la fonction

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
        ajout_recette($_POST, $_SESSION['id']);
    }

    
    //header('Location : ajout_recette.php');
?>