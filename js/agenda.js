// Função para adicionar um horário
function adicionarHorario(dia) {
    // Solicita os horários ao usuário
    const horario_inicio = prompt("Digite o horário de início para " + dia + " (hh:mm):");
    const horario_fim = prompt("Digite o horário de fim para " + dia + " (hh:mm):");

    // Validação do formato de horário (hh:mm)
    const regex = /^(2[0-3]|[01]?[0-9]):([0-5][0-9])$/;

    if (regex.test(horario_inicio) && regex.test(horario_fim)) {
        // Envia os dados para o servidor via fetch
        fetch('adicionar_horario.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ dia, horario_inicio, horario_fim })
        })
        .then(response => response.json()) // Processa a resposta como JSON
        .then(data => {
            if (data.success) {
                // Recarrega a página em caso de sucesso
                location.reload();
            } else {
                // Exibe mensagens de erro retornadas pelo servidor
                alert("Erro: " + data.message);
            }
        })
        .catch(error => {
            // Trata erros de rede ou requisição
            alert('Erro na requisição: ' + error);
        });
    } else {
        // Exibe mensagem de erro caso os horários sejam inválidos
        alert("Horários inválidos. Use o formato hh:mm.");
    }
}

// Função para remover um horário
function removerHorario(id, dia, horarioInicio, horarioFim) {
    // Confirmação do usuário antes de remover o horário
    if (confirm(`Deseja remover o horário ${horarioInicio} - ${horarioFim} de ${dia}  -  ${id} ?`)) {
        // Envia os dados para o servidor via fetch
        fetch('remover_horario.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ 'dia': dia, 'id': id, 'horario_inicio': horarioInicio, 'horario_fim': horarioFim })
        })
        .then(response => response.json()) // Converte a resposta para JSON
        .then(data => {
            if (data.success) {
                // Recarrega a página em caso de sucesso
                alert("removido com sucesso");
                location.reload();
            } else {
                // Exibe mensagens de erro retornadas pelo servidor
                alert("Erro ao remover horário: " + data.message);
            }
        })
        .catch(error => {
            // Trata erros de rede ou requisição
            alert("Erro na requisição: " + error);
        });
    }
}

// Event listeners para os botões de adicionar e remover horários
document.addEventListener('DOMContentLoaded', () => {
    // Adiciona eventos para os botões de "Adicionar Horário"
    document.querySelectorAll('.btn-adicionar').forEach(button => {
        button.addEventListener('click', () => {
            const dia = button.getAttribute('data-dia');
            adicionarHorario(dia);
        });
    });

    // Adiciona eventos para os botões de "Remover Horário"
    document.querySelectorAll('.btn-remover').forEach(button => {
        button.addEventListener('click', () => {
            const dia = button.getAttribute('data-dia');
            const horarioInicio = button.getAttribute('data-inicio');
            const horarioFim = button.getAttribute('data-fim');
           // removerHorario(dia, horarioInicio, horarioFim);
        });
    });
});
