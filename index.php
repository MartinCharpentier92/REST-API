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

    <header>
        <nav id="navbar">
            <ul>
                <div class="nav-links">
                    <li><a href="php/allProject.php">Les projets</a></li>
                    <li><a href="php/equipe.php">Les équipes</a></li>
                    <li><a href="php/chercheur.php">Les chercheurs</a></li>
                </div>
            </ul>
        </nav>
    </header>

    <h1 class="main-h1">Projet développement FullStack</h1>



    <div>
        <form action="php/action.php" method=post>

            <h2 class="main-h2">Création d'une nouvelle équipe de travail</h2>

            <div>
                <label for="NE">Numéro d'équipe :</label>
                <input type="text" name="NE" id="NE" required autofocus>
            </div>

            <div>
                <label for="NOM">Nom :</label>
                <input type="text" name="NOM" id="NOM" required>
            </div>

            <div>
                <input type="submit" class="submit" value="Envoyer">
            </div>

        </form>


    </div>

    <a class="link" href="php/allProject.php">Voir tous les projets</a>

</body>

</html>