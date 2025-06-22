<?php
include_once'../Conexao/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$categoria = trim($_POST['categoria']);

    if (!empty($_POST['categoria'])) {

        try {
            $stmt = $conexao->prepare("INSERT INTO categoria (nome) VALUES (:categoria)");
            $stmt->bindValue(':categoria', $categoria);
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $_SESSION['mensagem'] = "Categoria cadastrada com sucesso!";
                    $categoria = null;
                } else {
                    $_SESSION['mensagem'] = "Erro ao tentar efetivar cadastro de categoria";
                }
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: " . $erro->getMessage();
        }
    }
}
?>