<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inicia a sessão
session_start();

// Conexão com o banco de dados
include 'php/db_connection.php';

// Verifica se o ID foi enviado pela URL
if (isset($_GET['id'])) {
    $worker_id = $_GET['id'];

    // Consulta SQL para pegar todas as especialidades
    $query = $conn->prepare("
    SELECT u.primeiro_nome, u.sobrenome, u.email, u.celular, u.genero, u.municipio, u.biografia, 
           GROUP_CONCAT(e.nome SEPARATOR ', ') AS especialidades
    FROM usuarios u
    LEFT JOIN usuario_especialidades ue ON u.id = ue.usuario_id
    LEFT JOIN especialidades e ON ue.especialidade_id = e.id
    WHERE u.id = :id
    GROUP BY u.id
    ");

    // Executa a consulta com o ID
    $query->execute(['id' => $worker_id]);
    $worker = $query->fetch(PDO::FETCH_ASSOC);

    if (!$worker) {
        echo "<p>Trabalhador não encontrado.</p>";
        exit;
    }
} else {
    echo "<p>ID do trabalhador não especificado.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/perfil_expositivo.css">
    <link rel="shortcut icon" href="img/menu/logo.png" type="image/x-icon">
</head>
<body>
    <div class="wrapper">
        <div class="user-card">
            <div class="user-card-img">
                <img src="img/perfilexpositivo/avatar2.png" alt="Foto do usuário">
            </div>
            <div class="user-card-info">
                <h2><?= htmlspecialchars($worker['primeiro_nome'] . ' ' . $worker['sobrenome']); ?></h2>
                <p><span>Email:</span> <?= htmlspecialchars($worker['email']); ?></p>
                <p><span>Localização:</span> <?= htmlspecialchars($worker['municipio'] ?? 'Não especificada'); ?></p>
                <p><span>Especialidades:</span> <?= htmlspecialchars($worker['especialidades'] ?? 'Não especificada'); ?></p>
                <p><span>Sobre mim:</span> <?= htmlspecialchars($worker['biografia'] ?? 'Não especificado'); ?></p>
            </div>
        </div>
    </div>
</body>
</html>
