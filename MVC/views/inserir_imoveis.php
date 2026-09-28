<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <title>Wellersons | Inserir Imóveis </title>
</head>
<body>
    <button class="btn btn-dark m-2 fs-3 px-3 rounded-4" onclick="window.location.href = 'index.php'"> Voltar </button>
    <div class="d-flex justify-content-center">
        <h1 class="text-center m-5 bg-dark text-white rounded-4 p-3 w-25 shadow"> Inserir Imóveis </h1>
    </div>
    <form action="../controller/imovel_controller.php?action=inserir" method="POST" enctype="multipart/form-data" 
        class="d-flex justify-content-center align-items-center">
        
        <input type="hidden" name="action" value="inserir">

        <div class="d-flex flex-column gap-4 w-50 bg-dark p-5 rounded-5 shadow">
            <input type="number" name="input-id-imobiliaria" placeholder="ID da imobiliaria">
            <input type="text"   name="input-tipo-imovel" placeholder="Tipo" class="form-control">
            <input type="number" name="input-valor-imovel" placeholder="Valor (R$)" class="form-control">
            <input type="text"   name="input-bairro-imovel" placeholder="Bairro" class="form-control">
            
            <textarea name="input-descricao-imovel" placeholder="Descrição"></textarea>
    
            <input type="file" name="input-foto-imovel" accept="image/*" class="form-control">
            <input type="text" name="input-situacao-imovel" placeholder="Situação" class="form-control">
    
            <button class="btn btn-primary"> Cadastrar Imóvel </button>
        </div>
    </form>
    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>