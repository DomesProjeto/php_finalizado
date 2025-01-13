<?php
require_once 'php/db_connection.php'; // Arquivo com a conexão ao banco de dados
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$trabalhador_id = $_SESSION['user_id'];

$sql = "SELECT a.*, u.primeiro_nome AS nome_avaliador 
        FROM avaliacoes a
        JOIN usuarios u ON a.avaliador_id = u.id
        WHERE a.trabalhador_id = :trabalhador_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':trabalhador_id', $trabalhador_id, PDO::PARAM_INT);
$stmt->execute();
$avaliacoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações dos Trabalhadores</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="css/avaliacao.css">
</head>
<body>
    <div class="container">
        <h1>Avaliações que você Recebeu</h1>

        <a href="#" id="back-button" class="back-button">Voltar ao Painel de Controle</a>

        <ul class="evaluation-list">
            <?php
            if (!empty($avaliacoes)) {
                foreach ($avaliacoes as $avaliacao) {
                    // Recuperando o nome do avaliador 
                    $avaliador_id = $avaliacao['avaliador_id'];

                    // Consultando o nome do avaliador
                    $sql_avaliador = "SELECT primeiro_nome FROM usuarios WHERE id = :avaliador_id";
                    $stmt_avaliador = $conn->prepare($sql_avaliador);
                    $stmt_avaliador->bindParam(':avaliador_id', $avaliador_id);
                    $stmt_avaliador->execute();
                    $avaliador = $stmt_avaliador->fetch(PDO::FETCH_ASSOC);

                    // Exibindo o nome do avaliador
                    $nome_avaliador = $avaliador ? $avaliador['primeiro_nome'] : 'Avaliador desconhecido';
                    $data_avaliacao = new DateTime($avaliacao['data_avaliacao']);
                    $data_formatada = $data_avaliacao->format('d \d\e F \d\e Y');
                    
                    // Exibindo a avaliação com nome do avaliador, nota e comentário
                    echo "<li class='evaluation-item'>
                            <span class='customer-name'>$nome_avaliador</span>
                            <span class='date'>$data_formatada</span>
                            <div class='stars' data-rating='" . $avaliacao['nota'] . "'>
                            </div>
                            <p class='comment'>" . htmlspecialchars($avaliacao['comentario']) . "</p>
                          </li>";
                }
            } else {
                echo "<p>Não há avaliações para exibir.</p>";
            }
            ?>
        </ul>
    </div>

    <script src="js/avaliacoes.js"></script>
</body>
</html>
