<?php

require_once('database.php');

$db_table = "equipe";
$NE = $_POST["NE"];
$NOM = $_POST["NOM"];


$database = new Database();
$conn = $database->getConnection();


// Vérifier si NE existe déjà
$checkQuery = "SELECT NE FROM " . $db_table . " WHERE NE = :NE";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bindParam(":NE", $NE);
$checkStmt->execute();

if ($checkStmt->rowCount() > 0) {
    echo "Ce numéro d'équipe existe déjà";
    header("Location: ../index.php");
} else {
    // Insérer les données si NE n'existe pas
    $insertQuery = "INSERT INTO " . $db_table . " (NE, NOM) VALUES (:NE, :NOM)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bindParam(":NE", $NE);
    $insertStmt->bindParam(":NOM", $NOM);

    if ($insertStmt->execute()) {
        echo "Created";
    } else {
        echo "Failed";
    }
}