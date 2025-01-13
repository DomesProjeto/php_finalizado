<?php
include 'db_agenda.php';

// Função de sanitização para prevenir XSS
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags($input));
}

// Consulta ao banco de dados para obter todos os horários
$query = "SELECT * FROM horarios ORDER BY dia, horario_inicio";
$result = $conn->query($query);

$agenda = [];

// Organiza os horários por dia
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $dia = sanitizeInput($row['dia']);
        if (!isset($agenda[$dia])) {
            $agenda[$dia] = [];
        }
        $agenda[$dia][] = [
            "id" => sanitizeInput($row['id']),
            'horario_inicio' => sanitizeInput($row['horario_inicio']),
            'horario_fim' => sanitizeInput($row['horario_fim'])
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Semanal</title>
    <link rel="stylesheet" href="css/agenda.css">
    <script src="js/agenda.js"></script>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon"> <!-- Ícone da página -->

</head>
<body>
    <?php include_once 'header.php'; ?>
    <div class="container">
        <h1>Agenda Semanal</h1>
        <div class="agenda">
            <?php
            // Dias da semana em ordem
            $dias_semana = ['Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado', 'Domingo'];

            foreach ($dias_semana as $dia) {
                echo "<div class='dia'>";
                echo "<h2>$dia</h2>";
                echo "<ul id='$dia'>";

                // Verifica se há horários para este dia
                if (isset($agenda[$dia]) && count($agenda[$dia]) > 0) {
                    foreach ($agenda[$dia] as $horario) {
                        echo "<li>{$horario['horario_inicio']} - {$horario['horario_fim']} 
                            <button class='btn-remover' onclick=\"removerHorario( '{$horario['id']}',   '$dia', '{$horario['horario_inicio']}', '{$horario['horario_fim']}')\">X</button></li>";
                    }
                } else {
                    echo "<li class='nenhum-horario'>Nenhum horário adicionado</li>";
                }

                echo "</ul>";
                echo "<button onclick=\"adicionarHorario('$dia')\">Adicionar horário</button>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
    <?php include_once 'footer.php'; ?>
</body>
</html>
