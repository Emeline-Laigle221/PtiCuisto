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
    <?php include("header.php"); ?>

    <main>
        <div class="connexion">
            <div class="connect-p1">
                <h3>Inscription</h3>
            </div>
            <div class="connect-p2">
                <form action="index.php?page=inscription&formulaire=true" method="post">
                    <div class="input">
                        <?php
                        if (isset($_GET['error'])) {
                            echo "<p style=\"color:red;\">Ce compte existe déjà</p>";
                        }
                        ?>
                        <div>
                            <label for="nom">Pseudo : </label>
                            <input type="text" id="nom" name="nom" placeholder="Princecorg" required>
                        </div>
                        <div>
                            <label for="prenom">Nom : </label>
                            <input type="text" id="prenom" name="prenom" placeholder="Vallot" required>
                        </div>
                        <div>
                            <label for="pseudo">Prenom : </label>
                            <input type="text" id="pseudo" name="pseudo" placeholder="Christophe" required>
                        </div>
                        <div>
                            <label for="email">Adresse Email :</label>
                            <input type="email" id="email" name="email" placeholder="email@example.com" required>
                            <br>
                        </div>
                        <div>
                            <label for="password">Mot de Passe :</label>
                            <input type="password" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="btns">
                        <button class="btn" type="submit">S'incrire</button>
                        <div class="btn-container">
                            <button class="link">
                                <a href="index.php?page=connexion">J'ai déjà un compte</a>
                                <br>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php include("footer.php");?>
</body>

</html>