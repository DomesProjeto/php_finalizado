// Função para voltar para a página principal
function goBack() {
    window.history.back();
}

// Função para obter o dia da semana, a data e a hora atual
function getCurrentTime() {
    const now = new Date();
    const dayNames = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"];
    const monthNames = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
    
    const day = dayNames[now.getDay()]; // Obtém o nome do dia atual
    const date = now.getDate(); // Dia do mês
    const month = monthNames[now.getMonth()]; // Mês
    const year = now.getFullYear(); // Ano
    const hour = String(now.getHours()).padStart(2, '0');
    const minute = String(now.getMinutes()).padStart(2, '0');
    const second = String(now.getSeconds()).padStart(2, '0');

    // Formatação completa: Dia da semana - Data completa - Hora
    const time = `${day}, ${date} de ${month} de ${year} - ${hour}:${minute}:${second}`;
    
    // Atualiza o conteúdo do elemento com o tempo completo (dia, data e hora)
    document.getElementById('current-time').textContent = time;
}

// Chama a função getCurrentTime a cada segundo
setInterval(getCurrentTime, 1000);
