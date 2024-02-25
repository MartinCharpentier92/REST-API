<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les projets</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>

    <?php
    require_once("nav.php");
    require_once("database.php");
    ?>

    <a class="bouton photo" href="Javascript:history.go(-1)">
        Retour</a>

    <div class="project-h1">
        <h1>Les projets</h1>
    </div>

    <?php

    require_once('functions.php');

    

    // Vérifier le type de tri souhaité (chercheur ou équipe)
    $tri = isset($_GET['tri']) ? $_GET['tri'] : ''; // Récupérer la valeur de tri depuis l'URL

    // Déterminer le sens de tri
    $sortOrder = "ASC"; // Par défaut, tri croissant
    if (isset($_GET['sort']) && $_GET['sort'] === 'desc') {
        $sortOrder = "DESC"; // Si l'utilisateur a spécifié un tri descendant
    }

    // Affichage du lien pour changer l'ordre de tri en fonction du type de tri
    $newSortOrder = $sortOrder === 'ASC' ? 'desc' : 'asc';
    echo "<a class='chercheur-tri' href='?sort=$newSortOrder&tri=budget'>Trier par budget</a>";
    echo "<a class='chercheur-tri' href='?sort=$newSortOrder&tri=equipe'>Trier par équipe</a>";

    // Déterminer la requête SQL en fonction du type de tri
    if ($tri === 'budget') {
        $sqlRequest = "SELECT * FROM projet ORDER BY BUDGET $sortOrder"; // Tri par budget
    } elseif ($tri === 'equipe') {
        $sqlRequest = "SELECT * FROM projet ORDER BY NE $sortOrder"; // Tri par équipe
    } else {
        // Par défaut, tri par chercheur
        $sqlRequest = "SELECT * FROM projet";
    }
    
    $stmt = $conn->query($sqlRequest);
    $stmt->execute();
    $projet = $stmt->fetchAll();

    echo "<table class='projet-liste'>";
    echo "<tr><th>Numéro du projet</th><th>Nom du projet</th><th>Budget</th><th>Numéro de l'équipe</th><th>Actions</th></tr>";
    foreach ($projet as $projets) {
        echo "<tr>
            <td>" . $projets["NP"] . "</td>
            <td>" . $projets["NOM"] . "</td>
            <td>" . $projets["BUDGET"] . "</td>
            <td>" . $projets["NE"] . "</td>
            <td><a href='project_show.php?NP=" .$projets["NP"]. "'>Détails</a></td>
            </tr>";
            
        
    }
    echo "</table>";

    ?>





</body>

</html>

<?php
