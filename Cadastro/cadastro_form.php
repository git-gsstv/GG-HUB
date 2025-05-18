<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GG HUB</title>
    <link rel="stylesheet" href="../Estilização/styleGGHUB.css">
</head>
<body>
    <div class="container">
        <div class="painelEsquerdo">
            <img src="../Estilização/Assets/GGHUBlogo.png" alt="GG HUB Logo" class="logo">
            <h2>CRIE SUA<br>CONTA</h2>
        </div>
        <div class="painelDireito">
            <form action="cadastro.php" method="post">

                <input type="hidden" name="act" value="save">
                <input type="hidden" name="id_adm" id="id_adm">
                
                <div class="inputFormulario">
                    <img src="../Estilização/Assets/userIcon.png" alt="Icon do Usuário" class="inputIcon">
                    <input type="text" name="usuario" placeholder="nome de usuário" class="inputArea" required>
                </div>
                <div class="inputFormulario">
                    <img src="../Estilização/Assets/emailIcon.png" alt="Icon do Email" class="inputIcon">
                    <input type="email" name="email" placeholder="email" class="inputArea" required>
                </div>
                <div class="inputFormulario">
                    <img src="../Estilização/Assets/senhaIcon.png" alt="Icon da Senha" class="inputIcon">
                    <input type="password" name="senha" placeholder="senha" class="inputArea" required>
                </div>
                <input type="submit" value="CADASTRAR" id="cadBotao">
                <p id="loginBotao">fazer login</p>
            </form>
        </div>
    </div>
</body>
</html>