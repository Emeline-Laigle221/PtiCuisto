<?php
session_start();

require_once("../manager/connexion_BDD.php");

if (isset($_POST["email"])) {
    if (isset($_POST["password"])) {

        $email = $_POST["email"];
        $password = hash('sha256', $_POST["password"]);

        $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = \'' . $email . '\' and MDP = \'' . $password . '\'');
        $query->execute();
        if ($query->rowCount() === 1) {
            while ($row = $query->fetch()) {
                $_SESSION["id"] = $row['UTI_ID'];
                $_SESSION["type"] = 1;
            }
        } else {
            header("Location: ../template/page-connexion.php?error=true");
            exit;
        }
    }
} else {
    echo "Ça ne fonctionne pas.";
}
header("Location: ../index.php");
exit;
?>