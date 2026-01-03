<?php

class Database
{
    private string $host = "localhost";
    private string $db_name = "dgarden";
    private string $username = "root";
    private string $password = "";
    private ?PDO $conn = null;

    public function __construct()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";

            $this->conn = new PDO(
                $dsn,
                $this->username,
                $this->password,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (PDOException $e) {
            // Never echo DB errors in production
            throw new RuntimeException("Database connection failed.");
        }
    }

    public function getConnection(): PDO
    {
        return $this->conn;
    }
}
