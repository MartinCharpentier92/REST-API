<?php

include_once 'php/database.php';
$db_table = "recherche";
$data = json_decode(file_get_contents("php://input"));

$nom = $data->nom;
$prenom = $data->prenom;

$database = new Database();
$conn = $database->getConnection();
$sqlQuery = "INSERT INTO " . $db_table . " SET
                                        nom = :nom, prenom = :prenom";

$stmt = $conn->prepare($sqlQuery);
$stmt->bindParam(":nom",$nom);
$stmt->bindParam(":prenom",$prenom);

if ($stmt->execute()) {
    echo "Created";
} else {
    echo "Failed";
}
