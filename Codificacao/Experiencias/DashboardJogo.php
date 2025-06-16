<?php
require('../Login/login.php');
require('../Login/protecao.php');
include_once('CadastroJogo.php');
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
            <h2>CADASTRAR NOVO <br> JOGO</h2>
            <img src="../Estilizacao/Assets/CadPlus.png" alt="Plus Button">
        </div>
        <div class="card">
            <h2>JOGOS <br> CADASTRADOS</h2>
            <h1>237 <img src="../Estilizacao/Assets/Wrench.png" alt="Configuration Button"></h1>
        </div>
    </main>

    <div id="overlay" class="overlay hidden">
        <div class="modal">
            <img src="../Estilizacao/Assets/GameBanner.jpg" alt="Logo" class="modal-logo">
            <form method="post">

                <input type="hidden" name="id_adm" id="id_adm">

                <label for="nomeJogo">Nome do jogo:</label>
                <input name="nomeJogo" type="text" placeholder="Ex: God of War">

                <label for="developer">Desenvolvedor(es):</label>
                <input name="developer" type="text" placeholder="Ex: Santa Monica Studio">

                <label for="preco" >Preço:</label>
                <input name="preco" type="number" placeholder="R$">

                <div class="dropdowns">
                    <!-- Categorias -->
                    <div class="custom-dropdown">
                        <div class="dropdown-label">Categorias</div>
                        <div class="dropdown-content">
                            <label><input type="checkbox" name="categorias[]" value="acao"> Ação</label>
                            <label><input type="checkbox" name="categorias[]" value="aventura"> Aventura</label>
                            <label><input type="checkbox" name="categorias[]" value="rpg"> RPG</label>
                        </div>
                    </div>

                    <!-- Plataformas -->
                    <div class="custom-dropdown">
                        <div class="dropdown-label">Plataformas</div>
                        <div class="dropdown-content">
                            <label><input type="checkbox" name="plataformas[]" value="pc"> PC</label>
                            <label><input type="checkbox" name="plataformas[]" value="ps5"> PlayStation 5</label>
                            <label><input type="checkbox" name="plataformas[]" value="xbox_series_x"> Xbox Series X</label>
                        </div>
                    </div>
                </div>



                <div class="modal-buttons">
                    <input type="submit" value="CADASTRAR" class="btn green">
                    <button type="button" class="btn red" onclick="closeModal()">CANCELAR</button>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($mensagem)): ?>
        <div class="alerta" style="background:#1e1e1e; padding:10px; border-radius:5px; margin-bottom:10px; color:white;">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>

    <script>
    const plusButton = document.querySelector('.card img[alt="Plus Button"]');
    const overlay = document.getElementById('overlay');

    plusButton.addEventListener('click', () => {
        overlay.classList.remove('hidden');
    });

    function closeModal() {
        overlay.classList.add('hidden');
    }
</script>

<script>
    const dropdowns = document.querySelectorAll('.custom-dropdown');

    dropdowns.forEach(drop => {
        const label = drop.querySelector('.dropdown-label');
        label.addEventListener('click', () => {
            // Fecha outros dropdowns
            dropdowns.forEach(d => {
                if (d !== drop) d.classList.remove('open');
            });
            // Alterna o atual
            drop.classList.toggle('open');
        });
    });

    // Fecha se clicar fora
    document.addEventListener('click', (e) => {
        dropdowns.forEach(drop => {
            if (!drop.contains(e.target)) {
                drop.classList.remove('open');
            }
        });
    });
</script>

</body>
</html>