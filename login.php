<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="stylesheet" href="../../assets/tether/tether.min.css">
        <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/socicon/css/styles.css">
        <link rel="stylesheet" href="../../assets/theme/css/style.css">
        <link rel="stylesheet" href="../../assets/mobirise/css/mbr-additional.css" type="text/css">
        <link rel="stylesheet" href="../../assets/animate/animate.css">
        <link rel="shortcut icon" href="../../assets/images/logo-736x125-128x116.png" type="image/x-icon">
        <link href="../../assets/css/personalizado.css" rel="stylesheet">
        <title>Login - FM</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <body>
        <header>
            <div class="text-center col-md-12">
                    <div class="thumbnail text-center">
                    <img src="../../assets/images/logo-736x125.png" class="img-responsive">
                    <div class="caption">
                        <h3>Fernando Manhães</h3>
                </div>
                </div>
        </header>

        <form method="POST" action="valida.php" class="text-center">
            <?php
                if(isset($_SESSION['msg_login'])){
                    echo $_SESSION['msg_login'];
                    unset ($_SESSION['msg_login']);
                }
            ?>
            
                <div class="text-left form-group col-md-4 offset-md-4">
                    <label>Login:</label>
                        <input type="text" name="login" id="login" placeholder="Digite seu login" required autofocus class="form-control">
                    
                </div>
                
                <div class="text-left form-group col-md-4 offset-md-4">
                    <label>Senha:</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required class="form-control">
                </div>
            
            <div class="text-center">
                <input type="submit" name="btnLogin" value="Acessar" class="btn btn-login-outline">
            </div>
            
        </form>


    </body>
    <footer class="text-center">
        <br><br><br><br><br><br><br>
        <small>&copyDesenvolvido por MegaPontoCom</small>
    </footer>

    </html>