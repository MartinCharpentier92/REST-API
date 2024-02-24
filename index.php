<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>    
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <h1>Projet développement FullStack</h1>

    <div>
        <form action="php/action.php" method=post>

        <div>
            <label for="NE">Numéro d'équipe :</label>
            <input type="text" name="NE" id="NE" >
        </div>

        <div>
            <label for="NOM">Nom :</label>
            <input type="text" name="NOM" id="NOM">
        </div>

        <div>
            <input type="submit" class="submit" value="Envoyer" >
        </div>

        </form>


    </div>

    <a href="php/allProject.php">Voir tous les projets</a>

</body>

</html>