<?php
include_once('../Conexao/conexao.php');

// Verifica se vai editar ou atualizar
if (isset($_GET['editar'])) {
    $idEditar = intval($_GET['editar']);

    // Buscar dados do jogo
    $stmt = $conexao->prepare("SELECT * FROM jogo WHERE id = :id");
    $stmt->bindParam(':id', $idEditar, PDO::PARAM_INT);
    $stmt->execute();
    $editarDados = $stmt->fetch(PDO::FETCH_ASSOC);

    // Se não encontrar, redireciona
    if (!$editarDados) {
        $_SESSION['mensagem'] = "Jogo não encontrado.";
        header("Location: DashboardJogo.php");
        exit;
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_jogo'])) {
    // Atualizar dados
    $id = intval($_POST['id_jogo']);
    $nome = trim($_POST['nomeJogo']);
    $desenvolvedor = trim($_POST['developer']);
    $preco = trim($_POST['preco']);

    if (empty($nome) || empty($desenvolvedor) || $preco === "") {
        $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios para editar.";
    } else {
        try {
            $stmt = $conexao->prepare("UPDATE jogo SET nome = :nome, desenvolvedor = :dev, preco = :preco WHERE id = :id");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':dev', $desenvolvedor);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $_SESSION['mensagem'] = "Jogo atualizado com sucesso!";
            header("Location: DashboardJogo.php");
            exit;
        } catch (PDOException $e) {
            $_SESSION['mensagem'] = "Erro ao atualizar: " . $e->getMessage();
            header("Location: DashboardJogo.php");
            exit;
        }
    }
}
?>
