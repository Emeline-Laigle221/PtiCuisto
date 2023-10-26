<?php
    include_once "connexion.php";
    //include_once() Inclure la où il y a variable session 
    //gerer le recette_id de façon automatique et la récupération de la valeur du select

    
    session_start();
    include("connexion.php");

    $_SESSION['pseudo'] = 21;


    function ajout_recette($post) {
            
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
            if ($req->execute(array($MaxIDRecette['MAX(REC_ID)+1'], strip_tags($post['titre_recette']),strip_tags($post['resume_de_la_recette']),strip_tags($post['lien_image']),strip_tags($post['contenu_de_la_recette']),$post['categorie'],$_SESSION['pseudo']))) {
                $rowCount = $req->rowCount();
                if ($rowCount > 0) {
                    echo "L'insertion dans la table RECETTE s'est bien déroulée. Nombre de lignes affectées : " . $rowCount;
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
                echo var_dump($ingredientName);
                $req= $bdd->prepare('SELECT COUNT(INGREDIENT_ID) FROM INGREDIENT WHERE ING_INTITULE=?;');
                $req->execute([$ingredientName]);
                $reponse = $req->fetch();
                echo $reponse['COUNT(INGREDIENT_ID)'];
                if($reponse['COUNT(INGREDIENT_ID)']>1){
                    echo "Erreur plus de une ligne de cette ingrédient dans la table";
                }
                elseif ($reponse['COUNT(INGREDIENT_ID)']==0) {
                    echo 'ici';
                    $req = $bdd->prepare('INSERT INTO INGREDIENT(INGREDIENT_ID,ING_INTITULE) VALUES(?,?)');
                    $req->execute(array($MaxIDIngredient['MAX(INGREDIENT_ID)+1'],$ingredientName));
                }
                $req2 = $bdd->prepare('SELECT INGREDIENT_ID from INGREDIENT where ING_INTITULE=? ;');
                $req2->execute([$ingredientName]);
                $reponse2 = $req2->fetch();
                echo $reponse2['INGREDIENT_ID'];
                if($reponse2['INGREDIENT_ID']){
                    $req3 = $bdd->prepare('INSERT INTO CONTENIR (REC_ID,INGREDIENT_ID) VALUES(?,?)');
                    $req3->execute(array($MaxIDRecette['MAX(REC_ID)+1'],$reponse2['INGREDIENT_ID'])); 
                }
            }

        } else {
            echo "Ce script ne doit être accessible que via une requête POST.";
        }
    }

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
        ajout_recette($_POST);
    }


    //header('Location : ajout_recette.php');
?>