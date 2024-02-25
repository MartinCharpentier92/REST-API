<?php

require_once("database.php");

require_once("functions.php");

$db_table = "chercheur";
$NC = $_POST["NC"];
$NE = $_POST["NE"];
$NOM = $_POST["NOM"];
$PRENOM = $_POST["PRENOM"];

$checkQuery = "SELECT NC FROM ".$db_table." WHERE NC = :NC ";
$checkStmt = $conn->prepare($checkQuery);
$checkStmt->bindParam(":NC", $NC);
$checkStmt->execute();

if ($checkStmt->rowCount() > 0) {
    echo "Ce numéro d'équipe existe déjà";
} else{
    $insertQuery = "INSERT INTO ".$db_table."(NC,NOM,PRENOM,NE) VALUE (:NC,:NOM,:PRENOM,:NE)";
    $insertStmt = $conn->prepare($insertQuery);
    $insertStmt->bindParam(":NC", $NC);
    $insertStmt->bindParam(":NOM", $NOM);
    $insertStmt->bindParam(":PRENOM", $PRENOM);
    $insertStmt->bindParam(":NE", $NE);

    if($insertStmt->execute()){
        header('Location: chercheur.php');

        session_start();
        $_SESSION['insert_success'] = true;
        header('Location: chercheur.php');
        exit();
    }else{
        echo "Failed";
    }
}
