<?php
if(isset($_SESSION['pseudo']) && isset($_POST['message'])){
    $req = $bdd->prepare('DELETE FROM recette where  ');
    $req->execute(array(($_SESSION['pseudo']), strip_tags($_POST['message']))); // idem pour la suppression des balises éventuelles du message 
    //strip_tags enleve balise html si il y en a.
    //isset regarde si la variable n'est pas vide.
}
?>