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
include './Login.php';

if (isset($_POST['email'])&&isset($_POST['senha'])) {
    $contador_erro = 0;
    foreach ($_POST as $key => $value) {
        if ($value == "") {
            $contador_erro++;
        }
    }

    if ($contador_erro > 0) {
        echo json_encode("Tem algum campo vazio.");
    } else {
        $l = new Login($_POST['email'], $_POST['senha']);
        if ($l->verificarLogin()) {
            $a = $l->encontrarProfessor()[0];
            $_SESSION['logado'] = "SIM";
            $_SESSION['nome'] = $a->nome;
            $_SESSION['telefone'] = $a->telefone;
            $_SESSION['curso'] = $a->curso;
            $_SESSION['disciplina'] = $a->disciplina;
            $_SESSION['email'] = $a->email;
            $_SESSION['nivel'] = $a->nivel;
            $_SESSION['id'] = $a->id;
            echo json_encode("sucesso");
        } else {
            echo json_encode("erro");
        }
    }
} else {
    echo json_encode("dados não submetido");
}

if (isset($_GET['sair'])) {
    session_unset();
    session_destroy();
}