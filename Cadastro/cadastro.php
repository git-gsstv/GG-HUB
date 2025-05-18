<?php
include_once'conexao.php';

$usuario = trim($_POST['usuario']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && !empty($_POST['usuario'])) {
    
    try {
        $stmt = $conexao->prepare("INSERT INTO administrador (usuario, email, senha) VALUES (:usuario ,:email ,:senha )");
        $stmt->bindValue(':usuario', $usuario);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                echo "Dados cadastrados com sucesso!";
                $usuario = $email = $senha = null;
            } else {
                echo "Erro ao tentar efetivar cadastro";
            }
        } else {
            throw new PDOException("Erro: Não foi possível executar a declaração sql");
        }
    } catch (PDOException $erro) {
        echo "Erro: " . $erro->getMessage();
    }
}
?>