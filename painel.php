<?php
require 'config.php';
if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: login.php");
    exit;
}

$result = $conn->query("SELECT * FROM bebidas ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel Admin</title>
<style>
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
table, th, td { border: 1px solid #ccc; padding: 8px; }
a { padding: 6px 10px; background: #ddd; border-radius: 4px; text-decoration: none; }
</style>
</head>
<body>
<h1>Painel de Bebidas</h1>
<a href="adicionar.php">➕ Adicionar Bebida</a>
<a href="index.php">🚪 Sair</a>
<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Tipo</th>
    <th>Preço</th>
    <th>Ações</th>
</tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['nome'] ?></td>
    <td><?= $row['tipo'] ?></td>
    <td>R$ <?= number_format($row['preco'], 2, ',', '.') ?></td>
    <td>
        <a href="editar.php?id=<?= $row['id'] ?>">✏️ Editar</a>
        <a href="excluir.php?id=<?= $row['id'] ?>" onclick="return confirm('Excluir bebida?')">🗑️ Excluir</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
