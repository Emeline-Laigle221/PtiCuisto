<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditio de l'édito</title>
</head>
<body>
    <?php
        if(isset($_POST['contenu'])){
            require_once("controller/EditoController.php");
            traiter_formulaire_edito();
        }
    ?>
    <form action="index.php?page=modifier_edito" method="post">
        <input type="text" name="contenu">
        <button type="submit">Enregistrer</button>
    </form>
</body>
</html>