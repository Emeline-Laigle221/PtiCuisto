<?php
require_once("../manager/connexion_BDD.php");

if (isset($_POST["email"]) && isset($_POST["password"])) {
    
    $email = $_POST["email"];
    $password = hash('sha256',$_POST["password"]);
    
    $query = $bdd->prepare('SELECT ADRESSE_MAIL, MDP FROM UTILISATEUR WHERE ADRESSE_MAIL = \''.$email.'\' and MDP = \''.$password.'\'');
    $query->execute();

    if ($query->rowCount() === 1) {
        
        // A COMPLETER

    } else {
        echo "Aucune ligne trouvée dans la base de données.";
    }
} else {
    echo "Ça ne fonctionne pas.";
}
header("Location: ../index.php");
exit;
?>