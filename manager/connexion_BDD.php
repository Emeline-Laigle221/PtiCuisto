<?php

// ------------------------------------------------------------------------------ Connexion à la base de données 'tchat' ------------------------------------------------------------------------------------------------------------

// Test de connexion
try
{
    $bdd = new PDO('mysql:host=mysql.info.unicaen.fr;dbname=jobard221_1;charset=utf8', 'jobard221', 'mooquoi3Phu2jui8'); // attention un mot de passe a été défini pour l'accès à la base de données
}

// Gestion des erreurs
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>