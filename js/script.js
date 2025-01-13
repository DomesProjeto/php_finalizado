// Função para adicionar um horário
function adicionarHorario(dia) {
    let horario = prompt("Digite o horário (ex: 11:00 - 14:00):");

    if (horario) {
        const li = document.createElement("li");
        li.textContent = horario;

        // Criar o botão de remover
        const removerBtn = document.createElement("button");
        removerBtn.textContent = "Remover";
        removerBtn.onclick = function () {
            li.remove();
            removerHorarioNoBanco(dia, horario); // Remove do banco
        };

        li.appendChild(removerBtn);

        document.getElementById(dia).appendChild(li);
        salvarHorarioNoBanco(dia, horario); // Salva no banco
    }
}

// Função para salvar o horário no banco de dados
function salvarHorarioNoBanco(dia, horario) {
    const data = {
        dia: dia,
        horario: horario
    };

    fetch('save.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Horário salvo com sucesso:", data);
    })
    .catch(error => {
        console.error("Erro ao salvar horário:", error);
    });
}

// Função para remover o horário no banco de dados
function removerHorarioNoBanco(dia, horario) {
    const data = {
        dia: dia,
        horario: horario
    };

    fetch('remove.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Horário removido com sucesso:", data);
        alert('Horário removido com sucesso!');
    })
    .catch(error => {
        console.error("Erro ao remover horário:", error);
    });
}
