<?php

/**
 * Fonction traitant le formulaire de connexion.
 */
function traiter_connexion(){
    if (isset($_POST["email"])) {
        if (isset($_POST["password"])) {
    
            $email = $_POST["email"];
            $password = hash('sha256', $_POST["password"]);
    
            require("manager/connexionManager.php");
    
            if (compteIsSet($email, $password)) {
                $_SESSION["id"] = getUserId($email, $password);
                $_SESSION["type"] = getUserType($email, $password);
            } else {
                //header("Location: template/page-connexion.php?error=true");
                exit;
            }
        }
        //header("Location: index.php");
        exit;
    } else {
        echo "Ça ne fonctionne pas.";
    }
}

?>