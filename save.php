<?php
// Inclusão do arquivo de conexão com o banco de dados
include 'db_agenda.php';

// Recebe os dados enviados via JSON da requisição HTTP
$data = json_decode(file_get_contents("php://input"), true);
// Armazena os valores 'dia' e 'horario' recebidos na variável
$dia = $data['dia'];
$horario = $data['horario'];

// Prepara a consulta SQL para inserir os dados na tabela 'horarios'
$sql = "INSERT INTO horarios (dia, horario) VALUES ('$dia', '$horario')";

// Executa a consulta no banco de dados
if ($conn->query($sql) === TRUE) {
    // Se a inserção for bem-sucedida, retorna uma mensagem de sucesso em formato JSON
    echo json_encode(["message" => "Horário adicionado com sucesso!"]);
} else {
    // Se ocorrer um erro ao executar a consulta, retorna uma mensagem de erro em formato JSON
    echo json_encode(["message" => "Erro ao adicionar horário."]);
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
