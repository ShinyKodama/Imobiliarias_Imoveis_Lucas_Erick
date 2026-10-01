<!DOCTYPE html>
<?php 
include_once('../controller/imovel_controller.php'); 
include_once('../controller/imobiliaria_controller.php');
include_once('../model/imovel_model.php'); 
include_once('../model/imobiliaria_model.php'); 

$imobiliaria = new Imobiliaria();
$modelo      = $imobiliaria->listar_imobiliarias();
?>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Wellersons | Inserir Imóveis</title>
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
        <div class="row justify-content-center my-4 px-3">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow border-0 rounded-4 p-4 p-md-5">
                    <h2 class="display-6 text-center text-dark mb-4">Inserir Imóveis</h2>
                    <form action="../controller/imovel_controller.php?action=inserir" method="POST" enctype="multipart/form-data" class="d-flex flex-column gap-4">
                        <input type="hidden" name="action" value="inserir">
                        <div class="form-group">
                            <select name="input-id-imobiliaria" required>
                               <?php if (!empty($modelo)) : ?>
                                    <option value="" disabled selected hidden> Selecione a Imobiliária </option>
                                    <?php foreach ($modelo as $item): ?>
                                        <option value="<?= $item['ID'] ?>"> <?= htmlspecialchars($item['Nome']) . " - " . htmlspecialchars($item['Telefone']); ?> </option>
                                    <?php endforeach ?>
                                <?php else: ?>
                                    <option value="" disabled>Nenhuma imobiliária encontrada no banco</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="input-tipo-imovel" placeholder="Tipo" class="form-control form-control-lg fs-6" style="border-radius: 8px; border: 1px solid #d1d5db;" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="input-valor-imovel" placeholder="Valor (R$)" class="form-control form-control-lg fs-6" style="border-radius: 8px; border: 1px solid #d1d5db;" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="input-bairro-imovel" placeholder="Bairro" class="form-control form-control-lg fs-6" style="border-radius: 8px; border: 1px solid #d1d5db;" required>
                        </div>
                        <div class="form-group">
                            <textarea name="input-descricao-imovel" placeholder="Descrição" class="form-control form-control-lg fs-6" rows="4" style="border-radius: 8px; border: 1px solid #d1d5db;" required></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label text-secondary fw-bold ms-1 mb-1">Foto do Imóvel:</label>
                            <input type="file" name="input-foto-imovel" accept="image/*" class="form-control form-control-lg fs-6" style="border-radius: 8px; border: 1px solid #d1d5db;" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="input-situacao-imovel" placeholder="Situação" class="form-control form-control-lg fs-6" style="border-radius: 8px; border: 1px solid #d1d5db;" required>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg rounded-3 py-2 fs-5 mt-2 shadow-sm"> Cadastrar Imóvel </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
