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
    <header>
        <img src="../img/Logo.png" alt="Logo">
        <nav>
            <div><a href="../index.php">Accueil</a></div>
            <div><a href="">Nos Recettes</a></div>
            <div><a href="Filtre.php">Filtres</a></div>
            <div><a href="connexion.php">Connexion</a></div>
        </nav>
    </header>
    <main>
        <div class="connexion">
            <div class="connect-p1"><h3>Connexion</h3></div>
            <div class="connect-p2">
                <form>
                    <div>
                        <label for="email">Adresse Email :</label>
                        <input type="email" id="email"
                            placeholder="email@example.com"><br>
                    </div>
                    <div>
                        <label for="password">Mot de Passe :</label>
                        <input type="password" id="password"
                            placeholder="Password">
                    </div>
                    <div class="btns">
                        <div class="btn-container">
                            <button class="btn" type="submit">Se connecter</button>
                            <br>
                        </div>
                        <div>
                            <button class="btn" type="submit">
                                <a href="page-inscription.php">S'inscrire</a>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="reseaux">
            <a target="_blank_" href="https://www.facebook.com" >
                <img src="../img/facebook.jpg" alt="Facebook">
            </a>
            <a target="_blank_" href="https://X.com">
                <img src="../img/X.png" alt="X">
            </a>
            <a target="_blank_" href="https://fr.linkedin.com">
                <img src="../img/linkedin.png" alt="LinkedIn">
            </a>
        </div>
    </footer>
</body>

</html>