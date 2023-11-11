<?php

function compteIsSet($email, $password){
    require("connexion.php");
    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = \'' . $email . '\' and MDP = \'' . $password . '\'');
    $query->execute();
    if ($query->rowCount() === 1) {
        return true;
    }else{
        return false;
    }
}

function getUserId($email, $password){
    require("connexion.php");
    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = \'' . $email . '\' and MDP = \'' . $password . '\'');
    $query->execute();
    while ($row = $query->fetch()) {
        return $row['UTI_ID'];
    }
}

function getUserType($email, $password){
    require("connexion.php");
    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = \'' . $email . '\' and MDP = \'' . $password . '\'');
    $query->execute();
    while ($row = $query->fetch()) {
        return $row['TYPE'];
    }
}
?>