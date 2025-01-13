<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Inclui o arquivo de conexão com o banco de dados
include('php/db_connection.php');

// Recupera o ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Consulta para obter os dados do usuário
$sql = "SELECT * FROM usuarios WHERE id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

// Verifica se o usuário existe
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    echo "Usuário não encontrado.";
    exit;
}

// Variáveis de dados para o formulário
$primeiro_nome = $user['primeiro_nome'];
$sobrenome = $user['sobrenome'];
$email = $user['email'];
$celular = $user['celular'];
$biografia = $user['biografia'];
$aniversario = $user['aniversario'];

// Verifica se o formulário de edição de perfil foi enviado
if (isset($_POST['atualizar_perfil'])) {
    $primeiro_nome = htmlspecialchars($_POST['primeiro_nome']);
    $sobrenome = htmlspecialchars($_POST['sobrenome']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $celular = htmlspecialchars($_POST['celular']);
    $biografia = htmlspecialchars($_POST['biografia']);
    $aniversario = $_POST['aniversario']; // Nova variável para o aniversário

    // Atualiza os dados do usuário no banco
    $update_sql = "UPDATE usuarios SET primeiro_nome = :primeiro_nome, sobrenome = :sobrenome, email = :email, celular = :celular, biografia = :biografia, aniversario = :aniversario WHERE id = :user_id";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bindParam(':primeiro_nome', $primeiro_nome);
    $update_stmt->bindParam(':sobrenome', $sobrenome);
    $update_stmt->bindParam(':email', $email);
    $update_stmt->bindParam(':celular', $celular);
    $update_stmt->bindParam(':biografia', $biografia);
    $update_stmt->bindParam(':aniversario', $aniversario);
    $update_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // Executa a atualização dos dados principais (sem a senha)
    if ($update_stmt->execute()) {
        // Redireciona após a atualização para recarregar a página
        header("Location: perfil.php");
        exit;
    } else {
        echo "Erro ao atualizar dados.";
    }
}

// Verifica se o formulário de alteração de senha foi enviado
if (isset($_POST['alterar_senha'])) {
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $repita_nova_senha = $_POST['repita_nova_senha'];

    // Verifica se a senha atual está correta
    if (password_verify($senha_atual, $user['senha'])) {
        // Verifica se a nova senha e a repetição coincidem
        if ($nova_senha === $repita_nova_senha) {
            // Criptografa a nova senha
            $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);

            // Atualiza a senha no banco de dados
            $update_sql = "UPDATE usuarios SET senha = :senha WHERE id = :user_id";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bindParam(':senha', $nova_senha_hash);
            $update_stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $update_stmt->execute();
            
            // Redireciona após a alteração da senha
            header("Location: perfil.php");
            exit;
        } else {
            echo "As novas senhas não coincidem.";
        }
    } else {
        echo "Senha atual incorreta.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/editar.css">
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <link rel="shortcut icon" href="img/menu/logo.png" type="image/x-icon">
</head>

<body>
    <div class="container light-style flex-grow-3 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Configurações de Conta</h4>
        <div class="card overflow-hidden">
            <span class="border border-success"></span>
            
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-geral">Geral</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-alterar-senha">Alterar senha</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-informações">Informações</a>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-geral">
                            <div class="card-body media align-items-center">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($user['foto_perfil']); ?>" alt="Foto de Perfil" class="d-block ui-w-80">
                                <div class="media-body ml-4">
                                    <label id="btn-outline" class="btn btn-outline-primary"> Upload nova foto
                                        <input type="file" class="account-settings-fileinput">
                                    </label>
                                    <button type="button" class="btn btn-default md-btn-flat">Escolher outra</button>
                                </div>
                            </div>
                            <hr class="border-light m-0">
                            <!-- Formulário de Edição de Perfil -->
                            <form method="POST" action="perfil.php" id="form-perfil">
                                <div class="form-group">
                                    <label class="form-label">Nome de usuário</label>
                                    <input type="text" class="form-control mb-1" name="primeiro_nome" value="<?php echo htmlspecialchars($primeiro_nome); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Sobrenome</label>
                                    <input type="text" class="form-control" name="sobrenome" value="<?php echo htmlspecialchars($sobrenome); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="email" class="form-control mb-1" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Celular</label>
                                    <input type="text" class="form-control mb-1" name="celular" value="<?php echo htmlspecialchars($celular); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Biografia</label>
                                    <input type="text" class="form-control" name="biografia" value="<?php echo htmlspecialchars($biografia); ?>">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Aniversário</label>
                                    <input type="date" class="form-control" name="aniversario" value="<?php echo $aniversario; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary" name="atualizar_perfil">Salvar mudanças</button>
                            </form>
                            <a href="menu.php" class="btn btn-secondary mt-3">Voltar para o Menu</a>
                        </div>

                        <div class="tab-pane fade" id="account-alterar-senha">
                            <div class="card-body pb-2">
                                <!-- Formulário de Alteração de Senha -->
                                <form method="POST" action="perfil.php" id="form-senha">
                                    <div class="form-group">
                                        <label class="form-label">Senha atual</label>
                                        <input type="password" class="form-control" name="senha_atual">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Nova senha</label>
                                        <input type="password" class="form-control" name="nova_senha">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Repita a nova senha</label>
                                        <input type="password" class="form-control" name="repita_nova_senha">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="alterar_senha">Alterar Senha</button>
                                </form>
                                <a href="menu.php" class="btn btn-secondary mt-3">Voltar para o Menu</a>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-informações">
                            <div class="card-body">
                                <form method="POST" action="perfil.php">
                                    <div class="form-group">
                                        <label class="form-label">Aniversário</label>
                                        <input type="date" class="form-control" name="aniversario" value="<?php echo $user['aniversario']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Município</label>
                                        <input type="text" class="form-control" name="municipio" value="<?php echo $user['municipio']; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar mudanças</button>
                                </form>
                                <a href="menu.php" class="btn btn-secondary mt-3">Voltar para o Menu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
