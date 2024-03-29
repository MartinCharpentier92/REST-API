<?php

class Database
{
    private $host = "localhost";

    private $db = "recherche";

    private $user = "root";

    private $pass = "";

    public $conn;

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db, $this->user, $this->pass);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Database connection failed: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
