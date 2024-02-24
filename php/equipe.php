<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    require_once("nav.php");
    ?>

    <h1>Toutes les équipes !</h1>

    <?php

    //Affichage du message de succès quand une nouvelle équipe a bien été créé
    session_start();
    if (isset($_SESSION['insert_success']) && $_SESSION['insert_success'] === true) {
        echo "Nouvelle équipe bien ajouté";
        unset($_SESSION['insert_success']);
    }
    ?>

    <?php

    //Affichage du tableau contenant les équipes de travail
    require_once("functions.php");

    $equipe = $stmt->fetchAll();

    echo "<table>";
    echo "<tr><th>Numéro de l'équipe</th><th>Nom de l'équipe</th><th>Actions</th></tr>";
    foreach ($equipe as $equipes) {
        echo "<tr>
            <td>" . $equipes["NE"] . "</td>
            <td>" . $equipes["NOM"] . "</td>
            <td>
            <a href='equipe_show.php?NE=" . $equipes["NE"] . "'>Détails</a>
            <a href='equipe_update.php?NE=" . $equipes["NE"] . "'>Modifier</a>
            <a href='equipe_del.php?NE=" . $equipes["NE"] . "' onclick=\"return confirm('Etes-vous sûr ?')\">Supprimer</a>
            </td>
        </tr>";
    }
    echo "</table>";

    ?>


    


</body>

</html>