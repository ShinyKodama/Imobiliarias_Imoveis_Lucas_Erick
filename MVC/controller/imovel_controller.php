<?php 
include("../model/database_connection.php");
include("../model/imovel_model.php");

class ImovelController {
    public function inserir_imoveis() {
        $database = new Database();
        $pdo = $database->database_connect();
        
        $imovel = new Imovel();

        $imovel->set_id_imobiliaria((int) $_POST['IDImobiliaria']);
        $imovel->set_tipo($_POST['input-tipo-imovel']);
        $imovel->set_valor((float) $_POST['input-valor-imovel']);
        $imovel->set_bairro($_POST['input-bairro-imovel']);
        $imovel->set_descricao($_POST['input-descricao-imovel']);
        $imovel->set_situacao($_POST['input-situacao-imovel']);

        $foto = file_get_contents($_FILES['input-foto-imovel']['tmp_name']);
        if (isset($_FILES['input-foto-imovel']) && $_FILES['input-foto-imovel']['error'] === UPLOAD_ERR_OK) {
            $foto = file_get_contents(
                $_FILES['input-foto-imovel']['tmp_name']
            );

            $imovel->set_foto($foto);
        }

        $sql = "
            INSERT INTO imovel (IDImobiliaria, Tipo, Valor, Bairro, Descricao, Foto, Situacao) VALUES
            (:IDImobiliaria, :Tipo, :Valor, :Bairro, :Descricao, :Foto, :Situacao)
        ";

        $st = $pdo->prepare($sql);
        
        $st->bindValue(':IDImobiliaria', $imovel->get_id_imobiliaria());
        $st->bindValue(':Tipo', $imovel->get_tipo());
        $st->bindValue(':Valor', $imovel->get_valor());
        $st->bindValue(':Bairro', $imovel->get_bairro());
        $st->bindValue(':Descricao', $imovel->get_descricao());
        $st->bindValue(':Foto', $imovel->get_foto(), PDO::PARAM_LOB);
        $st->bindValue(':Situacao', $imovel->get_situacao());

        $st->execute();
    }
}
?>