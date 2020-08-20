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
include './Crud.php';
include './Pauta.php';




if (isset($_POST['salvapauta'])) {

    $contador_erro = 0;
    foreach ($_POST as $key => $value) {
        echo $value."<br>";
        if ($value == "") {
            $contador_erro++;
        }
    }

    if ($contador_erro > 0) {
        $_SESSION["mensagem"] = "Tem algum campo vazio. ".$contador_erro;
        echo $_SESSION["mensagem"];
    } else {
            $disc = new Pauta($_POST['MAC1'], $_POST['CPP1'], $_POST['MAC2'], $_POST['CPP2'], $_POST['MAC3'], $_POST['CPP3'], $_POST['CE']);
            $disc->salvar($_POST['cursoPauta'], $_POST['disciplinaCurso'], $_POST['alunoPauta']);
            header("Location: escola.php");
        
    }
}