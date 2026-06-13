<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="login-container">
    <h2>Login</h2>
    <form action="../../controllers/login.php" method="POST">
        <label for="username">Usuário:</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>
        <br>
        <button type="submit" class="login-button">Entrar</button>
    </form>
    </div>
</body>
</html>

