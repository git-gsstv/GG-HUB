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
            <form action="login.php" method="post">

                <input type="hidden" name="act" value="save">
                
                <div class="inputFormulario">
                    <img src="../Estilizacao/Assets/emailIcon.png" alt="Icon do Email" class="inputIcon">
                    <input type="email" name="email" placeholder="email" class="inputArea" required>
                </div>
                <div class="inputFormulario">
                    <img src="../Estilizacao/Assets/senhaIcon.png" alt="Icon da Senha" class="inputIcon">
                    <input type="password" name="senha" placeholder="senha" class="inputArea" required>
                </div>
                <input type="submit" value="ENTRAR" id="loginBotao">
                <p id="cadastroBotao">criar conta</p>
            </form>
        </div>
    </div>
</body>
</html>