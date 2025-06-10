<?php
require('Login/protecao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Estilizacao/IndexStyle.css">
</head>
<body>
    <header>
        <div id="headerDashboard">
            <div id="LogoContainer">
                <img src="Estilizacao/Assets/GGHUBlogo.png" alt="Logo GG HUB" id="Logo">
            </div>
            <div id="MenuContainer">
                <img src="Estilizacao/Assets/BurguerMenu.png" alt="Menu de Hamburguer">
            </div>
            <div id="LocalContainer">
                <!-- TEMPORÁRIO E SUJEITO A MODIFICAÇÃO -->
                <img src="Estilizacao/Assets/BrasilFlag.png" alt="Bandeira do Brasil" id="Local">
            </div>
            <div id="Usuário">
                <p><?php echo $_SESSION['usuario']; ?>.</p>
                <p>Head Administrator</p>
            </div>
            <div id="">
                <img src="Estilizacao/Assets/UserImage.png" alt="Imagem de Usuário" id="LogoUsuario">
            </div>
        </div>
    </header>
    <p>
        <a href="Logout/logout.php">Sair</a>
    </p>
</body>
</html>