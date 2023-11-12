<?php
    /**
     * Vérifie si un compte existe.
     * Retourne false si le compte n'existe pas, true sinon.
     */
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
    /**
     * Fonction ajoutant un utilisateur.
     * $nom : le nom de l'utilisateur (nom)
     * $prenom : le prenom de l'utilisateur (prenom)
     * $pseudo : le pseudo de l'utilisateur (pseudo)
     * $email : l'adresse mail de l'utilisateur (adresse_mail)
     * $password : le mot de passe de l'utilisateur (mdp)
     */
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