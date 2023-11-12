<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page ajout d'une recette</title>
</head>
<body>
    <form id="monFormulaire" action="index.php?page=ajouterRecette&formulaire=true" method="post" onsubmit="return validerFormulaire()" >
    <h3>Informations sur la recette :</h3>
        <label for="titre recette"> Titre de la recette</label>
        <input type="text" name="titre recette" id="titre_recette" required>
        <label for="resume de la recette"> Resume de la recette</label>
        <input type="text" name="resume de la recette" id="resume_de_la_recette" required>
        <label for="lien_image"> lien de l'image</label>
        <input type="text" name="lien_image" id="lien_image" required>
        <label for="contenu_de_la_recette"> Contenu de la recette</label>
        <input type="text" name="contenu_de_la_recette" id="contenu_de_la_recette" required>
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

        
    

        function validerFormulaire(){
            let titre_recette=document.getElementById("titre_recette").value;
            let resume_de_la_recette=document.getElementById("resume_de_la_recette").value;
            let lien_image=document.getElementById("lien_image").value;
            let contenu_de_la_recette=document.getElementById("contenu_de_la_recette").value;
            if(titre_recette.length>40){
                alert("le champs du titre de la recette contiennent une chaine de caratère d'une longueur supérieur à 40");
                return false;
            }
            if(resume_de_la_recette.length>100){
                alert("le champs du resume de la recette contiennent une chaine de caratère d'une longueur supérieur à 100");
                return false;
            }
            if(contenu_de_la_recette.length>200){
                alert("le champs du contenu de la recette contiennent une chaine de caratère d'une longueur supérieur à 200");
                return false;
            }

            if(titre_recette=""){
                alert("le champs du titre de la recette est vide");
                return false;
            }
            if(resume_de_la_recette=""){
                alert("le champs du resume de la recette est vide");
                return false;
            }
            if(contenu_de_la_recette=""){
                alert("le champs du contenu de la recette est vide");
                return false;
            }

            $siteUnsplash = "images.unsplash.com";
            var url=new URL(lien_image);
            var urlDomain=url.hostname;
            if(!(urlDomain===$siteUnsplash)){
                alert("le lien de l'image ne provient pas du site unsplash");
                return false;
            }
            return true;
        }

        
    </script>
</body>
</html>


