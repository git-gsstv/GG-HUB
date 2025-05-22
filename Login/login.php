<?php
include_once'conexao.php';

if(isset($_POST['email']) || isset($_POST['email'])) {
    if(empty($_POST['email'])) {
        echo "Preencha o email";
    } else if (empty($_POST['senha'])) {
        echo "Preencha a senha";
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT email, senha FROM administrador WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $administrador = $sql_query->query_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id_adm'] = $usuario['id_adm'];
            $_SESSION['usuario'] = $usuario['usuario'];

            header("Location: telaPrincipal.php")

        } else {
            echo "Falha ao logar! Email ou senha incorretos.";
        }
    }
}
?>