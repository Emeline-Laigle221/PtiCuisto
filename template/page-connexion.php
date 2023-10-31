<?php
session_start();
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
    <title>Pticuisto</title>
</head>

<body>
    <?php include "header.php" ?>

    <main>
        <div class="connexion">
            <div class="connect-p1">
                <h3>Connexion</h3>
            </div>
            <div class="connect-p2">
                <form action="../controller/traitement_connexion.php" method="post">
                    <div>
                        <label for="email">Adresse Email :</label>
                        <input type="email" name="email" id="email" placeholder="email@example.com"><br>
                    </div>
                    <div>
                        <label for="password">Mot de Passe :</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="btns">
                        <div class="btn-container">
                            <button class="btn" type="submit">Se connecter</button>
                            <br>
                        </div>
                        <div>
                            <button class="btn">
                                <a href="page-inscription.php">S'inscrire</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include "footer.php" ?>

</body>

</html>