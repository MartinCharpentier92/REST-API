<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les chercheurs</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <?php require_once('nav.php'); ?>

    <h1 class="chercheur-h1">Les chercheurs</h1>


    <?php

    require_once("functions.php");

    // Déterminer le sens de tri
    $sortOrder = "ASC"; // Par défaut, tri croissant
    if (isset($_GET['sort']) && $_GET['sort'] === 'desc') {
        $sortOrder = "DESC"; // Si l'utilisateur a spécifié un tri descendant
    }

    // Affichage du lien pour changer l'ordre de tri
    $newSortOrder = $sortOrder === 'ASC' ? 'desc' : 'asc';
    echo "<a class='chercheur-tri' href='?sort=$newSortOrder'>Changer l'ordre de tri</a>";


    $sqlRequest = "SELECT * FROM chercheur ORDER BY NE $sortOrder";
    $stmt = $conn->prepare($sqlRequest);
    $stmt->execute();
    $chercheur = $stmt->fetchAll();


    echo "<table class='chercheur-liste'>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Numéro d'équipes</th><th>Actions</th></tr>";
    foreach ($chercheur as $chercheurs) {
        echo "<tr>
        <td>" . $chercheurs["NOM"] . "</td>
        <td>" . $chercheurs["PRENOM"] . "</td>
        <td>";

        if ($chercheurs["NE"] == 0) {
            echo "Aucune équipe de travail";
        } else {
            echo $chercheurs["NE"];
        }
        echo "</td> 
        <td>
        <a href='chercheur_show.php?NE=" . $chercheurs["NE"] . "'>Détails</a>
        <a href='chercheur_update.php?NE=" . $chercheurs["NE"] . "'>Modifier</a>
        </td>
    </tr>";
    }
    echo "</table>";

    ?>




</body>

</html>

<?php require_once('database.php'); ?>