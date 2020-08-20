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
include './Professor.php';
//include './Crud.php';

if (isset($_POST['salvarprofessor'])) {

    $contador_erro = 0;
    foreach ($_POST as $key => $value) {
        if ($value == "") {
            $contador_erro++;
        }
    }

    if ($contador_erro > 0) {
        $_SESSION["mensagem"] = "Tem algum campo vazio.";
        echo $_SESSION["mensagem"];
    } else {
        if (strcmp($_POST['senha'], $_POST['confirma']) == 0) {
            $p = new Login($_POST['nome_professor'], $_POST['genero'], $_POST['telefone'], $_POST['cursoprofessor'], $_POST['disciplinaprofessor']);
            $p->salvarProfessor($_POST['email'], $_POST['senha']);
            header("Location: escola.php?#listYear");
        } else {
            echo "A confirmação de senha não confere.";
        }
    }
}

if (isset($_GET["apagar"])) {
    $aluno = new Aluno();
    $aluno->apagar($_GET["apagar"]);
    header("Location: escola.php");
}