<?php
ob_start();
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
                // var_dump($_SESSION);
            } else {
                echo '<script>window.location.href = "template/page-connexion.php?error=true";</script>';
                exit;
            }
        }
        echo '<script>window.location.href = "index.php";</script>';
        exit;
    } else {
        echo "Ça ne fonctionne pas.";
    }
}

?>