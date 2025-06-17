<?php
session_start();
require('../Login/login.php');
require('../Login/protecao.php');
require('../Conexao/conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        $stmt = $conexao->prepare("DELETE FROM jogo WHERE id = ?");
        $stmt->execute([$id]);

        $_SESSION['mensagem'] = "Jogo excluído com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao excluir: " . $e->getMessage();
    }
} else {
    $_SESSION['mensagem'] = "ID inválido.";
}

header("Location: DashboardJogo.php");
exit;
?>