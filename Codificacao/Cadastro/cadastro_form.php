<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GG HUB - Cadastro</title>
    <link rel="stylesheet" href="../Estilizacao/CadastroStyle.css">
</head>
<body>
    <div class="container">
        <div class="painelEsquerdo">
            <img src="../Estilizacao/Assets/GGHUBlogo.png" alt="GG HUB Logo" class="logo">
            <h2>CRIE SUA<br>CONTA</h2>
        </div>
        <div class="painelDireito">
            <form action="cadastro.php" method="post">

                <input type="hidden" name="act" value="save">
                <input type="hidden" name="id_adm" id="id_adm">

                <div class="inputFormulario">
                    <img src="../Estilizacao/Assets/userIcon.png" alt="Icon do Usuário" class="inputIcon">
                    <input type="text" name="usuario" id="usuario" placeholder=" " class="inputArea" autocomplete="off" required>
                    <label for="usuario" class="labelForm">Usuário</label>
                </div>
                <div class="inputFormulario">
                    <img src="../Estilizacao/Assets/emailIcon.png" alt="Icon do Email" class="inputIcon">
                    <input type="email" name="email" id="email" placeholder=" " class="inputArea" autocomplete="off" required>
                    <label for="email" class="labelForm">Email</label>
                </div>
                <div class="inputFormulario">
                    <img src="../Estilizacao/Assets/senhaIcon.png" alt="Icon da Senha" class="inputIcon">
                    <input type="password" name="senha" id="senha" placeholder=" " class="inputArea"autocomplete="off" required>
                    <label for="senha" class="labelForm">Senha</label>
                </div>
                <input type="submit" value="CADASTRAR" id="cadBotao">
                <p id="loginBotao"><a href="../Login/login_form.php" id="linkLogin">fazer login</a></p>
            </form>
        </div>
    </div>
</body>
</html>