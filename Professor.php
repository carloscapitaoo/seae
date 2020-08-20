<?php

//include './Pessoa.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Aluno
 *
 * @author lito
 */
class Login extends Pessoa {

    private $telefone;
    private $banco;
    private $curso;
    private $disciplina;

    public function __construct($nome = NULL, $genero = NULL, $telefone = NULL, $curso = NULL, $disciplina = NULL) {
        $this->banco = new Crud();
        parent::__construct($nome, $genero);
        $this->setTelefone($telefone);
        $this->setCurso($curso);
        $this->setDisciplina($disciplina);
    }

    public function salvarProfessor($email, $senha) {
        $this->banco->adicionar("utilizador", "?, ?, ?, ?", array(0, $email, password_hash($senha, PASSWORD_DEFAULT), "professor"));
        parent::salvar();
        $a = $this->banco->adicionar("professor", "?, ?, ?, ?, ?", array(
            $this->banco->listar("*", "pessoa", "WHERE 1 ORDER BY id DESC LIMIT 1", array())->fetch(\PDO::FETCH_ASSOC)["id"],
            $this->banco->listar("*", "utilizador", "WHERE 1 ORDER BY id DESC LIMIT 1", array())->fetch(\PDO::FETCH_ASSOC)["id"],
            $this->getTelefone(),
            $this->getCurso(),
            $this->getDisciplina()));
    }

    public function apagar($id) {
        $this->banco->apagar("bi", "id=?", array($id));
        $this->banco->apagar("aluno", "id=?", array($id));
        $this->banco->apagar("pessoa", "id=?", array($id));
    }

    public function lista_de_professor() {
        $sql = "SELECT utilizador.id, nome, email, curso, disciplina FROM pessoa, utilizador, professor WHERE pessoa.id= professor.id AND professor.id_utilizador= utilizador.id";
        return $this->banco->listarX($sql, array())->fetchAll(\PDO::FETCH_OBJ);
    }

    public function actualiza($id, $tabela, array $dados) {
        
    }

    public function setTelefone($classe) {
        $this->telefone = $classe;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }

    public function getDisciplina() {
        return $this->disciplina;
    }

    public function setDisciplina($disciplina) {
        $this->disciplina = $disciplina;
    }

}
