<?php
session_start();

$erro = '';
$sucesso = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';
    $confirmaSenha = $_POST['confirma_senha'] ?? '';

    // Validações
    if (empty($usuario)) {
        $erro = 'Usuário é obrigatório!';
    } elseif (strlen($usuario) < 3) {
        $erro = 'Usuário deve ter no mínimo 3 caracteres!';
    } elseif (empty($senha)) {
        $erro = 'Senha é obrigatória!';
    } elseif (strlen($senha) < 6) {
        $erro = 'Senha deve ter no mínimo 6 caracteres!';
    } elseif ($senha !== $confirmaSenha) {
        $erro = 'As senhas não coincidem!';
    } else {
        // Simular gravação (em produção, seria no banco de dados)
        $usuarios_file = 'usuarios.json';
        
        $usuarios = [];
        if (file_exists($usuarios_file)) {
            $usuarios = json_decode(file_get_contents($usuarios_file), true);
        }

        // Verificar se usuário já existe
        $usuario_existe = false;
        foreach ($usuarios as $user) {
            if ($user['usuario'] === $usuario) {
                $usuario_existe = true;
                break;
            }
        }

        if ($usuario_existe) {
            $erro = 'Este usuário já foi cadastrado!';
        } else {
            // Adicionar novo usuário
            $usuarios[] = [
                'usuario' => $usuario,
                'senha' => password_hash($senha, PASSWORD_DEFAULT)
            ];

            file_put_contents($usuarios_file, json_encode($usuarios, JSON_PRETTY_PRINT));
            $sucesso = 'Cadastro realizado com sucesso!';
            $_POST = []; // Limpar formulário
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Cadastro</h1>

        <?php if ($erro): ?>
            <div class="erro"><?php echo htmlspecialchars($erro); ?></div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="sucesso"><?php echo htmlspecialchars($sucesso); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" value="<?php echo htmlspecialchars($_POST['usuario'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <div class="form-group">
                <label for="confirma_senha">Confirmar Senha:</label>
                <input type="password" id="confirma_senha" name="confirma_senha" required>
            </div>

            <button type="submit">Cadastrar</button>
        </form>

        <div class="link">
            <a href="login.php">Já tem cadastro? Faça login</a>
        </div>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>
