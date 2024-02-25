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


    // // Déterminer le sens de tri
    // $sortOrderChercheur = "ASC"; // Par défaut, tri croissant
    // if (isset($_GET['sort']) && $_GET['sort'] === 'desc') {
    //     $sortOrderChercheur = "DESC"; // Si l'utilisateur a spécifié un tri descendant
    // }

    // $newSortOrderChercheur = $sortOrderChercheur === 'ASC' ? 'desc' : 'asc';
    // echo "<a class='chercheur-tri' href='?sort=$newSortOrderChercheur'>Changer l'ordre de tri de l'équipe</a>";


    // $sqlRequest = "SELECT * FROM chercheur ORDER BY NC $sortOrderChercheur";
    // $stmt = $conn->prepare($sqlRequest);
    // $stmt->execute();
    // $chercheur = $stmt->fetchAll();



    //require_once('tri/chercheur_triEquipe.php');


    // Pour les chercheurs :
    // $sortOrderChercheur = "ASC"; // Par défaut, tri croissant
    // if (isset($_GET['sort']) && $_GET['sort'] === 'desc') {
    //     $sortOrderChercheur = "DESC"; // Si l'utilisateur a spécifié un tri descendant
    // }

    // $newSortOrderChercheur = $sortOrderChercheur === 'ASC' ? 'desc' : 'asc';
    // echo "<a class='chercheur-tri' href='?sort=$newSortOrderChercheur'>Changer l'ordre de tri des chercheurs</a>";


    // $sqlRequest = "SELECT * FROM chercheur ORDER BY NC $sortOrderChercheur";
    // $stmt = $conn->prepare($sqlRequest);
    // $stmt->execute();
    // $chercheur = $stmt->fetchAll();

    // echo "<table class='chercheur-liste'>";
    // echo "<tr><th>Numéro du chercheur</th><th>Nom</th><th>Prénom</th><th>Numéro d'équipes</th><th>Actions</th></tr>";
    // foreach ($chercheur as $chercheurs) {
    //     echo "<tr>
    //         <td>" . $chercheurs["NC"] . "</td>
    //         <td>" . $chercheurs["NOM"] . "</td>
    //         <td>" . $chercheurs["PRENOM"] . "</td>
    //         <td>";

    //     if ($chercheurs["NE"] == 0) {
    //         echo "Aucune équipe de travail";
    //     } else {
    //         echo $chercheurs["NE"];
    //     }
    //     echo "</td> 
    //         <td>
    //         <a href='chercheur_show.php?NE=" . $chercheurs["NE"] . "'>Détails</a>
    //         <a href='chercheur_update.php?NE=" . $chercheurs["NE"] . "'>Modifier</a>
    //         </td>
    //     </tr>";
    // }
    // echo "</table>";


    // Vérifier le type de tri souhaité (chercheur ou équipe)
    $tri = isset($_GET['tri']) ? $_GET['tri'] : ''; // Récupérer la valeur de tri depuis l'URL

    // Déterminer le sens de tri
    $sortOrder = "ASC"; // Par défaut, tri croissant
    if (isset($_GET['sort']) && $_GET['sort'] === 'desc') {
        $sortOrder = "DESC"; // Si l'utilisateur a spécifié un tri descendant
    }

    // Affichage du lien pour changer l'ordre de tri en fonction du type de tri
    $newSortOrder = $sortOrder === 'ASC' ? 'desc' : 'asc';
    echo "<a class='chercheur-tri' href='?sort=$newSortOrder&tri=chercheur'>Trier par chercheur</a>";
    echo "<a class='chercheur-tri' href='?sort=$newSortOrder&tri=equipe'>Trier par équipe</a>";

    // Déterminer la requête SQL en fonction du type de tri
    if ($tri === 'chercheur') {
        $sqlRequest = "SELECT * FROM chercheur ORDER BY NC $sortOrder"; // Tri par chercheur
    } elseif ($tri === 'equipe') {
        $sqlRequest = "SELECT * FROM chercheur ORDER BY NE $sortOrder"; // Tri par équipe
    } else {
        // Par défaut, tri par chercheur
        $sqlRequest = "SELECT * FROM chercheur ORDER BY NC $sortOrder";
    }

    // Exécuter la requête SQL
    $stmt = $conn->prepare($sqlRequest);
    $stmt->execute();
    $chercheurs = $stmt->fetchAll();

    // Affichage des résultats
    echo "<table class='chercheur-liste'>";
    echo "<tr><th>Numéro du chercheur</th><th>Nom</th><th>Prénom</th><th>Numéro d'équipes</th><th>Actions</th></tr>";
    foreach ($chercheurs as $chercheur) {
        echo "<tr>
            <td>" . $chercheur["NC"] . "</td>
            <td>" . $chercheur["NOM"] . "</td>
            <td>" . $chercheur["PRENOM"] . "</td>
            <td>";

        if ($chercheur["NE"] == 0) {
            echo "Aucune équipe de travail";
        } else {
            echo $chercheur["NE"];
        }
        echo "</td> 
            <td>
            <a href='chercheur_show.php?NC=" .$chercheur["NC"]. "'>Détails</a>
            <a href='chercheur_update.php?NC=" . $chercheur["NC"] . "'>Modifier</a>
            <a href='chercheur_del.php?NC=" . $chercheur["NC"] . "' onclick=\"return confirm('Etes-vous sûr ?')\">Supprimer</a>
            </td>
        </tr>";
    }
    echo "</table>";

    ?>



    <div class="chercheur-form">
        <form action="chercheur_add.php" method="POST">

            <h2>Nouveau chercheur</h2>
            <div>
                <label for="NC">Numéro de chercheur :</label>
                <input type="text" name="NC" id="NC" required>
            </div>


            <div>
                <label for="NAME">Nom :</label>
                <input type="text" name="NOM" id="NOM" required>
            </div>

            <div>
                <label for="NAME">Prénom :</label>
                <input type="text" name="PRENOM" id="PRENOM" required>
            </div>

            <div>
                <label for="NE">Numéro d'équipe :</label>
                <input type="text" name="NE" id="NE" required>
            </div>

            <div>
                <input type="submit" value="Créer">
            </div>



        </form>
    </div>


</body>

</html>

<?php require_once('database.php'); ?>