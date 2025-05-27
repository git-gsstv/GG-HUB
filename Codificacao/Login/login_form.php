<?php
include_once('login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login in GG HUB</title>
    <link rel="stylesheet" href="../Estilizacao/LoginStyle.css">
</head>
<body>
    <div class="container">
        <div class="painelEsquerdo">
            <img src="../Estilizacao/Assets/GGHUBlogo.png" alt="GG HUB Logo" class="logo">
            <h2>FAÇA SEU<br>LOGIN</h2>
        </div>
        <div class="painelDireito">
            <form method="post">

                <input type="hidden" name="act" value="save">
                
                <div class="inputFormulario">
                    <img src="../Estilizacao/Assets/emailIcon.png" alt="Icon do Email" class="inputIcon">
                    <input type="email" name="email" class="inputArea" id="email" autocomplete="off" placeholder=" " required>
                    <label for="email" class="labelForm">Email</label>
                </div>
                <div class="inputFormulario">
                    <img src="../Estilizacao/Assets/senhaIcon.png" alt="Icon da Senha" class="inputIcon">
                    <input type="password" name="senha" class="inputArea" id="senha" autocomplete="off" placeholder=" " required>
                    <label for="senha" class="labelForm">Senha</label>
                </div>
                <input type="submit" value="ENTRAR" id="loginBotao">
                <p id="cadastroBotao"><a href="../Cadastro/cadastro_form.php" id="linkCadastro">criar conta</a></p>
            </form>

            <?php if (!empty($mensagemErro)): ?>
                <div id="mensagemErro">
                    <?php echo $mensagemErro; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>