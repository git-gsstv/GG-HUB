<?php
require('Login/protecao.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    Bem vindo a tela inicial, <?php echo $_SESSION['usuario']; ?>.

    <p>
        <a href="Logout/logout.php">Sair</a>
    </p>
</body>
</html>