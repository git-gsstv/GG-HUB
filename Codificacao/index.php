<?php
require('Login/protecao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="Estilizacao/IndexStyle.css">
</head>
<body>
    <aside class="sidebar">
        <ul class="menu">
            <li class="menu-item">
                <img src="Estilizacao/Assets/Home.png" alt="Home" class="SideImage">
                <a href="index.php">HOME</a>
            </li>
            <li class="menu-item">
                <img src="Estilizacao/Assets/User.png" alt="User" class="SideImage">
                <a href="#">USUÁRIOS</a>
            </li>
            <li class="menu-item">
                <img src="Estilizacao/Assets/Controller.png" alt="Experiências" class="SideImage">
                <a href="#">EXPERIÊNCIAS</a>
                <ul class="submenu">
                    <li>
                        <img src="Estilizacao/Assets/Plus.png" alt="Plus" class="SideImage">
                        <a href="Experiencias/DashboardJogo.php">CADASTRAR JOGO</a>
                    </li>
                    <li>
                        <img src="Estilizacao/Assets/Plus.png" alt="Plus" class="SideImage">
                        <a href="cadastrar-categoria.php">CADASTRAR CATEGORIA</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>


    <header class="topbar">
         <div class="logo">
            <img src="Estilizacao/Assets/GGHUBlogo.png" alt="GG HUB Logo" width="60">
        </div>
        <div>
            <img src="Estilizacao/Assets/BurguerMenu.png" alt="">
        </div>
        <div class="user-info">
            <img src="Estilizacao/Assets/BrasilFlag.png" alt="Brasil" height="20">
            <span class="username"><?php echo $_SESSION['usuario']?></span> - Head Administrator
        </div>
            <div class="avatar">
            <img src="Estilizacao/Assets/UserImage.png" alt="User avatar" width="30">
        </div>
    </header>

    <main class="dashboard">
        <div class="card">
            <h2>Bem-vindo, <span class="username"><?php echo $_SESSION['usuario']?></span>!</h2>
            <p class="highlight">6h47m</p>
            <p>Tempo de uso</p>
        </div>
        <div class="card">
            <h2>VENDAS</h2>
            <p>no último mês<br><span class="sales">R$3.259,90</span></p>
            <p>no último ano<br><span class="sales">R$26.759,90</span></p>
        </div>
        <div class="card">
            <h2>DOWNLOADS</h2>
            <img src="Estilizacao/Assets/GraficoSeta.png" alt="Gráfico" width="100%">
        </div>
        <div class="card">
            <h2>AMIGOS ONLINE</h2>
            <p>👤 username <span class="online">•</span></p>
            <p>👤 username <span class="online">•</span></p>
            <p>👤 username <span class="online">•</span></p>
        </div>
        <a href="Logout/logout.php">Sair</a>
    </main>
</body>
</html>