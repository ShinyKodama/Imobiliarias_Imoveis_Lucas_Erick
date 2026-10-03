const btnDeletarImoveis = document.getElementById('btn-deletar-imoveis');
if (btnDeletarImoveis) {
    btnDeletarImoveis.addEventListener('click', function(event) {
        const possuiImoveis = this.dataset.possuiImoveis === 'true';
        if (!possuiImoveis) {
            event.preventDefault();
            alert("Nenhum imóvel cadastrado!");
        }
    });
}