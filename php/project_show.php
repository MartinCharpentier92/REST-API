<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

</head>

<body>


    <?php
    require_once('functions.php');

    $NP = $_GET["NP"];

    $sqlRequest = "SELECT * FROM projet WHERE NP = :NP";
    $stmt = $conn->prepare($sqlRequest);
    $stmt->bindParam(":NP", $NP);
    $stmt->execute();
    $projet = $stmt->fetch();
    $NOM = $projet["NOM"];
    $PRENOM = $projet["BUDGET"];
    $NP = $projet["NP"];
    $NE = $projet["NE"];

    require_once("nav.php");
    ?>

    <a class="bouton photo" href="Javascript:history.go(-1)">
        Retour </a>

    <h1>Plus d'informations sur <?php echo $NOM ?></h1>


    <div>
        <p>
            Identifiant du projet: <?php echo " $NP "; ?> <br>
            Nom : <?php echo " $NOM"; ?> <br>
            Budget: <?php echo "$PRENOM"; ?> <br>
            Numéro d'équipe : <?php echo " $NE"; ?> <br>

        </p>
    </div>




</body>

</html>