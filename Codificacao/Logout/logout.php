<?php
if (!isset($_SESSION)) {
    session_start();
}

session_destroy();

header("Location: ../Login/login_form.php");
?>