<?php
require('../Login/login.php');
require('../Login/protecao.php');
include_once('CadastroJogo.php');

$editarDados = null;

if (isset($_GET['editar'])) {
    $idEditar = intval($_GET['editar']);
    include('EditJogo.php');
}

$mensagem = "";

if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    unset($_SESSION['mensagem']);
}
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
                        <a href="DashboardCategoria.php">CADASTRAR CATEGORIA</a>
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
            <span class="username"><?php echo $_SESSION['usuario']?> - Head Administrator</span>
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

        <?php if (!empty($mensagem)): ?>
            <div class="alerta">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

    <div id="overlay" class="overlay hidden">
        <div class="modal">
            <img src="../Estilizacao/Assets/GameBanner.jpg" alt="Logo" class="modal-logo">
            <form method="post">

                <input type="hidden" name="id_jogo" id="id_jogo">

                <label for="nomeJogo">Nome do jogo:</label>
                <input name="nomeJogo" type="text" autocomplete="off" placeholder="Ex: God of War">

                <label for="developer">Desenvolvedor(es):</label>
                <input name="developer" type="text" autocomplete="off" placeholder="Ex: Santa Monica Studio">

                <label for="preco" >Preço:</label>
                <input name="preco" type="number" autocomplete="off" placeholder="R$">

                <div class="dropdowns">
                    <div class="custom-dropdown">
                        <div class="dropdown-label">Categorias</div>
                        <div class="dropdown-content">
                        <?php
                        $stmtCat = $conexao->query("SELECT id, nome FROM categoria ORDER BY nome ASC");
                        while ($cat = $stmtCat->fetch(PDO::FETCH_ASSOC)) {
                            echo '<label><input type="checkbox" name="categorias[]" value="' . $cat['id'] . '"> ' . htmlspecialchars($cat['nome']) . '</label>';
                        }
                        ?>
                        </div>
                    </div>

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

    <?php if (isset($editarDados)): ?>
    <div id="editModal" class="overlay">
        <div class="modal">
            <img src="../Estilizacao/Assets/GameBanner.jpg" alt="Logo" class="modal-logo">
            <form method="post" action="EditJogo.php">
                <input type="hidden" name="id_jogo" value="<?= $editarDados['id'] ?>">

                <label for="nomeJogo">Nome do jogo:</label>
                <input name="nomeJogo" type="text" value="<?= htmlspecialchars($editarDados['nome']) ?>" required autocomplete="off">

                <label for="developer">Desenvolvedor(es):</label>
                <input name="developer" type="text" value="<?= htmlspecialchars($editarDados['desenvolvedor']) ?>" required autocomplete="off">

                <label for="preco">Preço:</label>
                <input name="preco" type="number" step="0.01" value="<?= $editarDados['preco'] ?>" required autocomplete="off">

                <div class="modal-buttons">
                    <input type="submit" value="SALVAR" class="btn green">
                    <a href="DashboardJogo.php" class="btn red">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>


    <div id="modalJogos" class="overlay hidden">
        <div class="modal modal-read" style="width: 700px; max-height: 80vh; display: flex; flex-direction: column;">
            <h2 style="text-align: center; color: #b9b9b9;">JOGOS CADASTRADOS</h2>

            <div class="scroll-area">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do jogo</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $conexao->query("SELECT id, nome FROM jogo ORDER BY id ASC");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['nome'] ?></td>
                                <td>
                                    <a href="?editar=<?= $row['id'] ?>" class="btn green">EDITAR</a>
                                    <a href="DeleteJogo.php?id=<?= $row['id'] ?>" class="btn red" onclick="return confirm('Tem certeza que deseja excluir este jogo?');">EXCLUIR</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div style="margin-top: 20px; text-align: center;">
                <button class="btn red" onclick="closeGamesModal()">SAIR</button>
            </div>
        </div>
    </div>


<script>
    const plusButton = document.querySelector('.card img[alt="Plus Button"]');
    const overlay = document.getElementById('overlay');

    plusButton.addEventListener('click', () => {
        overlay.classList.remove('hidden');
    });

    function closeModal() {
        overlay.classList.add('hidden');
    }

    const configButton = document.querySelector('.card img[alt="Configuration Button"]');
    const modalJogos = document.getElementById('modalJogos');

    configButton.addEventListener('click', () => {
        modalJogos.classList.remove('hidden');
    });

    function closeGamesModal() {
        modalJogos.classList.add('hidden');
    }

</script>

<script>
    const dropdowns = document.querySelectorAll('.custom-dropdown');

    dropdowns.forEach(drop => {
        const label = drop.querySelector('.dropdown-label');
        label.addEventListener('click', () => {
            dropdowns.forEach(d => {
                if (d !== drop) d.classList.remove('open');
            });
            drop.classList.toggle('open');
        });
    });

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