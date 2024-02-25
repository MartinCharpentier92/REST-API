<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les équipes de travail</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    require_once("nav.php");
    ?>

    <h1>Les équipes de travail</h1>

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
        if ($equipes["NE"] != 0){
        echo "<tr>
            <td>" . $equipes["NE"] . "</td>
            <td>" . $equipes["NOM"] . "</td>
            <td>
            <a href='equipe_show.php?NE=" . $equipes["NE"] . "'>Détails</a>
            <a href='equipe_update.php?NE=" . $equipes["NE"] . "'>Modifier</a>
            
            </td>
        </tr>";
        }
    }
    echo "</table>";

    ?>

    <!-- <a href="equipe_show.php">Afficher les chercheurs qui n'ont pas d'équipes</a> 
    Faire un affiche de tous les chercheurs qui ont le  numéro d'équipes 0 -> pas d'équipe de travail en gros
    -->

    <h2>Ajouter une équipe </h2>


    <div>
        <form action="action.php" method=post>

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


    


</body>

</html>