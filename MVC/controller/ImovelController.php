<?php 
include("../model/database_connection.php");
include("../model/ImovelModel.php");

class ImovelController {
    public function inserir_imoveis() {
        $database = new Database();
        $pdo = $database->database_connect();
        
        $imovel = new Imovel();

        $imovel->setIdImobiliaria((int) $_POST['IDImobiliaria']);
        $imovel->setTipo($_POST['Tipo']);
        $imovel->setValor((float) $_POST['Valor']);
        $imovel->setBairro($_POST['Bairro']);
        $imovel->setDescricao($_POST['Descricao']);
        $imovel->setSituacao($_POST['Situacao']);

        $foto = file_get_contents($_FILES['Foto']['tmp_name']);
        $imovel->setFoto($foto);

        $sql = "
            INSERT INTO imovel (IDImobiliaria, Tipo, Valor, Bairro, Descricao, Foto, Situacao) VALUES
            (:IDImobiliaria, :Tipo, :Valor, :Bairro, :Descricao, :Foto, :Situacao)
        ";

        $st = $pdo->prepare($sql);
        
        $st->bindValue(':IDImobiliaria', $imovel->getIdImobiliaria());
        $st->bindValue(':Tipo', $imovel->getTipo());
        $st->bindValue(':Valor', $imovel->getValor());
        $st->bindValue(':Bairro', $imovel->getBairro());
        $st->bindValue(':Descricao', $imovel->getDescricao());
        $st->bindValue(':Foto', $imovel->getFoto(), PDO::PARAM_LOB);
        $st->bindValue(':Situacao', $imovel->getSituacao());

        $st->execute();
    }

}
?>