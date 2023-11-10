<?php
    
    //la fonction prend l'iD de la recette
    function supression(int $recID){
        include_once "connexion.php";
        if(isset($recID)){
            $req3 = $bdd->prepare('DELETE FROM `CONTENIR` WHERE REC_ID=?'); //supprime les lignes dans contenir qui lie des ingrédients à la recette
            $req3->execute(array($recID)); 
            $req4 = $bdd->prepare('DELETE FROM `RECETTE` WHERE REC_ID=?');//supprime la recette
            $req4->execute(array($recID)); 
            $req5 = $bdd->prepare('DELETE FROM `INGREDIENT` WHERE INGREDIENT_ID NOT IN ( SELECT INGREDIENT_ID FROM `CONTENIR`)');//supprime les ingrédients qui ne sont plus lier à aucune recette
            $req5->execute(array()); 
        }
    }

    //exemple appel de la fonction 
    //supression(28);

    //header('Location : ajout_rectte.php');
?>
