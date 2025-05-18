<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GG HUB</title>
</head>
<body>
    <form action="cadastro.php" method="post">
        <input type="hidden" name="act" value="save">
        <input type="hidden" name="id_adm" id="id_adm">
        <input type="text" name="usuario" id="usuario" placeholder="nome de usuário">
        <input type="email" name="email" id="email" placeholder="email">
        <input type="password" name="senha" id="senha" placeholder="senha">
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>