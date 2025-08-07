<?php
require 'config.php';
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit; }

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM bebidas WHERE id=$id");
$bebida = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $preco = $_POST['preco'];

    $stmt = $conn->prepare("UPDATE bebidas SET nome=?, tipo=?, preco=? WHERE id=?");
    $stmt->bind_param("ssdi", $nome, $tipo, $preco, $id);
    $stmt->execute();
    header("Location: painel.php");
    exit;
}
?>
<form method="POST">
    <input type="text" name="nome" value="<?= $bebida['nome'] ?>" required>
    <input type="text" name="tipo" value="<?= $bebida['tipo'] ?>" required>
    <input type="number" step="0.01" name="preco" value="<?= $bebida['preco'] ?>" required>
    <button type="submit">Atualizar</button>
</form>
