<?php 
include_once("../model/database_connection.php");
include_once("../model/imobiliaria_model.php");

class ImobiliariaController {
    public function inserir_imobiliaria() {
        $database = new Database();
        $pdo = $database->database_connect();
        
        $imobiliaria = new Imobiliaria();

        $imobiliaria->set_id((int) $_POST['']);
        $imobiliaria->set_nome($_POST['']);
        $imobiliaria->set_telefone( $_POST['']);
        $imobiliaria->set_contato($_POST['']);

        $sql = "
            INSERT INTO (Nome, Telefone, Contato) VALUES
            (:Nome, :Telefone, :Contato)
        ";

        $st = $pdo->prepare($sql);

        $st->bindValue(':ID', $imobiliaria->get_id());
        $st->bindValue(':Nome', $imobiliaria->get_nome());
        $st->bindValue(':Telefone', $imobiliaria->get_telefone());
        $st->bindValue(':Contato', $imobiliaria->get_contato());

        $st->execute();
        
        header("Location: ../views/index.php"); 
        exit;

    }
    public function deletar_imobiliaria() {
        $database = new Database();
        $pdo = $database->database_connect();

        $id = (int) $_POST['inserir-id-imobiliaria-deletar'];
        
        $sql = "DELETE FROM imobiliaria WHERE ID = :ID";
        
        $st = $pdo->prepare($sql);
        $st->bindValue(':ID', $id, PDO::PARAM_INT);
        $st->execute();
        
        header("Location: ../views/index.php"); 
        exit;
    }
}

$controller = new ImobiliariaController();
$action = $_GET['action'] ?? $_POST['action'] ?? 'listar';

switch ($action) {
    case 'inserir' : $controller->inserir_imobiliaria(); break;
    case 'deletar' : $controller->deletar_imobiliaria(); break;
}

?>