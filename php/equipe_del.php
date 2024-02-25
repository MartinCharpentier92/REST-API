<?php

require_once("functions.php");

$NE = $_GET['NE'];

$sqlRequest = "DELETE FROM equipe WHERE NE = :NE";
$stmt = $conn->prepare($sqlRequest);
$stmt->bindParam(":NE", $NE);
$stmt->execute();


header('Location: equipe.php?msg=Personnage bien supprimé !');

?>