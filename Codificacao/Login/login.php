<?php
include_once'../Conexao/conexao.php';

if(isset($_POST['email']) || isset($_POST['email'])) {
    if(empty($_POST['email'])) {
        echo "Preencha o email";
    } else if (empty($_POST['senha'])) {
        echo "Preencha a senha";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM administrador WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

        $quantidade = $sql_query->rowCount();

        if ($quantidade == 1) {

            $administrador = $sql_query->fetch(PDO::FETCH_ASSOC);

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_adm'] = $administrador['id_adm'];
            $_SESSION['usuario'] = $administrador['usuario'];

            header("Location: ../CentroADM/telaPrincipal.php");

        } else {
            echo "Falha ao logar! Email ou senha incorretos.";
        }
    }
}
?>