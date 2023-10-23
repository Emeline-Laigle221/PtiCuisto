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
        <form action="" method="post">
            <h4>Identifiez vous</h4>
            <br/>
            <label for="nom">
                Nom : 
            </label>
            <input type="text" name="nom" required><br />

            <label for="email">
                Adresse Mail :
            </label> 
            <input type="email" name="adresse_mail" required>
            <br/>

            <label for="password">
                Mot de passe :
            </label> 
            <input type="password" name="password" required>
            <br/>

            <input type="submit" value="S'inscrire">
        </form>
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