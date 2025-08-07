<?php
require 'config.php';

// Login fixo para exemplo
$admin_user = "admin";
$admin_pass = "1234";

if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    header("Location: painel.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    if ($usuario === $admin_user && $senha === $admin_pass) {
        $_SESSION['logado'] = true;
        header("Location: painel.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login Admin</title>
<style>
body { font-family: Arial; background: #f5f5f5; }
.login { width: 300px; margin: 100px auto; background: #fff; padding: 20px; border-radius: 8px; }
input, button { width: 100%; padding: 10px; margin: 5px 0; }
</style>
</head>
<body>
<div class="login">
    <h2>Login Admin</h2>
    <?php if (!empty($erro)) echo "<p style='color:red'>$erro</p>"; ?>
    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuário" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
</div>
</body>
</html>
