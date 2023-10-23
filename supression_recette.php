<?php
    include_once "connexion.php";

    function supression(int $recID){
        if(isset($recID)){
            $req3 = $bdd->prepare('DELETE FROM `CONTENIR` WHERE REC_ID=?');
            $req3->execute(array($recID)); 
            $req4 = $bdd->prepare('DELETE FROM `RECETTE` WHERE REC_ID=?');
            $req4->execute(array($recID)); 
        }
    }

    //header('Location : ajout_rectte.php');
?>
