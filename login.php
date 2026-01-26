<?php
session_start();

$erro = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = trim($_POST['usuario'] ?? '');
    $senha = $_POST['senha'] ?? '';

    if (empty($usuario) || empty($senha)) {
        $erro = 'Usuário e senha são obrigatórios!';
    } else {
        $usuarios_file = 'usuarios.json';

        if (file_exists($usuarios_file)) {
            $usuarios = json_decode(file_get_contents($usuarios_file), true);

            $usuario_encontrado = false;
            foreach ($usuarios as $user) {
                if ($user['usuario'] === $usuario) {
                    if (password_verify($senha, $user['senha'])) {
                        $_SESSION['usuario_logado'] = $usuario;
                        header('Location: dashboard.php');
                        exit;
                    } else {
                        $erro = 'Senha incorreta!';
                    }
                    $usuario_encontrado = true;
                    break;
                }
            }

            if (!$usuario_encontrado) {
                $erro = 'Usuário não encontrado!';
            }
        } else {
            $erro = 'Nenhum usuário cadastrado!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>

        <?php if ($erro): ?>
            <div class="erro"><?php echo htmlspecialchars($erro); ?></div>
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

            <button type="submit">Entrar</button>
        </form>

        <div class="link">
            <a href="cadastro.php">Não tem cadastro? Cadastre-se aqui</a>
        </div>
    </div>

    <script src="assets/script.js"></script>
</body>
</html>
