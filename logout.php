<?php
    session_start();

    unset($_SESSION['id'], $_SESSION['login']);

    $_SESSION['msg_login'] = "<p style='color:green;'>Deslogado com sucesso!</p>";
    header("Location: login.php");

?>