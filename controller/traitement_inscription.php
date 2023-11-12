<?php
require_once("manager/inscriptionManager.php");

function traiter_inscription(){
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
                        
                        if (compteIsAlreadySet($nom, $prenom, $pseudo, $email)) {
                            echo '<script>window.location.href = "Location: index.php?page=inscription&error=true";</script>';
                            exit;
                        } else {
                            if (addUser($nom, $prenom, $pseudo, $email, $password)) {
                                // header("Location: index.php");
                                // exit;
                                echo '<script>window.location.href = "index.php";</script>';
                                exit;
                            } else {
                                echo "Erreur";
                            }
                        }
                    }
                }
            }
        }
    } else {
        echo "Ça ne fonctionne pas.";
    }
}

?>