<?php
include_once('../Conexao/conexao.php');

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nomeJogo']);
    $desenvolvedor = trim($_POST['developer']);
    $preco = trim($_POST['preco']);
    $categorias = $_POST['categorias'] ?? [];
    $plataformas = $_POST['plataformas'] ?? [];

    if (empty($nome) || empty($desenvolvedor) || $preco === "" || empty($categorias) || empty($plataformas)) {
        $mensagem = "Preencha todos os campos obrigatórios antes de cadastrar.";
    } else {
        try {
            $conexao->beginTransaction();

            $stmt = $conexao->prepare("INSERT INTO jogo (nome, desenvolvedor, preco) VALUES (:nome, :desenvolvedor, :preco)");
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':desenvolvedor', $desenvolvedor);
            $stmt->bindValue(':preco', $preco);
            $stmt->execute();
            $id_jogo = $conexao->lastInsertId();

            $stmtCat = $conexao->prepare("INSERT INTO jogo_categoria (id_jogo, id_categoria) VALUES (:id_jogo, :id_categoria)");
            foreach ($categorias as $id_categoria) {
            $stmtCat->execute([
                ':id_jogo' => $id_jogo,
                ':id_categoria' => $id_categoria
            ]);
            }

            $stmtPlat = $conexao->prepare("INSERT INTO jogo_plataforma (id_jogo, plataforma) VALUES (:id_jogo, :plataforma)");
            foreach ($plataformas as $plataforma) {
                $stmtPlat->execute([
                    ':id_jogo' => $id_jogo,
                    ':plataforma' => $plataforma
                ]);
            }

            $conexao->commit();
            $_SESSION['mensagem'] = "Jogo cadastrado com sucesso!";
        } catch (PDOException $e) {
            $conexao->rollBack();
            $_SESSION['mensagem'] = "Erro no cadastro de jogo: " . $e->getMessage();
        }
    }
}

?>
