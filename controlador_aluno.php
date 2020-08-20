<?php

session_start();
include 'Aluno.php';
include './Crud.php';

if (isset($_POST['salvarAluno'])) {
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
        if (isset($_POST["nome"]) && isset($_POST["genero"]) && isset($_POST["classe"]) && isset($_POST["turno"]) && isset($_POST["turma"]) && isset($_POST["pai"]) && isset($_POST["mae"]) && isset($_POST["residencia"]) && isset($_POST["naturalidade"]) && isset($_POST["provincia"]) && isset($_POST["nascimento"]) && isset($_POST["estadosivil"]) && isset($_POST["emissao"]) && isset($_POST["validade"]) && isset($_POST["curso"])) {
            $aluno = new Aluno($_POST["nome"], $_POST["genero"], $_POST["classe"], $_POST["turno"], $_POST["turma"], $_POST["pai"], $_POST["mae"], $_POST["residencia"], $_POST["naturalidade"], $_POST["provincia"], $_POST["nascimento"], $_POST["estadosivil"], $_POST["emissao"], $_POST["validade"], $_POST["curso"]);
            $aluno->salvar();
            header("Location: escola.php?#listYear");
        }
    }
}

if (isset($_GET["id"])) {
    $aluno = new Aluno();
    $aluno->apagar($_GET["id"]);
    header("Location: escola.php?#listYear");
}

if (isset($_POST['atualizarU'])) {
    $contador_erro = 0;
    foreach ($_POST as $key => $value) {
        if ($value == "") {
            $contador_erro++;
        }
    }

    if ($contador_erro > 0) {
        $_SESSION["mensagem"] = "Tem algum campo vazio." . $contador_erro;
        echo json_encode($_SESSION["mensagem"]);
    } else {
        $aluno = new Aluno($_POST["nome"],
                $_POST["genero"], 
                $_POST["classe"],
                $_POST["turno"],
                $_POST["turma"], 
                $_POST["pai"], 
                $_POST["mae"], 
                $_POST["residencia"],
                $_POST["naturalidade"],
                $_POST["provincia"],
                $_POST["nascimento"],
                $_POST["estadosivil"],
                $_POST["emissao"], 
                $_POST["validade"],
                $_POST["curso"]);
        $resultado = $aluno->atualizar($_POST['id']);
        echo json_encode("sucesso");
    }
} else {
    echo json_encode("nada foi submetido. ");
}