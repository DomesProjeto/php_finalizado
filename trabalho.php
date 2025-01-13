<?php
// Array contendo as avaliações de diferentes clientes
$avaliacoes = [
    // Avaliação do cliente João Silva
    [
        'customer_name' => 'João Silva',
        'service_type' => 'Limpeza de Jardim',
        'date' => '15 de Outubro de 2024',
        'rating' => 4 // Nota de avaliação
    ],
    // Avaliação da cliente Maria Oliveira
    [
        'customer_name' => 'Maria Oliveira',
        'service_type' => 'Instalação Elétrica',
        'date' => '10 de Outubro de 2024',
        'rating' => 5 // Nota de avaliação
    ],
    // Avaliação do cliente Carlos Souza
    [
        'customer_name' => 'Carlos Souza',
        'service_type' => 'Pintura de Casa',
        'date' => '05 de Outubro de 2024',
        'rating' => 3 // Nota de avaliação
    ]
   
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações dos Trabalhadores</title>
    <!-- Inclusão do arquivo de ícones (Font Awesome) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Inclusão do arquivo de estilos para a página -->
    <link rel="stylesheet" href="css/avaliacao.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon"> <!-- Ícone da página -->

</head>
<body>

    <!-- Container principal da página -->
    <div class="container">
        <!-- Título da página -->
        <h1>Avaliações que você Recebeu</h1>
        <!-- Link de retorno ao painel de controle -->
        <a href="#" id="back-button" class="back-button">Voltar ao Painel de Controle</a>

        <!-- Lista de avaliações -->
        <ul class="evaluation-list">
            <?php
            // Loop para percorrer as avaliações armazenadas no array $avaliacoes
            foreach ($avaliacoes as $avaliacao) {
                // Exibe cada item de avaliação dentro de uma lista
                echo "<li class='evaluation-item'>";
                // Exibe o nome do cliente que fez a avaliação
                echo "<span class='customer-name'>{$avaliacao['customer_name']}</span>";
                // Exibe o tipo de serviço avaliado
                echo "<span class='service-type'>{$avaliacao['service_type']}</span>";
                // Exibe a data da avaliação
                echo "<span class='date'>{$avaliacao['date']}</span>";
                // Exibe as estrelas de avaliação (ainda sem implementação de estrelas visíveis)
                echo "<div class='stars' data-rating='{$avaliacao['rating']}'>";
                echo "</div></li>";
            }
            ?>
        </ul>
    </div>

    <!-- Inclusão do arquivo de script para a interação com as avaliações -->
    <script src="js/avaliacoes.js"></script>
</body>
</html>
