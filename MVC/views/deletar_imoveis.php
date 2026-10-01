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
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Wellersons | Deletar Imóvel</title>
</head>
<style>
    body { background: rgb(246, 252, 255); }
    .nav-link a { font-size: 1.2rem !important; text-decoration: none !important; }
    
    .nav-link svg { 
        fill: #ffffff; 
        width: 50px; 
        height: 50px;
        transition: fill 0.2s ease;
    }

    a:hover .icon-twitter   { fill: rgb(125, 221, 250); }
    a:hover .icon-instagram { fill: rgb(255, 158, 247); }
    a:hover .icon-facebook  { fill: rgb(125, 165, 250); }


    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        height: 44px;
        background-color: #fff;
        background-image: url('../../images/icons/icon-seta-espaco-usuario.svg');
        background-repeat: no-repeat; 
        background-position-x: calc(100% - 12px);
        background-position-y: calc(50% + 3px);
        background-size: 20px;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0 50px 0 14px;
        font-size: 1.1rem;
        color: #333;
        cursor: pointer;
        outline: none;
        width: 100%; 
    }
    
    select:focus  { border-color: #777; box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.08); }
</style>
<body>
    <div class="container-fluid d-flex flex-column gap-5">
        <div class="navbar align-items-center justify-content-between px-4 mt-2 gap-4 bg-dark rounded-5">
            <div class="text-white display-2"> WELLERSONS </div>
            <div class="d-flex gap-4 align-items-center">
                <button class="btn btn-dark m-2 fs-3 px-3 rounded-4 border-white" onclick="window.location.href = 'index.php'"> Voltar </button>
            </div>
        </div>
        <div class="row justify-content-center my-5 px-3">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow border-0 rounded-4 p-4 p-md-5">
                    <h2 class="display-6 text-center text-dark mb-2">Deletar Imóveis</h2>
                    <p class="text-muted text-center mb-4">Selecione o imóvel que deseja remover permanentemente do sistema.</p>
                    <form action="../controller/imovel_controller.php?action=deletar" method="post" class="d-flex flex-column gap-4">
                        <input type="hidden" name="action" value="deletar">
                        <div class="form-group">
                            <label class="form-label fs-5 fw-bold text-secondary mb-2" for="id-imovel">Imóvel para exclusão:</label>
                            <select name="inserir-id-imovel-deletar" id="id-imovel" required>
                                <option value="" selected disabled hidden>Selecione o imóvel a ser deletado...</option>
                                <?php if (!empty($modelo)) : ?>
                                    <?php foreach ($modelo as $item): ?>
                                        <option value="<?= $item['ID']; ?>"> 
                                            <?= htmlspecialchars($item['Tipo']) . " - " . htmlspecialchars($item['Bairro']); ?> 
                                        </option>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <option value="" disabled>Nenhum imóvel encontrado no banco</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger btn-lg rounded-3 py-2 fs-5 mt-2 shadow-sm">
                            Excluir Imóvel do Sistema
                        </button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</body>
</html>
