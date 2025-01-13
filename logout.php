<?php
session_start();
session_unset(); // Remove todas as variáveis de sessão
session_destroy(); // Destrói a sessão
header('Location: cadastro.php'); // Redireciona para a página de login
exit;
?>
