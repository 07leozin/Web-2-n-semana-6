<?php
require 'config.php';
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit; }

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];

    $stmt = $conn->prepare("INSERT INTO bebidas (nome, tipo, preco) VALUES (?, ?, ?)");
    $stmt->bind_param("ssd", $nome, $tipo, $preco);
    $stmt->execute();
    header("Location: painel.php");
    exit;
}
?>
<form method="POST">
    <input type="text" name="nome" placeholder="Nome da bebida" required>
    <input type="text" name="tipo" placeholder="Tipo (Café, Chá, etc.)" required>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required>
    <button type="submit">Salvar</button>
</form>
