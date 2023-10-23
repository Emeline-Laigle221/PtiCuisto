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
    <?php include "header.php"?>

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

    <?php include "footer.php"?>
</body>
</html>