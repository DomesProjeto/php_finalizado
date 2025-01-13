// Função para buscar o endereço com base no CEP
function buscarEndereco() {
    var cep = document.getElementById("cep").value.replace(/\D/g, ''); // Remover caracteres não numéricos

    if (cep !== "") {
        // Expressão regular para validar o CEP
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            // Acessar a API ViaCEP
            var script = document.createElement('script');
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=preencherEndereco';
            document.body.appendChild(script);
        } else {
            alert("CEP inválido");
        }
    }
}

// Função para preencher os campos de endereço
function preencherEndereco(dados) {
    if (!("erro" in dados)) {
        document.getElementById("state").value = dados.uf;
        document.getElementById("municipio").value = dados.localidade;
        document.getElementById("bairro").value = dados.bairro;
    } else {
        alert("CEP não encontrado.");
    }
}
