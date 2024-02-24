<?php

include_once 'database.php';
$db_table = "equipe";
$database = new Database();
$conn = $database->getConnection();
$sqlQuery = " SELECT * from " . $db_table;
$stmt = $conn->query($sqlQuery);
