<?php
include 'db_agenda.php';

// Recebe os dados via JSON
$data = json_decode(file_get_contents('php://input'), true);

if(!isset($data['dia'])){
    echo json_encode(["success" => false, "message" =>  "id nao definido"]);
}

// Sanitiza os dados para prevenir XSS
$id = htmlspecialchars(strip_tags($data['id']));  


if ($id) {
    // Consulta SQL para deletar o horário pelo id
    $sql = "DELETE FROM horarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "message" =>  $conn->error]);
    }
} else {
    echo json_encode(["success" => false, "message" => "ID inválido."]);
}
?>


