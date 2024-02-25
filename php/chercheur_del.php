<?php


require_once("functions.php");

$NC = $_GET['NC'];

$sqlRequest = "DELETE FROM chercheur WHERE NC = :NC";
$stmt = $conn->prepare($sqlRequest);
$stmt->bindParam(":NC", $NC);
$stmt->execute();


header('Location: chercheur.php?msg=Personnage bien supprimé !');

?>