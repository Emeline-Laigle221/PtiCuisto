

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page modification d'une recette</title>
</head>
<body>
 <form id="monFormulaire" action="traitement_modifier_recette.php" method="post" >
    <h3>Informations sur la recette :</h3>
    <?php
    function trouver_recette($num){
        require("connexion.php");

        $reponse = $bdd->query("SELECT rec_id, titre, rec_resume, rec_image, categorie_id, contenu from RECETTE join CATEGORIE using(categorie_id) where rec_id = " . $num . ";");
        //selectionne les informations de la recette
        $retour = array();

        while ($donnees = $reponse->fetch()){
            $retour['titre'] = $donnees['titre'];
            $retour['rec_resume'] = $donnees['rec_resume'];
            $retour['rec_image'] = $donnees['rec_image'];
            $retour['categorie'] = $donnees['categorie_id'];
            $retour['contenu'] = $donnees['contenu'];
            $retour['rec_id'] = $donnees['rec_id'];
        }
        return $retour;//retourne les informations de la recette

    }
    
    $reponse = trouver_recette(28);
    ?>
        <label for="titre recette"> Titre de la recette</label>
        <input type="text" name="titre recette" id="titre_recette" value="<?php echo $reponse['titre']?>" required>
        <label for="resume_de_la_recette"> Resume de la recette</label>
        <input type="text" name="resume_de_la_recette" id="resume_de_la_recette" value="<?php echo $reponse['rec_resume']?>" required>
        <label for="lien_image"> lien de l'image</label>
        <input type="text" name="lien_image" id="lien_image" value="<?php echo $reponse['rec_image']?>" required>
        <label for="contenu_de_la_recette"> Contenu de la recette</label>
        <input type="text" name="contenu_de_la_recette" id="contenu_de_la_recette" value="<?php echo $reponse['contenu']?>" required>
        <label for="categorie">Choisissez la catégorie de votre recette : </label>
            <select name="categorie" id="categorie">
                <option value=1 <?php if ($reponse['categorie'] == 1) echo 'selected'; ?>>Entrée</option>
                <option value=2 <?php if ($reponse['categorie'] == 2) echo 'selected'; ?> >Plats</option>
                <option value=3 <?php if ($reponse['categorie'] == 3) echo 'selected'; ?>>Dessert</option>
            </select>
        

    <h3>Ajouter des Ingrédients :</h3>
        <div id="ingredientList">
            <?php
            //affiche les ingrédients de la recette
                require("connexion.php");
                $reqIngredients = $bdd->prepare('SELECT INGREDIENT_ID, ING_INTITULE FROM INGREDIENT JOIN CONTENIR USING(INGREDIENT_ID) WHERE REC_ID = ?');//selectionne tout les ingrédients de la recette
                $reqIngredients->execute(array(28));
                $ingredients = $reqIngredients->fetchAll();
                $i=1;
                foreach ($ingredients as $ingredient) {
                    echo '<input type="text" name="ingredient' . $i . '" value="' . htmlspecialchars($ingredient['ING_INTITULE']) . '" required>';
                    $i++;
                }
            ?>
        </div>
        <br><br>
        <input type="submit" value="Soumettre la Recette">
    </form>  
</body>
</html>


