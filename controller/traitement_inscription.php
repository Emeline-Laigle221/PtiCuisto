<?php
require_once("../manager/connexion_BDD.php");

if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["pseudo"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $email = $_POST["email"];
    $password = hash('sha256',$_POST["password"]);
    
    $query = $bdd->prepare('SELECT COUNT(*) FROM UTILISATEUR');
    $query->execute();

    $nbUser = 0;
    if ($query->rowCount() > 0) {
        while ($row = $query->fetch()) {
            $nbUser = $row['COUNT(*)'];
        }
        $nbUser = $nbUser+1;
        
        $sql = 'INSERT INTO UTILISATEUR VALUES ('.$nbUser.', \'UTILISATEUR\', \''.$pseudo.'\',\''.$email.'\',\''.$prenom.'\',\''.$nom.'\', DATE(NOW()), \'Actif\', \''.$password.'\')';
        $insert = $bdd->prepare($sql);

        if ($insert->execute()) {
            
        } else {
            echo "Erreur : " . $sql . "<br>" . $bdd->error;
        }

    } else {
        echo "Aucune ligne trouvée dans la base de données.";
    }
} else {
    echo "Ça ne fonctionne pas.";
}
header("Location: ../index.php");
exit;
?>