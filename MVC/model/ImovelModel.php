<?php 
class Imovel {
    private int $id;
    private int $id_imobiliaria;
    private string $tipo;
    private float $valor;
    private string $bairro;
    private string $descricao;
    private string $situacao;
    private ?string $foto = null;

    public function getID ()           : int     { return $this->id; }
    public function getIdImobiliaria() : int     { return $this->id_imobiliaria; }
    public function getTipo()          : string  { return $this->tipo; } 
    public function getValor()         : float   { return $this->valor; }
    public function getBairro()        : string  { return $this->bairro; }
    public function getDescricao()     : string  { return $this->descricao; }
    public function getSituacao()      : string  { return $this->situacao; }
    public function getFoto()          : ?string { return $this->foto; }
    
    public function setIdImobiliaria(int $_id_imobiliaria) : void   { $this->id_imobiliaria = $_id_imobiliaria; }
    public function setTipo(string $_tipo)                 : void   { $this->tipo = $_tipo; }
    public function setValor(float $_valor)                : void   { $this->valor = $_valor; }
    public function setBairro(string $_bairro)             : void   { $this->bairro = $_bairro; }
    public function setDescricao(string $_desc)            : void   { $this->descricao = $_desc; }
    public function setSituacao(string $_situacao)         : void   { $this->situacao = $_situacao; }
    public function setFoto(?string $_foto)                : void   { $this->foto = $_foto; }
}

?>