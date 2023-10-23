

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page ajout d'une recette</title>
</head>
<body>
    <form action="traitement_ajout_recette.php" method="post" onsubmit="return validateForm()">
    <h3>Informations sur la recette :</h3>
        <input type="text" name="titre recette" required>
        <label for="titre recette"> Titre de la recette</label>
        <input type="text" name="resume de la recette" required>
        <label for="resume de la recette"> Resume de la recette</label>
        <input type="text" name="lien_image" required>
        <label for="lien_image"> lien de l'image</label>
        <input type="text" name="contenu_de_la_recette" required>
        <label for="contenu_de_la_recette"> Contenu de la recette</label>
        <label for="categorie">Choisissez la catégorie de votre recette : </label>
            <select name="categorie" id="categorie">
                <option value=1>Entrée</option>
                <option value=2>Plats</option>
                <option value=3>Dessert</option>
            </select>
        

    <h3>Ajouter des Ingrédients :</h3>
        <div id="ingredientList">
            <input type="text" name="ingredient1" placeholder="Ingrédient 1" required>
        </div>
        <button type="button" id="addIngredient">Ajouter un Ingrédient</button>
        <br><br>
        <input type="submit" value="Soumettre la Recette">
    </form>

    <script>
        // Écoute l'événement de clic sur le bouton "Ajouter un Ingrédient"
        document.getElementById("addIngredient").addEventListener("click", function() {
            const ingredientList = document.getElementById("ingredientList");
            const lastInput = ingredientList.querySelector("input:last-child");

            if (lastInput.value.trim() !== '') {
                const newInput = document.createElement("input");
                const inputCount = ingredientList.getElementsByTagName("input").length + 1;
                newInput.type = "text";
                newInput.name = "ingredient" + inputCount;
                newInput.placeholder = "Ingrédient " + inputCount;
                newInput.required = true;
                ingredientList.appendChild(newInput);
            }
        });

        function validateForm() {
            const form = document.getElementById("recipeForm");
            if (form.checkValidity()) {
                alert("Le formulaire est valide. Prêt à soumettre !");
                return true;
            } else {
                alert("Veuillez remplir correctement tous les champs requis.");
                return false;
            }
        }
    </script>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>


