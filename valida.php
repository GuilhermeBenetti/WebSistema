<?php
session_start();
include_once 'conn.php';

    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if($btnLogin){
        $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if((!empty($usuario)) && (!empty($senha))){
            $result_usuario = "SELECT * FROM clientes_usuarios WHERE login= '$usuario' LIMIT 1";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            if($resultado_usuario){
                $row_usuario = mysqli_fetch_assoc($resultado_usuario);
                if(password_verify($senha, $row_usuario['senha'])){
                    $_SESSION['id_login'] = $row_usuario['id'];
                    $_SESSION['login'] = $row_usuario['login'];
                    header("Location: admin.php");
                }else{
                    $_SESSION['msg_login'] = "<p style='color:red;'>Login e senha incorreto!</p>";
                    header("Location: login.php");
                }
            }
        }else{
            $_SESSION['msg_login'] = "<p style='color:red;'>Login e senha incorreto!</p>";
            header("Location: login.php");
        }
    }else{
        $_SESSION['msg_login'] = "<p style='color:red;'>Página não encontrada</p>";
        header("Location: login.php");
    }
?>