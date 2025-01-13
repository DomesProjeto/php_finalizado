<?php
$servername = "localhost";
$username = "root";
$password = "serra";
$dbname = "domes";
$port = "3307";

global $conn;

try {
    // Criando a conexão
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Definindo o modo de erro do PDO para exceções
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão bem-sucedida!"; 
}
catch(PDOException $e) {
    echo "Falha na conexão: " . $e->getMessage();
}
?>
