// Função para voltar à página inicial
function goBack() {
    window.history.back(); // Retorna para a página anterior
}

// Função para gerar estrelas com base na avaliação (rating)
function generateStars(rating) {
    const starsContainer = document.querySelectorAll('.stars');
    
    starsContainer.forEach(starContainer => {
        const currentRating = parseInt(starContainer.getAttribute('data-rating'));
        let starsHTML = '';

        // Adiciona as estrelas cheias
        for (let i = 0; i < currentRating; i++) {
            starsHTML += '<i class="fas fa-star star"></i>';
        }

        // Adiciona as estrelas vazias
        for (let i = currentRating; i < 5; i++) {
            starsHTML += '<i class="fas fa-star star empty"></i>';
        }

        starContainer.innerHTML = starsHTML; // Insere as estrelas no container
    });
}

// Adiciona um evento para o botão de voltar
document.getElementById('back-button').addEventListener('click', goBack);

// Chama a função para gerar as estrelas assim que a página for carregada
window.onload = () => {
    generateStars(); // Gera as estrelas nas avaliações
};
