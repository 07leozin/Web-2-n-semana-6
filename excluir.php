<?php
require 'config.php';
if (!isset($_SESSION['logado'])) { header("Location: login.php"); exit; }

$id = $_GET['id'];
$conn->query("DELETE FROM bebidas WHERE id=$id");
header("Location: painel.php");
exit;
