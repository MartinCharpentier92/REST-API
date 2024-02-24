<?php

header( "Access-Control-Allow-Origin: *");
include_once 'database.php';
$db_table = "projet";

$database = new Database();
$conn = $database->getConnection();
$sqlQuery = " SELECT * from ". $db_table . " where np= :np" ;
$stmt = $conn->prepare($sqlQuery);
$stmt->bindParam ("np", $_GET['np']);
$stmt->execute();
echo json_encode($stmt->fetch());

?>