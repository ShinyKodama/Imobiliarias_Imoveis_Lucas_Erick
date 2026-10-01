<?php 
include_once('database_connection.php');

class Imovel {
    private int $id;
    private int $id_imobiliaria;
    private string $tipo;
    private float $valor;
    private string $bairro;
    private string $descricao;
    private string $situacao;
    private ?string $foto = null;

    public function get_id()             : int     { return $this->id; }
    public function get_id_imobiliaria() : int     { return $this->id_imobiliaria; }
    public function get_tipo()           : string  { return $this->tipo; } 
    public function get_valor()          : float   { return $this->valor; }
    public function get_bairro()         : string  { return $this->bairro; }
    public function get_descricao()      : string  { return $this->descricao; }
    public function get_situacao()       : string  { return $this->situacao; }
    public function get_foto()           : ?string { return $this->foto; }
    
    public function set_id(int $_id)                         : void   { $this->id = $_id; }
    public function set_id_imobiliaria(int $_id_imobiliaria) : void   { $this->id_imobiliaria = $_id_imobiliaria; }
    public function set_tipo(string $_tipo)                  : void   { $this->tipo = $_tipo; }
    public function set_valor(float $_valor)                 : void   { $this->valor = $_valor; }
    public function set_bairro(string $_bairro)              : void   { $this->bairro = $_bairro; }
    public function set_descricao(string $_desc)             : void   { $this->descricao = $_desc; }
    public function set_situacao(string $_situacao)          : void   { $this->situacao = $_situacao; }
    public function set_foto(?string $_foto)                 : void   { $this->foto = $_foto; }

    public function listar_imoveis() : array {
        $database = new Database();
        $pdo = $database->database_connect();

        $sql = " 
            SELECT 
                i.ID, 
                i.Tipo, 
                i.Valor, 
                i.Bairro, 
                i.Descricao, 
                i.Foto, 
                i.Situacao, 
                im.Nome AS NomeImobiliaria,
                im.Telefone AS TelefoneImobiliaria
            FROM imovel i 
            INNER JOIN imobiliaria im 
                ON im.ID = i.IDImobiliaria; ";

        $st = $pdo->prepare($sql);
        $st->execute();

        return $st->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>