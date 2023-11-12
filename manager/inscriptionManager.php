<?php
function compteIsAlreadySet($nom, $prenom, $pseudo, $email){
    require_once("connexion.php");

    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE (NOM = \'' . $nom . '\' and PRENOM = \'' . $prenom . '\') or PSEUDO = \'' . $pseudo . '\' or ADRESSE_MAIL = \'' . $email . '\'');
    $query->execute();
    if ($query->rowCount() === 0) {
        return false;
    }else{
        return true;
    }
}

function addUser($nom, $prenom, $pseudo, $email, $password){
    require("connexion.php");

    $query = $bdd->prepare('SELECT MAX(UTI_ID) FROM UTILISATEUR');
    $query->execute();

    $nbUser = 0;
    while ($row = $query->fetch()) {
        $nbUser = $row['MAX(UTI_ID)'];
    }
    $nbUser = $nbUser + 1;

    $sql = 'INSERT INTO UTILISATEUR (uti_id, pseudo, adresse_mail, prenom, nom, mdp) VALUES (' . $nbUser . ', \'' . $pseudo . '\',\'' . $email . '\',\'' . $prenom . '\',\'' . $nom . '\', \'' . $password . '\');';
    $insert = $bdd->prepare($sql);
    $insert->execute();
    return true;
}
?>