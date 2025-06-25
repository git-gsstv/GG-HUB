<?php
require('../Login/login.php');
include_once('CadastroCategoria.php');

if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_adm'])) {
    header("Location: ../Login/login_form.php");
}

$editarDados = null;

if (isset($_GET['editarCat'])) {
    $idEditar = intval($_GET['editarCat']);
    include('EditCategoria.php');
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
    <link rel="stylesheet" href="../Estilizacao/CategoriaStyle.css">
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
            <img src="../Estilizacao/Assets/BurguerMenu.png" alt="" class="burgerMenu">
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
            <h2>CADASTRAR NOVA <br> CATEGORIA</h2>
            <img src="../Estilizacao/Assets/CadPlus.png" alt="Plus Button">
        </div>
        <div class="card">
            <h2>CATEGORIAS <br> CADASTRADAS</h2>
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

                <input type="hidden" name="id" id="id">

                <label for="categoria">Nome da categoria:</label>
                <input name="categoria" type="text" autocomplete="off" placeholder="Ex: Aventura">

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
            <form method="post" action="EditCategoria.php">
                <input type="hidden" name="id" value="<?= $editarDados['id'] ?>">

                <label for="nome">Nome da categoria:</label>
                <input name="nome" type="text" value="<?= htmlspecialchars($editarDados['nome']) ?>" required autocomplete="off">

                <div class="modal-buttons">
                    <input type="submit" value="SALVAR" class="btn green">
                    <a href="DashboardCategoria.php" class="btn red">CANCELAR</a>
                </div>
            </form>
        </div>
    </div>
    <?php endif; ?>


    <div id="modalCategorias" class="overlay hidden">
        <div class="modal modal-read" style="width: 700px; max-height: 80vh; display: flex; flex-direction: column;">
            <h2 style="text-align: center; color: #b9b9b9;">CATEGORIAS CADASTRADAS</h2>

            <div class="scroll-area">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome da categoria</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt = $conexao->query("SELECT id, nome FROM categoria ORDER BY id ASC");
                        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['nome'] ?></td>
                                <td>
                                    <a href="?editarCat=<?= $row['id'] ?>" class="btn green">EDITAR</a>
                                    <a href="DeleteCategoria.php?id=<?= $row['id'] ?>" class="btn red" onclick="return confirm('Tem certeza que deseja excluir esta categoria?');">EXCLUIR</a>
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
    const modalCategorias = document.getElementById('modalCategorias');

    configButton.addEventListener('click', () => {
        modalCategorias.classList.remove('hidden');
    });

    function closeGamesModal() {
        modalCategorias.classList.add('hidden');
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