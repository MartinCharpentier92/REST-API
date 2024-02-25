<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails des chercheurs</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

</head>

<body>

    <?php require_once('nav.php'); ?>

    <?php

    require_once('functions.php');

    $NC = $_GET['NC'];

    $sqlRequest = "SELECT * FROM chercheur WHERE NC = :NC";
    $stmt = $conn->prepare($sqlRequest);
    $stmt->bindParam(":NC", $NC);
    $stmt->execute();
    $chercheur = $stmt->fetch(); // Utilisez fetch() au lieu de fetchAll()
    $nom = $chercheur["NOM"];
    $prenom = $chercheur["PRENOM"];
    $NC = $chercheur["NC"];
    $NE = $chercheur["NE"];

    ?>

    <div>
        <h1>
            <?php echo "<h1> $nom $prenom </h1>"; ?>
        </h1>
    </div>

    <a class="bouton photo" href="Javascript:history.go(-1)">
        < Retour </a>


            <?php
            // Récupérer le nom du projet de l'équipe
            $sqlRequest = "SELECT * FROM projet WHERE NE = :NE";
            $stmt = $conn->prepare($sqlRequest);
            $stmt->bindParam(":NE", $NE);
            $stmt->execute();
            $projet = $stmt->fetchAll();
            $nomProjet = $projet["NOM"];

            ?>


            <div>
                <p>
                    Numéro : <?php echo " $NC "; ?> <br>
                    Nom : <?php echo " $nom"; ?> <br>
                    Prenom : <?php echo "$prenom"; ?> <br>
                    Numéro d'équipe : <?php echo " $NE"; ?> <br>
                    Nom des projets en cours par l'équipe :
                    <?php
                    echo "<ul>";
                    foreach ($projet as $projets) {
                        echo "<li>" . $projets["NOM"] . "</li>";
                    }
                    echo "</ul>";
                    ?>
                </p>
            </div>







            <?php ?>
</body>

</html>