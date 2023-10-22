<?php
    //include_once "request.php"; dossier où il y a la variable de session
    //gerer le recette_id de façon automatique et la récupération de la valeur du select

    if(isset($_POST['titre_recette'])){
        echo "le titre de la recette est vide";
    }
    if(isset($_POST['resume_de_la_recette'])){
        echo "le resume de la recette est vide";
    }
    if(isset($_POST['lien_image'])){
        echo "le lien de l'image est vide";
    }

    if(isset($_POST['contenu_de_la_recette'])){
        echo "le contenu de la recette est vide";
    }

    $siteUnsplash = "unsplash.com"; // URL d'Unsplash

    if (strpos($_POST['lien_image'], $siteUnsplash) !== false) {
        echo "L'URL de l'image provient d'Unsplash.";
        $req = $bdd->prepare('INSERT INTO recette (recette_id, titre,resume,image,date_creation,date_modification,contenu,validation,categorie_id,uti_id) VALUES(?,?,?,?,NOW(),NOW(),?,0,?,?)');
        $req->execute(array(2, strip_tags($_POST['titre_recette']),strip_tags($_POST['resume_de_la_recette']),strip_tags($_POST['lien_image']),strip_tags($_POST['contenu_de_la_recette']),...,$_SESSION['id'])); 
    } else {
        echo "L'URL de l'image ne provient pas d'Unsplash.";
    }

    //header('Location : ajout_rectte.php');
?>