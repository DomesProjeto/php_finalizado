<?php
include 'php/db_connection.php'; // Inclui a conexão com o banco de dados
session_start(); // Inicia a sessão

if (!isset($_SESSION['user_id'])) {
        header('Location: login.php'); // Redirecionar para o login
        exit;
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes Ativos</title>
    <link rel="stylesheet" href="css/cliente.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/cliente.js"></script>
</head>

<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li><a href="#"><span class="icon"><ion-icon name="logo-Domes"></ion-icon></span><span class="title">Domes - Serviços</span></a></li>
                <li><a href="menu.php"><span class="icon"><ion-icon name="home-outline"></ion-icon></span><span class="title">Painel de Controle</span></a></li>
                <li><a href="clientes.php"><span class="icon"><ion-icon name="people-outline"></ion-icon></span><span class="title">Seus Clientes</span></a></li>
                <li><a href="avaliacoes.php"><span class="icon"><ion-icon name="star-outline"></ion-icon></span><span class="title">Avaliações</span></a></li>
                <li><a href="trabalho.php"><span class="icon"><ion-icon name="briefcase-outline"></ion-icon></span><span class="title">Seus Trabalhos</span></a></li>
                <li><a href="agenda.php"><span class="icon"><ion-icon name="calendar-outline"></ion-icon></span><span class="title">Sua Agenda</span></a></li>
                <li><a href="perfil.php"><span class="icon"><ion-icon name="settings-outline"></ion-icon></span><span class="title">Perfil</span></a></li>
            </ul>
        </div>
    </div>

    <div class="container2">
        <div id="current-time" class="current-time"></div>
        <button class="back-button" onclick="goBack()">Voltar para a Página Principal</button>
        <h1>Lista de seus clientes ativos</h1>

        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Serviço</th>
                    <th>Endereço</th>
                    <th>Dia e Hora</th>
                    <th>Telefone</th>
                    <th>Valor (R$)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Acessa o ID do trabalhador logado (supondo que esteja armazenado na sessão)
                    $usuario_id = $_SESSION['user_id'];  // ID do trabalhador logado

                    // Consulta para obter os dados dos clientes do trabalhador
                    $stmt = $conn->prepare("
                        SELECT c.nome, c.endereco, c.telefone, t.descricao AS servico, t.data_trabalho AS dia_hora, t.valor
                        FROM clientes c
                        JOIN trabalhos t ON c.id = t.id_cliente
                        WHERE t.usuario_id = :usuario_id
                    ");
                    $stmt->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
                    $stmt->execute();

                    // Exibe os dados na tabela
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nome']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['servico']) . "</td>"; // Exibe o serviço (descrição do trabalho)
                        echo "<td>" . htmlspecialchars($row['endereco']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['dia_hora']) . "</td>"; // Exibe o dia e hora do trabalho
                        echo "<td>" . htmlspecialchars($row['telefone']) . "</td>";
                        echo "<td>" . number_format($row['valor'], 2, ',', '.') . "</td>"; // Exibe o valor
                        echo "</tr>";
                    }
                } catch (PDOException $e) {
                    // Exibe mensagem de erro em caso de falha na consulta
                    echo "<tr><td colspan='6'>Erro ao carregar os dados: " . $e->getMessage() . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <button class="menu-toggle" onclick="toggleMenu()">☰</button>
</body>

</html>
