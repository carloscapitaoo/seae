<?php

session_start();
include './Crud.php';
include './Disciplina.php';
if (isset($_POST['salvadisciplina'])) {
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
        if (isset($_POST["cursodisciplina"]) && isset($_POST["classedisciplina"]) && isset($_POST["disciplina"]) && isset($_POST["nome_professor"])) {
            $disc = new Disciplina($_POST["disciplina"], $_POST["classedisciplina"], $_POST["cursodisciplina"], $_POST["nome_professor"]);
            $disc->salvar();
            header("Location: escola.php");
        }
    }
}

if (isset($_GET["id"])) {
    $aluno = new Aluno();
    $aluno->apagar($_GET["id"]);
    header("Location: escola.php");
}
