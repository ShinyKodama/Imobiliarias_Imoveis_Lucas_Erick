<?php 
class Database {
    private string $host          = "localhost"; 
    private string $database_name = "imobiliarias_imoveis_database_lucas_erick";
    private string $user_name     = "root";
    private string $password      = "1234"; 
    private int $port             = 3307;
    
    public function database_connect() : PDO {
        try {
            $pdo = new PDO(
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