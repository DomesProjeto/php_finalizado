<?php
// Iniciar a sessão para garantir que estamos pegando os dados da sessão corretamente
session_start();

// Verificar se a sessão contém o e-mail do usuário
if (!isset($_SESSION['email'])) {
    // Caso não tenha, redirecionamos o usuário para o cadastro ou página de login
    header('Location: cadastro.php');
    exit();
}

// Incluir arquivo de conexão com o banco de dados
include 'php/db_connection.php';

global $conn;

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['email']; // Obtém o e-mail da sessão

    $cep = $_POST['cep']; 
    $estado = $_POST['state']; 
    $municipio = $_POST['municipio']; 
    $bairro = $_POST['bairro'];
    $numero = $_POST['num']; 
    $complemento = $_POST['complemento']; 

    try {
        // Atualizar os dados do usuário no banco de dados
        $stmt = "UPDATE `usuarios` SET `cep` = :cep, `estado` = :estado, `municipio` = :municipio, 
                `bairro` = :bairro, `numero` = :numero, `complemento` = :complemento WHERE `usuarios`.`email` = :email";
        $stmt = $conn->prepare($stmt);
        $stmt->bindParam(":cep", $cep);
        $stmt->bindParam(":estado", $estado);
        $stmt->bindParam(":municipio", $municipio);
        $stmt->bindParam(":bairro", $bairro);
        $stmt->bindParam(":numero", $numero);
        $stmt->bindParam(":complemento", $complemento);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        // Redirecionar para o menu
        header('Location: menu.php');
        exit();
    } catch(PDOException $e) {
        echo 'Erro: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/cadastro.css">
    <title>Cadastro do Contratante</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!-- Incluindo o arquivo JavaScript externo -->
    <script src="js/cep.js"></script>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="img/logo2.png" alt="Logo">
        </div>

        <div class="form">
            <form method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Continue o seu cadastro</h1>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="cep">CEP</label>
                        <input id="cep" type="text" name="cep" placeholder="Digite o CEP" onblur="buscarEndereco()" required>
                    </div>
                    <div class="input-box">
                        <label for="state">Estado</label>
                        <input id="state" type="text" name="state" placeholder="Digite o seu Estado" required>
                    </div>
                    <div class="input-box">
                        <label for="municipio">Município</label>
                        <input id="municipio" type="text" name="municipio" placeholder="Digite o seu Município" required>
                    </div>
                    <div class="input-box">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" type="text" name="bairro" placeholder="Bairro" required>
                    </div>
                    <div class="input-box">
                        <label for="num">Número</label>
                        <input id="num" type="text" name="num" placeholder="Número" required>
                    </div>
                    <div class="input-box">
                        <label for="complemento">Complemento</label>
                        <input id="complemento" type="text" name="complemento" placeholder="Complemento" required>
                    </div>
                </div>

                <div class="continue-button">
                    <button type="submit">Concluir Cadastro</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
