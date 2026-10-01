const painelAdministrador = document.getElementById('id-painel-administrador');

painelAdministrador.addEventListener('change', function() {
    const possuiImoveis = painelAdministrador.dataset.possuiImoveis === 'true';

    if (this.value === 'deletar_imoveis.php' && !possuiImoveis) {
        alert("Nenhum imóvel cadastrado ainda! ");
        this.value = '';
        return;
    }

    if (this.value)
        window.location.href = this.value;

});