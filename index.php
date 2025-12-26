<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Contatos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Cadastro de Contato</h2>

<form action=""processa.php" method="post">
    <label>Nome:</label><br>
    <input type="text" name="nome" require><br><br>

    <label>Email:</label>
    <input type="text" name="email" require><br><br>

    <label>Telefone:</label>
    <input type="number" name="telefone"><br><br>
    <button type="submit">Cadastrar</button>
</form>

</body>
</html>
