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

    <header>
        <nav id="navbar">
            <ul>
                <div class="nav-links">
                    <li><a href="allProject.php">Les projets</a></li>
                    <li><a href="">Les équipes</a></li>
                    <li><a href="">Les chercheurs</a></li>
                </div>
            </ul>
        </nav>
    </header>

    <a class="bouton photo" href="Javascript:history.go(-1)"> < Retour</a>

    <div class="project-h1">
        <h1>Les projets</h1>
    </div>


    <?php

    include_once 'database.php';
    $db_table = "projet";
    $database = new Database();
    $conn = $database->getConnection();
    $sqlQuery = " SELECT * from " . $db_table;
    $stmt = $conn->query($sqlQuery);
    $projet = $stmt->fetchAll();

    ?>

    <div class="project-table">

        <?php

        echo "<table>";
        foreach ($projet as $projets) {
            echo "<tr><td>Numéro de projet</td><td>" . $projets["NP"] . "</td></tr>";
            echo "<tr><td>Nom du projet</td><td>" . $projets["NOM"] . "</td></tr>";
            echo "<tr><td>Budget</td><td>" . $projets["BUDGET"] . "</td></tr>";
            echo "<tr><td>Numéro de l'équipe:</td><td>" . $projets["NE"] . "</td></tr>";
        }
        echo "</table>";
        ?>

    </div>




</body>

</html>

<?php
