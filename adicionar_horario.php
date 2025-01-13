<?php
include 'db_agenda.php';

$data = json_decode(file_get_contents('php://input'), true);

// Sanitiza e valida os dados recebidos
$dia = htmlspecialchars(strip_tags($data['dia']));
$horario_inicio = htmlspecialchars(strip_tags($data['horario_inicio']));
$horario_fim = htmlspecialchars(strip_tags($data['horario_fim']));

// Verifica se os horários estão no formato correto
if (preg_match("/^(2[0-3]|[01]?[0-9]):([0-5][0-9])$/", $horario_inicio) &&
    preg_match("/^(2[0-3]|[01]?[0-9]):([0-5][0-9])$/", $horario_fim)) {
    
    // Verifica se horário de início é anterior ao de fim
    if (strtotime($horario_inicio) < strtotime($horario_fim)) {
        $sql = "SELECT * FROM horarios WHERE dia = '$dia' 
                AND ('$horario_inicio' < horario_fim AND '$horario_fim' > horario_inicio)";

        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO horarios (dia, horario_inicio, horario_fim) 
                    VALUES ('$dia', '$horario_inicio', '$horario_fim')";
            
            if ($conn->query($sql) === TRUE) {
                echo json_encode(["success" => true]);
            } else {
                echo json_encode(["success" => false, "message" => "Erro ao adicionar o horário."]);
            }
        } else {
            echo json_encode(["success" => false, "message" => "Conflito de horários."]);
        }
    } else {
        echo json_encode(["success" => false, "message" => "O horário de início deve ser anterior ao horário de fim."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Horários inválidos. Use o formato hh:mm."]);
}
?>
