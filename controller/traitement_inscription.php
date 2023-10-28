<?php
require_once("../manager/connexion_BDD.php");

if (isset($_POST["nom"])) {
    if (isset($_POST["prenom"])) {
        if (isset($_POST["pseudo"])) {
            if (isset($_POST["email"])) {
                if (isset($_POST["password"])) {
                    $nom = $_POST["nom"];
                    $prenom = $_POST["prenom"];
                    $pseudo = $_POST["pseudo"];
                    $email = $_POST["email"];
                    $password = hash('sha256', $_POST["password"]);
                    unset($_POST);

                    $query = $bdd->prepare('SELECT COUNT(*) FROM UTILISATEUR');
                    $query->execute();

                    $nbUser = 0;
                    while ($row = $query->fetch()) {
                        $nbUser = $row['COUNT(*)'];
                    }

                    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE (NOM = \'' . $nom . '\' and PRENOM = \'' . $prenom . '\') or PSEUDO = \'' . $pseudo . '\' or ADRESSE_MAIL = \'' . $email . '\'');
                    $query->execute();
                    if ($query->rowCount() <> 0) {
                        header("Location: ../template/page-inscription.php?error=true");
                        exit;
                    } else {
                        $nbUser = $nbUser + 1;

                        $sql = 'INSERT INTO UTILISATEUR VALUES (' . $nbUser . ', \'UTILISATEUR\', \'' . $pseudo . '\',\'' . $email . '\',\'' . $prenom . '\',\'' . $nom . '\', DATE(NOW()), \'Actif\', \'' . $password . '\')';
                        $insert = $bdd->prepare($sql);

                        if ($insert->execute()) {
                            header("Location: ../index.php");
                            exit;
                        } else {
                            echo "Erreur : " . $sql . "<br>";
                        }
                    }
                }
            }
        }
    }
} else {
    echo "Ça ne fonctionne pas.";
}
?>