<?php 
include_once('database_connection.php');

class Imobiliaria {
    private int $id;
    private string $nome;
    private string $telefone;
    private string $contato;
    public function set_id(int $_id)                : void { $this->id = $_id; }
    public function set_nome(string $_nome)         : void { $this->nome = $_nome; }
    public function set_telefone(string $_telefone) : void { $this->telefone = $_telefone; }
    public function set_contato(string $_contato)   : void { $this->contato = $_contato; }

    public function get_id()       : int    { return $this->id; }
    public function get_nome()     : string { return $this->nome; }
    public function get_telefone() : string { return $this->telefone; }
    public function get_contato()  : string { return $this->contato; }


    public function listar_imobiliarias() : array {
        $database = new Database();
        $pdo = $database->database_connect();

        $sql = " SELECT im.ID, im.Nome, im.Telefone, im.Contato FROM imobiliaria im ";

        $st = $pdo->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>