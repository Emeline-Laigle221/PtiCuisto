<?php
    require_once 'connexion.php';

    if (!isset($_SESSION['pseudo'])) {
        $_SESSION['pseudo'] = '';
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../style/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="js/filtre.js" defer></script>
    <title>PtiCuisto</title>
</head>
<body>
    <?php 
        include "header.php";
    ?>

    <main>
        <div class="filtre-container">
            <!-- Modale Catégories -->
            <div class="modal-container categorie-container">
                <div class="overlay categorie "></div>
                <div class="modal">
                    <button class="close-modal categorie ">X</button>
                    <h1>Catégories</h1>
                    <form action="" method="post">

                        <input type="checkbox" name="entree" id="entree">
                        <label for="entree">Entrée</label>
                        <br>
                        <input type="checkbox" name="plats" id="plats">
                        <label for="plats">Plats</label>
                        <br>
                        <input type="checkbox" name="dessert" id="dessert">
                        <label for="dessert">Dessert</label>
                        <br>
                        <input class="valider" value="Valider" type="submit" name="valider-categorie" id="valider-categorie">
                    </form>
                </div>
            </div>

            <button class="modal-btn categorie ">Catégories</button>

            <!-- Modale Titre -->
            <div class="modal-container titre-container">
                <div class="overlay titre "></div>
                <div class="modal">
                    <button class="close-modal titre ">X</button>
                    <h1>Titre de recette</h1>
                    <form action="" method="post">
                        <label for="titre">Titre de la recette : </label>
                        <input type="text" name="titre" id="titre">
                        <br>
                        <input class="valider" value="Valider" type="submit" name="valider-titre" id="valider-titre">
                    </form>
                </div>
            </div>

            <button class="modal-btn titre ">Titre</button>

            <!-- Modale Ingrédients -->
            <div class="modal-container ingredient-container">
                <div class="overlay ingredient "></div>
                <div class="modal">
                    <button class="close-modal ingredient">X</button>
                    <h1>Ingrédients</h1>
                    <form action="" method="post">
                        <div class="list-ingredient">
                            <?php
                            $query = $bdd->prepare('SELECT ING_INTITULE FROM INGREDIENT');
                            $query->execute();
                            while($row = $query->fetch()){
                                echo '<input type="checkbox" name="'.$row["ING_INTITULE"].'" id="'.$row["ING_INTITULE"].'">';
                                echo '<label for="'.$row["ING_INTITULE"].'">'.$row["ING_INTITULE"].'</label>';
                                echo "<br>";

                            }
                            ?>
                        </div>
                        <input class="valider" value="Valider" type="submit" name="valider-ingredients" id="valider-ingredients">
                    </form>
                </div>
            </div>

            <button class="modal-btn ingredient">Ingrédients</button>

        </div>
        <?php
            // Initialisation des filtres
            $categoryFilter = ''; // Filtre de catégorie
            $ingredientFilter = ''; // Filtre d'ingrédients
            $titreFilter = ''; // Filtre de titre
            $titreValue = '';

            if (isset($_POST['valider-categorie'])) {
                // Traitement des catégories
                $categories = [];

                if (isset($_POST['entree'])) {
                    $categories[] = 1;
                }
                if (isset($_POST['plats'])) {
                    $categories[] = 2;
                }
                if (isset($_POST['dessert'])) {
                    $categories[] = 3;
                }

                if (!empty($categories)) {
                    $categoryFilter = 'CATEGORIE_ID IN (' . implode(', ', $categories) . ')';
                }
            }

            if (isset($_POST['valider-titre']) && !empty($_POST['titre'])) {
                $titreFilter = 'TITRE LIKE :titre';
                $titreValue = '%' . $_POST['titre'] . '%';
            }
            
            if (isset($_POST['valider-ingredients'])) {
                // Initialisez un tableau pour stocker les conditions d'ingrédients sélectionnés
                $selectedIngredients = [];
                // Boucle à travers les ingrédients disponibles dans la base de données
                $query = $bdd->prepare('SELECT ING_INTITULE FROM INGREDIENT');
                $query->execute();
                while ($row = $query->fetch()) {
                    // Vérifiez si la case à cocher de l'ingrédient est cochée
                    $ingredientName = $row["ING_INTITULE"];
                    if (isset($_POST[$ingredientName])) {
                        // Ajoutez cette condition à la liste des ingrédients sélectionnés
                        $selectedIngredients[] = 'ING_INTITULE = "' . $ingredientName . '"';
                    }
                }
            
                // Construisez la condition d'ingrédients en utilisant OR entre les ingrédients sélectionnés
                if (!empty($selectedIngredients)) {
                    $ingredientFilter = '(' . implode(' OR ', $selectedIngredients) . ')';
                }
            }

            // Construction de la requête SQL
            $sql = 'SELECT * FROM RECETTE ';

            // Initialisation d'un tableau pour stocker les clauses WHERE
            $whereClauses = [];

            if (!empty($categoryFilter)) {
                $whereClauses[] = $categoryFilter;
            }

            if (!empty($titreFilter)) {
                $whereClauses[] = $titreFilter;
            }

            if (!empty($ingredientFilter)) {
                $whereClauses[] = $ingredientFilter;
                $sql .=  'JOIN CONTENIR USING (REC_ID) JOIN INGREDIENT USING (INGREDIENT_ID)';
            }

            // Si des clauses WHERE ont été ajoutées, combinez-les avec AND
            if (!empty($whereClauses)) {
                $sql .= ' WHERE ' . implode(' AND ', $whereClauses);
            }

            $query = $bdd->prepare($sql);

            // Associez les valeurs aux paramètres de la requête, si nécessaire
            if (isset($titreFilter)) {
                $query->bindValue(':titre', $titreValue, PDO::PARAM_STR);
            }

            $query->execute();

            while ($donnees = $query->fetch()) {
            
                echo"
                <div class=\"carte-recette\">
                    <div class=\"image-recette\">
                        <a href\"index.php?page=detailsRecette&recette=" . $donnees['REC_ID'] . "\"><img src=\"" . $donnees['REC_IMAGE'] . "\" alt=\"image de la recette\"></img></a>
                    </div>
                    
                    <div class=\"titre-recette\">
                        <a href=\"index.php?page=detailsRecette&recette=" . $donnees['REC_ID'] . "\">" . $donnees['TITRE'] . "</a>
                    </div>
                    <div class=\"cat-recette\">
                        <p>". $donnees['CATEGORIE_ID'] ."</p>
                    </div>
                    <div class=\"resume-recette\">
                        <p>". $donnees['REC_RESUME'] ."</p>
                    </div>
                </div>
                ";
            }   

        ?>
    </main>
    <?php include "footer.php"?>
</body>
</html>

