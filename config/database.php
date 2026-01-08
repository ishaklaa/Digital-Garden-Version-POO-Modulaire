<?php



class Database
{
    private string $host = "localhost";
    private string $db_name = "dgarden";
    private string $username = "root";
    private string $password = "";
    private static ?Database $instance = null;
    private PDO $connection;
    private function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";
        $this->connection = new PDO(
            $dsn,
            $this->username,
            $this->password            
        );
    }
    public static function getInstance(): ?Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
