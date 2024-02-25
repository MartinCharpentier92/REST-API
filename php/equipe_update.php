<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification de l'équipe</title>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

</head>

<body>


    <?php
    require_once('nav.php')
    ?>

    <h1>Modification de l'équipe</h1>

    <?php
    
    require_once("functions.php");

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $NE = $_POST['NE'];
        $nouveauNom = $_POST['nouveauNom'];

        $sqlUpdate = "UPDATE equipe SET NOM = :nouveauNom WHERE NE = :NE";
        $stmt = $conn->prepare($sqlUpdate);
        $stmt->bindParam(':nouveauNom', $nouveauNom);
        $stmt->bindParam(':NE', $NE);

        
        if ($stmt->execute()) {
            
            header('Location: equipe.php?msg=Nom de l\'équipe modifié avec succès');
            exit();
        } else {
            echo "Une erreur s'est produite lors de la modification du nom de l'équipe.";
        }
    }
    
    $NE = $_GET['NE'];
    
    ?>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="NE" value="<?php echo $NE; ?>">
        <label for="nouveauNom">Nouveau nom de l'équipe :</label><br>
        <input type="text" id="nouveauNom" name="nouveauNom" required><br>
        <input type="submit" value="Modifier le nom de l'équipe">
    </form>



</body>

</html>