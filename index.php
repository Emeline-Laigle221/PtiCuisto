<?php 
    if(!isset($_SESSION)){
        session_start();
    }
    echo 'session :';
    var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <title>PtiCuisto</title>
</head>

<body>

    <?php
    if (isset($_SESSION["id"])) {
        if ($_SESSION["id"] === 0) {
            unset($_SESSION["type"]);
        }
    }
    if (!isset($_SESSION["type"])) {
        $_SESSION["type"] = 0;
    }
    if(isset($_GET['page'])){
        
        if($_GET['page'] == 'liste'){
            require_once("controller/RecetteController.php");
            $depart = 0;
            if (isset($_GET['plus'])){
                $depart = $_GET['plus'] + 10;
            }
            echo $depart;
            afficher_liste($depart, 10);
        }

        if($_GET['page'] == 'detailsRecette'){
            require_once("controller/RecetteController.php");
            detailRecette($_GET['recette']);
        }

        if($_GET['page'] == 'mesrecettes'){
            require_once("controller/RecetteController.php");
            afficher_mes_recettes();
        }

        if($_GET['page'] == 'ajouterRecette'){
            if(isset($_GET['formulaire'])){
                include("traitement_ajout_recette.php");
            }else{
                include("ajout_recette.php");
            }
        }

        if($_GET['page'] == 'listeAdmin'){
            require_once("controller/RecetteController.php");
            afficher_recettes_validation();
        }

        if($_GET['page'] == 'modifier_edito'){
            include_once('template/formulaire_edito.php');
        }

        if($_GET['page'] == 'connexion'){
            if(isset($_POST['email'])){
                include('controller/traitement_connexion.php');
                traiter_connexion();
            }
            include('template/page-connexion.php');
        }

        if($_GET['page'] == 'inscription'){
            if(isset($_GET['formulaire'])){
                require_once("controller/traitement_inscription.php");
                traiter_inscription();
            }
            include_once('template/page-inscription.php');
        }

    }else{
        include 'template/Edito.php';
    }
    
    ?>

</body>
</html>