<?php
require('CadastroJogo.php');
require('../Login/login.php');
require('../Login/protecao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Estilizacao/JogoStyle.css">
</head>
<body>
    <aside class="sidebar">
        <ul class="menu">
            <li class="menu-item">
                <img src="../Estilizacao/Assets/Home.png" alt="Home" class="SideImage">
                <a href="../index.php">HOME</a>
            </li>
            <li class="menu-item">
                <img src="../Estilizacao/Assets/User.png" alt="User" class="SideImage">
                <a href="#">USUÁRIOS</a>
            </li>
            <li class="menu-item">
                <img src="../Estilizacao/Assets/Controller.png" alt="Experiências" class="SideImage">
                <a href="#">EXPERIÊNCIAS</a>
                <ul class="submenu">
                    <li>
                        <img src="../Estilizacao/Assets/Plus.png" alt="Plus" class="SideImage">
                        <a href="DashboardJogo.php">CADASTRAR JOGO</a>
                    </li>
                    <li>
                        <img src="../Estilizacao/Assets/Plus.png" alt="Plus" class="SideImage">
                        <a href="cadastrar-categoria.php">CADASTRAR CATEGORIA</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>

    <header class="topbar">
         <div class="logo">
            <img src="../Estilizacao/Assets/GGHUBlogo.png" alt="GG HUB Logo" width="60">
        </div>
        <div>
            <img src="../Estilizacao/Assets/BurguerMenu.png" alt="">
        </div>
        <div class="user-info">
            <img src="../Estilizacao/Assets/BrasilFlag.png" alt="Brasil" height="20">
            <span class="username"><?php echo $_SESSION['usuario']?></span> - Head Administrator
        </div>
            <div class="avatar">
            <img src="../Estilizacao/Assets/UserImage.png" alt="User avatar" width="30">
        </div>
    </header>

    <main class="dashboard">
        <div class="card">
            <h2>CADASTRAR NOVO JOGO</h2>
            <img src="../Estilizacao/Assets/CadPlus.png" alt="Plus Button">
        </div>
        <div class="card">
            <h2>Bem-vindo, <span class="username"><?php echo $_SESSION['usuario']?></span>!</h2>
            <p class="highlight">6h47m</p>
            <p>Tempo de uso</p>
        </div>
    </main>
</body>
</html>