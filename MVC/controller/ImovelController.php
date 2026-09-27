<?php 
include("../model/database_connection.php");
include("../model/ImovelModel.php");

class ImovelController {
    public function inserir_imoveis() {
        $database = new Database();
        $pdo = $database->database_connect();

        $id_imobiliaria = $_POST['IDImobiliaria'];
        $tipo           = $_POST['Tipo'];
        $valor          = $_POST['Valor'];
        $bairro         = $_POST['Bairro'];
        $descricao      = $_POST['Descricao'];
        $situacao       = $_POST['Situacao'];

        $foto = file_get_contents($_FILES['Foto']['tmp_name']);

        $sql = "
            INSERT INTO imovel (IDImobiliaria, Tipo, Valor, Bairro, Descricao, Foto, Situacao) VALUES
            (:IDImobiliaria, :Tipo, :Valor, :Bairro, :Descricao, :Foto, :Situacao)
        ";

        $st = $pdo->prepare($sql);

        $st->bindValue(':IDImobiliaria', $id_imobiliaria);
        $st->bindValue(':Tipo', $tipo);
        $st->bindValue(':Valor', $valor);
        $st->bindValue(':Bairro', $bairro);
        $st->bindValue(':Descricao', $descricao);
        $st->bindValue(':Foto', $foto, PDO::PARAM_LOB);
        $st->bindValue(':Situacao', $situacao);

        $st->execute();
    }

}
?>