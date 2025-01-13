<?php
// Habilitar exibição de erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Incluir arquivo de conexão com o banco de dados
include 'php/db_connection.php';

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Sanitizar e validar o e-mail
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        // Sanitizar a senha
        $password = htmlspecialchars($_POST['password']);
        $password = trim($password);

        $errors = [];
        if (!$email) {
            $errors[] = "O e-mail fornecido é inválido.";
        }
        if (empty($password)) {
            $errors[] = "A senha não pode estar vazia.";
        }

        if (empty($errors)) {
            $stmt = $conn->prepare("SELECT id, primeiro_nome, email, senha FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                // Verificar se a senha fornecida corresponde à senha hashada no banco
                if (password_verify($password, $user['senha'])) {
                    // Salvar o ID e o nome do usuário na sessão
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['primeiro_nome'];
                    header('Location: ./menu.php');
                    exit;
                } else {
                    $errors[] = "E-mail ou senha incorretos.";
                }
            } else {
                $errors[] = "Você não possui uma conta. Por favor, cadastre-se.";
            }
        }
    } else {
        $errors[] = "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon"> <!-- Ícone da página -->

</head>
<body>
    <main id="login-container">
        <form id="login_form" method="POST">
            <div id="form_header">
                <h1>Faça o seu Login</h1>
            </div>
            <div id="inputs">
                <div class="input-box">
                    <label for="email">
                        <h2>E-mail:</h2>
                        <div class="input-field">
                            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                        </div>
                    </label>
                </div>
                <div class="input-box">
                    <label for="password">
                        <h2>Senha:</h2>
                        <div class="input-field">
                            <input type="password" id="password" name="password" required>
                        </div>
                    </label>
                    <div id="forgot-password">
                        <a href="#"><h3>Esqueci minha Senha</h3></a>
                    </div>
                </div>
            </div>
            <button type="submit" id="login-button">Entrar</button>
            <?php if (!empty($errors)): ?>
                <div class="errors">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
    </main>
</body>
</html>
