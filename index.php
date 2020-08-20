<?php
if (session_id() == '') {
    ini_set("session.save_handler", "files");
    ini_set("session.use_cookies", 1);
    ini_set("session.cookies_domain", $_SERVER["HTTP_HOST"]);
    ini_set("session.cookies_httponly", 1);
    if ($_SERVER["HTTP_HOST"] != "localhost") {
        ini_set("session.cookies_secure", 1);
    }
    ini_set("session.entropy_length", 512);
    ini_set("session.entropy_file", "/dev/urandom");
    ini_set("session.hash_function", "sha256");
    ini_set("session.hash_bits_per_character", 5);
    session_start();
}

if (@$_SESSION['logado'] == "SIM") {
    header("Location: escola.php");
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>LogIn</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="./css/main.css">
    </head>
    <body class="cover" style="background-image: url(./assets/img/loginFont.jpg);">
        <form id="logando" method="post" action="controlador_login.php" autocomplete="off" class="full-box logInForm" >
            <div id="infoLogin"></div>
            <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
            <p class="text-center text-muted text-uppercase">Insira as suas Crendenciais</p>
            <div class="form-group label-floating">
                <label class="control-label" for="UserEmail">E-mail</label>
                <input class="form-control" id="UserEmail" name="email" type="email">
                <p class="help-block">Ensira o seu Email</p>
            </div>
            <div class="form-group label-floating">
                <label class="control-label" for="UserPass">Senha</label>
                <input class="form-control" name="senha" id="UserPass" type="password">
                <p class="help-block">Ensira a sua senha</p>
            </div>
            <div class="form-group text-center">
                <input type="submit" name="Logar" value="Logar" id="Logar" class="btn btn-raised btn-danger">
            </div>
        </form>
        <!--====== Scripts -->
        <script src="./js/jquery-3.1.1.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <script src="./js/material.min.js"></script>
        <script src="./js/ripples.min.js"></script>
        <script src="./js/sweetalert2.min.js"></script>
        <script src="./js/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="./js/main.js"></script>
        <script src="./js/constumizacao.js"></script>
        <script>
            $.material.init();
        </script>
    </body>
</html>