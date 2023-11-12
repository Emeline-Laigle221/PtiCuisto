<?php

/**
 * Fonction pour vérifier l'existence d'un compte
 * $email : Adresse mail de l'utilisateur
 * $password : mot de passe de l'utilisateur
 * Retourne true si l'utilisateur existe, false sinon.
 */
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

/**
 * Fonction pour récupérer l'identifiant de l'utilisateur
 * $email : Adresse mail de l'utilisateur
 * $password : mot de passe de l'utilisateur
 * Retourne l'identifiant de l'utilisateur.
 */
function getUserId($email, $password){
    require("connexion.php");
    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = \'' . $email . '\' and MDP = \'' . $password . '\'');
    $query->execute();
    while ($row = $query->fetch()) {
        return $row['UTI_ID'];
    }
}

/**
 * Fonction pour récupérer le type d'un utilisateur (utilisateur, éditeur ou administrateur)
 * $email : Adresse mail de l'utilisateur
 * $password : mot de passe de l'utilisateur
 * Retourne le type de l'utilisateur.
 */
function getUserType($email, $password){
    require("connexion.php");
    $query = $bdd->prepare('SELECT * FROM UTILISATEUR WHERE ADRESSE_MAIL = \'' . $email . '\' and MDP = \'' . $password . '\'');
    $query->execute();
    while ($row = $query->fetch()) {
        return $row['TYPE'];
    }
}
?>