<?php
session_start();
require('../Login/login.php');
require('../Login/protecao.php');
require('../Conexao/conexao.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    try {
        $stmt = $conexao->prepare("DELETE FROM categoria WHERE id = ?");
        $stmt->execute([$id]);

        $_SESSION['mensagem'] = "Categoria excluída com sucesso!";
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro ao excluir: " . $e->getMessage();
    }
} else {
    $_SESSION['mensagem'] = "ID inválido.";
}

header("Location: DashboardCategoria.php");
exit;
?>