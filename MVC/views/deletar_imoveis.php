<!DOCTYPE html>

<?php 
include_once('../controller/imovel_controller.php'); 
include_once('../model/imovel_model.php'); 

$imovel = new Imovel();
$modelo = $imovel->listar_imoveis();

?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellersons | Deletar Imóvel </title>
</head>
<body>
    <form action="../controller/imovel_controller.php?action=deletar" method="post">
        <input type="hidden" name="action" value="deletar">
        <select name="inserir-id-imovel-deletar" required>
            <option value="" selected disabled hidden> Selecione o imóvel a ser deletado </option>
            <?php if (!empty($modelo)) : ?>
                <?php foreach ($modelo as $item): ?>
                    <option value="<?= $item['ID']; ?>"> <?= $item['Tipo'] . " - " . $item['Bairro']; ?> </option>
                <?php endforeach ?>
            <?php else: ?>
                <option value="" disabled>Nenhum imóvel encontrado no banco</option>
            <?php endif; ?>
        </select>
        <button type="submit">Deletar</button>
    </form>

</body>
</html>