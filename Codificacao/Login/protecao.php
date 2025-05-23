<?php 
if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id_adm'])) {
    die("Você não pode acessar essa página, pois não está logado.<p><a href=\"login_form.php\"></a></p>");
}
?>