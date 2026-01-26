<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit;
}

$usuario = $_SESSION['usuario_logado'];

if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body class="dashboard">
    <div class="container">
        <div class="header">
            <h1>Dashboard</h1>
            <div class="usuario-info">
                <p>Bem-vindo,</p>
                <p class="usuario-nome"><?php echo htmlspecialchars($usuario); ?></p>
                <a href="?logout=true" class="logout-btn">Sair</a>
            </div>
        </div>

        <div class="boas-vindas">
            ✓ Você fez login com sucesso!
        </div>

        <div class="conteudo">
            <h2>Área Protegida</h2>
            <p>Você agora está em uma área que requer autenticação. Apenas usuários logados podem acessar esta página.</p>
            
            <h2>Próximos Passos</h2>
            <p>Você pode:</p>
            <ul style="margin-left: 20px;">
                <li>Adicionar mais funcionalidades ao dashboard</li>
                <li>Criar novas páginas protegidas</li>
                <li>Implementar um banco de dados (MySQL)</li>
                <li>Adicionar upload de arquivos</li>
                <li>Criar um painel de administração</li>
            </ul>
        </div>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>
