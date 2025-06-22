<?php
include_once('../Conexao/conexao.php');

// Verifica se vai editar ou atualizar
if (isset($_GET['editarCat'])) {
    $idEditar = intval($_GET['editarCat']);

    // Buscar dados do jogo
    $stmt = $conexao->prepare("SELECT * FROM categoria WHERE id = :id");
    $stmt->bindValue(':id', $idEditar, PDO::PARAM_INT);
    $stmt->execute();
    $editarDados = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se não encontrar, redireciona
    if (!$editarDados) {
        $_SESSION['mensagem'] = "Jogo não encontrado.";
        exit;
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    // Atualizar dados
    $id = intval($_POST['id']);
    $nome = trim($_POST['nome']);

    if (empty($nome)) {
        $_SESSION['mensagem'] = "Preencha o campo obrigatório para editar.";
    } else {
        try {
            $stmt = $conexao->prepare("UPDATE categoria SET nome = :nome WHERE id = :id");
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $_SESSION['mensagem'] = "Categoria atualizada com sucesso!";
            exit;
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao atualizar: " . $e->getMessage();
            exit;
        }
    }
}
?>
