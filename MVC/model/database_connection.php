<?php 
class Database {
    private string $host          = "localhost"; 
    private string $database_name = "imobiliarias_imoveis_database";
    private string $user_name     = "root";
    private string $password      = "root"; 
    private int $port             = 3306;
    
    public function database_connect() : PDO {
        try {
            $pdo = new PDO (
                "mysql:host={$this->host};port={$this->port};dbname={$this->database_name};charset=utf8mb4",
                $this->user_name,
                $this->password,
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch (PDOException $e) {
            die("Erro ao conectar com o banco: ". $e->getMessage());
        }
    }
}

?>