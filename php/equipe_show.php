<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre de l'équipe </title>

    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

</head>

<body>

    <?php
    require_once("nav.php");
    ?>

    <h1>Voici les membres de l'équipes</h1>
    
    
    
    <?php
    require_once("functions.php");

    $NE = $_GET['NE'];

    $sqlRequest = "SELECT * FROM chercheur WHERE NE = :NE";
    $stmt = $conn->prepare($sqlRequest);
    $stmt->bindParam(":NE", $NE);
    $stmt->execute();
    $chercheurs = $stmt->fetchAll();

    echo "<table>";
    echo "<tr><th>Nom</th><th>Prénom</th></tr>";
    foreach ($chercheurs as $chercheur) {
        echo "<tr>
        <td>" . $chercheur["NOM"] . "</td>
        <td>" . $chercheur["PRENOM"] . "</td>
    
    </tr>";
    }
    echo "</table>";
    ?>


    

</body>

</html>