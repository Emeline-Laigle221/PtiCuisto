<?php
    session_start();
    require_once("../manager/connexion.php");
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
    <script src="../js/filtre.js" defer></script>
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
                            while($row = $query->fetch()) {
                                echo "<input class=\"check\" type=\"checkbox\" name=\"".$row["ING_INTITULE"]."\" id=\"".$row["ING_INTITULE"]."\">";
                                echo "<label for= \"".$row["ING_INTITULE"]."\">".$row["ING_INTITULE"]."</label>";
                                echo"<br>";
                            }
                            ?>
                        </div>
                        <input class="valider" value="Valider" type="submit" name="valider-ingredients" id="valider-ingredients">
                    </form>
                </div>
            </div>

            <button class="modal-btn ingredient">Ingrédients</button>

        </div>
    </main>
    <?php include "footer.php"?>
</body>