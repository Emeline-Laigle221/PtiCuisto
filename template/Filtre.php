<div>
    <form action="" method="post">
        <div>
            <label for="categorie">Choisissez la catégorie de votre recette : </label>
            <select name="categorie" id="categorie">
                <option value="apero">Apéritif</option>
                <option value="entree">Entrée</option>
                <option value="plats">Plats</option>
                <option value="dessert">Dessert</option>
            </select>
        </div>
        <div>
            <label for="titre">Entrez le nom d'une recette : </label>
            <input type="text" name="titre" id="titre">
        </div>
        <div id="ingredient">
            <div>
                <input type="check" name="tomate" id="tomate">
                <label for="tomate">Tomate</label>
            </div>
            <div>
                <input type="check" name="concombre" id="concombre">
                <label for="concombre">Concombre</label>
            </div>
            <div>
                <input type="check" name="champignons" id="champignons">
                <label for="champignons">Champignons</label>
            </div>
            <div>
                <input type="check" name="porc" id="porc">
                <label for ="porc">Porc</label>
            </div>
            <div>
                <input type="check" name="poulet" id="poulet">
                <label for="poulet">Poulet</label>
            </div>
        </div>
    </form>
</div>