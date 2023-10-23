<?php
    if(isset(/**/ ){
        $req = $bdd->prepare('DELETE FROM recette where  ');
        $req->execute(array(($_SESSION['pseudo']), strip_tags($_POST['message']))); // idem pour la suppression des balises éventuelles du message 
        
            $req = $bdd->prepare('INSERT INTO recette (recette_id, titre,resume,image,date_creation,date_modification,contenu,validation,categorie_id,uti_id) VALUES(?,?,?,?,NOW(),NOW(),?,0,?,?)');
            $req->execute(array(2, strip_tags($_POST['titre_recette']),strip_tags($_POST['resume_de_la_recette']),strip_tags($_POST['lien_image']),strip_tags($_POST['contenu_de_la_recette']),...,$_SESSION['id'])); 
    }

    //header('Location : ajout_rectte.php');
?>
