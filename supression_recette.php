<?php
    
    //la fonction prend l'iD de la recette
    function supression(int $recID){
        include_once "connexion.php";
        if(isset($recID)){
            $req3 = $bdd->prepare('DELETE FROM `CONTENIR` WHERE REC_ID=?');
            $req3->execute(array($recID)); 
            $req4 = $bdd->prepare('DELETE FROM `RECETTE` WHERE REC_ID=?');
            $req4->execute(array($recID)); 
        }
    }

    supression(24);

    //header('Location : ajout_rectte.php');
?>
